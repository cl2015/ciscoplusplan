<?php

/**
 * This is the model class for table "Users".
 *
 * The followings are the available columns in table 'Users':
 * @property string $id
 * @property integer $has_code
 * @property string $code
 * @property string $email
 * @property string $password
 * @property string $organisation
 * @property string $relation_with_cisco
 * @property string $full_name
 * @property string $job_title
 * @property string $departiment
 * @property string $working_phone_dis
 * @property string $working_phone
 * @property string $mobile
 * @property string $province
 * @property string $city
 * @property string $ec_name
 * @property string $ec_relationship
 * @property string $ec_mobile
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'Users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('has_code, code, email, password, organisation, relation_with_cisco, full_name, job_title, departiment, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile', 'required'),
			array('has_code, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>128),
			array('email, password, organisation, relation_with_cisco, full_name, job_title, departiment, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile', 'length', 'max'=>256),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, has_code, code, email, password, organisation, relation_with_cisco, full_name, job_title, departiment, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile, created_at, created_by, updated_at, updated_by', 'safe', 'on'=>'search'),
		);
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
			'has_code' => 'Has Code',
			'code' => 'Code',
			'email' => 'Email',
			'password' => 'Password',
			'organisation' => 'Organisation',
			'relation_with_cisco' => 'Relation With Cisco',
			'full_name' => 'Full Name',
			'job_title' => 'Job Title',
			'departiment' => 'Departiment',
			'working_phone_dis' => 'Working Phone Dis',
			'working_phone' => 'Working Phone',
			'mobile' => 'Mobile',
			'province' => 'Province',
			'city' => 'City',
			'ec_name' => 'Ec Name',
			'ec_relationship' => 'Ec Relationship',
			'ec_mobile' => 'Ec Mobile',
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
		$criteria->compare('has_code',$this->has_code);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('organisation',$this->organisation,true);
		$criteria->compare('relation_with_cisco',$this->relation_with_cisco,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('job_title',$this->job_title,true);
		$criteria->compare('departiment',$this->departiment,true);
		$criteria->compare('working_phone_dis',$this->working_phone_dis,true);
		$criteria->compare('working_phone',$this->working_phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('ec_name',$this->ec_name,true);
		$criteria->compare('ec_relationship',$this->ec_relationship,true);
		$criteria->compare('ec_mobile',$this->ec_mobile,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getHasCodeOptions()
    {
        return array(
            0 => 'yes',
            1 => 'no',
        );
    }
}
