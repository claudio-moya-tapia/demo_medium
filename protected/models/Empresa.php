<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $empresa_id
 * @property integer $pais_id
 * @property integer $region_id
 * @property integer $ciudad_id
 * @property integer $comuna_id
 * @property integer $tipo_sociedad_id
 * @property string $rut
 * @property string $razon_social
 * @property string $codigo_postal
 * @property integer $tipo_giro_id
 * @property string $nombre
 * @property string $direccion
 * @property string $url
 * @property integer $tipo_antiguedad_id
 * @property integer $rango_empleado_id
 * @property integer $rango_utilidad_id
 * @property integer $rango_perdida_id
 * @property integer $rango_facturacion_id
 * @property string $telefono_fijo
 * @property string $telefono_celular
 * @property string $telefono_fax
 * @property integer $empresa_vertical_id
 * @property string $email
 */
class Empresa extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'empresa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('', 'required'),
            array('pais_id, region_id, ciudad_id, comuna_id, tipo_sociedad_id, tipo_giro_id, tipo_antiguedad_id, rango_empleado_id, rango_utilidad_id, rango_perdida_id, rango_facturacion_id, empresa_vertical_id', 'numerical', 'integerOnly' => true),
            array('rut, nombre, telefono_fijo, telefono_celular, telefono_fax', 'length', 'max' => 45),
            array('razon_social, codigo_postal, direccion, url,email', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('empresa_id, pais_id, region_id, ciudad_id, comuna_id, tipo_sociedad_id, rut, razon_social, codigo_postal, tipo_giro_id, nombre, direccion, url, tipo_antiguedad_id, rango_empleado_id, rango_utilidad_id, rango_perdida_id, rango_facturacion_id, telefono_fijo, telefono_celular, telefono_fax, empresa_vertical_id,email', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tipo_sociedad' => array(self::BELONGS_TO, 'TipoSociedad', 'tipo_sociedad_id'),
            'tipo_giro_id' => array(self::BELONGS_TO, 'TipoGiro', 'tipo_giro_id'),
            'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
            'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
            'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
            'comuna' => array(self::BELONGS_TO, 'Comuna', 'comuna_id'),
            'tipo_antiguedad' => array(self::BELONGS_TO, 'TipoAntiguedad', 'tipo_antiguedad_id'),
            'rango_empleado' => array(self::BELONGS_TO, 'RangoEmpleado', 'rango_empleado_id'),
            'rango_utilidad' => array(self::BELONGS_TO, 'RangoUtilidad', 'rango_utilidad_id'),
            'rango_perdida' => array(self::BELONGS_TO, 'RangoPerdida', 'rango_perdida_id'),
            'rango_facturacion' => array(self::BELONGS_TO, 'RangoFacturacion', 'rango_facturacion_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'empresa_id' => 'Empresa',
            'pais_id' => 'Pais',
            'region_id' => 'Region',
            'ciudad_id' => 'Ciudad',
            'comuna_id' => 'Comuna',
            'tipo_sociedad_id' => 'Tipo Sociedad',
            'rut' => 'Rut',
            'razon_social' => 'Razon Social',
            'codigo_postal' => 'Codigo Postal',
            'tipo_giro_id' => 'Tipo Giro',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'url' => 'Url',
            'tipo_antiguedad_id' => 'Tipo Antiguedad',
            'rango_empleado_id' => 'Rango Empleado',
            'rango_utilidad_id' => 'Rango Utilidad',
            'rango_perdida_id' => 'Rango Perdida',
            'rango_facturacion_id' => 'Rango Facturacion',
            'telefono_fijo' => 'Telefono Fijo',
            'telefono_celular' => 'Telefono Celular',
            'telefono_fax' => 'Telefono Fax',
            'empresa_vertical_id' => 'Empresa Vertical',
            'email' => 'Email Empresa',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('empresa_id', $this->empresa_id);
        $criteria->compare('pais_id', $this->pais_id);
        $criteria->compare('region_id', $this->region_id);
        $criteria->compare('ciudad_id', $this->ciudad_id);
        $criteria->compare('comuna_id', $this->comuna_id);
        $criteria->compare('tipo_sociedad_id', $this->tipo_sociedad_id);
        $criteria->compare('rut', $this->rut, true);
        $criteria->compare('razon_social', $this->razon_social, true);
        $criteria->compare('codigo_postal', $this->codigo_postal, true);
        $criteria->compare('tipo_giro_id', $this->tipo_giro_id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('direccion', $this->direccion, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('tipo_antiguedad_id', $this->tipo_antiguedad_id);
        $criteria->compare('rango_empleado_id', $this->rango_empleado_id);
        $criteria->compare('rango_utilidad_id', $this->rango_utilidad_id);
        $criteria->compare('rango_perdida_id', $this->rango_perdida_id);
        $criteria->compare('rango_facturacion_id', $this->rango_facturacion_id);
        $criteria->compare('telefono_fijo', $this->telefono_fijo, true);
        $criteria->compare('telefono_celular', $this->telefono_celular, true);
        $criteria->compare('telefono_fax', $this->telefono_fax, true);
        $criteria->compare('empresa_vertical_id', $this->empresa_vertical_id);
        $criteria->compare('email', $this->email);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Empresa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
