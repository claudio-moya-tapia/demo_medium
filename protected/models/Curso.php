<?php

/**
 * This is the model class for table "curso".
 *
 * The followings are the available columns in table 'curso':
 * @property integer $curso_id
 * @property string $titulo
 * @property integer $es_optativo_id
 * @property integer $area_academica_id
 * @property integer $usuario_docente_id
 */
class Curso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, es_optativo_id, area_academica_id, usuario_docente_id', 'required'),
			array('es_optativo_id, area_academica_id, usuario_docente_id', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('curso_id, titulo, es_optativo_id, area_academica_id, usuario_docente_id', 'safe', 'on'=>'search'),
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
                 'usuariodocente' => array(self::BELONGS_TO, 'UsuarioDocente', 'usuario_docente_id'),
                   
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'curso_id' => 'Curso',
			'titulo' => 'Titulo',
			'es_optativo_id' => 'Es Optativo',
			'area_academica_id' => 'Area Academica',
			'usuario_docente_id' => 'Usuario Docente',
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

		$criteria->compare('curso_id',$this->curso_id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('es_optativo_id',$this->es_optativo_id);
		$criteria->compare('area_academica_id',$this->area_academica_id);
		$criteria->compare('usuario_docente_id',$this->usuario_docente_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Curso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
