<?php

/**
 * This is the model class for table "phpnrio2011.sponsor".
 *
 * The followings are the available columns in table 'sponsor':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $category
 * @property string $url
 * @property string $slug
 */
class Sponsor extends CActiveRecord {

	/** @var mixed */ public $image;

	/** @var array */ public static $categories = array('Apoiador', 'Gold', 'Silver', 'Bronze');

	/**
	 * Returns the static model of the specified AR class.
	 * @return Sponsor the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	public function scopes() {
		return array(
			'supporters'	=> array('conditions' => 'category = 0'),
			'sponsors'		=> array('conditions' => 'category > 0', 'order' => 'category DESC'),
		);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() { return 'sponsor'; }

 	public function behaviors() {
		return array(
			'imageBehavior'	=> array('class' => 'ext.behaviors.HasImage',
				'fields'	=> array('image'),
				'folderName'=> 'patrocinadores',
				'resizeTo'	=> array(array(115,79)),
				'hasThumb'	=> false,
				'prependFileName' => false,
			),
			'slugBehavior'			=> array('class' => 'ext.behaviors.SlugBehavior',
				'title_col'			=> 'name',
				'overwrite'			=> true,
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
			array('name, description', 'required'),
			array('image', 'required', 'on' => 'insert'),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>250),
			array('category', 'numerical', 'integerOnly' => true),
			array('url', 'length', 'max' => 200, 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description', 'safe', 'on'=>'search'),
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
			'name' => 'Nome',
			'description' => 'Descrição',
			'url' => 'Site',
			'category' => 'Categoria',
			'categoryName' => 'Categoria',
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getImageFile() { return $this->id.'.jpg'; }

	public function getCategoryName() { return self::$categories[isset($this->category)? $this->category : 0]; }

	public function beforeSave() {
		parent::beforeSave();
		if ($this->url && strpos($this->url, 'http://') !== 0)
			$this->url = "http://$this->url";

		return true;
	}
}