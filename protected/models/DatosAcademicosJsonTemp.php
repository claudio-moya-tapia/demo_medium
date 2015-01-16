<?php

/**
 * This is the model class for table "datos_academicos_json_temp".
 *
 * The followings are the available columns in table 'datos_academicos_json_temp':
 * @property integer $datos_academicos_json_temp_id
 * @property integer $usuario_json_temp_id
 * @property integer $carrera_id
 * @property string $carrera_valor
 * @property integer $tipo_de_grado_id
 * @property string $tipo_de_grado_valor
 * @property integer $institucion_id
 * @property string $institucion_valor
 * @property string $fecha_inicio
 * @property string $fecha_termino
 */
class DatosAcademicosJsonTemp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datos_academicos_json_temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_json_temp_id, carrera_id, carrera_valor, tipo_de_grado_id, tipo_de_grado_valor, institucion_id, institucion_valor, fecha_inicio, fecha_termino', 'required'),
			array('usuario_json_temp_id, carrera_id, tipo_de_grado_id, institucion_id', 'numerical', 'integerOnly'=>true),
			array('carrera_valor, tipo_de_grado_valor, institucion_valor', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('datos_academicos_json_temp_id, usuario_json_temp_id, carrera_id, carrera_valor, tipo_de_grado_id, tipo_de_grado_valor, institucion_id, institucion_valor, fecha_inicio, fecha_termino', 'safe', 'on'=>'search'),
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
			'datos_academicos_json_temp_id' => 'Datos Academicos Json Temp',
			'usuario_json_temp_id' => 'Usuario Json Temp',
			'carrera_id' => 'Carrera',
			'carrera_valor' => 'Carrera Valor',
			'tipo_de_grado_id' => 'Tipo De Grado',
			'tipo_de_grado_valor' => 'Tipo De Grado Valor',
			'institucion_id' => 'Institucion',
			'institucion_valor' => 'Institucion Valor',
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

		$criteria->compare('datos_academicos_json_temp_id',$this->datos_academicos_json_temp_id);
		$criteria->compare('usuario_json_temp_id',$this->usuario_json_temp_id);
		$criteria->compare('carrera_id',$this->carrera_id);
		$criteria->compare('carrera_valor',$this->carrera_valor,true);
		$criteria->compare('tipo_de_grado_id',$this->tipo_de_grado_id);
		$criteria->compare('tipo_de_grado_valor',$this->tipo_de_grado_valor,true);
		$criteria->compare('institucion_id',$this->institucion_id);
		$criteria->compare('institucion_valor',$this->institucion_valor,true);
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
	 * @return DatosAcademicosJsonTemp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
