<?php

/**
 * This is the model class for table "usuario_temp".
 *
 * The followings are the available columns in table 'usuario_temp':
 * @property integer $usuario_id
 * @property integer $tipo_fuente_ingreso_id
 * @property integer $sexo_id
 * @property string $rut
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $fecha_nacimiento
 * @property string $fecha_creacion
 */
class UsuarioTemp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_fuente_ingreso_id, sexo_id, rut, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, fecha_creacion', 'required'),
			array('tipo_fuente_ingreso_id, sexo_id', 'numerical', 'integerOnly'=>true),
			array('rut, nombre, apellido_paterno, apellido_materno', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_id, tipo_fuente_ingreso_id, sexo_id, rut, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, fecha_creacion', 'safe', 'on'=>'search'),
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
			'usuario_id' => 'Usuario',
			'tipo_fuente_ingreso_id' => 'Tipo Fuente Ingreso',
			'sexo_id' => 'Sexo',
			'rut' => 'Rut',
			'nombre' => 'Nombre',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'fecha_creacion' => 'Fecha Creacion',
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

		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('tipo_fuente_ingreso_id',$this->tipo_fuente_ingreso_id);
		$criteria->compare('sexo_id',$this->sexo_id);
		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioTemp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
