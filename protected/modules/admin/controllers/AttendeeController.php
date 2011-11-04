<?php

class AttendeeController extends Controller {

	public $total_attendees;

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array('accessControl');
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('index','free'),
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
		$model = new Attendee('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('index', array('model' => $model, 'attendees' => $model->search()));
	}

	public function actionFree() {
		$model = new Attendee('search');
		$model->unsetAttributes();  // clear any default values
		$attendees = new CActiveDataProvider('Attendee', array(
			'criteria' => array(
				'with' => array('transaction'),
				'condition' => 'transaction.code = :code', 'params' => array(':code' => Transaction::CODE_FREE_TICKETS)
			),
			'pagination' => false,
		));
		$this->render('index', array('model' => $model, 'attendees' => $attendees));
	}
}