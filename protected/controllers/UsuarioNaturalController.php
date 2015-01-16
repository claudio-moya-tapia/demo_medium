<?php

class UsuarioNaturalController extends Controller {

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
            //'postOnly + delete', // we only allow deletion via POST request
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
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'ajaxCiudad', 'ajaxComuna', 'delete'),
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
      
        $criteria = new CDbCriteria;
        $criteria->compare('t.usuario_id', $id);

        $model = UsuarioNatural::model()
                ->with('usuario')
                ->with('estado_civil')
                ->with('pais')
                ->with('region')
                ->with('ciudad')
                ->with('comuna')
                ->find($criteria);

        if ($model == null) {
            $model = new UsuarioNatural();
            $model->usuario_id = $id;
        }

        $model->imagen = Yii::app()->baseUrl . $model->imagen;

        $this->render('view', array(
            'model' => $model
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {

        $model = new UsuarioNatural;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['UsuarioNatural'])) {
            $model->attributes = $_POST['UsuarioNatural'];

            $model->setAttribute('telefono_fijo', $this->stringFormat->clearTelefono($_POST['UsuarioNatural']['telefono_fijo']));
            $model->setAttribute('telefono_celular', $this->stringFormat->clearCelular($_POST['UsuarioNatural']['telefono_celular']));

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->usuario_id));
        }

        $model->usuario_id = $id;
        $aryTelefonoCodigo = array(2,32,33,34,35,39,41,42,43,45,51,52,53,55,56,57,58,61,63,64,65,67,71,72,73,75);
        $aryCelularCodigo = array(9,8,7,6,5,4,3,2,1);
        $criteria = new CDbCriteria();
        $criteria->order = 'nombre';
        $listEstadoCivil = CHtml::listData(EstadoCivil::model()->findAll($criteria), 'estado_civil_id', 'nombre');
        $listPais = CHtml::listData(Pais::model()->findAll($criteria), 'pais_id', 'nombre');
        $listRegion = CHtml::listData(array(), 'region_id', 'nombre');
        $listCiudad = CHtml::listData(array(), 'ciudad_id', 'nombre');
        $listComuna = CHtml::listData(array(), 'comuna_id', 'nombre');
        $this->render('create', array(
            'model' => $model,
            'listEstadoCivil' => $listEstadoCivil,
            'listPais' => $listPais,
            'listRegion' => $listRegion,
            'listCiudad' => $listCiudad,
            'listComuna' => $listComuna,
            'aryTelefonoCodigo'=> $aryTelefonoCodigo,
            'aryCelularCodigo'=> $aryCelularCodigo,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $model = $this->loadModel($id)
                ->with('usuario')
                ->with('estado_civil')
                ->with('pais')
                ->with('region')
                ->with('ciudad')
                ->with('comuna');

        if (isset($_POST['UsuarioNatural'])) {

            $model->attributes = $_POST['UsuarioNatural'];
            
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->usuario_id));
            }
        }
        
        $aryTelefonoCodigo = array(2,32,33,34,35,39,41,42,43,45,51,52,53,55,56,57,58,61,63,64,65,67,71,72,73,75);
        $aryCelularCodigo = array(9,8,7,6,5,4,3,2,1);

        $criteria = new CDbCriteria();
        $criteria->order = 'nombre';
        $listEstadoCivil = CHtml::listData(EstadoCivil::model()->findAll($criteria), 'estado_civil_id', 'nombre');
        $listPais = CHtml::listData(Pais::model()->findAll($criteria), 'pais_id', 'nombre');
        
        $criteria = new CDbCriteria;
        $criteria->compare('pais_id', $model->pais_id);
        $criteria->order = 'nombre';
        $aryRegion = Region::model()->findAll($criteria);
        
        if (count($aryRegion) > 0) {
            $listRegion = CHtml::listData($aryRegion, 'region_id', 'nombre');
        } else {
            $listRegion = CHtml::listData(array(), 'region_id', 'nombre');
        }
        
        $criteria = new CDbCriteria;
        $criteria->compare('region_id', $model->region_id);
        $criteria->order = 'nombre';
        $aryCiudad = Ciudad::model()->findAll($criteria);

        if (count($aryCiudad) > 0) {
            $listCiudad = CHtml::listData($aryCiudad, 'ciudad_id', 'nombre');
        } else {
            $listCiudad = CHtml::listData(array(), 'ciudad_id', 'nombre');
        }

        $criteria = new CDbCriteria;
        $criteria->compare('ciudad_id', $model->ciudad_id);
        $criteria->order = 'nombre';
        $aryComuna = Comuna::model()->findAll($criteria);

        if (count($aryComuna) > 0) {
            $listComuna = CHtml::listData($aryComuna, 'comuna_id', 'nombre');
        } else {
            $listComuna = CHtml::listData(array(), 'comuna_id', 'nombre');
        }

        $this->render('update', array(
            'model' => $model,
            'listEstadoCivil' => $listEstadoCivil,
            'listPais' => $listPais,
            'listRegion' => $listRegion,
            'listCiudad' => $listCiudad,
            'listComuna' => $listComuna,
            'aryTelefonoCodigo'=> $aryTelefonoCodigo,
            'aryCelularCodigo'=> $aryCelularCodigo,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = UsuarioNatural::model()->findByPk($id);
        $this->loadModel($id)->delete();

        $this->redirect(array('view','id' => $model->usuario_id));
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//        if (!isset($_GET['ajax']))
//            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view','id' => $model->usuario_id));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('UsuarioNatural');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UsuarioNatural('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UsuarioNatural']))
            $model->attributes = $_GET['UsuarioNatural'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UsuarioNatural the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UsuarioNatural::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UsuarioNatural $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-natural-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
