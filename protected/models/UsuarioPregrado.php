<?php

/**
 * This is the model class for table "usuario_pregrado".
 *
 * The followings are the available columns in table 'usuario_pregrado':
 * @property integer $usuario_pregrado_id
 * @property integer $usuario_id
 * @property integer $institucion_id
 * @property integer $carrera_id
 * @property string $fecha_egreso
 * @property string $fecha_titulacion
 * @property integer $profesion_id
 * @property integer $xml_nodo_id
 */
class UsuarioPregrado extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario_pregrado';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('usuario_id', 'required'),
            array('usuario_id, institucion_id, carrera_id, profesion_id, xml_nodo_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('usuario_pregrado_id, usuario_id, institucion_id, carrera_id, profesion_id, xml_nodo_id, fecha_egreso, fecha_titulacion', 'safe', 'on' => 'search'),
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
            'institucion' => array(self::BELONGS_TO, 'Institucion', 'institucion_id'),
            'carrera' => array(self::BELONGS_TO, 'Carrera', 'carrera_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'usuario_pregrado_id' => 'Usuario Pregrado',
            'usuario_id' => 'Usuario',
            'institucion_id' => 'Institucion',
            'carrera_id' => 'Carrera',
            'fecha_egreso' => 'Fecha Egreso',
            'fecha_titulacion' => 'Fecha Titulacion',
            'profesion_id' => 'profesion',
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

        $criteria->compare('usuario_pregrado_id', $this->usuario_pregrado_id);
        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('institucion_id', $this->institucion_id);
        $criteria->compare('carrera_id', $this->carrera_id);
        $criteria->compare('fecha_egreso', $this->fecha_egreso, true);
        $criteria->compare('fecha_titulacion', $this->fecha_titulacion, true);
        $criteria->compare('profesion_id', $this->profesion_id);
        $criteria->compare('xml_nodo_id', $this->xml_nodo_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UsuarioPregrado the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
