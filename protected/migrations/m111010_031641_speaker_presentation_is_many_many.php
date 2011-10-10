<?php

class m111010_031641_speaker_presentation_is_many_many extends CDbMigration {

	public function up() {
		Yii::import('application.models.Presentation');
		$presentations = Presentation::model()->findAll();

		$this->createTable('speaker_presentation', array(
			'speaker_id' => 'INT NOT NULL',
			'presentation_id' => 'INT NOT NULL',
			'PRIMARY KEY (speaker_id, presentation_id)'
		), 'ENGINE=INNODB');
		$this->addForeignKey('fk_speaker_presentation_speaker_id', 'speaker_presentation', 'speaker_id', 'speaker', 'id');
		$this->addForeignKey('fk_speaker_presentation_presentation_id', 'speaker_presentation', 'presentation_id', 'presentation', 'id');

		foreach ($presentations as $pres)
			$this->insert('speaker_presentation', array('speaker_id' => $pres->speaker_id, 'presentation_id' => $pres->id));

		$this->dropForeignKey('fk_presentations_speakers', 'presentation');
		$this->dropColumn('presentation', 'speaker_id');

		return true;
	}

	public function down() {
		$this->dropTable('speaker_presentation');
		return true;
	}
}