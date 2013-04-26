<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
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
class User extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public $language;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('language', 'required', 'on' => 'sendemail'),
            array('has_code, type_id, has_reged', 'required'),
            array('has_code, created_by, updated_by, type_id, has_reged, has_sended', 'numerical', 'integerOnly' => true),
            array('code', 'length', 'max' => 128),
            array('email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile', 'length', 'max' => 256),
            array('am_department, od_id, cc, am_name, am_id, am_mobile, rm_name, rm_id, od_name, map_dept, map_title, map_loca', 'length', 'max' => 255),
            array('diff, MAIL_ZIP, ImportDate, AUDIENCE, Category, COM_PHONE, STATUS, LAST_NAME, CONF_ID, LOCATION_ID, MAIL_STATE, MAIL_CITY', 'length', 'max' => 64),
            array('MAIL_COUNTRY', 'length', 'max' => 74),
            array('weibo,tencent,created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, has_code, code, email, password, organisation, relation_with_cisco, full_name, job_title, department, working_phone_dis, working_phone, mobile, province, city, ec_name, ec_relationship, ec_mobile, am_department, od_id, created_at, created_by, updated_at, updated_by, type_id, has_reged, has_sended, cc, am_name, am_id, am_mobile, rm_name, rm_id, od_name, diff, map_dept, map_title, map_loca, MAIL_ZIP, MAIL_COUNTRY, ImportDate, AUDIENCE, Category, COM_PHONE, STATUS, LAST_NAME, CONF_ID, LOCATION_ID, MAIL_STATE, MAIL_CITY,weibo,tencent', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'survey' => array(self::HAS_ONE, 'Survey', 'user_id'),
            'payment' => array(self::HAS_ONE, 'Payment', 'user_id'),
            'reginfo' => array(self::HAS_ONE, 'Reginfo', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => '参会码ID',
            'has_code' => '是否有邀请码',
            'code' => '邀请码（仅限受邀嘉宾填写)',
            'email' => '邮箱',
            'password' => '密码',
            'organisation' => '公司名称',
            'relation_with_cisco' => '贵单位与思科的关系',
            'full_name' => '姓名',
            'job_title' => '您的职务级别',
            'department' => '您的部门',
            'working_phone_dis' => '区号',
            'working_phone' => '电话',
            'mobile' => '手机号码',
            'province' => '所在的省份',
            'city' => '所在城市',
            'ec_name' => 'Ec Name',
            'ec_relationship' => 'Ec Relationship',
            'ec_mobile' => 'Ec Mobile',
            'am_department' => 'Am Department',
            'od_id' => 'Od ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'type_id' => '参会类型',
            'has_reged' => '是否注册',
            'has_sended' => '是否已邮寄发票',
            'cc' => 'Cc',
            'am_name' => 'AM 姓名',
            'am_id' => 'AM ID',
            'am_mobile' => 'AM Mobile',
            'rm_name' => 'RM 姓名',
            'rm_id' => 'RM ID',
            'od_id' => 'OD ID',
            'od_name' => 'OD 姓名',
            'diff' => 'division',
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
        $criteria->compare('id', $this->id);
        $criteria->compare('has_code', $this->has_code);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('organisation', $this->organisation, true);
        $criteria->compare('relation_with_cisco', $this->relation_with_cisco, true);
        $criteria->compare('weibo', $this->weibo, true);
        $criteria->compare('tencent', $this->tencent, true);
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
        $criteria->compare('am_department', $this->am_department, true);
        $criteria->compare('od_id', $this->od_id, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('has_reged', $this->has_reged);
        $criteria->compare('has_sended', $this->has_sended);
        $criteria->compare('cc', $this->cc, true);
        $criteria->compare('am_name', $this->am_name, true);
        $criteria->compare('am_id', $this->am_id, true);
        $criteria->compare('am_mobile', $this->am_mobile, true);
        $criteria->compare('rm_name', $this->rm_name, true);
        $criteria->compare('rm_id', $this->rm_id, true);
        $criteria->compare('od_name', $this->od_name, true);
        $criteria->compare('diff', $this->diff, true);
        $criteria->compare('map_dept', $this->map_dept, true);
        $criteria->compare('map_title', $this->map_title, true);
        $criteria->compare('map_loca', $this->map_loca, true);
        $criteria->compare('MAIL_ZIP', $this->MAIL_ZIP, true);
        $criteria->compare('MAIL_COUNTRY', $this->MAIL_COUNTRY, true);
        $criteria->compare('ImportDate', $this->ImportDate, true);
        $criteria->compare('AUDIENCE', $this->AUDIENCE, true);
        $criteria->compare('Category', $this->Category, true);
        $criteria->compare('COM_PHONE', $this->COM_PHONE, true);
        $criteria->compare('STATUS', $this->STATUS, true);
        $criteria->compare('LAST_NAME', $this->LAST_NAME, true);
        $criteria->compare('CONF_ID', $this->CONF_ID, true);
        $criteria->compare('LOCATION_ID', $this->LOCATION_ID, true);
        $criteria->compare('MAIL_STATE', $this->MAIL_STATE, true);
        $criteria->compare('MAIL_CITY', $this->MAIL_CITY, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'params' => array(),
            ),
        ));
    }

    public function getUsername($id) {
        $model = User::model()->findByPk($id);
        if ($model == '') {
            return "此用户已被删除";
        } else {
            return $model->full_name;
        }
    }

    public function getRelationOptionsText($id) {
        if (!empty($id)) {
            $RelationOptions = $this->getRelationOptions();
            return isset($RelationOptions[$id]) ?
                    $RelationOptions[$id] :
                    "unknown type ({$id})";
        } else {
            return 'unknown';
        }
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

    public function gethasreged() {
        return array(
            0 => '未注册',
            1 => '已经注册',
        );
    }

    public function getDiffOptions(){
        return array(
//             'LENT'=>'LENT',
//             'FSI'=>'FSI',
//             'GD Commercial'=>'GD Commercial',
//             'PS'=>'PS',
//             'GX&HN'=>'GX&HN',
//             'FJ'=>'FJ',
//             'Transformation accounts'=>'Transformation accounts',
//             'Global Accounts'=>'Global Accounts',
//             'PBG'=>'PBG',
//             'SP'=>'SP',
//             'Service'=>'Service',
//             'SE'=>'SE',
//             'Sponsors'=>'Sponsors',
//             'Internal'=>'Internal',
//             'VIP'=>'VIP',
//             'Ground Total'=>'Ground Total',
//         	'PSS'=>'PSS',
//         	'speaker'=>'speaker',
//         		'Hu Bei\Hu Nan'=>'Hu Bei\Hu Nan',
//         		'An Hui\Jiang Xi'=>'An Hui\Jiang Xi', 
//         		'Shan Xi\He Nan'=>'Shan Xi\He Nan',
//         		'TA'=>'TA',
//         		'SP'=>'SP',
//         		'Sponsor'=>'Sponsor',
//         		'Internal'=>'Internal',
//         		'VIP'=>'VIP',
        
        		'SP'=>'SP',
        		'TA'=>'TA',
        		'Partners'=>'Partners',
        		'East-FSI'=>'East-FSI',
        		'East-LENT'=>'East-LENT',
        		'East-COMM A'=>'East-COMM A',
        		'East-COMM B'=>'East-COMM B',
        		'East-PS'=>'East-PS',
        		'East-Others'=>'East-Others',
        		'Inside Sales'=>'Inside Sales',
        		'JS Team'=>'JS Team',
        		'ZJ Team'=>'ZJ Team',
        		
        );
    }
    public function getlanguage() {
        return array(
            //  ''=>'',
            0 => 'zh_cn',
            1 => 'en',
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

    public function getJobTitleText($id) {
        if (!empty($id)) {
            $getJobTitleOptions = $this->getJobTitleOptions();
            return isset($getJobTitleOptions[$id]) ?
                    $getJobTitleOptions[$id] :
                    "{$id}";
        } else {
            return '不明';
        }
    }

    public function getHasCodeOptions() {
        return array(
            0 => 'yes',
            1 => 'no',
        );
    }
    public function getHasSendOptions(){
        return array(
            0=>'否',
            1=>'是',
        );
    }

    public function getTypeOptions() {
        return array(
            0 => '请选择',
            1 => 'nomination',
            2 => 'internal',
            4 => 'public',
            //6=>'Sponsor',
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

    public function getCriteria(){
        $criteria = new CDbCriteria();
        if (!empty($this->id)){
            $criteria->addCondition('id=:id');
            $criteria->params[':id']=$this->id;
        }
    }
}