<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $usuario_id
 * @property integer $tipo_fuente_ingreso_id
 * @property integer $sexo_id
 * @property integer $identidad_id
 * @property string $rut
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $fecha_nacimiento
 * @property string $fecha_creacion
 */
class Usuario extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('', 'required'),
            array('tipo_fuente_ingreso_id, sexo_id, identidad_id', 'numerical', 'integerOnly' => true),
            array('rut, nombre, apellido_paterno, apellido_materno', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('usuario_id, sexo_id, rut, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, fecha_creacion, identidad_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(            
            'tipo_fuente_ingreso'=>array(self::BELONGS_TO,'TipoFuenteIngreso','tipo_fuente_ingreso_id'),  
            'sexo'=>array(self::BELONGS_TO,'Sexo','sexo_id'),            
            'usuario_natural'=>array(self::MANY_MANY, 'UsuarioNatural', 'usuario_natural(usuario_id,usuario_natural_id)'),
            'usuario_laboral'=>array(self::MANY_MANY, 'UsuarioLaboral', 'usuario_laboral(usuario_id,usuario_laboral_id)'),
            'usuario_pregrado'=>array(self::MANY_MANY, 'UsuarioPregrado', 'usuario_pregrado(usuario_id,usuario_pregrado_id)'),
            'usuario_postgrado'=>array(self::MANY_MANY, 'UsuarioPostgrado', 'usuario_postgrado(usuario_id,usuario_postgrado_id)'),
            'identidad'=>array(self::BELONGS_TO, 'Identidad', 'identidad_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
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
            'identidad_id' => 'Identidad',
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

        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('sexo_id', $this->sexo_id);
        $criteria->compare('identidad_id', $this->identidad_id);  
        $criteria->compare('rut', $this->rut, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido_paterno', $this->apellido_paterno, true);
        $criteria->compare('apellido_materno', $this->apellido_materno, true);
        $criteria->compare('fecha_nacimiento', $this->fecha_nacimiento, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
