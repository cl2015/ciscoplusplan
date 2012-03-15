<?php

/**
 * This is the model class for table "Surveys".
 *
 * The followings are the available columns in table 'Surveys':
 * @property string $id
 * @property string $user_id
 * @property integer $q1
 * @property integer $q2
 * @property integer $q3
 * @property integer $q4
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Survey extends TrackStarActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Survey the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public $password2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'surveys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('user_id,q1,q2,q3,q4,q5,q6', 'required','message'=>Yii::t('default', "required")),
				array('q1, q2, q3,q4,q5,created_by, updated_by', 'numerical', 'integerOnly' => true),
				//array('q6')

				array('user_id', 'length', 'max' => 10),
				array('q5', 'length', 'max' => 100),
				array('created_at, updated_at', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, user_id, q1, q2, q3, q4,q5,q6, created_at, created_by, updated_at, updated_by', 'safe', 'on' => 'search'),
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
				'id' => 'ID',
				'user_id' => 'User',
				'q1' => Yii::t('default', 'Q1'),
				'q2' => Yii::t('default', 'Q2'),
				'q3' => Yii::t('default', 'Q3'),
				'q4' => Yii::t('default', 'Q4'),
				'q5' => Yii::t('default', 'Q5'),
				'q6' => Yii::t('default', 'Q6'),
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
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('user_id', $this->user_id, true);
		$criteria->compare('q1', $this->q1);
		$criteria->compare('q2', $this->q2);
		$criteria->compare('q3', $this->q3);
		$criteria->compare('q4', $this->q4);
		$criteria->compare('q5', $this->q5);
		$criteria->compare('q6', $this->q6);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('updated_by', $this->updated_by);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

	public function getQ1Options() {
		return array(
				''=> 'Select One',
				0 => 'LAN',
				1 => 'WAN',
				2 => 'Man',
				3 => 'Wireless solution',
				4 => 'Optical fiber communications',
				5 => 'Unified communications',
				6 => 'IP langage',
				7 => 'Cisco Web',
				8 => 'DSL access solutions',
				9 => 'Wired access plan',
				10 => 'Data center',
				11 => 'Memory networks',
				12 => 'Virtual private network and security solutions',
				13 => 'unsure',
				14 => 'other',
		);
	}
	public function getQ11Options() {
		return array(
				''=>"请选择一个",
				0 => '局域网(LAN)',
				1 => '广域网(WAN)',
				2 => '城域网(MAN)',
				3 => '无线解决方案',
				4 => '光纤通信',
				5 => '统一通信',
				6 => 'IP 语音',
				7 => '思科网真',
				8 => 'DSL接入方案',
				9 => '有线接入方案',
				10 => '数据中心',
				11 => '存储网络',
				12 => '虚拟专网及安全解决方案',
				13 => '不确定',
				14 => '其它',
		);
	}

	public function getQ2Options() {
		return array(
				''=> 'Select One',
				0 => 'Less 3 months',
				1 => '4 to 6 months',
				2 => '7 to 12 months',
				3 => 'more than 12 months',
				4 => 'no plans',
				5 => 'unsure',
		);
	}
	public function getQ22Options() {
		return array(
				''=>"请选择一个",
				0 => '三个月内',
				1 => '四至六个月',
				2 => '七至十二个月',
				3 => '十二个月以上',
				4 => '没有计划',
				5 => '不确定',
		);
	}
	public function getQ3Options() {
		return array(
				''=> 'Select One',
				0 => '0-10 thousands',
				1 => '10-50 thousands',
				2 => '50 thousands',
				3 => '0.15-0.25 million',
				4 => '0.25-0.5 million',
				5 => '0.5-1 million',
				6 => '1-2 million',
				7 => '2-5 million',
				8 => '5-10 million',
				9 => 'more than 10 million',
				10 => 'unsure the budget',
				11 => 'none',
				12 => 'Don\'t know/not responsible',
		);
	}
	public function getQ33Options() {
		return array(
				''=>"请选择一个",
				0 => '0-1万',
				1 => '1-5万',
				2 => '5-15万',
				3 => '15-25万',
				4 => '25-50万',
				5 => '50-100万',
				6 => '100-200万',
				7 => '200-500万',
				8 => '500-1000万',
				9 => '1000万以上',
				10 => '预算不确定',
				11 => '没有预算',
				12 => '不知道/不负责',
		);
	}
	public function getQ4Options() {
		return array(
				''=>"Select One",
				0 => '1-4',
				1 => '5-19',
				2 => '20-49',
				3 => '50-99',
				4 => '100-249',
				5 => '250-499',
				6 => '500-999',
				7 => '1000-1999',
				8 => '2000-4999',
				9 => '5000-9999',
				10 => 'more than 10000',
				11 => 'none',
		);
	}
	public function getQ44Options() {
		return array(
				''=>"请选择一个",
				0 => '1-4台',
				1 => '5-19台',
				2 => '20-49台',
				3 => '50-99台',
				4 => '100-249台',
				5 => '250-499台',
				6 => '500-999台',
				7 => '1000-1999台',
				8 => '2000-4999台',
				9 => '5000-9999台',
				10 => '10000台以上',
				11 => '无',
		);
	}
	public function getQ6Options() {
		return array(
				1 => Yii::t('default','Data Center - Application Networking'),
				2 => Yii::t('default','Data Center - Infrastructure'),
				3 => Yii::t('default','Data Center - Servers'),
				4 => Yii::t('default','Data Center - Storage'),
				5 => Yii::t('default','Data Center Management'),
				6 => Yii::t('default','IPC'),
				7 => Yii::t('default','IT Applications'),
				8 => Yii::t('default','Network'),
				9 => Yii::t('default','Network Operation'),
				10 => Yii::t('default','Network Planning'),
				11 => Yii::t('default','Optical'),
				12 => Yii::t('default','Security'),
				13 => Yii::t('default','Security - Application Security'),
				14 => Yii::t('default','Security - Network Security'),
				15 => Yii::t('default','Security - Policy Security Level'),
				16 => Yii::t('default','Storage'),
				17 => Yii::t('default','System'),
				18 => Yii::t('default','Video Systems'),
				19 => Yii::t('default','Voice - Cisco Unified Contact Center'),
				20 => Yii::t('default','Voice Systems'),
				21 => Yii::t('default','Wireless'),
				22 => Yii::t('default','Others'),
		);
	}
	public function getQ5Options(){
		return array(
				'' => Yii::t('default','Select one'),
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
				15 => Yii::t('default','Other'),
				16 => Yii::t('default','Purchasing/Procurement'),
				17 => Yii::t('default','Research/Development'),
				18 => Yii::t('default','Sales'),
				19 => Yii::t('default','Technical Support'),
				20 => Yii::t('default','Training/Education'),
		);
	}
	protected function beforeSave(){
		if(parent::beforeSave()){
			if(is_array($this->q6)){
				$this->q6 = implode(',',$this->q6);
			}
			return true;
		}
	}

	// 	protected function afterSave(){
	// 		parent::afterSave();
	// 		if(!is_array($this->q6)){
	// 			$this->q6 = explode(',',$this->q6);
	// 		}
	// 		echo 'afterSave';
	// 		var_dump($this->q6);
	// 	}
	// 	protected function afterValidate(){
	// 		parent::afterValidate();
	// 		if(!is_array($this->q6)){
	// 			$this->q6 = explode(',',$this->q6);
	// 		}
	// 		echo 'afterValidate';
	// 		var_dump($this->q6);
	// 	}

	protected function afterFind()
	{
		parent::afterFind();
		$this->q6 = explode(',', $this->q6);
	}



}

