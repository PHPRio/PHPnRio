<?php

class TransactionController extends Controller {

	public $total_attendees;

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('index', 'view', 'import', 'uploadList', 'unconfirmedAttendees', 'sendEmailToUnconfirmed', 'cleanPendingTransactions','graph', 'sendFinalEmail'),
				'users' => array('@'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function behaviors() {
		return array('attendeeCalculator' => array('class' => 'application.modules.admin.behaviors.AttendeeCalculator'));
	}

	protected function beforeAction($action) {
		$this->attendeeCalculator->beforeAction();
		return true;
	}

	public function actionCleanPendingTransactions() {
		$paid = Transaction::model()->findAllByAttributes(array('status' => Transaction::STATUS_APPROVED));
		foreach ($paid as $t)
			$pending = Transaction::model()->deleteAllByAttributes(array('status' => Transaction::STATUS_WAITING, 'name' => $t->name));

		$this->redirect('index');
	}

	public function actionIndex() {
		$model = new Transaction('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Transaction']))
			$model->attributes = $_GET['Transaction'];

		$this->render('index', array('model' => $model, 'transactions' => $model->search()));
	}

	public function actionImport() {
		$this->render('import');
	}

	private function getUnconfirmedTransactions() {
		return Yii::app()->db->createCommand('SELECT t.* FROM transaction t WHERE id NOT IN (SELECT transaction_id FROM attendee) ORDER BY t.name')->queryAll();
	}

	public function actionUnconfirmedAttendees() {
		$model = new Transaction('search');
		$model->unsetAttributes();  // clear any default values

		$transactions_array = $this->getUnconfirmedTransactions();
		$data_provider = new CArrayDataProvider($transactions_array, array(
			'id' => 'unconfirmed_attendees',
			'sort' => array('attributes' => array('id', 'name', 'status', 'payment_type', 'total_attendees', 'received', 'transaction_date')),
			'pagination' => isset($GLOBALS['printing'])? false : array('pageSize' => 10)
		));

		$this->render('index', array('model' => $model, 'transactions' => $data_provider));
	}

	public function actionSendEmailToUnconfirmed() {
		$transactions = $this->getUnconfirmedTransactions();

		$total = 0;
		foreach ($transactions as $attributes) {
			if ($attributes['status'] == Transaction::STATUS_WAITING) continue;

			$id = $attributes['id'];
			unset($attributes['id']);

			$transaction = new Transaction;
			$transaction->attributes = $attributes;
			$transaction->setPrimaryKey($id);

			$this->sendEmail($transaction);
			++$total;
		}

		Yii::app()->user->setFlash('alert', 'Total de e-mails enviados: '.$total);
		$this->redirect('unconfirmedAttendees');
	}

	public function actionView($id) {
		$this->render('view', array('model' => $this->loadModel($id)));
	}

	public function actionGraph() {
		Yii::import('ext.helpers.DateHelper');
		$transactions = Yii::app()->db->createCommand()->select('COUNT(*) total, CAST(transaction_date AS DATE) date')->from('transaction')->group('date')->queryAll();

		$dof_array = array(
			'Sunday' => 'D',
			'Monday' => '2ª',
			'Tuesday' => '3ª',
			'Wednesday' => '4ª',
			'Thursday' => '5ª',
			'Friday' => '6ª',
			'Saturday' => 'S',
		);

		$dates = $numbers = array();
		$i = 0;
		foreach ($transactions as $trans) {
			$dof = $dof_array[date('l', strtotime($trans['date']))];
			$date = DateHelper::convert($trans['date'], 'ISO', 'BR');
			$unix_date = strtotime($trans['date']);

			$diff = ($unix_date - $last_day)/60/60/24;
			if (isset($last_day) && $diff > 1) {
				for($times = 1; $times < $diff; $times++) {
					$this_unix_date = strtotime("-$times days", $unix_date);
					$this_day = date('d', $this_unix_date);
					$this_dof = $dof_array[date('l', $this_unix_date)];

					$dates[] = $i % 3 == 0 ? "$this_day-$this_dof" : $this_dof;
					$numbers[] = 0;
					++$i;
				}
			}
			$last_day = $unix_date;

			$dates[] = $i % 3 == 0 ? substr($date,0,2)."-$dof" : $dof;
			$numbers[] = $trans['total'];
			++$i;
		}

		$min = min($numbers);
		$max = max($numbers);
		$colors = array('4080A5','4C99C5','85BAD8');

		$graph = 'http://chart.apis.google.com/chart?cht=lc'.
			"&chds=0,40". // min,max for each datagroup
			'&chd=t:'.implode(',', $numbers).  //data

			'&chxt=x,y'. //what axis to show
			'&chxl='. //axis values
				'0:|'.implode('|', $dates).'|'.
				"1:|0|5|10|15|20|25|30|35|40".

			'&chs=900x200'. //dimensions
//			'&chma=10,10,10,10'. //margin

			"&chco=$colors[1]". //line colors
			'&chf=c,s,EFEFEF'. //last 2 zeroes for bg makes it fully transparent
			"&chm=B,$colors[2]85,0,0,0,-1|o,$colors[0],0,-1,4". //filling under the line; adding markers to each point

			'&chg='.(100/(sizeof($dates)-1)).','.(100/8).
			'&chls=2'; //line style (tickness, dash length, space length)

		$this->layout = '/layouts/column1';
		$this->render('graph', compact('graph'));
	}

	public function actionSendFinalEmail() {
		Yii::import('ext.mail.*');
		Yii::import('ext.helpers.ArrayHelper');
		Yii::app()->mail->dryRun = !PRODUCTION;
		$sent_log = YiiBase::getPathOfAlias('application.runtime.sent_certificates');

		touch($sent_log);
		$sent_transactions = ArrayHelper::clear(explode(';', file_get_contents($sent_log)));

		$transactions = Transaction::model()->findAllByAttributes(array('status' => Transaction::STATUS_APPROVED), sizeof($sent_transactions) > 0? 'id NOT IN ('.implode(',',$sent_transactions).')' : '');
		$total = 0;
		foreach ($transactions as $transaction) {
			$list = array();
			foreach($transaction->attendees as $attendee)
				if (!is_numeric($attendee->name) && $attendee->name != 'Identidade')
					$list[$attendee->name] = 'a:'.$attendee->id;

			if (!count($list))
				$list = array($transaction->name => 't:'.$transaction->id);

			$mail = new YiiMailMessage('PHP\'n Rio - Certificado de Participação');
			$mail->setBody($this->renderPartial('/emails/certificados', array('list' => $list), true), 'text/html');
			$mail->addFrom(Yii::app()->params['email'], 'PHP\'n Rio');
			$mail->addTo((string)$transaction->email, (string)$transaction->name);
			Yii::app()->mail->send($mail);
			file_put_contents($sent_log, $transaction->id.';', FILE_APPEND);
			++$total;
		}

		$s = $total > 1? 's' : '';
		Yii::app()->user->setFlash('alert', ($s? 'Foram' : ($total == 0? 'Não foi' : 'Foi'))." enviado$s ".($total? $total : 'nenhum')." email$s.");

		$this->redirect('index');
	}

	public function actionUploadList() {
		$xml_string = file_get_contents($_FILES['file']['tmp_name']);
		$xml_string = str_replace('encoding="ISO-8859-1"', 'encoding="UTF-8"', utf8_encode($xml_string));
		$data = simplexml_load_string($xml_string);

		foreach ($data->Table as $transaction_xml) {
			if ($transaction_xml->Tipo_Transacao != Transaction::TRANSACTION_TYPE_PAYMENT) continue;

			$transaction = Transaction::model()->findByAttributes(array('code' => $transaction_xml->Transacao_ID));
			if (!in_array($transaction_xml->Status, array(Transaction::STATUS_APPROVED, Transaction::STATUS_WAITING, Transaction::STATUS_CANCELED))) continue;
			if (!$transaction) {
				$transaction = new Transaction;
				$old_status = null;
			}
			else {
				$old_status = $transaction->status;
			}

			if ($old_status != $transaction_xml->Status) {
				switch ($transaction_xml->Status) {
					case Transaction::STATUS_CANCELED: //deleting transactions that have been canceled
						if (!$transaction->isNewRecord) $transaction->delete();
					break;

					case Transaction::STATUS_APPROVED: //deleting other transactions by the same person that are pending when there's one that's approved
						Transaction::model()->deleteAll(
							'status = :status AND name = :name AND code != :code',
							array(':status' => Transaction::STATUS_WAITING, ':name' => $transaction->name, ':code' => $transaction->code)
						);
					break;
				}
			}

			if ($transaction_xml->Status == Transaction::STATUS_CANCELED) continue;

			$price = self::handle_br_numbers($transaction_xml->Valor_Bruto);
			$transaction->attributes = array(
				'code' => $transaction_xml->Transacao_ID,
				'name' => $transaction_xml->Cliente_Nome,
				'email' => $transaction_xml->Cliente_Email,
				'payment_method' => $transaction_xml->Debito_Credito,
				'transaction_type' => $transaction_xml->Tipo_Transacao,
				'status' => $transaction_xml->Status,
				'payment_type' => ($transaction_xml->Tipo_Pagamento == 'Cartão de Crédito')? 'Cartão' : $transaction_xml->Tipo_Pagamento,
				'total_attendees' => ($transaction_xml->Transacao_ID == Transaction::CODE_FREE_TICKETS)? 32 : (int)($price/Transaction::TRANSACTION_VALUE_PER_ATTENDEE),
				'price' => $price,
				'discount' => self::handle_br_numbers($transaction_xml->Valor_Desconto),
				'taxes' => self::handle_br_numbers($transaction_xml->Valor_Taxa),
				'received' => self::handle_br_numbers($transaction_xml->Valor_Liquido),
				'transaction_date' => self::br_datetime_to_iso((string)$transaction_xml->Data_Transacao),
				'compensation_date' => self::br_datetime_to_iso((string)$transaction_xml->Data_Compensacao),
			);

			if (!$transaction->save()) {
				$errors = $transaction->errors;
				break;
			}
			else {
				if ($old_status != $transaction->status && $transaction->status == Transaction::STATUS_APPROVED)
					$this->sendEmail($transaction);
			}
		}

		if (isset($errors)) {
			$this->render('uploadList', array('errors' => $errors));
		}
		else {
			$this->redirect('index');
		}
	}

	public function sendEmail(Transaction $transaction) {
		Yii::import('ext.mail.*');
		Yii::log("Sending email about transaction $transaction->code to $transaction->email", CLogger::LEVEL_INFO, 'email.send');
		$mail = new YiiMailMessage('PHP\'n Rio - Finalize sua inscrição');
		$mail->setBody($this->renderPartial('/emails/finalizar_inscricao', array('transaction' => $transaction), true), 'text/html');
		$mail->addFrom(Yii::app()->params['email'], 'PHP\'n Rio');
		$mail->addTo((string)$transaction->email, (string)$transaction->name);
		Yii::app()->mail->send($mail);
	}

	/**
	 * @todo MOVE THIS CRAP TO A DATE HELPER!!!!
	 * @param type $datetime
	 * @return type
	 */
	private static function br_datetime_to_iso($datetime) {
		$parts = explode(' ',$datetime);
		$date = explode('/', $parts[0]);
		return "$date[2]-$date[1]-$date[0] $parts[1]";
	}

	private static function handle_br_numbers($number) {
		return (float) strtr($number, ',', '.');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = Transaction::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
}