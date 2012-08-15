<?php

class m111001_210036_change_presentations_from_time_to_select_field extends CDbMigration {

	public function up() {
		$this->dropColumn('presentation', 'begin');
		$this->dropColumn('presentation', 'end');
		$this->addColumn('presentation', 'period', 'tinyint(1)');
		return true;
	}

	public function down() {
		echo "m111001_210036_change_presentations_from_time_to_select_field does not support migration down.\n";
		return false;
	}
}