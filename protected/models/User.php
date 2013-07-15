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
define('AM_ID', 10);
define('RM_ID', 11);
define('OD_ID', 12);

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
        		
        	array('mobile', 'unique','message' => '不能重复填写', 'on' => 'update'),
            array('password', 'compare', 'compareAttribute' => 'password2', 'on' => 'surveyUpdate'),
            array('password,password2', 'required', 'on' => 'surveyUpdate'),
            array('email', 'email', 'on' => 'loading'),
            array('email', 'safe', 'on' => 'loading'),
            array('email', 'required', 'on' => 'loading'),
            array('email', 'email', 'message' => '邮箱格式不正确', 'on' => 'loading'),
            array('email', 'required', 'on' => 'loading'),
            array('mobile', 'length', 'max' => 11,'on' => 'surveyUpdate,employeeUpdate'),
            array('mobile', 'length', 'min' => 11,'on' => 'surveyUpdate,employeeUpdate'),
            //array('has_code, email,organisation, relation_with_cisco, job_title, department, working_phone_dis, working_phone, mobile, province, city', 'required','on' =>'update'),
            array('has_code, email,organisation, relation_with_cisco, job_title, department, mobile, province, city', 'required', 'on' => 'update'),
        	array('weibo,tencent','safe'),
            array('has_code, created_by, mobile,updated_by,working_phone_dis', 'numerical', 'integerOnly' => true,'on' => 'surveyUpdate,employeeUpdate'),
            array('code', 'length', 'max' => 128),
            array('password', 'length', 'min' => 6, 'on' => 'surveyUpdate'),
            array('password', 'length', 'max' => 6, 'on' => 'surveyUpdate'),
            array('email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile', 'length', 'max' => 256),
            array('password2, password', 'safe'),
            array('full_name,city,department,ec_name,mobile', 'required', 'on' => 'employeeUpdate'),
            array('others', 'match', 'pattern' => "/^[a-zA-Z0-9 ]+$/", 'message' => 'English only', 'on' => 'employeeUpdate'),
            array('others', 'safe', 'on' => 'employeeUpdate'),
            array('email', 'required', 'on' => 'forgetPassword'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, has_code, code, email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile, created_at, created_by, updated_at, updated_by', 'safe', 'on' => 'search'),
        );
        if (Yii::app()->language == 'zh_cn') {
            $rules[] = array('full_name', 'required', 'on' => 'update');
            //$rules[] = array('full_name,organisation,city,department', 'match', 'pattern' => "/^(.)*[\x7f-\xff]+(.)*$/", 'message' => '必须包含中文', 'on' => 'update');
        } else {
            $rules[] = array('first_name, last_name', 'required', 'on' => 'update');
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
            'reginfo' => array(self::HAS_ONE, 'Reginfo', 'user_id'),
            'payment' => array(self::HAS_ONE, 'Payment', 'user_id'),
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
            'others' => Yii::t('default', 'other'),
        		
        		'weibo' => Yii::t('default', 'weibo'),
        		'tencent' => Yii::t('default', 'tencent'),
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
        //$criteria->compare('id', $this->id, true);
        //$criteria->compare('has_code', $this->has_code);
        //$criteria->compare('code', $this->code, true);
        $criteria->compare('email', $this->email, true);
        //$criteria->compare('password', $this->password, true);
        //$criteria->compare('organisation', $this->organisation, true);
        //$criteria->compare('relation_with_cisco', $this->relation_with_cisco, true);
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

        $criteria->with = array('payment', 'reginfo');



        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function adminSearch() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        if (Yii::app()->user->email != 'admin@mdigi.cc') {
            return array();
        }
        //$criteria->compare('id', $this->id, true);
        //$criteria->compare('has_code', $this->has_code);
        //$criteria->compare('code', $this->code, true);
        $criteria->compare('email', $this->email, true);
        //$criteria->compare('password', $this->password, true);
        //$criteria->compare('organisation', $this->organisation, true);
        //$criteria->compare('relation_with_cisco', $this->relation_with_cisco, true);
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

        $criteria->with = array('payment', 'reginfo');
        $criteria->compare('reginfo.is_online', 1);

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
            1 => Yii::t('default', 'CEO/Managing Director'),
            2 => Yii::t('default', 'CXO/Executive'),
            3 => Yii::t('default', 'CIO/IT Director'),
        	10 => Yii::t('default', 'Engineer'),
            4 => Yii::t('default', 'Director/Senior Manager'),
            5 => Yii::t('default', 'Management With Staff'),
            6 => Yii::t('default', 'Management Without Staff'),
            7 => Yii::t('default', 'Employee'),
            8 => Yii::t('default', 'Office Administration'),
        //9 => Yii::t('default','Other'),
        );
    }

    public function getEmployeeDepartmentOptions() {
        return array(
        	'SP'=>'SP',
        	'TA'=>'TA',
			's+cc'=>'s+cc',
			'Commercial'=>'Commercial',
			'Partner'=>'Partner',
			'Service'=>'Service',
			'Mkt'=>'Mkt',
            'Others' => 'Others',
        );
    }

    public function getEnDepartmentOptions() {
        return array(
           	'SP'=>'SP',
        	'TA'=>'TA',
			'PBG'=>'PBG',
			'East-FSI'=>'East-FSI',
			'East-LENT'=>'East-LENT',
			'East-COMM A'=>'East-COMM A',
			'East-COMM B'=>'East-COMM B',
			'East-PS'=>'East-PS',
			'Service'=>'Service',
			'Virtual Sales'=>'Virtual Sales',
			'Mkt'=>'Mkt',
            'Others' => 'Others',
        );
    }

    public function getDepartmentOptions() {
        return array(
            // 				1 => Yii::t('default','Business Development'),
            // 				2 => Yii::t('default','Consultant/Contractor'),
            // 				3 => Yii::t('default','Customer Service'),
            // 				4 => Yii::t('default','E-Commerce'),
            // 				5 => Yii::t('default','Engineering'),
            // 				6 => Yii::t('default','Executive Management'),
            // 				7 => Yii::t('default','Finance/Accounting/Legal'),
            // 				8 => Yii::t('default','HR/Recruitment'),
            // 				9 => Yii::t('default','Logistics'),
            // 				10 => Yii::t('default','MIS/IT'),
            // 				11 => Yii::t('default','Manufacturing'),
            // 				12 => Yii::t('default','Marketing/PR/Advertising'),
            // 				13 => Yii::t('default','Network Management'),
            // 				14 => Yii::t('default','Operations/Administration'),
            // 				15 => Yii::t('default','Purchasing/Procurement'),
            // 				16 => Yii::t('default','Research/Development'),
            // 				17 => Yii::t('default','Sales'),
            // 				18 => Yii::t('default','Technical Support'),
            // 				19 => Yii::t('default','Training/Education'),
            // 				20 => Yii::t('default','Other'),
            '采购' => '采购',
            '决策管理' => '决策管理',
            '客户服务' => '客户服务',
            '业务部门' => '业务部门',
            '网络管理' => '网络管理',
            '信息化管理' => '信息化管理',
            '研究 / 开发' => '研究 / 开发',
            '其他' => '其他',
        );
    }

    public function getRelationOptions() {
        return array(
            1 => Yii::t('default', 'Customer'),
            2 => Yii::t('default', 'Partner'),
            3 => Yii::t('default', 'Media Reporter'),
            4 => Yii::t('default', 'Conference Sponsors'),
            5 => Yii::t('default', 'Other'),
        );
    }

    public function getProvinces() {
        return array(
            "北京" => Yii::t('default', "北京"),
            "上海" => Yii::t('default', "上海"),
            "天津" => Yii::t('default', "天津"),
            "重庆" => Yii::t('default', "重庆"),
            "甘肃" => Yii::t('default', "甘肃"),
            "广东" => Yii::t('default', "广东"),
            "广西" => Yii::t('default', "广西"),
            "贵州" => Yii::t('default', "贵州"),
            "海南" => Yii::t('default', "海南"),
            "河北" => Yii::t('default', "河北"),
            "黑龙江" => Yii::t('default', "黑龙江"),
            "河南" => Yii::t('default', "河南"),
            "浙江" => Yii::t('default', "浙江"),
            "湖北" => Yii::t('default', "湖北"),
            "湖南" => Yii::t('default', "湖南"),
            "内蒙古" => Yii::t('default', "内蒙古"),
            "江西" => Yii::t('default', "江西"),
            "江苏" => Yii::t('default', "江苏"),
            "吉林" => Yii::t('default', "吉林"),
            "辽宁" => Yii::t('default', "辽宁"),
            "宁夏" => Yii::t('default', "宁夏"),
            "青海" => Yii::t('default', "青海"),
            "陕西" => Yii::t('default', "陕西"),
            "山西" => Yii::t('default', "山西"),
            "山东" => Yii::t('default', "山东"),
            "安徽" => Yii::t('default', "安徽"),
            "四川" => Yii::t('default', "四川"),
            "福建" => Yii::t('default', "福建"),
            "西藏" => Yii::t('default', "西藏"),
            "新疆" => Yii::t('default', "新疆"),
            "云南" => Yii::t('default', "云南"),
            "香港" => Yii::t('default', "香港"),
            "澳门" => Yii::t('default', "澳门"),
            "台湾" => Yii::t('default', "台湾"),
        );
    }

    public function getEnProvinces() {
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
            10 => 'Jiangsu',
            11 => 'Zhejiang',
            12 => 'Anhui',
            13 => 'Fujian',
            14 => 'Jiangxi',
            15 => 'Shandong',
            16 => 'Henan',
            17 => 'Hubei',
            18 => 'Hunan',
            19 => 'Guangdong',
            20 => 'Guangxi',
            21 => 'Hainan',
            22 => 'Chongqing',
            23 => 'Sichuan',
            24 => 'Guizhou',
            25 => 'Yunnan',
            26 => 'Tibet',
            27 => 'Xizang',
            28 => 'Shaanxi',
            29 => 'Gansu',
            30 => 'Qinghai',
            31 => 'Ningxia',
            32 => 'Xinjiang',
            33 => 'Hong Kong',
            34 => 'Xianggang',
            35 => 'Macau',
            36 => 'Aomen',
            37 => 'Taiwan',
        );
    }

    public function encrypt($value) {
        //return md5($value);
        return $value;
    }

    public function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->password != '' && $this->password != null) {
                $this->password = $this->encrypt($this->password);
            }
            if ($this->first_name != "" && $this->first_name != null && $this->last_name != "" && $this->last_name != null) {
                $this->full_name = $this->first_name . ' ' . $this->last_name;
            }
        }
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

    public function getReport($am) {
        //safe check
        $user = $this->findByAttributes(array('email' => $am));
        if ($user === null)
            return array();
        $dbCommand = Yii::app()->db->createCommand("
				select a.*,c.has_paid,c.is_online from users a left join
				reginfos c
				on a.id = c.user_id
				where  a.type_id < 10 and a.am_id = '$am'
				");

        $data = $dbCommand->queryAll();
        return $data;
    }

    public function getDetailByUser($email, $type_id) {
        if ($type_id == '10') {
            return $this->getAmDetailByUser($email);
        } elseif ($type_id == '11') {
            return $this->getRmDetailByUser($email);
        } elseif ($type_id == '12' || $type_id > 12) {
            return $this->getOdDetailByUser($email);
        } else {
            return array();
        }
    }

    public function getAmDetailByUser($email) {
    	// 上海站 1770 - 3569
    	$missData = array();
    	$dbCommand = Yii::app()->db->createCommand("select max(code) as max,min(code) as min from users  where am_id = '$email' and code between 'nom1710' and 'nom3569' ");
        $checkData = $dbCommand->queryAll();
    	if(!empty($checkData[0]['min'])){
    		$missDbCommand = Yii::app()->db->createCommand("
    			select a.*,c.has_paid,c.is_online from users a left join
				reginfos c
				on a.id = c.user_id
				where  a.type_id < 10 and a.am_id  <> '$email' and code between '" . $checkData[0]["min"] . "' and '" .$checkData[0]["max"] ."' order by id
    			");
    		$missData = $missDbCommand->queryAll();
    	}
        $dbCommand = Yii::app()->db->createCommand("
				select a.*,c.has_paid,c.is_online from users a left join
				reginfos c
				on a.id = c.user_id
				where  a.type_id < 10 and a.am_id = '$email'
				");

        $data = $dbCommand->queryAll();
        return array_merge($missData,$data);
    }

    public function getRmDetailByUser($email) {
    	// 上海站 1770 - 3569
    	$missData = array();
    	$dbCommand = Yii::app()->db->createCommand("select max(code) as max,min(code) as min from users  where rm_id = '$email' and code between 'nom1710' and 'nom3569' ");
    	$checkData = $dbCommand->queryAll();
    	if(!empty($checkData[0]['min'])){
    		$dbCommand = Yii::app()->db->createCommand("
    			select a.*,c.has_paid,c.is_online from users a left join
				reginfos c
				on a.id = c.user_id
				where  a.type_id < 10 and a.rm_id  <> '$email' and code between '" . $checkData[0]["min"] . "' and '" .$checkData[0]["max"] ."' order by id
    			");
    		$missData = $dbCommand->queryAll();
    	}
        $dbCommand = Yii::app()->db->createCommand("
				select a.*,c.has_paid,c.is_online from users a left join
				reginfos c
				on a.id = c.user_id
				where  a.type_id < 10 and a.rm_id = '$email'
				");

        $data = $dbCommand->queryAll();
        return $data + $missData;
    }

    public function getOdDetailByUser($email) {
    	// 上海站 1770 - 3569
    	$missData = array();
    	$dbCommand = Yii::app()->db->createCommand("select max(code) as max,min(code) as min from users  where od_id = '$email' and code between 'nom1710' and 'nom3569' ");
    	$checkData = $dbCommand->queryAll();
    	if(!empty($checkData[0]['min'])){
    		$dbCommand = Yii::app()->db->createCommand("
    			select a.*,c.has_paid,c.is_online from users a left join
				reginfos c
				on a.id = c.user_id
				where  a.type_id < 10 and a.od_id  <> '$email' and code between '" . $checkData[0]["min"] . "' and '" .$checkData[0]["max"] ."' order by id
    			");
    		$missData = $dbCommand->queryAll();
    	}
    	
        $dbCommand = Yii::app()->db->createCommand("
				select a.*,c.has_paid,c.is_online from users a left join
				reginfos c
				on a.id = c.user_id
				where  a.type_id < 10 and a.od_id = '$email'
				");

        $data = $dbCommand->queryAll();
        return $data + $missData;
    }

    public function getSummaryReport() {
        $dbCommand = Yii::app()->db->createCommand("
				select a.id,a.email,a.ec_mobile,b.nomination,b.registeration,b.rm_id,b.am_id,b.od_id from users a left join
				(
				SELECT COUNT( * )  nomination, sum( has_reged ) registeration, rm_id, am_id, od_id
				FROM users where type_id<10
				GROUP BY am_id) b
				on a.email = b.am_id

				where  a.type_id = 10
				");

        $data = $dbCommand->queryAll();
        return $data;
    }

    public function getSummaryByUser($email, $type_id) {
        if ($type_id == '10') {
            return array();
        } elseif ($type_id == '11') {
            return $this->getRmSummaryByUser($email);
        } elseif ($type_id == '12' || $type_id > 12) {
            return $this->getOdSummaryByUser($email);
        } else {
            return array();
        }
    }

    public function getAmSummaryByUser($email) {
        $dbCommand = Yii::app()->db->createCommand("
				SELECT email, SUM( ec_mobile ) ec_mobile, SUM( nomination ) nomination, SUM( registeration ) registeration, rm_id, od_id
				FROM (
	
				SELECT a.id, a.email, a.ec_mobile, COALESCE(b.nomination,0) nomination, COALESCE(b.registeration,0) registeration, b.rm_id, b.am_id, b.od_id
				FROM  (
	
				SELECT COUNT( * ) nomination, SUM( has_reged ) registeration, rm_id, am_id, od_id
				FROM users
				WHERE type_id <10 and rm_id = '$email'
				GROUP BY am_id ) b
	
				LEFT JOIN users a
				ON a.email = b.am_id
				WHERE a.type_id =11 ) aaa
				GROUP BY am_id
				");
        $data = $dbCommand->queryAll();
        return $data;
    }

    public function getRmSummaryByUser($email) {
        $dbCommand = Yii::app()->db->createCommand("
				SELECT email, SUM( ec_mobile ) ec_mobile, SUM( nomination ) nomination, SUM( registeration ) registeration, rm_id, od_id
				FROM (

				SELECT a.id, a.email, a.ec_mobile, COALESCE(b.nomination,0) nomination, COALESCE(b.registeration,0) registeration, b.rm_id, b.am_id, b.od_id
				FROM  (

				SELECT COUNT( * ) nomination, SUM( has_reged ) registeration, rm_id, am_id, od_id
				FROM users
				WHERE type_id <10 and rm_id = '$email'
				GROUP BY am_id ) b

				LEFT JOIN users a
				ON a.email = b.am_id
				WHERE a.type_id =10 ) aaa
				GROUP BY rm_id
				");
        $data = $dbCommand->queryAll();
        return $data;
    }

    public function getOdSummaryByUser($email) {
        $dbCommand = Yii::app()->db->createCommand("
				SELECT email, SUM( ec_mobile ) ec_mobile, SUM( nomination ) nomination, SUM( registeration ) registeration, rm_id, od_id
				FROM (
				SELECT a.id, a.email, a.ec_mobile, COALESCE(b.nomination,0) nomination, COALESCE(b.registeration,0) registeration, b.rm_id, b.am_id, b.od_id
				FROM (
				SELECT COUNT( * ) nomination, SUM( has_reged ) registeration, rm_id, am_id, od_id
				FROM users
				WHERE type_id <10 and od_id = '$email'
				GROUP BY am_id ) b left join users a

				ON a.email = b.am_id
				WHERE a.type_id =10 ) aaa
				GROUP BY rm_id
				");

        $data = $dbCommand->queryAll();
        return $data;
    }

    public function getAdminReport() {
        if (!$this->email == 'admin') {
            return array();
        } else {
            return $this->getDailyReport();
        }
    }

    public function getDailyReport() {
        $dbCommand = Yii::app()->db->createCommand("
				select a.*,p.has_paid,c.is_online from users a left join
				reginfos c
				on a.id = c.user_id
				left join payments p
				on a.id = p.user_id 
				where  a.type_id < 10
				");
        $data = $dbCommand->queryAll();
        return $data;
    }
    
    public function checkUser($email,$password){
    	$user = User::model()->findByAttributes(array('email' => $email));
    	if($user === null){
    		return null;
    	}else{
    		if($user->password != $user->encrypt($password)) {
    			return null;
    		} else {
    			return $user;
    		}
    	}
    }

}
