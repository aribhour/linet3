<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
/**
 * This is the model class for table "bankName".
 *
 * The followings are the available columns in table 'bankName':
 * @property integer $id
 * @property string $name
 */
namespace app\models;

use Yii;
class BankName extends Record{
        const table='{{%bankName}}';
	

	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return self::table;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name', 'required'),
			array('id', 'number', 'integerOnly'=>true),
			array('name', 'string', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
						'id'=>Yii::t('app','ID'),
						'name'=>Yii::t('app','Name'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($params)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$query = Accounts::find();          $dataProvider = new ActiveDataProvider([             'query' => $query,         ]);          $this->load($params);          if (!$this->validate()) {                                     return $dataProvider;         }

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function AutoComplete($name='') {
		$sql= 'SELECT id as value, name AS label FROM '.BankName::table.' WHERE name LIKE :name';
		$name = $name.'%';
		return Yii::$app->db->createCommand($sql)->queryAll(true,array(':name'=>$name));
	}
}
