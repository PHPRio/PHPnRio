<?php

class m111003_054352_remove_unique_from_twitter extends CDbMigration {

	public function up() {
		$this->dropIndex('twitter_UNIQUE', 'speaker');
		return true;
	}

	public function down() {
		echo "m111003_054352_remove_unique_from_twitter does not support migration down.\n";
		return false;
	}
}