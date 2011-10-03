<?php

class m111003_003402_add_order_to_members extends CDbMigration {

	public function up() {
		$this->addColumn('team_member', 'order', 'TINYINT UNSIGNED NOT NULL DEFAULT 250');
		return true;
	}

	public function down() {
		$this->dropColumn('team_member', 'order');
		return true;
	}
}