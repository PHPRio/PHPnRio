<?php

/**
 * This is the model class for table "phpnrio2011.presentation".
 *
 * The followings are the available columns in table 'presentation':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $period
 * @property string $slug
 *
 * @property virt-string $periodTime
 *
 * The followings are the available model relations:
 * @property Speaker[] $speakers
 * @property Transaction[] $transactions
 */
class Presentation extends CActiveRecord {

	/** @var mixed */ public $image;
	/** @var mixed */ public $file;

	/** @var array */ public static $periods = array(
			'Indefinido',
			'09:00/09:30 - Abertura',
			'09:30/10:30',
			'10:30/11:30',
			'11:30/12:30',
			'13:30/14:30 - Almoço',
			'14:30/15:30',
			'15:30/16:30',
			'16:30/17:30',
			'17:30/18:20',
			'18:20/18:30 - Encerramento',
		);

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
			'slugBehavior'			=> array('class' => 'ext.behaviors.SlugBehavior',
				'overwrite'			=> false,
			),
			'CAdvancedArBehavior'	=> array('class' => 'ext.behaviors.CAdvancedArBehavior'),
		 );
	 }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, speakers', 'required'),
			array('period', 'numerical', 'integerOnly'=>true, 'allowEmpty' => true),
			array('title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, period', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'speakers' => array(self::MANY_MANY, 'Speaker', 'speaker_presentation(presentation_id, speaker_id)'),
			'transactions' => array(self::MANY_MANY, 'Transaction', 'transaction_presentation(presentation_id, transaction_id)'),
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
			'period' => 'Horário',
			'periodTime' => 'Horário',
			'speakers' => 'Palestrante(s)',
			'speakersNames' => 'Palestrante(s)',
			'file' => 'Apresentação / ZIP',
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

		return new CActiveDataProvider($this, array('criteria' => $criteria));
	}

	public function getImageName() { return $this->id.'.jpg'; }

	public function getPeriodTime() { return self::$periods[isset($this->period)? $this->period : 0]; }

	public function getSpeakersNames($html = false) {
		if (!is_array($this->speakers)) return '';

		if ($html) {
			$names = '<ol>';
			foreach ($this->speakers as $speaker) $names .= "<li>$speaker->name</li>";
			return $names.'</ol>';
		}
		else {
			$names = array();
			foreach ($this->speakers as $speaker) $names[] = $speaker->name;
			return implode("\n", $names);
		}
	}

	protected function afterSave() {
		parent::afterSave();
		if (isset($_FILES['Presentation']['tmp_name']['file']) && !empty($_FILES['Presentation']['tmp_name']['file'])) {
			list($name, $tmp_name) = array($_FILES['Presentation']['name']['file'], $_FILES['Presentation']['tmp_name']['file']);
			$final_name = YiiBase::getPathOfAlias('webroot.presentations')."/$this->slug.zip";

			$ext = strrev(strtok(strrev($name),'.'));
			if (strtolower($ext) != 'zip') {
				$zip = new ZipArchive();
				$zip->open($final_name, ZipArchive::CREATE);
				$zip->addFile($tmp_name, $name);
				$zip->close();
			}
			else {
				move_uploaded_file($tmp_name, $final_name);
			}
		}

		return true;
	}

	protected function beforeDelete() {
		parent::beforeDelete();
		Yii::app()->db->createCommand()->delete('speaker_presentation', array("presentation_id = $this->id"));
		return true;
	}
}