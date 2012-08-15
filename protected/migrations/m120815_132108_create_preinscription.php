<?php

class m120815_132108_create_preinscription extends CDbMigration {

	public function up() {
		$this->createTable('preinscription', array(
			'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
			'email' => 'VARCHAR(100) NOT NULL UNIQUE',
		));
	}

	public function down() {
		$this->dropTable('preinscription');
	}
}