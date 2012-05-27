<?php

/**
 * This is the model class for table "phpnrio2011.speaker".
 *
 * The followings are the available columns in table 'speaker':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $twitter
 * @property string $slug
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
				'resizeTo'	=> array(array(82,82)),
				'hasThumb'	=> false,
				'prependFileName' => false,
			),
			'slugBehavior'			=> array('class' => 'ext.behaviors.SlugBehavior',
				'title_col'			=> 'name',
				'overwrite'			=> false,
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
			array('name', 'required'),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max' => 1000, 'allowEmpty' => true),
			array('twitter', 'length', 'max'=>30, 'allowEmpty' => true),
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
			'presentations' => array(self::MANY_MANY, 'Presentation', 'speaker_presentation(speaker_id, presentation_id)'),
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
			'image' => 'Imagem',
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

	protected function beforeDelete() {
		parent::beforeDelete();
		Yii::app()->db->createCommand()->delete('speaker_presentation', array("speaker_id = $this->id"));
		return true;
	}
}