<?php

/**
 * This is the model class for table "usuario_interes".
 *
 * The followings are the available columns in table 'usuario_interes':
 * @property integer $usuario_interes_id
 * @property integer $usuario_id
 * @property integer $programa_estudio_id
 */
class UsuarioInteres extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_interes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, interes_id', 'required'),
			array('usuario_id, interes_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_interes_id, usuario_id, interes_id', 'safe', 'on'=>'search'),
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
                      'interes' => array(self::BELONGS_TO, 'Interes', 'interes_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuario_interes_id' => 'Usuario Interes',
			'usuario_id' => 'Usuario',
			'interes_id' => 'interes',
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

		$criteria->compare('usuario_interes_id',$this->usuario_interes_id);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('interes_id',$this->interes);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioInteres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
