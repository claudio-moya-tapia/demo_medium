<?php

/**
 * This is the model class for table "usuario_fuente_ingreso".
 *
 * The followings are the available columns in table 'usuario_fuente_ingreso':
 * @property integer $usuario_fuente_ingreso_id
 * @property integer $usuario_id
 * @property integer $tipo_fuente_ingreso_id
 * @property string $fecha_ingreso
 */
class UsuarioFuenteIngreso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_fuente_ingreso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, tipo_fuente_ingreso_id, fecha_ingreso', 'required'),
			array('usuario_id, tipo_fuente_ingreso_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_fuente_ingreso_id, usuario_id, tipo_fuente_ingreso_id, fecha_ingreso', 'safe', 'on'=>'search'),
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
			'usuario_fuente_ingreso_id' => 'Usuario Fuente Ingreso',
			'usuario_id' => 'Usuario',
			'tipo_fuente_ingreso_id' => 'Tipo Fuente Ingreso',
			'fecha_ingreso' => 'Fecha Ingreso',
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

		$criteria->compare('usuario_fuente_ingreso_id',$this->usuario_fuente_ingreso_id);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('tipo_fuente_ingreso_id',$this->tipo_fuente_ingreso_id);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioFuenteIngreso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
