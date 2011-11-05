<?php

class DefaultController extends Controller {

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
				'actions' => array('login'),
				'users' => array('?'),
			),
			array('allow',
				'actions' => array('index','logout','print', 'prizes'),
				'users' => array('@'),
			),
			array('allow',
				'actions' => array('login'),
				'users' => array('?'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex() {
		$this->render('index');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionPrint($route) {
		$route = strtr($route, '-', '/');

		$GLOBALS['printing'] = true;
		$this->forward("/$route");
	}

	public function actionPrizes() {
		$already_chosen_file = YiiBase::getPathOfAlias('application.runtime.already_chosen');
		if (file_exists($already_chosen_file)) {
			$already_chosen = unserialize(file_get_contents($already_chosen_file));
			if (!$already_chosen) $already_chosen = array();
		}
		else {
			touch($already_chosen_file);
			$already_chosen = array();
		}

		$where = (sizeof($already_chosen))? 'WHERE id NOT IN ('.implode(',', $already_chosen).')' : '';

		$transaction = Transaction::model()->with('attendees')->findBySql("SELECT * FROM transaction $where ORDER BY RAND() LIMIT 1");
		$total_attendees = sizeof($transaction->attendees);
		if ($total_attendees > 0) {
			$result = $transaction->attendees[rand(0, $total_attendees-1)]->name;
		}
		else {
			$result = $transaction->name;
		}

		$already_chosen[] = $transaction->id;
		file_put_contents($already_chosen_file, serialize($already_chosen));

		$this->layout = '/layouts/empty';
		$this->render('prizes', compact('result'));
	}

}