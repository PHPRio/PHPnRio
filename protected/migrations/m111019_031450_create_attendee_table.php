<?php

class m111019_031450_create_attendee_table extends CDbMigration {

	public function up() {
		$this->createTable('transaction', array(
			'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
			'code' => 'CHAR(36) NOT NULL',
			'name' => 'VARCHAR(50) NOT NULL',
			'email' => 'VARCHAR(50) NOT NULL',
			'payment_method' => 'VARCHAR(10) NOT NULL',
			'transaction_type' => 'VARCHAR(20) NOT NULL',
			'status' => 'VARCHAR(20) NOT NULL',
			'payment_type' => 'VARCHAR(30) NOT NULL',
			'total_attendees' => 'TINYINT NOT NULL DEFAULT 1',
			'price' => 'DECIMAL(7,2) NOT NULL',
			'discount' => 'DECIMAL(7,2) NOT NULL',
			'taxes' => 'DECIMAL(7,2) NOT NULL',
			'received' => 'DECIMAL(7,2) NOT NULL',
			'transaction_date' => 'TIMESTAMP NOT NULL',
			'compensation_date' => 'TIMESTAMP NOT NULL',
		), 'ENGINE=INNODB');

		$this->createTable('transaction_presentation', array(
			'transaction_id' => 'INT NOT NULL',
			'presentation_id' => 'INT NOT NULL',
			'PRIMARY KEY (transaction_id, presentation_id)'
		), 'ENGINE=INNODB');
		$this->addForeignKey('fk_transaction_presentation_transaction_id', 'transaction_presentation', 'transaction_id', 'transaction', 'id');
		$this->addForeignKey('fk_transaction_presentation_presentation_id', 'transaction_presentation', 'presentation_id', 'presentation', 'id');

		$this->createTable('attendee', array(
			'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
			'transaction_id' => 'INT NOT NULL',
			'rg' => 'BIGINT NOT NULL',
			'name' => 'VARCHAR(50)',
		), 'ENGINE=INNODB');
		$this->createIndex('unique_attendee_rg', 'attendee', 'rg', true);
		$this->addForeignKey('fk_attendee_transaction_id', 'attendee', 'transaction_id', 'transaction', 'id');

		return true;
	}

	public function down() {
		$this->dropTable('attendee');
		$this->dropTable('transaction_presentation');
		$this->dropTable('transaction');
		return true;
	}
}