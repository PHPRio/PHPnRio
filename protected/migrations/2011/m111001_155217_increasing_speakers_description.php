<?php

class m111001_155217_increasing_speakers_description extends CDbMigration {

	public function up() {
		$this->alterColumn('speaker', 'description', 'text');
		return true;
	}

	public function down() {
		$this->alterColumn('speaker', 'description', 'varchar(250)');
		return true;
	}
}