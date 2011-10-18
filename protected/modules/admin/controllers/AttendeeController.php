<?php

class AttendeeController extends Controller {

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
		$this->render('index');
	}

	public function actionUploadList() {
		$data = new SimpleXMLElement(file_get_contents($_FILES['file']['tmp_name']));

		foreach ($data->Table as $attendee) {
			var_dump($attendee);
		}
		die();
	}
}