<?php

/**
 * This is the model class for table "phpnrio2011.team_member".
 *
 * The followings are the available columns in table 'phpnrio2011.team_member':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $team_member_col
 */
class TeamMember extends CActiveRecord {
	/**
	 * Returns the static model of the specified AR class.
	 * @return TeamMember the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	/**
	 * @return string the associated database table name
	 */
	public function tableName() { return 'phpnrio2011.team_member'; }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name, team_member_col', 'length', 'max'=>50),
			array('description', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, team_member_col', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'team_member_col' => 'Team Member Col',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('team_member_col',$this->team_member_col,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}