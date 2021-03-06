<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $email
 * @property string $payment_method
 * @property string $transaction_type
 * @property string $status
 * @property string $payment_type
 * @property string $total_attendees
 * @property string $price
 * @property string $discount
 * @property string $taxes
 * @property string $received
 * @property string $transaction_date
 * @property string $compensation_date
 *
 * The followings are the available model relations:
 * @property Attendee[] $attendees
 * @property Presentation[] $presentations
 */
class Transaction extends CActiveRecord {

	const TRANSACTION_VALUE_PER_ATTENDEE = 30.0;

	const TRANSACTION_TYPE_PAYMENT = 'Pagamento';

	const STATUS_APPROVED = 'Aprovada';
	const STATUS_WAITING = 'Aguardando pagamento';
	const STATUS_RETURNED = 'Devolvida';
	const STATUS_CANCELED = 'Cancelada';

	const CODE_FREE_TICKETS = 'C734657E-B772-4456-B945-E33333B4AD32';

	/**
	 * Returns the static model of the specified AR class.
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__) { return parent::model($className); }

	/**
	 * @return string the associated database table name
	 */
	public function tableName() { return 'transaction'; }

	public function behaviors() {
		return array(
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
			array('code, name, email, payment_method, transaction_type, status, payment_type, price, discount, taxes, received, transaction_date', 'required'),
			array('code', 'length', 'max'=>36),
			array('name, email', 'length', 'max'=>50),
			array('payment_method', 'length', 'max'=>10),
			array('transaction_type, status', 'length', 'max'=>20),
			array('payment_type', 'length', 'max'=>30),
			array('price, discount, taxes, received', 'length', 'max'=>7),
			array('total_attendees', 'length', 'max'=>3),
			array('compensation_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, name, email, payment_method, transaction_type, status, payment_type, total_attendees, price, discount, taxes, received, transaction_date, compensation_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'attendees' => array(self::HAS_MANY, 'Attendee', 'transaction_id'),
			'presentations' => array(self::MANY_MANY, 'Presentation', 'transaction_presentation(transaction_id, presentation_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => '#',
			'code' => 'Código',
			'name' => 'Nome',
			'email' => 'E-mail',
			'payment_method' => 'Método',
			'transaction_type' => 'Tipo',
			'status' => 'Status',
			'payment_type' => 'Forma',
			'total_attendees' => 'Inscrições',
			'price' => 'Valor pago',
			'discount' => 'Desconto',
			'taxes' => 'Tarifas',
			'received' => 'Recebido',
			'transaction_date' => 'Data',
			'compensation_date' => 'Compensação',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('payment_method',$this->payment_method,true);
		$criteria->compare('transaction_type',$this->transaction_type,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('payment_type',$this->payment_type,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('taxes',$this->taxes,true);
		$criteria->compare('received',$this->received,true);
		$criteria->compare('transaction_date',$this->transaction_date,true);
		$criteria->compare('compensation_date',$this->compensation_date,true);
		if (isset($GLOBALS['printing'])) $criteria->order = 'name';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> isset($GLOBALS['printing'])? false : array('pageSize'=>10),
		));
	}
}