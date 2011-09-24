<?php

class m110924_050223_changing_duration_fields_into_time extends CDbMigration {

	public function up() {
		$this->alterColumn('presentation', 'begin', 'time');
		$this->alterColumn('presentation', 'end', 'time');
		return true;
	}

	public function down() {
		$this->alterColumn('presentation', 'begin', 'datetime');
		$this->alterColumn('presentation', 'end', 'datetime');
		return true;
	}
}