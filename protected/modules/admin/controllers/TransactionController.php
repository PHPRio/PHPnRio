<?php

class TransactionController extends Controller {

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function behaviors() {
		return array('redirector' => 'ext.behaviors.AlertRedirector');
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('index', 'uploadList'),
				'users' => array('@'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex() {
		$model = new Transaction('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('index', array('model' => $model));
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

	public function actionUploadList() {
		Yii::import('ext.helpers.DateHelper');

		$xml_string = file_get_contents($_FILES['file']['tmp_name']);
		$xml_string = str_replace('encoding="ISO-8859-1"', 'encoding="UTF-8"', $xml_string);
		$data = simplexml_load_string($xml_string);

		$total = 0;
		foreach ($data->Table as $trans) {
			if ($trans->Tipo_Transacao != Transaction::TRANSACTION_TYPE_PAYMENT) continue;
			$att = Transaction::model()->findByAttributes(array('code' => $trans->Transacao_ID));
			if (!$att) $att = new Transaction;
			$att->attributes = array(
				'code' => $trans->Transacao_ID,
				'name' => $trans->Cliente_Nome,
				'email' => $trans->Cliente_Email,
				'payment_method' => $trans->Debito_Credito,
				'transaction_type' => $trans->Tipo_Transacao,
				'status' => $trans->Status,
				'payment_type' => $trans->Tipo_Pagamento,
				'price' => self::handle_br_numbers($trans->Valor_Bruto),
				'discount' => self::handle_br_numbers($trans->Valor_Desconto),
				'taxes' => self::handle_br_numbers($trans->Valor_Taxa),
				'received' => self::handle_br_numbers($trans->Valor_Liquido),
				'transaction_date' => self::br_datetime_to_iso((string)$trans->Data_Transacao),
				'compensation_date' => self::br_datetime_to_iso((string)$trans->Data_Compensacao),
			);

			if (!$att->save()) {
				$errors = $att->errors;
				break;
			}
			else { ++$total; }
		}

		if (isset($errors)) {
			$this->render('uploadList', array('errors' => $errors));
		}
		else {
			$this->redirect('index');
		}
	}
}