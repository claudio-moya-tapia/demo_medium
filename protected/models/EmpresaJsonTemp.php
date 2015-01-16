<?php

/**
 * This is the model class for table "empresa_json_temp".
 *
 * The followings are the available columns in table 'empresa_json_temp':
 * @property integer $id_empresa_json_temp
 * @property integer $id
 * @property integer $rut
 * @property string $razon_social
 * @property string $nombre
 * @property integer $pais_id
 * @property string $pais_valor
 * @property integer $ciudad_id
 * @property string $ciudad_valor
 * @property integer $comuna_id
 * @property string $comuna_valor
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $codigo_postal
 * @property string $email_contacto
 * @property string $sitio_web
 * @property integer $giro_id
 * @property string $giro_valor
 * @property integer $rubro_id
 * @property string $rubro_valor
 * @property integer $cobertura_id
 * @property string $cobertura_valor
 * @property integer $rango_de_venta_id
 * @property string $rango_de_venta_valor
 * @property integer $n_empleados
 * @property string $descripcion
 */
class EmpresaJsonTemp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa_json_temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, rut, razon_social, nombre, pais_id, pais_valor, ciudad_id, ciudad_valor, comuna_id, comuna_valor, direccion, fax, codigo_postal, email_contacto, sitio_web, giro_id, giro_valor, rubro_id, rubro_valor, cobertura_id, cobertura_valor, rango_de_venta_id, rango_de_venta_valor, n_empleados, descripcion', 'required'),
			array('id, rut, pais_id, ciudad_id, comuna_id, giro_id, rubro_id, cobertura_id, rango_de_venta_id, n_empleados', 'numerical', 'integerOnly'=>true),
			array('razon_social, nombre', 'length', 'max'=>255),
			array('pais_valor, ciudad_valor, comuna_valor, direccion, telefono, fax, codigo_postal, email_contacto, sitio_web, giro_valor, rubro_valor, cobertura_valor, rango_de_venta_valor, descripcion', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_empresa_json_temp, id, rut, razon_social, nombre, pais_id, pais_valor, ciudad_id, ciudad_valor, comuna_id, comuna_valor, direccion, telefono, fax, codigo_postal, email_contacto, sitio_web, giro_id, giro_valor, rubro_id, rubro_valor, cobertura_id, cobertura_valor, rango_de_venta_id, rango_de_venta_valor, n_empleados, descripcion', 'safe', 'on'=>'search'),
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
			'id_empresa_json_temp' => 'Id Empresa Json Temp',
			'id' => 'ID',
			'rut' => 'Rut',
			'razon_social' => 'Razon Social',
			'nombre' => 'Nombre',
			'pais_id' => 'Pais',
			'pais_valor' => 'Pais Valor',
			'ciudad_id' => 'Ciudad',
			'ciudad_valor' => 'Ciudad Valor',
			'comuna_id' => 'Comuna',
			'comuna_valor' => 'Comuna Valor',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'fax' => 'Fax',
			'codigo_postal' => 'Codigo Postal',
			'email_contacto' => 'Email Contacto',
			'sitio_web' => 'Sitio Web',
			'giro_id' => 'Giro',
			'giro_valor' => 'Giro Valor',
			'rubro_id' => 'Rubro',
			'rubro_valor' => 'Rubro Valor',
			'cobertura_id' => 'Cobertura',
			'cobertura_valor' => 'Cobertura Valor',
			'rango_de_venta_id' => 'Rango De Venta',
			'rango_de_venta_valor' => 'Rango De Venta Valor',
			'n_empleados' => 'N Empleados',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('id_empresa_json_temp',$this->id_empresa_json_temp);
		$criteria->compare('id',$this->id);
		$criteria->compare('rut',$this->rut);
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('pais_id',$this->pais_id);
		$criteria->compare('pais_valor',$this->pais_valor,true);
		$criteria->compare('ciudad_id',$this->ciudad_id);
		$criteria->compare('ciudad_valor',$this->ciudad_valor,true);
		$criteria->compare('comuna_id',$this->comuna_id);
		$criteria->compare('comuna_valor',$this->comuna_valor,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('codigo_postal',$this->codigo_postal,true);
		$criteria->compare('email_contacto',$this->email_contacto,true);
		$criteria->compare('sitio_web',$this->sitio_web,true);
		$criteria->compare('giro_id',$this->giro_id);
		$criteria->compare('giro_valor',$this->giro_valor,true);
		$criteria->compare('rubro_id',$this->rubro_id);
		$criteria->compare('rubro_valor',$this->rubro_valor,true);
		$criteria->compare('cobertura_id',$this->cobertura_id);
		$criteria->compare('cobertura_valor',$this->cobertura_valor,true);
		$criteria->compare('rango_de_venta_id',$this->rango_de_venta_id);
		$criteria->compare('rango_de_venta_valor',$this->rango_de_venta_valor,true);
		$criteria->compare('n_empleados',$this->n_empleados);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmpresaJsonTemp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
