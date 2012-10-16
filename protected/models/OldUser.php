<?php

/**
 * This is the model class for table "old_users".
 *
 * The followings are the available columns in table 'old_users':
 * @property string $id
 * @property integer $has_code
 * @property string $code
 * @property string $email
 * @property string $password
 * @property string $organisation
 * @property string $relation_with_cisco
 * @property string $full_name
 * @property string $job_title
 * @property string $department
 * @property string $working_phone_dis
 * @property string $working_phone
 * @property string $mobile
 * @property string $province
 * @property string $city
 * @property string $ec_name
 * @property string $ec_relationship
 * @property string $ec_mobile
 * @property string $am_department
 * @property string $od_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $type_id
 * @property integer $has_reged
 * @property integer $has_sended
 * @property string $cc
 * @property string $am_name
 * @property string $am_id
 * @property string $am_mobile
 * @property string $rm_name
 * @property string $rm_id
 * @property string $od_name
 * @property string $diff
 * @property string $map_dept
 * @property string $map_title
 * @property string $map_loca
 * @property string $MAIL_ZIP
 * @property string $MAIL_COUNTRY
 * @property string $ImportDate
 * @property string $AUDIENCE
 * @property string $Category
 * @property string $COM_PHONE
 * @property string $STATUS
 * @property string $LAST_NAME
 * @property string $CONF_ID
 * @property string $LOCATION_ID
 * @property string $MAIL_STATE
 * @property string $MAIL_CITY
 */
class OldUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OldUser the static model class
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
		return 'old_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('has_code, code, email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile, am_department, od_id, type_id, has_reged, cc, am_name, am_id, am_mobile, rm_name, rm_id, od_name, diff', 'required'),
			array('has_code, created_by, updated_by, type_id, has_reged, has_sended', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>128),
			array('email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile', 'length', 'max'=>256),
			array('am_department, od_id, cc, am_name, am_id, am_mobile, rm_name, rm_id, od_name, map_dept, map_title, map_loca', 'length', 'max'=>255),
			array('diff, MAIL_ZIP, ImportDate, AUDIENCE, Category, COM_PHONE, STATUS, LAST_NAME, CONF_ID, LOCATION_ID, MAIL_STATE, MAIL_CITY', 'length', 'max'=>64),
			array('MAIL_COUNTRY', 'length', 'max'=>74),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, has_code, code, email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile, am_department, od_id, created_at, created_by, updated_at, updated_by, type_id, has_reged, has_sended, cc, am_name, am_id, am_mobile, rm_name, rm_id, od_name, diff, map_dept, map_title, map_loca, MAIL_ZIP, MAIL_COUNTRY, ImportDate, AUDIENCE, Category, COM_PHONE, STATUS, LAST_NAME, CONF_ID, LOCATION_ID, MAIL_STATE, MAIL_CITY', 'safe', 'on'=>'search'),
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
			'department' => 'Department',
			'working_phone_dis' => 'Working Phone Dis',
			'working_phone' => 'Working Phone',
			'mobile' => 'Mobile',
			'province' => 'Province',
			'city' => 'City',
			'ec_name' => 'Ec Name',
			'ec_relationship' => 'Ec Relationship',
			'ec_mobile' => 'Ec Mobile',
			'am_department' => 'Am Department',
			'od_id' => 'Od',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
			'type_id' => 'Type',
			'has_reged' => 'Has Reged',
			'has_sended' => 'Has Sended',
			'cc' => 'Cc',
			'am_name' => 'Am Name',
			'am_id' => 'Am',
			'am_mobile' => 'Am Mobile',
			'rm_name' => 'Rm Name',
			'rm_id' => 'Rm',
			'od_name' => 'Od Name',
			'diff' => 'Diff',
			'map_dept' => 'Map Dept',
			'map_title' => 'Map Title',
			'map_loca' => 'Map Loca',
			'MAIL_ZIP' => 'Mail Zip',
			'MAIL_COUNTRY' => 'Mail Country',
			'ImportDate' => 'Import Date',
			'AUDIENCE' => 'Audience',
			'Category' => 'Category',
			'COM_PHONE' => 'Com Phone',
			'STATUS' => 'Status',
			'LAST_NAME' => 'Last Name',
			'CONF_ID' => 'Conf',
			'LOCATION_ID' => 'Location',
			'MAIL_STATE' => 'Mail State',
			'MAIL_CITY' => 'Mail City',
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
		$criteria->compare('department',$this->department,true);
		$criteria->compare('working_phone_dis',$this->working_phone_dis,true);
		$criteria->compare('working_phone',$this->working_phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('ec_name',$this->ec_name,true);
		$criteria->compare('ec_relationship',$this->ec_relationship,true);
		$criteria->compare('ec_mobile',$this->ec_mobile,true);
		$criteria->compare('am_department',$this->am_department,true);
		$criteria->compare('od_id',$this->od_id,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('has_reged',$this->has_reged);
		$criteria->compare('has_sended',$this->has_sended);
		$criteria->compare('cc',$this->cc,true);
		$criteria->compare('am_name',$this->am_name,true);
		$criteria->compare('am_id',$this->am_id,true);
		$criteria->compare('am_mobile',$this->am_mobile,true);
		$criteria->compare('rm_name',$this->rm_name,true);
		$criteria->compare('rm_id',$this->rm_id,true);
		$criteria->compare('od_name',$this->od_name,true);
		$criteria->compare('diff',$this->diff,true);
		$criteria->compare('map_dept',$this->map_dept,true);
		$criteria->compare('map_title',$this->map_title,true);
		$criteria->compare('map_loca',$this->map_loca,true);
		$criteria->compare('MAIL_ZIP',$this->MAIL_ZIP,true);
		$criteria->compare('MAIL_COUNTRY',$this->MAIL_COUNTRY,true);
		$criteria->compare('ImportDate',$this->ImportDate,true);
		$criteria->compare('AUDIENCE',$this->AUDIENCE,true);
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('COM_PHONE',$this->COM_PHONE,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('LAST_NAME',$this->LAST_NAME,true);
		$criteria->compare('CONF_ID',$this->CONF_ID,true);
		$criteria->compare('LOCATION_ID',$this->LOCATION_ID,true);
		$criteria->compare('MAIL_STATE',$this->MAIL_STATE,true);
		$criteria->compare('MAIL_CITY',$this->MAIL_CITY,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function encrypt($value) {
		//return md5($value);
		return $value;
	}
	public function checkOldUser($email,$password){
		$oldUser = OldUser::model()->findByAttributes(array('email' => $email));
		if($oldUser === null){
			return null;
		}else{
			if($oldUser->password != $oldUser->encrypt($password)) {
				return null;
			} else {
				return $oldUser;
			}
		}
	}
}