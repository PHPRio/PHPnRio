<?php

class ScheduleController extends Controller {

	/** @var array */ public $presentations = array();
	public function __construct($id, $module = null) {
		parent::__construct($id, $module);
		session_start();
	}

	public function actionIndex() {
		if (isset($_SESSION['transaction']) && !$_SESSION['transaction']) {
			$transaction = Transaction::model()->findByAttributes(array('code' => $_SESSION['transaction']));
		}
		else {
			$transaction = false;
		}

		$this->render('index', compact('transaction'));
	}

	public function actionIdentifyTransaction() {
		$trans = Transaction::model()->findByAttributes(array('code' => $_POST['transaction']));
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
		$transaction = self::findTransaction($_SESSION['transaction']);

		$schedule_array = require dirname(dirname(__FILE__))."/config/schedule_array.php";
		$attendees = array_pop($_POST);
		$presentations = $_POST;

		$presentation_ids = array();
		foreach($presentations as $pos => $number) {
			$type = ($pos[0] == 'p')? 'presentations' : 'workshops';
			$presentation_ids[] = $schedule_array[$type][$pos[1]-1][$number-1];
		}
		$presentation_ids = array_merge(array_unique($presentation_ids));
		$transaction->presentations = $presentation_ids;
		var_dump($transaction->save());

		Attendee::model()->deleteAllByAttributes(array('transaction_id' => $transaction->id));
		foreach ($attendees as $attendee) {
			$att = new Attendee;
			$att->attributes = $attendee;
			$att->transaction_id = $transaction->id;
			$att->save();
		}

		$this->redirect('/grade');
	}

	public function afterAction(CAction $action) {
		if (isset($_SESSION['transaction']) && $action->id == 'index' && $_SESSION['transaction'] === false)
			unset($_SESSION['transaction']);
	}

	private static function findTransaction($code) {
		return Transaction::model()->findByAttributes(array('code' => $code));
	}

}