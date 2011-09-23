<?php

class m110923_225101_removing_dumb_field_from_team_member extends CDbMigration {

	public function up() {
		$this->dropColumn('team_member', 'team_member_col');
		return true;
	}

	public function down() {
		echo "m110923_225101_removing_dumb_field_from_TeamMembers does not support migration down.\n";
		return false;
	}
}