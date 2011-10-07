<?php

class m111007_042620_add_slug_and_date_to_news extends CDbMigration {

	public function up() {
		$this->addColumn('news', 'slug', 'VARCHAR(150) NOT NULL');
		$this->execute('UPDATE news SET slug = id');
		$this->createIndex('news_slug', 'news', 'slug', true);

		$this->addColumn('news', 'datetime', 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');

		return true;
	}

	public function down() {
		$this->dropColumn('news', 'slug');
		$this->dropColumn('news', 'datetime');
		return true;
	}
}