<?php

class SpeakerController extends Controller {

	public function actionList() {
		$speakers = Speaker::model()->findAll();
		$this->render('list', compact('speakers'));
	}

}