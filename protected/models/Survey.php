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
class Survey extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Survey the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

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
            array('user_id', 'required'),
            array('q1, q2, q3, q4, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('user_id', 'length', 'max' => 10),
            array('q5', 'length', 'max' => 100),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, q1, q2, q3, q4,q5, created_at, created_by, updated_at, updated_by', 'safe', 'on' => 'search'),
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
            'q1' => 'Q1',
            'q2' => 'Q2',
            'q3' => 'Q3',
            'q4' => 'Q4',
            'q5' => 'Q5',
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
    public function getQ55Options() {
        return array(
            1 => 'IP通讯',
            2 => 'IT应用',
            3 => '光纤网络',
            4 => '安全 - 应用安全',
            5 => '安全 - 政策安全等级',
            6 => '安全 - 网络安全',
            7 => '数据中心 - 基础架构',
            8 => '数据中心 - 存储',
            9 => '数据中心 - 服务器',
            10 =>'数据中心 - 应用网络',
            11 =>'无线',
            12 =>'系统维护',
            13 =>'网络维护',
            14 =>'网络运营',
            15 =>'视频系统',
            16 =>'语音系统',
            17 =>'语音 - 呼叫中心',
        );
    }
}
