<?php

/**
 * This is the model class for table "datos_laborales_json".
 *
 * The followings are the available columns in table 'datos_laborales_json':
 * @property integer $datos_laborales_json_id
 * @property string $usuario_json_temp_id
 * @property integer $cargo_id
 * @property string $cargo_valor
 * @property integer $empresa_id
 * @property string $empresa_valor
 * @property string $fecha_inicio
 * @property string $fecha_termino
 */
class DatosLaboralesJson extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datos_laborales_json';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_json_temp_id, cargo_id, cargo_valor, empresa_id, empresa_valor, fecha_inicio, fecha_termino', 'required'),
			array('cargo_id, empresa_id', 'numerical', 'integerOnly'=>true),
			array('usuario_json_temp_id, cargo_valor, empresa_valor', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('datos_laborales_json_id, usuario_json_temp_id, cargo_id, cargo_valor, empresa_id, empresa_valor, fecha_inicio, fecha_termino', 'safe', 'on'=>'search'),
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
			'datos_laborales_json_id' => 'Datos Laborales Json',
			'usuario_json_temp_id' => 'Usuario Json Temp',
			'cargo_id' => 'Cargo',
			'cargo_valor' => 'Cargo Valor',
			'empresa_id' => 'Empresa',
			'empresa_valor' => 'Empresa Valor',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_termino' => 'Fecha Termino',
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

		$criteria->compare('datos_laborales_json_id',$this->datos_laborales_json_id);
		$criteria->compare('usuario_json_temp_id',$this->usuario_json_temp_id,true);
		$criteria->compare('cargo_id',$this->cargo_id);
		$criteria->compare('cargo_valor',$this->cargo_valor,true);
		$criteria->compare('empresa_id',$this->empresa_id);
		$criteria->compare('empresa_valor',$this->empresa_valor,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_termino',$this->fecha_termino,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DatosLaboralesJson the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
