<?php

/**
 * This is the model class for table "tipo_estado_usuario_historico".
 *
 * The followings are the available columns in table 'tipo_estado_usuario_historico':
 * @property integer $tipo_estado_usuario_historico_id
 * @property string $fecha_creacion
 * @property integer $tipo_usuario_id
 * @property integer $uduario_id
 */
class TipoEstadoUsuarioHistorico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_estado_usuario_historico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_creacion, tipo_usuario_id, uduario_id', 'required'),
			array('tipo_usuario_id, uduario_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tipo_estado_usuario_historico_id, fecha_creacion, tipo_usuario_id, uduario_id', 'safe', 'on'=>'search'),
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
			'tipo_estado_usuario_historico_id' => 'Tipo Estado Usuario Historico',
			'fecha_creacion' => 'Fecha Creacion',
			'tipo_usuario_id' => 'Tipo Usuario',
			'uduario_id' => 'Uduario',
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

		$criteria->compare('tipo_estado_usuario_historico_id',$this->tipo_estado_usuario_historico_id);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('tipo_usuario_id',$this->tipo_usuario_id);
		$criteria->compare('uduario_id',$this->uduario_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoEstadoUsuarioHistorico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
