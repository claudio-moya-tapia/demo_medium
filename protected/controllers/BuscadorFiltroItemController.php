<?php

class BuscadorFiltroItemController extends Controller {

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

    public function actionManage($id) {
        
        $cs = Yii::app()->clientScript;
        $cs->reset();
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/controller.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/config.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/buscadorfiltroitem.js');
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jszip/dist/jszip-utils.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jszip/dist/jszip.js');

        Yii::app()->clientScript->registerScript('config', 'Config.baseUrl = "' . Yii::app()->baseUrl . '";');  
            
        $jsClassName = str_replace('Controller', '', get_class(Yii::app()->getController()));
        $jsObjectName = lcfirst($jsClassName);

        Yii::app()->clientScript->registerScript(Yii::app()->controller->id.'_init', 'var '.$jsObjectName. ' = new '.$jsClassName.'();');
        Yii::app()->clientScript->registerScript(Yii::app()->controller->id, $jsObjectName . '.' . Yii::app()->controller->action->id . '();');

                
       
        if (isset($_POST['BuscadorFiltroItem'])) {

            $criteria = new CDbCriteria;
            $criteria->addInCondition('buscador_filtro_id', array($_POST['BuscadorFiltroItem']['buscador_filtro_id']));
            BuscadorFiltroItem::model()->deleteAll($criteria);

            if (count($_POST['BuscadorFiltroJQ']['tabla']) > 0) {
                $aryCheck = array();

                foreach ($_POST['BuscadorFiltroJQ']['tabla'] as $tabla => $aryTablaId) {
                    $aryCheck = explode('-', $aryTablaId);

                    foreach ($aryCheck as $item) {

                        if ($item != 0) {
                                $buscadorFiltroItem = new BuscadorFiltroItem();
                                $buscadorFiltroItem->buscador_filtro_id = $id;
                                $buscadorFiltroItem->tabla = $tabla;
                                $buscadorFiltroItem->tabla_id = $item;
                                $buscadorFiltroItem->insert();
                        }
                    }
                }
                echo"<script>alert('Su filtro se a guardado exitosamente')</script>";
            }
        }
        
        //
        $model = new BuscadorFiltroItem();
        $model->setAttribute('buscador_filtro_id', $id);

        $buscadorFiltro = BuscadorFiltro::model()->findByPk($id);
        
        
        $aryJson = array();   
        $sql = "SELECT *
                    FROM
                    buscador_filtro_item
                    WHERE buscador_filtro_id = ".$id."";
        
        $aryJson  = CJSON::encode(Yii::app()->db->createCommand($sql)->queryAll());

        //paso 1: cargar items de buscador en json_items (items guardados)

        $this->render('manage', array(
            'model' => $model,
            'aryJson'=> $aryJson,
            'buscadorFiltro' => $buscadorFiltro,

        ));
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new BuscadorFiltroItem;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BuscadorFiltroItem'])) {
            $model->attributes = $_POST['BuscadorFiltroItem'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->buscador_filtro_item_id));
        }

        $this->render('create', array(
            'model' => $model,
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

        if (isset($_POST['BuscadorFiltroItem'])) {
            $model->attributes = $_POST['BuscadorFiltroItem'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->buscador_filtro_item_id));
        }

        $this->render('update', array(
            'model' => $model,
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
        $dataProvider = new CActiveDataProvider('BuscadorFiltroItem');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new BuscadorFiltroItem('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BuscadorFiltroItem']))
            $model->attributes = $_GET['BuscadorFiltroItem'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return BuscadorFiltroItem the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = BuscadorFiltroItem::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param BuscadorFiltroItem $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'buscador-filtro-item-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
