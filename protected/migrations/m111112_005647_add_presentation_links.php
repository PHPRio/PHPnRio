<?php

class m111112_005647_add_presentation_links extends CDbMigration {

	public function up() {
		$this->addColumn('presentation', 'link', 'VARCHAR(100)');
		return true;
	}

	public function down() {
		$this->dropColumn('presentation', 'link');
		return true;
	}
}