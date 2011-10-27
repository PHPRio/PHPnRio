<?php

class AttendeeController extends Controller {

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
				'actions' => array('index'),
				'users' => array('@'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex() {
		$model = new Attendee('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('index', array('model' => $model));
	}
}