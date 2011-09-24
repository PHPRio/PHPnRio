<?php

/**
 * This is the model class for table "phpnrio2011.user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 *
 * The followings are the available model relations:
 * @property News[] $news
 */
class User extends CActiveRecord {

	/** @var string */ public $password_repeat;
	/** @var string */ public $new_password;

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	/**
	 * @return string the associated database table name
	 */
	public function tableName() { return 'user'; }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, username', 'required'),
			array('name, email', 'length', 'max'=>50),
			array('username', 'length', 'max'=>25),
			array('email', 'email'),
			array('password,password_repeat', 'required', 'on' => 'insert'),
			array('password,new_password,password_repeat', 'length', 'min'=>6),
			array('new_password,password_repeat', 'required', 'on' => 'changePassword'),
			array('password','compare', 'on' => 'insert'),
			array('new_password','compare', 'compareAttribute' => 'password_repeat', 'on' => 'changePassword'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, username', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'news' => array(self::HAS_MANY, 'News', 'author'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => 'Nome',
			'email' => 'E-mail',
			'username' => 'Login',
			'password' => 'Senha',
			'password_repeat' => 'Repita a senha',
			'new_password' => 'Nova senha',
			'old_password' => 'Senha atual',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}