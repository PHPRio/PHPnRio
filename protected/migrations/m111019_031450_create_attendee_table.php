<?php

class m111019_031450_create_attendee_table extends CDbMigration {

	public function up() {
		$this->createTable('attendee', array(
			'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
			'transaction' => 'CHAR(36) NOT NULL',
			'name' => 'VARCHAR(50) NOT NULL',
			'email' => 'VARCHAR(50) NOT NULL',
			'payment_method' => 'VARCHAR(10) NOT NULL',
			'transaction_type' => 'VARCHAR(20) NOT NULL',
			'payment_type' => 'VARCHAR(30) NOT NULL',
			'price' => 'DECIMAL(3,2) NOT NULL',
			'discount' => 'DECIMAL(3,2) NOT NULL',
			'taxes' => 'DECIMAL(3,2) NOT NULL',
			'received' => 'DECIMAL(3,2) NOT NULL',
			'transaction_date' => 'TIMESTAMP NOT NULL',
			'compensation_date' => 'TIMESTAMP NOT NULL',
		), 'ENGINE=INNODB');

		$this->createTable('attendee_presentation', array(
			'attendee_id' => 'INT NOT NULL',
			'presentation_id' => 'INT NOT NULL',
			'PRIMARY KEY (attendee_id, presentation_id)'
		), 'ENGINE=INNODB');

		$this->addForeignKey('fk_attendee_presentation_attendee_id', 'attendee_presentation', 'attendee_id', 'attendee', 'id');
		$this->addForeignKey('fk_attendee_presentation_presentation_id', 'attendee_presentation', 'presentation_id', 'presentation', 'id');
		return true;
	}

	public function down() {
		$this->dropTable('attendee');
		$this->dropTable('attendee_presentation');
		return true;
	}
}