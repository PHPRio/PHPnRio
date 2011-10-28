<?php

class m111027_155443_change_rg_to_varchar extends CDbMigration {

	public function up() {
		$this->alterColumn('attendee', 'rg', 'VARCHAR(20) NOT NULL');
	}

	public function down() {
		$this->alterColumn('attendee', 'rg', 'INT UNSIGNED NOT NULL');
	}
}