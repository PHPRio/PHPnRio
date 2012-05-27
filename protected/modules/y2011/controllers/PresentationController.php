<?php

class PresentationController extends Y2011Controller {

	public function actionList() {
		$presentations = Presentation::model()->findAll();
		$this->render('list', compact('presentations'));
	}

}