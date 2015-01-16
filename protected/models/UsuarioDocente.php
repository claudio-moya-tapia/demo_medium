<?php

/**
 * This is the model class for table "usuario_docente".
 *
 * The followings are the available columns in table 'usuario_docente':
 * @property integer $usuario_docente_id
 * @property integer $usuario_id
 * @property integer $tipo_docente_id
 * @property integer $tipo_area_especialidad_id
 * @property integer $tipo_estado_laboral_docente_id
 */
class UsuarioDocente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_docente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, tipo_docente_id, tipo_area_especialidad_id, tipo_estado_laboral_docente_id', 'required'),
			array('usuario_id, tipo_docente_id, tipo_area_especialidad_id, tipo_estado_laboral_docente_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_docente_id, usuario_id, tipo_docente_id, tipo_area_especialidad_id, tipo_estado_laboral_docente_id', 'safe', 'on'=>'search'),
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
                    'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
                    'tipo_docente' => array(self::BELONGS_TO, 'TipoDocente', 'tipo_docente_id'),
                    'tipo_area_especialidad' => array(self::BELONGS_TO, 'TipoAreaEspecialidad', 'tipo_area_especialidad_id'),
                    'tipo_estado_laboral_docente' => array(self::BELONGS_TO, 'TipoEstadoLaboralDocente', 'tipo_estado_laboral_docente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuario_docente_id' => 'Usuario Docente',
			'usuario_id' => 'Usuario',
			'tipo_docente_id' => 'Tipo Docente',
			'tipo_area_especialidad_id' => 'Tipo Area Especialidad',
			'tipo_estado_laboral_docente_id' => 'Tipo Estado Laboral Docente',
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

		$criteria->compare('usuario_docente_id',$this->usuario_docente_id);
                $criteria->with = array('usuario','tipo_docente','tipo_area_especialidad','tipo_estado_laboral_docente');
                $criteria->addSearchCondition('usuario.nombre', $this->usuario_id);
                $criteria->addSearchCondition('tipo_docente.titulo', $this->tipo_docente->titulo);
                $criteria->addSearchCondition('tipo_area_especialidad.titulo', $this->tipo_area_especialidad->titulo);
                $criteria->addSearchCondition('tipo_estado_laboral_docente.titulo', $this->tipo_estado_laboral_docente->titulo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioDocente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
