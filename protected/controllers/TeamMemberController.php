<?php

class TeamMemberController extends Controller {

	public function actionList() {
		$members = TeamMember::model()->findAll();
		$this->render('list', compact('members'));
	}

}