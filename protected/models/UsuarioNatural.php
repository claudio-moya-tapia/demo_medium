<?php

/**
 * This is the model class for table "usuario_natural".
 *
 * The followings are the available columns in table 'usuario_natural':
 * @property integer $usuario_natural_id
 * @property integer $usuario_id
 * @property integer $estado_civil_id
 * @property integer $pais_id
 * @property integer $region_id
 * @property integer $ciudad_id
 * @property integer $comuna_id
 * @property string $direccion
 * @property integer $telefono_fijo_codigo
 * @property string $telefono_fijo
 * @property integer $telefono_celular_codigo
 * @property string $telefono_celular
 * @property string $email
 * @property string $imagen
 */
class UsuarioNatural extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario_natural';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('usuario_id,', 'required'),
            array('usuario_id, estado_civil_id, pais_id, region_id, ciudad_id, comuna_id', 'numerical', 'integerOnly' => true),
            array('telefono_fijo, telefono_celular', 'length', 'min' => 9, 'max' => 50),
            array('email', 'length', 'min' => 5, 'max' => 50),
            array('email', 'email'),
            array('imagen', 'length', 'max' => 255),
            array('direccion', 'length', 'max' => 4000),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('usuario_natural_id, usuario_id, estado_civil_id, , pais_id, region_id, ciudad_id, comuna_id, direccion,  telefono_fijo, telefono_celular, email, imagen', 'safe', 'on' => 'search'),
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
            'estado_civil' => array(self::BELONGS_TO, 'EstadoCivil', 'estado_civil_id'),
            'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
            'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
            'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
            'comuna' => array(self::BELONGS_TO, 'Comuna', 'comuna_id'),
          );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'usuario_natural_id' => 'Usuario Natural',
            'usuario_id' => 'Usuario',
            'estado_civil_id' => 'Estado Civil',
            'pais_id' => 'Pais',
            'region_id' => 'Region',
            'ciudad_id' => 'Ciudad',
            'comuna_id' => 'Comuna',
            'direccion' => 'Direccion',
            'telefono_fijo' => 'Telefono Fijo',
            'telefono_celular' => 'Telefono Celular',
            'email' => 'Email',
            'imagen' => 'Imagen',
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

        $criteria->compare('usuario_natural_id', $this->usuario_natural_id);
        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('estado_civil_id', $this->estado_civil_id);
        $criteria->compare('pais_id', $this->pais_id);
        $criteria->compare('region_id', $this->region_id);
        $criteria->compare('ciudad_id', $this->ciudad_id);
        $criteria->compare('comuna_id', $this->comuna_id);
        $criteria->compare('direccion', $this->direccion);
        $criteria->compare('telefono_fijo', $this->telefono_fijo, true);
        $criteria->compare('telefono_celular', $this->telefono_celular, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('imagen', $this->imagen, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UsuarioNatural the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
