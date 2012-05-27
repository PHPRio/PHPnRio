<?php

class TeamMemberController extends Y2011Controller {

	public function actionList() {
		$members = TeamMember::model()->order()->findAll();
		$this->render('list', compact('members'));
	}

}