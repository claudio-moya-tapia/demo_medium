<?php

/**
 * This is the model class for table "usuario_charla".
 *
 * The followings are the available columns in table 'usuario_charla':
 * @property integer $usuario_charla_id
 * @property integer $usuario_id
 * @property integer $charla_id
 * @property integer $institucion_id
 * @property integer $facultad_id
 * @property integer $carrera_id
 * @property integer $escuela_id
 * @property integer $programa_estudio_id
 * @property integer $tipo_charla_id
 * @property string $fecha_creacion
 * @property integer $asisto
 */
class UsuarioCharla extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_charla';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, charla_id, institucion_id, facultad_id, carrera_id, escuela_id, programa_estudio_id, tipo_charla_id, fecha_creacion, asisto', 'required'),
			array('usuario_id, charla_id, institucion_id, facultad_id, carrera_id, escuela_id, programa_estudio_id, tipo_charla_id, asisto', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_charla_id, usuario_id, charla_id, institucion_id, facultad_id, carrera_id, escuela_id, programa_estudio_id, tipo_charla_id, fecha_creacion, asisto', 'safe', 'on'=>'search'),
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
			'usuario_charla_id' => 'Usuario Charla',
			'usuario_id' => 'Usuario',
			'charla_id' => 'Charla',
			'institucion_id' => 'Institucion',
			'facultad_id' => 'Facultad',
			'carrera_id' => 'Carrera',
			'escuela_id' => 'Escuela',
			'programa_estudio_id' => 'Programa Estudio',
			'tipo_charla_id' => 'Tipo Charla',
			'fecha_creacion' => 'Fecha Creacion',
			'asisto' => 'Asisto',
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

		$criteria->compare('usuario_charla_id',$this->usuario_charla_id);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('charla_id',$this->charla_id);
		$criteria->compare('institucion_id',$this->institucion_id);
		$criteria->compare('facultad_id',$this->facultad_id);
		$criteria->compare('carrera_id',$this->carrera_id);
		$criteria->compare('escuela_id',$this->escuela_id);
		$criteria->compare('programa_estudio_id',$this->programa_estudio_id);
		$criteria->compare('tipo_charla_id',$this->tipo_charla_id);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('asisto',$this->asisto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioCharla the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
