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
	public $first_name;
	public $last_name;
	public $others;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

		$rules = array(
				array('password', 'compare', 'compareAttribute' => 'password2','on'=>'surveyUpdate'),
				array('password,password2','required', 'on'=>'surveyUpdate'),
				array('email','email','on'=>'loading'),
				array('email','safe','on'=>'loading'),
				array('email','required','on'=>'loading'),
				array('mobile','length','max'=>11),
				array('mobile','length','min'=>11),
				array('has_code, email,organisation, relation_with_cisco, job_title, department, working_phone_dis, working_phone, mobile, province, city', 'required','on' =>'update'),
				array('has_code, created_by, mobile,updated_by,working_phone_dis', 'numerical', 'integerOnly' => true),
				array('code', 'length', 'max' => 128),
				array('password','length','min' =>6,'on'=>'surveyUpdate'),
				array('password','length','max' =>6,'on'=>'surveyUpdate'),
				array('email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile', 'length', 'max' => 256),
				array('password2, password', 'safe'),

				array('full_name,department,ec_name,mobile','required', 'on'=>'employeeUpdate'),
				array('others','match','pattern'=>"/^[a-zA-Z0-9 ]+$/",'message'=>'English only','on'=>'employeeUpdate'),
				array('others','safe','on'=>'employeeUpdate'),

				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, has_code, code, email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile, created_at, created_by, updated_at, updated_by', 'safe', 'on' => 'search'),
		);
		if(Yii::app()->language=='zh_cn'){
			$rules[]=array('full_name', 'required','on' =>'update');
			$rules[]=array('full_name,organisation,city,department','match','pattern'=>"/^(.)*[\x7f-\xff]+(.)*$/",'message'=>'必须包含中文','on'=>'update');
		}else{
			$rules[]=array('first_name, last_name', 'required','on' =>'update');
		}
		return $rules;
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
				'department' => Yii::t('default', 'Department'),
				'working_phone_dis' => Yii::t('default', 'Working Phone Dis'),
				'working_phone' => Yii::t('default', 'Working Phone'),
				'mobile' => Yii::t('default', 'Mobile'),
				'province' => Yii::t('default', 'Province'),
				'city' => Yii::t('default', 'City'),
				'ec_name' => Yii::t('default', 'CEC ID'),
				'ec_relationship' => Yii::t('default', 'Ec Relationship'),
				'ec_mobile' => Yii::t('default', 'Ec Mobile'),
				'created_at' => Yii::t('default', 'Created At'),
				'created_by' => Yii::t('default', 'Created By'),
				'updated_at' => Yii::t('default', 'Updated At'),
				'updated_by' => Yii::t('default', 'Updated By'),
				'type_id' => Yii::t('default', 'Type Id'),
				'has_reged' => Yii::t('default', 'Has Reged'),
				'cc' => Yii::t('default', 'cc'),
				'others'=>Yii::t('default','other'),
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
		$criteria->compare('has_reged', $this->has_reged, true);
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
				1 => Yii::t('default','CEO/Managing Director'),
				2 => Yii::t('default','CXO/Executive'),
				3 => Yii::t('default','CIO/IT Director'),
				4 => Yii::t('default','Director/Senior Manager'),
				5 => Yii::t('default','Management With Staff'),
				6 => Yii::t('default','Management Without Staff'),
				7 => Yii::t('default','Employee'),
				8 => Yii::t('default','Office Administration'),
				9 => Yii::t('default','Other'),
		);
	}

	public function getEmployeeDepartmentOptions(){
		return array (
				'CA' => 'CA',
				'Capital' => 'Capital',
				'Channel' => 'Channel',
				'Sales-PL' => 'Sales-PL',
				'Sales-CL' => 'Sales-CL',
				'SE-PL' => 'SE-PL',
				'SE-CL' => 'SE-CL',
				'SP-Sales' => 'SP-Sales',
				'SP-SE' => 'SP-SE',
				'CME-Sales' => 'CME-Sales',
				'CME-SE' => 'CME-SE',
				'PS-HQ' => 'PS-HQ',
				'Data Center' => 'Data Center',
				'Collaboration' => 'Collaboration',
				'Borderless Networks' => 'Borderless Networks',
				'Marketing' => 'Marketing',
		);
	}

	public function getDepartmentOptions() {
		return array(
				1 => Yii::t('default','Business Development'),
				2 => Yii::t('default','Consultant/Contractor'),
				3 => Yii::t('default','Customer Service'),
				4 => Yii::t('default','E-Commerce'),
				5 => Yii::t('default','Engineering'),
				6 => Yii::t('default','Executive Management'),
				7 => Yii::t('default','Finance/Accounting/Legal'),
				8 => Yii::t('default','HR/Recruitment'),
				9 => Yii::t('default','Logistics'),
				10 => Yii::t('default','MIS/IT'),
				11 => Yii::t('default','Manufacturing'),
				12 => Yii::t('default','Marketing/PR/Advertising'),
				13 => Yii::t('default','Network Management'),
				14 => Yii::t('default','Operations/Administration'),
				15 => Yii::t('default','Purchasing/Procurement'),
				16 => Yii::t('default','Research/Development'),
				17 => Yii::t('default','Sales'),
				18 => Yii::t('default','Technical Support'),
				19 => Yii::t('default','Training/Education'),
				20 => Yii::t('default','Other'),

		);
	}

	public function getRelationOptions() {
		return array(
				1 => Yii::t('default','Customer'),
				2 => Yii::t('default','Partner'),
				3 => Yii::t('default','Media Reporter'),
				4 => Yii::t('default','Conference Sponsors'),
				5 => Yii::t('default','Other'),

		);
	}
	public function getProvinces() {
		return array(
				"北京" => Yii::t('default',"北京"),
				"上海" => Yii::t('default',"上海"),
				"天津" => Yii::t('default',"天津"),
				"重庆" => Yii::t('default',"重庆"),
				"甘肃" => Yii::t('default',"甘肃"),
				"广东" => Yii::t('default',"广东"),
				"广西" => Yii::t('default',"广西"),
				"贵州" => Yii::t('default',"贵州"),
				"海南" => Yii::t('default',"海南"),
				"河北" => Yii::t('default',"河北"),
				"黑龙江" => Yii::t('default',"黑龙江"),
				"河南" => Yii::t('default',"河南"),
				"浙江" => Yii::t('default',"浙江"),
				"湖北" => Yii::t('default',"湖北"),
				"湖南" => Yii::t('default',"湖南"),
				"内蒙古" => Yii::t('default',"内蒙古"),
				"江西" => Yii::t('default',"江西"),
				"江苏" => Yii::t('default',"江苏"),
				"吉林" => Yii::t('default',"吉林"),
				"辽宁" => Yii::t('default',"辽宁"),
				"宁夏" => Yii::t('default',"宁夏"),
				"青海" => Yii::t('default',"青海"),
				"陕西" => Yii::t('default',"陕西"),
				"山西" => Yii::t('default',"山西"),
				"山东" => Yii::t('default',"山东"),
				"安徽" => Yii::t('default',"安徽"),
				"四川" => Yii::t('default',"四川"),
				"福建" => Yii::t('default',"福建"),
				"西藏" => Yii::t('default',"西藏"),
				"新疆" => Yii::t('default',"新疆"),
				"云南" => Yii::t('default',"云南"),
				"香港" => Yii::t('default',"香港"),
				"澳门" => Yii::t('default',"澳门"),
				"台湾" => Yii::t('default',"台湾"),
		);
	}

	public function getEnProvinces(){
		return array(
				1 => 'Beijing',
				2 => 'Tianjin',
				3 => 'Hebei',
				4 => 'Shanxi',
				5 => 'Inner Mongolia',
				6 => 'Liaoning',
				7 => 'Jilin',
				8 => 'Heilongjiang',
				9 => 'Shanghai',
				10 =>	'Jiangsu',
				11 =>	'Zhejiang',
				12 =>	'Anhui',
				13 =>	'Fujian',
				14 =>	'Jiangxi',
				15 =>	'Shandong',
				16 =>	'Henan',
				17 =>	'Hubei',
				18 =>	'Hunan',
				19 =>	'Guangdong',
				20 =>	'Guangxi',
				21 =>	'Hainan',
				22 =>	'Chongqing',
				23 =>	'Sichuan',
				24 =>	'Guizhou',
				25 =>	'Yunnan',
				26 =>	'Tibet',
				27 =>	'Xizang',
				28 =>	'Shaanxi',
				29 =>	'Gansu',
				30 =>	'Qinghai',
				31 =>	'Ningxia',
				32 =>	'Xinjiang',
				33 =>	'Hong Kong',
				34 =>	'Xianggang',
				35 =>	'Macau',
				36 =>	'Aomen',
				37 =>	'Taiwan',
		);
	}

	public function encrypt($value) {
		//return md5($value);
		return $value;
	}
	public function beforeSave(){
		if(parent::beforeSave()){
			if($this->password!=''&&$this->password != null){
				$this->password = $this->encrypt($this->password);
			}
			if($this->first_name!=""&&$this->first_name!=null&&$this->last_name!=""&&$this->last_name!=null){
				$this->full_name=$this->first_name . ' ' . $this->last_name;
			}
		}
		echo 123;
		return true;
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
