<?php

class PresentationController extends Controller {

	public $total_attendees;

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
				'actions' => array('index', 'view', 'create', 'update', 'delete','interest'),
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
		if ($action->id == 'interest') $this->attendeeCalculator->beforeAction();
		return true;
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Presentation;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Presentation'])) {
			$model->attributes = array_merge($_POST['Presentation'], $_FILES['Presentation']['name']);
			$model->speakers = $_POST['Presentation']['speakers'];
			if ($model->save())
				$this->redirect(array('index', 'id' => $model->id));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Presentation'])) {
			$model->attributes = $_POST['Presentation'];
			if ($model->save())
				$this->redirect(array('index', 'id' => $model->id));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$model = new Presentation('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Presentation']))
			$model->attributes = $_GET['Presentation'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionInterest() {
		$presentations = Yii::app()->db->createCommand()
			->select('p.*, COUNT(*) AS total_attendees')
			->from('presentation p')
			->join('transaction_presentation tp', 'tp.presentation_id = p.id')
			->group('tp.presentation_id')
			->order('total_attendees DESC')
			->queryAll();

		$this->render('interest', array('presentations' => $presentations));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = Presentation::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'presentation-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
