<?php

/**
 * This is the model class for table "phpnrio2011.presentation".
 *
 * The followings are the available columns in table 'presentation':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $begin
 * @property string $end
 * @property integer $speaker_id
 *
 * The followings are the available model relations:
 * @property Speaker $speaker
 */
class Presentation extends CActiveRecord {

	/** @var mixed */ public $image;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Presentation the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	/**
	 * @return string the associated database table name
	 */
	public function tableName() { return 'presentation'; }

 public function behaviors() {
	 return array(
		'imageBehavior'	=> array('class' => 'ext.behaviors.HasImage',
			'fields'	=> array('image'),
			'folderName'=> 'palestras',
			'resizeTo'	=> array(array(200,200)),
			'hasThumb'	=> true,
			'thumbSize'	=> array(array(70,70)),
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
			array('title, description, speaker_id', 'required'),
			array('speaker_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('begin, end', 'date', 'format' => 'HH:mm', 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, begin, end, speaker_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'speaker' => array(self::BELONGS_TO, 'Speaker', 'speaker_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Título',
			'description' => 'Descrição',
			'image' => 'Imagem',
			'begin' => 'Início',
			'end' => 'Fim',
			'speaker_id' => 'Palestrante',
			'speaker.name' => 'Palestrante',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('begin',$this->begin,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('speaker_id',$this->speaker_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getImageName() {
		return $this->id.'.jpg';
	}
}