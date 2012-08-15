<?php

/**
 * This is the model class for table "preinscription".
 *
 * The followings are the available columns in table 'preinscription':
 * @property integer $id
 * @property string $email
 */
class Preinscription extends CActiveRecord {

	public static function model($className=__CLASS__) { return parent::model($className); }

	public function tableName() { return 'preinscription'; }

	public function rules() {
		return array(
			array('email', 'required'),
			array('email', 'unique', 'caseSensitive' => false),
			array('email', 'length', 'max' => 100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('email', $this->email, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

}