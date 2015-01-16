<?php

/**
 * This is the model class for table "usuario_laboral".
 *
 * The followings are the available columns in table 'usuario_laboral':
 * @property integer $usuario_laboral_id
 * @property integer $usuario_id
 * @property integer $empresa_id
 * @property integer $industria_id
 * @property integer $area_experiencia_id
 * @property integer $cargo_id
 * @property string $email
 * @property string $fecha_ingreso
 * @property string $fecha_egreso
 * @property integer $actual_id
 * @property integer $xml_nodo_id
 */
class UsuarioLaboral extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario_laboral';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('usuario_id', 'required'),
            array('usuario_id, empresa_id, industria_id, area_experiencia_id, cargo_id, actual_id, xml_nodo_id', 'numerical', 'integerOnly' => true),            
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('usuario_laboral_id, usuario_id, empresa_id, industria_id, area_experiencia_id, cargo_id, actual_id, xml_nodo_id, fecha_ingreso, fecha_egreso', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
            'empresa' => array(self::BELONGS_TO, 'Empresa', 'empresa_id'),
            'industria' => array(self::BELONGS_TO, 'Industria', 'industria_id'),
            'area_experiencia' => array(self::BELONGS_TO, 'AreaExperiencia', 'area_experiencia_id'),
            'cargo' => array(self::BELONGS_TO, 'Cargo', 'cargo_id'),
            'actual' => array(self::BELONGS_TO, 'Actual', 'actual_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'usuario_laboral_id' => 'Usuario Laboral',
            'usuario_id' => 'Usuario',
            'empresa_id' => 'Empresa',
            'industria_id' => 'Industria',
            'area_experiencia_id' => 'Área experiencia',
            'cargo_id' => 'Cargo',
            'email' => 'Email',
            'fecha_ingreso' => 'Fecha Ingreso',
            'fecha_egreso' => 'Fecha Egreso',
            'actual_id' => 'Actual',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('usuario_laboral_id', $this->usuario_laboral_id);
        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('empresa_id', $this->empresa_id);
        $criteria->compare('industria_id', $this->industria_id);
        $criteria->compare('area_experiencia_id', $this->area_experiencia_id);
        $criteria->compare('cargo_id', $this->tipo_cargo_id);
        $criteria->compare('email', $this->email);
        $criteria->compare('fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('fecha_egreso', $this->fecha_egreso, true);
        $criteria->compare('actual_id', $this->actual_id);
        $criteria->compare('xml_nodo_id', $this->xml_nodo_id);
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UsuarioLaboral the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
