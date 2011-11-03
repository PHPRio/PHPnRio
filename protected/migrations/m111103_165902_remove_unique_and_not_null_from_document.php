<?php

class m111103_165902_remove_unique_and_not_null_from_document extends CDbMigration {

	public function up() {
		$this->dropIndex('unique_attendee_rg', 'attendee');
		$this->alterColumn('attendee', 'rg', 'VARCHAR(20) NULL');
		return true;
	}

	public function down() {
		$this->alterColumn('attendee', 'rg', 'VARCHAR(20) NOT NULL');
		$this->createIndex('unique_attendee_rg', 'attendee', 'rg', true);
		return true;
	}
}