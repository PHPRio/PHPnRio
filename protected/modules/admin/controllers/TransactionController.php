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
				'actions' => array('index', 'view', 'uploadList', 'unconfirmedAttendees', 'sendEmailToUnconfirmed'),
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

	public function actionIndex() {
		$model = new Transaction('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('index', array('model' => $model, 'transactions' => $model->search()));
	}

	private function getUnconfirmedTransactions() { return Yii::app()->db->createCommand('SELECT t.* FROM transaction t WHERE id NOT IN (SELECT transaction_id FROM attendee)')->queryAll(); }

	public function actionUnconfirmedAttendees() {
		$model = new Transaction('search');
		$model->unsetAttributes();  // clear any default values

		/** @todo sorting is not working */
		$transactions_array = $this->getUnconfirmedTransactions();
		$data_provider = new CArrayDataProvider($transactions, array(
			'id' => 'unconfirmed_attendees',
			'sort' => array('attributes' => array('id', 'name', 'status', 'payment_type', 'total_attendees', 'received', 'transaction_date'))
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	public function actionUploadList() {
		$xml_string = file_get_contents($_FILES['file']['tmp_name']);
		$xml_string = str_replace('encoding="ISO-8859-1"', 'encoding="UTF-8"', utf8_encode($xml_string));
		$data = simplexml_load_string($xml_string);

		foreach ($data->Table as $transaction_xml) {
			if ($transaction_xml->Tipo_Transacao != Transaction::TRANSACTION_TYPE_PAYMENT
			|| !in_array($transaction_xml->Status, array(Transaction::STATUS_APPROVED, Transaction::STATUS_WAITING)))
				continue;

			$transaction = Transaction::model()->findByAttributes(array('code' => $transaction_xml->Transacao_ID));
			if (!$transaction) {
				$transaction = new Transaction;
				$old_status = null;
			}
			else {
				$old_status = $transaction->status;
			}

			$price = self::handle_br_numbers($transaction_xml->Valor_Bruto);
			$transaction->attributes = array(
				'code' => $transaction_xml->Transacao_ID,
				'name' => $transaction_xml->Cliente_Nome,
				'email' => $transaction_xml->Cliente_Email,
				'payment_method' => $transaction_xml->Debito_Credito,
				'transaction_type' => $transaction_xml->Tipo_Transacao,
				'status' => $transaction_xml->Status,
				'payment_type' => ($transaction_xml->Tipo_Pagamento == 'Cartão de Crédito')? 'Cartão' : $transaction_xml->Tipo_Pagamento,
				'total_attendees' => (int)($price/Transaction::TRANSACTION_VALUE_PER_ATTENDEE),
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