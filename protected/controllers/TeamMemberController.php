<?php

class TeamMemberController extends Controller {

	public function actionList() {
		$members = TeamMember::model()->order()->findAll();
		$this->render('list', compact('members'));
	}

}