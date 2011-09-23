<?php

/**
 * This is the model class for table "phpnrio2011.news".
 *
 * The followings are the available columns in table 'phpnrio2011.news':
 * @property integer $id
 * @property string $title
 * @property string $short_desc
 * @property string $text
 * @property integer $author
 *
 * The followings are the available model relations:
 * @property User $author0
 */
class News extends CActiveRecord {
	/**
	 * Returns the static model of the specified AR class.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	/**
	 * @return string the associated database table name
	 */
	public function tableName() { return 'phpnrio2011.news'; }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, short_desc, text, author', 'required'),
			array('author', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('short_desc', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, short_desc, text, author', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author0' => array(self::BELONGS_TO, 'User', 'author'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'short_desc' => 'Short Desc',
			'text' => 'Text',
			'author' => 'Author',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('short_desc',$this->short_desc,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('author',$this->author);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}