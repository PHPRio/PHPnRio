<?php

class ScheduleController extends Controller {

	/** @var array */ public $schedule_array = array();
	/** @var array */ public $presentations = array();
	/** @var Transaction */ public $transaction;


	public function __construct($id, $module = null) {
		parent::__construct($id, $module);

		session_start();

		$this->schedule_array = require dirname(dirname(__FILE__))."/config/schedule_array.php";
	}

	public function actionIndex() {
		if (isset($_SESSION['transaction']) && $_SESSION['transaction']) {
			$this->transaction = self::findTransaction($_SESSION['transaction']);
		}
		else {
			$this->transaction = false;
		}
		foreach (Presentation::model()->findAll() as $pres)
			$this->presentations[$pres->slug] = $pres;

		$this->render('index');
	}

	public function actionIdentifyTransaction() {
		$trans = self::findTransaction($_POST['transaction']);
		if (sizeof($trans)) {
			$_SESSION['transaction'] = $_POST['transaction'];
			$_SESSION['first_name'] = strtok($trans->name, ' ');
		}
		else {
			$_SESSION['transaction'] = false;
		}

		$this->redirect('/grade');
	}

	public function actionSetPresentationsAndAttendees() {
		if ($_POST) {
			$transaction = self::findTransaction($_SESSION['transaction']);
			$attendees = array_pop($_POST);
			$presentations = $_POST;

			$presentation_ids = array();
			foreach($presentations as $pos => $number) {
				$type = ($pos[0] == 'p')? 'presentations' : 'workshops';
				$presentation_ids[] = $this->schedule_array[$type][$pos[1]-1][$number-1];
			}
			$presentation_ids = array_merge(array_unique($presentation_ids));
			$transaction->presentations = $presentation_ids;
			$transaction->save();

			Attendee::model()->deleteAllByAttributes(array('transaction_id' => $transaction->id));
			foreach ($attendees as $attendee) {
				if (empty($attendee['name'])) continue;
				$att = new Attendee;
				$att->attributes = $attendee;
				$att->transaction_id = $transaction->id;
				$att->save();
			}

			Yii::app()->user->setFlash('alert', 'Dados salvos! Obrigado pela colaboração.');
		}

		$this->redirect('/grade');
	}

	public function afterAction($action) {
		if (isset($_SESSION['transaction']) && $action->id == 'index' && $_SESSION['transaction'] === false)
			unset($_SESSION['transaction']);
	}

	private static function findTransaction($code) {
		return Transaction::model()->findByAttributes(array('code' => $code, 'status' => Transaction::STATUS_APPROVED));
	}

}