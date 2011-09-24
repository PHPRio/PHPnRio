<?php

class m110924_025157_renaming_news_author_field extends CDbMigration {

	public function up() {
		$this->dropForeignKey('fk_news_user1', 'news');
		$this->renameColumn('news', 'author', 'author_id');
		$this->addForeignKey('fk_news_user1', 'news', 'author_id', 'user', 'id');
		return true;
	}

	public function down() {
		$this->dropForeignKey('fk_news_user1', 'news');
		$this->renameColumn('news', 'author_id', 'author');
		$this->addForeignKey('fk_news_user1', 'news', 'author', 'user', 'id');
		return true;
	}
}