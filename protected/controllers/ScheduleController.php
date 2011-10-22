<?php

class ScheduleController extends Controller {

	/** @var array */ public $presentations = array();
	public function __construct($id, $module = null) {
		parent::__construct($id, $module);
		session_start();
	}

	public function actionIndex() {
		$presentations = Presentation::model()->findAll();
		foreach($presentations as $pres) $this->presentations[$pres->slug] = $pres;
		$this->render('index');
	}

	public function actionIdentifyAttendee() {
		$attendee = Attendee::model()->findByAttributes(array('transaction' => $_POST['transaction']));
		if (sizeof($attendee)) {
			$_SESSION['transaction'] = $_POST['transaction'];
			$_SESSION['first_name'] = strtok($attendee->name, ' ');
		}
		else {
			$_SESSION['transaction'] = false;
		}

		$this->redirect('index');
	}

	public function afterAction(CAction $action) {
		if ($action->id == 'index' && $_SESSION['transaction'] === false)
			unset($_SESSION['transaction']);
	}

}