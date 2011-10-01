<?php

class m111001_161651_portifolio_twitter_member_fields extends CDbMigration {

	public function up() {
		$this->addColumn('team_member', 'twitter', 'varchar(30) NULL');
		$this->addColumn('team_member', 'portifolio', 'varchar(200) NULL');
		return true;
	}

	public function down() {
		$this->dropColumn('team_member', 'twitter');
		$this->dropColumn('team_member', 'portifolio');
		return true;
	}
}