<?php

/**
 * This is the model class for table "usuario_postgrado".
 *
 * The followings are the available columns in table 'usuario_postgrado':
 * @property integer $usuario_postgrado_id
 * @property integer $usuario_id
 * @property integer $programa_estudio_id
 * @property integer $tipo_estado_postgrado_id
 * @property integer $tipo_situacion_postgrado_id
 * @property string $fecha_matricula
 * @property string $fecha_version
 * @property string $xml_nodo_id
 */
class UsuarioPostgrado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_postgrado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id', 'required'),
			array('usuario_id, programa_estudio_id, tipo_estado_postgrado_id, tipo_situacion_postgrado_id, xml_nodo_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_postgrado_id, usuario_id, programa_estudio_id, tipo_estado_postgrado_id, tipo_situacion_postgrado_id, xml_nodo_id, fecha_matricula, fecha_version', 'safe', 'on'=>'search'),
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
                     'tipo_estado_postgrado' => array(self::BELONGS_TO, 'TipoEstadoPostgrado', 'tipo_estado_postgrado_id'),             
                     'tipo_situacion_postgrado' => array(self::BELONGS_TO, 'TipoSituacionPostgrado', 'tipo_situacion_postgrado_id'), 
                     'programa_estudio' => array(self::BELONGS_TO, 'ProgramaEstudio', 'programa_estudio_id'), 
              
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuario_postgrado_id' => 'Usuario Postgrado',
			'usuario_id' => 'Usuario',
                        'programa_estudio_id' => 'Programa Estudio',
			'tipo_estado_postgrado_id' => 'Tipo Estado Postgrado',
			'tipo_situacion_postgrado_id' => 'Tipo Situacion Postgrado',
			'fecha_matricula' => 'Fecha Matricula',
                        'fecha_version' => 'Fecha Version',
                        'xml_nodo_id' => 'Xml Nodo',
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

		$criteria->compare('usuario_postgrado_id',$this->usuario_postgrado_id);
		$criteria->compare('usuario_id',$this->usuario_id);
                $criteria->compare('programa_estudio_id',$this->programa_estudio_id);
		$criteria->compare('tipo_estado_postgrado_id',$this->tipo_estado_postgrado_id);
		$criteria->compare('tipo_situacion_postgrado_id',$this->tipo_situacion_postgrado_id);
		$criteria->compare('fecha_matricula',$this->fecha_matricula,true);
                $criteria->compare('fecha_version',$this->fecha_version,true);
                $criteria->compare('xml_nodo_id', $this->xml_nodo_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioPostgrado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
