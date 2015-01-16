<?php

/**
 * This is the model class for table "usuario_idioma".
 *
 * The followings are the available columns in table 'usuario_idioma':
 * @property integer $usuario_idioma_id
 * @property integer $usuario_id
 * @property integer $idioma_id
 * @property integer $idioma_nivel_id
 * @property string $fecha_cursado
 */
class UsuarioIdioma extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_idioma';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, idioma_id, idioma_nivel_id', 'required'),
			array('usuario_id, idioma_id, idioma_nivel_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_idioma_id, usuario_id, idioma_id, idioma_nivel_id, fecha_cursado', 'safe', 'on'=>'search'),
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
                      'idioma' => array(self::BELONGS_TO, 'Idioma', 'idioma_id'),
                      'idiomanivel' => array(self::BELONGS_TO, 'IdiomaNivel', 'idioma_nivel_id'),
                      
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuario_idioma_id' => 'Usuario Idioma',
			'usuario_id' => 'Usuario',
			'idioma_id' => 'Idioma',
			'idioma_nivel_id' => 'Idioma Nivel',
			'fecha_cursado' => 'Fecha Cursado',
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

		$criteria->compare('usuario_idioma_id',$this->usuario_idioma_id);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('idioma_id',$this->idioma_id);
		$criteria->compare('idioma_nivel_id',$this->idioma_nivel_id);
		$criteria->compare('fecha_cursado',$this->fecha_cursado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioIdioma the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
