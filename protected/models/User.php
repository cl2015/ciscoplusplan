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
 * @property string $department
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
 * @property integer $type_id
 * @property integer $has_reged
 * @property string $cc
 */
class User extends TrackStarActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'users';
	}

	public $password;
	public $password2;
	private $_identity;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		return array(
				array('password', 'compare', 'compareAttribute' => 'password2','on'=>'surveyUpdate'),
				array('password','required', 'on'=>'surveyUpdate'),
				array('city','match','pattern'=>"/^[\x7f-\xff]+$/",'message'=>'请输入中文'),
				array('email','email','on'=>'loading'),
				array('email','required','on'=>'loading'),
				array('mobile','length','max'=>11),
				array('mobile','length','min'=>11),
				array('has_code, email,organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city', 'required','on' =>'update'),
				array('has_code, created_by, mobile,updated_by,working_phone_dis', 'numerical', 'integerOnly' => true),
				array('code', 'length', 'max' => 128),
				array('password','length','min' =>6,'on'=>'surveyUpdate'),
				array('email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile', 'length', 'max' => 256),
				array('password2, password', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, has_code, code, email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile, created_at, created_by, updated_at, updated_by', 'safe', 'on' => 'search'),
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
				'id' => Yii::t('default', 'ID'),
				'has_code' => Yii::t('default', 'Has Code'),
				'code' => Yii::t('default', 'Code'),
				'email' => Yii::t('default', 'Email'),
				'password' => Yii::t('default', 'Password'),
				'password2' => Yii::t('default', 'Password2'),
				'organisation' => Yii::t('default', 'Organisation'),
				'relation_with_cisco' => Yii::t('default', 'Relation With Cisco'),
				'full_name' => Yii::t('default', 'Full Name'),
				'job_title' => Yii::t('default', 'Job Title'),
				'department' => Yii::t('default', 'Departiment'),
				'working_phone_dis' => Yii::t('default', 'Working Phone Dis'),
				'working_phone' => Yii::t('default', 'Working Phone'),
				'mobile' => Yii::t('default', 'Mobile'),
				'province' => Yii::t('default', 'Province'),
				'city' => Yii::t('default', 'City'),
				'ec_name' => Yii::t('default', 'Ec Name'),
				'ec_relationship' => Yii::t('default', 'Ec Relationship'),
				'ec_mobile' => Yii::t('default', 'Ec Mobile'),
				'created_at' => Yii::t('default', 'Created At'),
				'created_by' => Yii::t('default', 'Created By'),
				'updated_at' => Yii::t('default', 'Updated At'),
				'updated_by' => Yii::t('default', 'Updated By'),
				'type_id' => Yii::t('default', 'Type Id'),
				'has_reged' => Yii::t('default', 'Has Reged'),
				'cc' => Yii::t('default', 'cc'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('has_code', $this->has_code);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('organisation', $this->organisation, true);
		$criteria->compare('relation_with_cisco', $this->relation_with_cisco, true);
		$criteria->compare('full_name', $this->full_name, true);
		$criteria->compare('job_title', $this->job_title, true);
		$criteria->compare('department', $this->department, true);
		$criteria->compare('working_phone_dis', $this->working_phone_dis, true);
		$criteria->compare('working_phone', $this->working_phone, true);
		$criteria->compare('mobile', $this->mobile, true);
		$criteria->compare('province', $this->province, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('ec_name', $this->ec_name, true);
		$criteria->compare('ec_relationship', $this->ec_relationship, true);
		$criteria->compare('ec_mobile', $this->ec_mobile, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('updated_by', $this->updated_by);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

	public function getHasCodeOptions() {
		return array(
				0 => 'yes',
				1 => 'no',
		);
	}

	public function getJobTitleOptions() {
		return array(
				1 => '总裁/总经理',
				2 => 'CXO',
				3 => '首席信息官/IT总监',
				4 => '总监/资深经理',
				5 => '经理（有下属员工）',
				6 => '经理（无下属员工）',
				7 => '员工',
				8 => '办公室行政',
				9 => '其它',
		);
	}

	public function getDepartmentOptions() {
		return array(
				1 => '商业/市场开发',
				2 => '顾问咨询',
				3 => '客户服务',
				4 => '电子商务',
				5 => '工程设计',
				6 => '办公室管理',
				7 => '财务，会计',
				8 => '人力资源',
				9 => '物流',
				0 => '信息化管理',
				11 => '生产管理',
				12 => '市场营销/公共关系/广告',
				13 => '网络管理',
				14 => '决策管理',
				15 => '采购',
				16 => '研究/开发',
				17 => '销售',
				18 => '技术支持',
				19 => '培训/教育',
				20 => '业务部门',
				21 => 'IT部门',
				22 => '其它',
		);
	}

	public function getRelationOptions() {
		return array(
				1 => '客户',
				2 => '合作伙伴',
				3 => '媒体记者',
				4 => '会议赞助商',
				5 => '其它',
		);
	}

	public function getProvinces() {
		return array(
				"北京" => "北京", "上海" => "上海", "天津" => "天津", "重庆" => "重庆", "甘肃" => "甘肃", "广东" => "广东", "广西" => "广西", "贵州" => "贵州", "海南" => "海南", "河北" => "河北", "黑龙江" => "黑龙江", "河南" => "河南", "浙江" => "浙江", "湖北" => "湖北", "湖南" => "湖南", "内蒙古" => "内蒙古", "江西" => "江西", "江苏" => "江苏", "吉林" => "吉林", "辽宁" => "辽宁", "宁夏" => "宁夏", "青海" => "青海", "陕西" => "陕西", "山西" => "山西", "山东" => "山东", "安徽" => "安徽", "四川" => "四川", "福建" => "福建", "西藏" => "西藏", "新疆" => "新疆", "云南" => "云南", "香港" => "香港", "澳门" => "澳门", "台湾" => "台湾",
		);
	}
	
	public function encrypt($value) {
		return md5($value);
	}
	public function login() {
		if ($this->_identity === null) {
			$this->_identity = new UserIdentity($this->email, $this->password);
			$this->_identity->authenticate();
		}
		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			Yii::app()->user->login($this->_identity);
			return true;
		}
		else
			return false;
	}

}
