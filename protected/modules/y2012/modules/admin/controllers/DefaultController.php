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
		$model = new Preinscription('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Preinscription']))
			$model->attributes = $_GET['Preinscription'];

		$this->render('index', array('model' => $model));
	}

	public function actionPrizes() {
		$pre = Preinscription::model()->findAll(array('order' => 'id'));
		$tmp_name = tempnam(sys_get_temp_dir(), 'PNR');
		$tmp_file = fopen($tmp_name, 'w+');
		foreach ($pre as $preinsc) fputcsv($tmp_file, array($preinsc->email));
		fclose($tmp_file);

		header('Content-type: text/csv');
		header('Content-disposition: attachment; filename="preinscritos-'.date('Y-m-d').'.csv"');
		echo file_get_contents($tmp_name);
		die();
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

}