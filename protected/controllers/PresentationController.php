<?php

class PresentationController extends Controller {

	public function actionList() {
		$presentations = Presentation::model()->findAll();
		$this->render('list', compact('presentations'));
	}

}