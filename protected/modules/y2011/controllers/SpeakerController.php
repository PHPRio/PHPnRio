<?php

class SpeakerController extends Y2011Controller {

	public function actionList() {
		$speakers = Speaker::model()->findAll();
		$this->render('list', compact('speakers'));
	}

}