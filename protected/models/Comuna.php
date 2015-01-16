<?php

/**
 * This is the model class for table "comuna".
 *
 * The followings are the available columns in table 'comuna':
 * @property integer $comuna_id
 * @property integer $pais_id
 * @property integer $region_id
 * @property integer $ciudad_id
 * @property string $nombre
 */
class Comuna extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comuna';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pais_id, region_id, ciudad_id, nombre', 'required'),
			array('pais_id, region_id, ciudad_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('comuna_id, pais_id, region_id, ciudad_id, nombre', 'safe', 'on'=>'search'),
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
                     'pais'=>array(self::BELONGS_TO,'Pais','pais_id'), 
                     'region'=>array(self::BELONGS_TO,'Region','region_id'), 
                     'ciudad'=>array(self::BELONGS_TO,'Ciudad','ciudad_id'), 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comuna_id' => 'Comuna',
			'pais_id' => 'Pais',
			'region_id' => 'Region',
			'ciudad_id' => 'Ciudad',
			'nombre' => 'Nombre',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('comuna_id',$this->comuna_id);
		$criteria->compare('pais_id',$this->pais_id);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('ciudad_id',$this->ciudad_id);
		$criteria->compare('nombre',$this->nombre,true);
                $criteria->order = 'nombre';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comuna the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
