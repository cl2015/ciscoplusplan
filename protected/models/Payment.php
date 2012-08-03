<?php

/**
 * This is the model class for table "payments".
 *
 * The followings are the available columns in table 'payments':
 * @property string $id
 * @property string $user_id
 * @property integer $is_invoice
 * @property string $invoice_title
 * @property integer $invoice_content
 * @property integer $need_mail
 * @property string $recipient_name
 * @property string $phone
 * @property string $recipient_add
 * @property string $city
 * @property integer $zip_code
 * @property string $country
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Payment extends TrackStarActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$rules =  array(
				array('user_id,is_invoice, need_mail', 'required','on'=>'create'),
				array('invoice_title,recipient_name, phone, recipient_add, city, zip_code,invoice_content','needMail','on'=>'create'),
				array('is_invoice, invoice_content, need_mail, zip_code, created_by, updated_by', 'numerical', 'integerOnly'=>true),
				array('user_id', 'length', 'max'=>10),
				array('invoice_title', 'length', 'max'=>512),
				array('recipient_name, phone, recipient_add, city, country', 'length', 'max'=>256),
				array('created_at, updated_at', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, user_id, is_invoice, invoice_title, invoice_content, need_mail, recipient_name, phone, recipient_add, city, zip_code, country, created_at, created_by, updated_at, updated_by', 'safe', 'on'=>'search'),

		);

		return $rules;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ID',
				'has_paid' => '已付款',
				'has_sendinvoice' => '已邮寄发票',
				'user_id' => 'User',
				'is_invoice' => '是否需要开具发票',
				'invoice_title' => '发票开具抬头',
				'invoice_content' => '发票内容',
				'need_mail' => '是否需要邮寄发票',
				'recipient_name' => '收件人姓名',
				'phone' => '联系电话',
				'recipient_add' => '发票寄送地址',
				'city' => '城市',
				'zip_code' => '邮编',
				'country' => '国家（地区）',
				'created_at' => 'Created At',
				'created_by' => 'Created By',
				'updated_at' => 'Updated At',
				'updated_by' => 'Updated By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('is_invoice',$this->is_invoice);
		$criteria->compare('invoice_title',$this->invoice_title,true);
		$criteria->compare('invoice_content',$this->invoice_content);
		$criteria->compare('need_mail',$this->need_mail);
		$criteria->compare('recipient_name',$this->recipient_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('recipient_add',$this->recipient_add,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip_code',$this->zip_code);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}

	public function needMail($attribute,$params){
		
		$labels = $this->attributeLabels();
		if ($attribute=='invoice_title') {
			if($this->is_invoice==1 ){
				if(trim($this->$attribute)==""|| $this->$attribute==null){
					$this->addError($attribute,$labels[$attribute].'不可为空白');
				}
			}
		}elseif ($this->need_mail==1 ){
			if(trim($this->$attribute)=='' || $this->$attribute == null){
				$this->addError($attribute,$labels[$attribute].'不可为空白');
			}
		}
	}
}