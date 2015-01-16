<?php

/**
 * This is the model class for table "tipo_situacion_postgrado".
 *
 * The followings are the available columns in table 'tipo_situacion_postgrado':
 * @property integer $tipo_situacion_postgrado_id
 * @property string $titulo
 * @property integer $tipo_situacion_postgrado_vertical_id
 */
class TipoSituacionPostgrado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_situacion_postgrado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, tipo_situacion_postgrado_vertical_id', 'required'),
			array('tipo_situacion_postgrado_vertical_id', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tipo_situacion_postgrado_id, titulo, tipo_situacion_postgrado_vertical_id', 'safe', 'on'=>'search'),
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
			'tipo_situacion_postgrado_id' => 'Tipo Situacion Postgrado',
			'titulo' => 'Titulo',
			'tipo_situacion_postgrado_vertical_id' => 'Tipo Situacion Postgrado Vertical',
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

		$criteria->compare('tipo_situacion_postgrado_id',$this->tipo_situacion_postgrado_id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('tipo_situacion_postgrado_vertical_id',$this->tipo_situacion_postgrado_vertical_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoSituacionPostgrado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
