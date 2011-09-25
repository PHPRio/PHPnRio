<?php

/**
 * This is the model class for table "phpnrio2011.speaker".
 *
 * The followings are the available columns in table 'speaker':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $twitter
 *
 * The followings are the available model relations:
 * @property Presentation[] $presentations
 */
class Speaker extends CActiveRecord {

	/** @var mixed */ public $image;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Speaker the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	/**
	 * @return string the associated database table name
	 */
	public function tableName() { return 'speaker'; }

 	public function behaviors() {
		return array(
			'imageBehavior'	=> array('class' => 'ext.behaviors.HasImage',
				'fields'	=> array('image'),
				'folderName'=> 'palestrantes',
				'resizeTo'	=> array(array(200,200)),
				'hasThumb'	=> true,
				'thumbSize' => array(array(72,82)),
				'prependFileName' => false,
			),
		);
 	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, twitter', 'required'),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>250),
			array('twitter', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, twitter', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'presentations' => array(self::HAS_MANY, 'Presentation', 'speaker_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => 'Nome',
			'description' => 'Descrição',
			'twitter' => 'Twitter',
			'image' => 'Foto',
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
		$criteria->compare('twitter',$this->twitter,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getTwitterLink() {
		if ($this->twitter) return 'twitter.com/'.$this->twitter;
	}

	public function getImageFile() { return $this->id.'.jpg'; }
}