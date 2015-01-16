<?php

/**
 * This is the model class for table "charla".
 *
 * The followings are the available columns in table 'charla':
 * @property integer $charla_id
 * @property string $fecha_creacion
 * @property string $fecha_inicio
 * @property string $fecha_termino
 * @property string $titulo
 */
class Charla extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'charla';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_creacion, fecha_inicio, fecha_termino, titulo', 'required'),
			array('titulo', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('charla_id, fecha_creacion, fecha_inicio, fecha_termino, titulo', 'safe', 'on'=>'search'),
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
			'charla_id' => 'Charla',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_termino' => 'Fecha Termino',
			'titulo' => 'Titulo',
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

		$criteria->compare('charla_id',$this->charla_id);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_termino',$this->fecha_termino,true);
		$criteria->compare('titulo',$this->titulo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Charla the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
