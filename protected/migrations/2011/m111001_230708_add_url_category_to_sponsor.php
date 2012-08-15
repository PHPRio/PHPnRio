<?php

class m111001_230708_add_url_category_to_sponsor extends CDbMigration {

	public function up() {
		$this->addColumn('sponsor', 'url', 'VARCHAR(200) NULL');
		$this->addColumn('sponsor', 'category', 'TINYINT(1) NOT NULL');
	}

	public function down() {
		$this->dropColumn('sponsor', 'url');
		$this->dropColumn('sponsor', 'category');
	}
}