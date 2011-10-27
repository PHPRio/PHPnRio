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
		Yii::import('ext.mail.*');

		$xml_string = file_get_contents($_FILES['file']['tmp_name']);
		$xml_string = str_replace('encoding="ISO-8859-1"', 'encoding="UTF-8"', utf8_encode($xml_string));
		$data = simplexml_load_string($xml_string);

		$total = 0;
		foreach ($data->Table as $transaction_xml) {
			if ($transaction_xml->Tipo_Transacao != Transaction::TRANSACTION_TYPE_PAYMENT || $transaction_xml->Status != Transaction::STATUS_APPROVED) continue;

			$transaction = Transaction::model()->findByAttributes(array('code' => $transaction_xml->Transacao_ID));
			if (!$transaction) {
				$new = true;
				$transaction = new Transaction;
			}
			else
				$new = false;

			$price = self::handle_br_numbers($transaction_xml->Valor_Bruto);

			$transaction->attributes = array(
				'code' => $transaction_xml->Transacao_ID,
				'name' => $transaction_xml->Cliente_Nome,
				'email' => $transaction_xml->Cliente_Email,
				'payment_method' => $transaction_xml->Debito_Credito,
				'transaction_type' => $transaction_xml->Tipo_Transacao,
				'status' => $transaction_xml->Status,
				'payment_type' => $transaction_xml->Tipo_Pagamento,
				'total_attendees' => $price/Transaction::TRANSACTION_VALUE_PER_ATTENDEE,
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
				++$total;
				if ($new) {
					$mail = new YiiMailMessage('PHP\'n Rio - Finalize sua inscrição');
					$mail->setBody($this->renderPartial('/emails/finalizar_inscricao', array('transaction' => $transaction), true), 'text/plain');
					$mail->addFrom(Yii::app()->params['email'], 'PHP\'n Rio');
					$mail->addTo((string)$transaction->email, (string)$transaction->name);
					Yii::app()->mail->send($mail);
				}
			}
		}

		if (isset($errors)) {
			$this->render('uploadList', array('errors' => $errors));
		}
		else {
			$this->redirect('index');
		}
	}
}