<?php

class CiudadController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'manage'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionManage($id) {

        $model = new Ciudad();
        $modeloRegion = Region::model()->findByPk($id);
        $model->setAttribute('region_id', $id);
        $model->setAttribute('pais_id', $modeloRegion->pais_id);
        $model->setAttribute('nombre', $modeloRegion->pais->nombre);
        
        
        $criteria = new CDbCriteria;
        $criteria->addInCondition('region_id', array($id));
        $listCiudad = CHtml::listData(Ciudad::model()->findAll($criteria), 'ciudad_id', 'nombre');


        $this->render('manage', array(
            'model' => $model,
            'listCiudad' => $listCiudad,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $model = new Ciudad();
        $modelRegion = Region::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Ciudad'])) {
            $model->attributes = $_POST['Ciudad'];
            if ($model->save())
                $this->redirect(array('admin', 'pais_id' => $model->pais_id, 'region_id' => $model->region_id));
        }

        $criteria = new CDbCriteria;
        $criteria->compare('pais_id', $modelRegion->pais_id);
        $aryPais = Pais::model()->findAll($criteria);
        if (count($aryPais) > 0) {
            $listPais = CHtml::listData($aryPais, 'pais_id', 'nombre');
        } else {
            $listPais = CHtml::listData(array(), 'pais_id', 'nombre');
        }


        $criteria = new CDbCriteria;
        $criteria->compare('region_id', $modelRegion->region_id);
        $aryRegion = Region::model()->findAll($criteria);
        if (count($aryRegion) > 0) {
            $listRegion = CHtml::listData($aryRegion, 'region_id', 'nombre');
        } else {
            $listRegion = CHtml::listData(array(), 'region_id', 'nombre');
        }

        $model->setAttribute('pais_id', $modelRegion->pais_id);
        $model->setAttribute('region_id', $modelRegion->region_id);

        $this->render('create', array(
            'model' => $model,
            'listPais' => $listPais,
            'listRegion' => $listRegion,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Ciudad'])) {
            $model->attributes = $_POST['Ciudad'];
            if ($model->save())
                $this->redirect(array('admin', 'pais_id' => $model->pais_id, 'region_id' => $model->region_id));
        }


        $listPais = CHtml::listData(Pais::model()->findAll(), 'pais_id', 'nombre');

        $criteria = new CDbCriteria;
        $criteria->compare('pais_id', $model->pais_id);
        $aryRegion = Region::model()->findAll($criteria);
        if (count($aryRegion) > 0) {
            $listRegion = CHtml::listData($aryRegion, 'region_id', 'nombre');
        } else {
            $listRegion = CHtml::listData(array(), 'region_id', 'nombre');
        }

        $this->render('update', array(
            'model' => $model,
            'listPais' => $listPais,
            'listRegion' => $listRegion,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Ciudad');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($pais_id=null,$region_id=null) {
        $model = new Ciudad('search');
        $model->unsetAttributes();  // clear any default values
        $model->setAttribute('pais_id', $pais_id);
        $model->setAttribute('region_id', $region_id);
        
        if (isset($_GET['Ciudad']))
            $model->attributes = $_GET['Ciudad'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Ciudad the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Ciudad::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Ciudad $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ciudad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
