<?php

/**
 * This is the model class for table "reginfos".
 *
 * The followings are the available columns in table 'reginfos':
 * @property string $id
 * @property string $user_id
 * @property string $reg_date
 * @property string $reg_id
 * @property string $reg_type
 * @property string $reg_name
 * @property string $reg_address
 * @property integer $payment_type
 * @property string $paid_amount
 * @property integer $is_online
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $has_paid
 */
class Reginfo extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Reginfo the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'reginfos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('payment_type, is_online, created_by, updated_by, has_paid', 'numerical', 'integerOnly' => true),
            array('user_id', 'length', 'max' => 10),
            array('reg_id, reg_type, reg_name, reg_address, paid_amount', 'length', 'max' => 256),
            array('reg_date, created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, reg_date, reg_id, reg_type, reg_name, reg_address, payment_type, paid_amount, is_online, created_at, created_by, updated_at, updated_by, has_paid', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reginfo' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'reg_date' => 'Reg Date',
            'reg_id' => 'Reg',
            'reg_type' => 'Reg Type',
            'reg_name' => 'Reg Name',
            'reg_address' => 'Reg Address',
            'payment_type' => '支付方式',
            'paid_amount' => '支付金额',
            'is_online' => '参会方式',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'has_paid' => '是否支付',
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
        $criteria->compare('reg_date', $this->reg_date, true);
        $criteria->compare('reg_id', $this->reg_id, true);
        $criteria->compare('reg_type', $this->reg_type, true);
        $criteria->compare('reg_name', $this->reg_name, true);
        $criteria->compare('reg_address', $this->reg_address, true);
        $criteria->compare('payment_type', $this->payment_type);
        $criteria->compare('paid_amount', $this->paid_amount, true);
        $criteria->compare('is_online', $this->is_online);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by);
        $criteria->compare('has_paid', $this->has_paid);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'params' => array(),
            ),
        ));
    }

    public function getOnlineOptions() {
        return array(
            0 => Yii::t('default', 'Online Event'),
            1 => Yii::t('default', 'Onsite Event'),
        );
    }

    public function getOnlineText($id) {
        $OnlineOptions = $this->getOnlineOptions();
        if (!empty($id)) {
            return isset($OnlineOptions[$id]) ?
                    $OnlineOptions[$id] :
                    "未知类型({$id})";
        } else {
            return $OnlineOptions[0];
        }
    }

    public function getPaymentOptions() {
        return array(
           // 0 => Yii::t('default', 'offline payment'),
            1 => Yii::t('default', 'onsite payment'),
           // 2 => Yii::t('default', 'online payment'),
        );
    }

    public function getPayment2Options() {
        return array(
            0 => Yii::t('default', 'offline payment'),
            1 => Yii::t('default', 'onsite payment'),
            2 => Yii::t('default', 'online payment'),
            3 => "在线支付失败",
        );
    }

    public function getPaymentText($id) {
        $OnlineOptions = $this->getPayment2Options();
        return isset($OnlineOptions[$id]) ?
                $OnlineOptions[$id] :
                "unknown type ({$id})";
    }
    
    public function getBackendOnlineText($id){
    	$OnlineOptions = $this->getBackendOnlineOptions();
    	if (!empty($id)) {
    		return isset($OnlineOptions[$id]) ?
    		$OnlineOptions[$id] :
    		"未知类型({$id})";
    	} else {
    		return $OnlineOptions[0];
    	}
    }
    
    public function getBackendOnlineOptions(){
    	return array(
    			0 => '线上',
    			1 => '现场',
    	);
    }

}