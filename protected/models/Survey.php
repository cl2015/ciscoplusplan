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
class Survey extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Survey the static model class
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
		return 'surveys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('q1, q2, q3, q4, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, q1, q2, q3, q4, created_at, created_by, updated_at, updated_by', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'q1' => 'Q1',
			'q2' => 'Q2',
			'q3' => 'Q3',
			'q4' => 'Q4',
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
		$criteria->compare('q1',$this->q1);
		$criteria->compare('q2',$this->q2);
		$criteria->compare('q3',$this->q3);
		$criteria->compare('q4',$this->q4);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getQ1Options()
	{
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
	
	public function getQ2Options()
	{
		return array(
			0 => 'Less 3 months',
			1 => '4 to 6 months',
			2 => '7 to 12 months',
			3 => 'more than 12 months',
			4 => 'no plans',
			5 => 'unsure',
		);
	}
	public function getQ3Options()
	{
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
	public function getQ4Options()
	{
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
}
