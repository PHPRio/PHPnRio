<?php

/**
 * This is the model class for table "phpnrio2011.team_member".
 *
 * The followings are the available columns in table 'team_member':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $twitter
 * @property string $portifolio
 * @property integer $order
 */
class TeamMember extends CActiveRecord {

	/** @var mixed */ public $image;

	/**
	 * Returns the static model of the specified AR class.
	 * @return TeamMember the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	/**
	 * @return string the associated database table name
	 */
	public function tableName() { return 'team_member'; }

	public function scopes() {
		return array(
			'order' => array('order' => '`order` ASC'),
		);
	}

	 public function behaviors() {
		 return array(
			'imageBehavior'	=> array('class' => 'ext.behaviors.HasImage',
				'fields'	=> array('image'),
				'folderName'=> 'membros',
				'resizeTo'	=> array(array(73,82)),
				'hasThumb'	=> false,
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
			array('name', 'required'),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>250),
			array('order', 'numerical', 'integerOnly' => true),
			array('twitter', 'length', 'max'=>30, 'allowEmpty' => true),
			array('portifolio', 'length', 'max'=>200, 'allowEmpty' => true),
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
			'portifolio' => 'Portifólio',
			'order' => 'Ordem',
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

		$criteria->order = '`order` ASC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getTwitterLink() {
		if ($this->twitter) return 'twitter.com/'.$this->twitter;
	}

	public function getImageFile() { return $this->id.'.jpg'; }

	public function beforeSave() {
		parent::beforeSave();
		if ($this->portifolio && strpos($this->portifolio, 'http://') !== 0)
			$this->portifolio = "http://$this->portifolio";

		return true;
	}
}