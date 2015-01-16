<?php

/**
 * This is the model class for table "usuario_socio".
 *
 * The followings are the available columns in table 'usuario_socio':
 * @property integer $socio_id
 * @property integer $usuario_id
 * @property integer $cargo_id
 * @property integer $nivel_educacional_id
 * @property integer $porcentaje_propiedad
 * @property integer $empresa_id
 */
class UsuarioSocio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_socio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, cargo_id, nivel_educacional_id, porcentaje_propiedad, empresa_id', 'required'),
			array('usuario_id, cargo_id, nivel_educacional_id, porcentaje_propiedad, empresa_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('socio_id, usuario_id, cargo_id, nivel_educacional_id, porcentaje_propiedad, empresa_id', 'safe', 'on'=>'search'),
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
			'socio_id' => 'Socio',
			'usuario_id' => 'Usuario',
			'cargo_id' => 'Cargo',
			'nivel_educacional_id' => 'Nivel Educacional',
			'porcentaje_propiedad' => 'Porcentaje Propiedad',
			'empresa_id' => 'Empresa',
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

		$criteria->compare('socio_id',$this->socio_id);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('cargo_id',$this->cargo_id);
		$criteria->compare('nivel_educacional_id',$this->nivel_educacional_id);
		$criteria->compare('porcentaje_propiedad',$this->porcentaje_propiedad);
		$criteria->compare('empresa_id',$this->empresa_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioSocio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
