<?php

class m111003_051148_add_slugs extends CDbMigration {

	public $tables = array('speaker', 'presentation', 'sponsor');

	public function up() {
		foreach ($this->tables as $table) {
			$this->addColumn($table, 'slug', 'VARCHAR(150) NOT NULL');
			$this->execute("UPDATE $table SET slug = id");
			$this->createIndex("{$table}_slug", $table, 'slug', true);
		}

		return true;
	}

	public function down() {
		foreach ($this->tables as $table) {
			$this->dropColumn($table, 'slug');
			$this->dropIndex("{$table}_slug", $table);
		}

		return true;
	}
}