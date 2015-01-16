<?php

/**
 * This is the model class for table "login".
 *
 * The followings are the available columns in table 'login':
 * @property integer $login_id
 * @property string $user_name
 * @property string $user_pass
 * @property string $last_login_time
 */
class Login extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'login';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_name, user_pass, last_login_time', 'required'),
            array('user_name, user_pass', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('login_id, user_name, user_pass, last_login_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'login_id' => 'Login',
            'user_name' => 'User Name',
            'user_pass' => 'User Pass',
            'last_login_time' => 'Last Login Time',
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

        $criteria->compare('login_id', $this->login_id);
        $criteria->compare('user_name', $this->user_name, true);
        $criteria->compare('user_pass', $this->user_pass, true);
        $criteria->compare('last_login_time', $this->last_login_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Login the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
