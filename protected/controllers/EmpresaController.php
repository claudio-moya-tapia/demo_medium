<?php

class EmpresaController extends Controller {

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
                'actions' => array('create', 'update','ajaxSearch'),
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Empresa;

        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Empresa'])) {
            $model->attributes = $_POST['Empresa'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->empresa_id));
        }
   
        $listPais = CHtml::listData(Pais::model()->findAll(), 'pais_id', 'nombre');
        $listRegion = CHtml::listData(array(), 'region_id', 'nombre');
        $listCiudad = CHtml::listData(array(), 'ciudad_id', 'nombre');
        $listComuna = CHtml::listData(array(), 'comuna_id', 'nombre');
        
        $listTipoSociedad = CHtml::listData(TipoSociedad::model()->findAll(), 'tipo_sociedad_id', 'titulo');
        $listTipoAntiguedad = CHtml::listData(TipoAntiguedad::model()->findAll(), 'tipo_antiguedad_id', 'titulo');
        $listRangoEmpleado = CHtml::listData(RangoEmpleado::model()->findAll(), 'rango_empleado_id', 'titulo');
        $listRangoUtilidad = CHtml::listData(RangoUtilidad::model()->findAll(), 'rango_utilidad_id', 'titulo');
        $listRangoPerdida = CHtml::listData(RangoPerdida::model()->findAll(), 'rango_perdida_id', 'titulo');
        $listRangoFacturacion = CHtml::listData(RangoFacturacion::model()->findAll(), 'rango_facturacion_id', 'titulo');
        $listGiro = CHtml::listData(TipoGiro::model()->findAll(), 'tipo_giro_id', 'titulo');     
        $this->render('create', array(
            'model' => $model,
            'listPais' => $listPais,
            'listRegion' => $listRegion,
            'listCiudad' => $listCiudad,
            'listComuna' => $listComuna,
            'listTipoSociedad' => $listTipoSociedad,
            'listTipoAntiguedad'=> $listTipoAntiguedad,
            'listRangoEmpleado'=> $listRangoEmpleado,
            'listRangoUtilidad'=>$listRangoUtilidad,
            'listRangoPerdida'=>$listRangoPerdida,
            'listRangoFacturacion'=>$listRangoFacturacion,
            'listGiro' => $listGiro
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

        if (isset($_POST['Empresa'])) {
            $model->attributes = $_POST['Empresa'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->empresa_id));
        }

        $listPais = CHtml::listData(Pais::model()->findAll(), 'pais_id', 'nombre');
        $listRegion = CHtml::listData(Region::model()->findAll(), 'region_id', 'nombre');
        $listTipoSociedad = CHtml::listData(TipoSociedad::model()->findAll(), 'tipo_sociedad_id', 'titulo');
        $listTipoAntiguedad = CHtml::listData(TipoAntiguedad::model()->findAll(), 'tipo_antiguedad_id', 'titulo');
        $listRangoEmpleado = CHtml::listData(RangoEmpleado::model()->findAll(), 'rango_empleado_id', 'titulo');
        $listRangoUtilidad = CHtml::listData(RangoUtilidad::model()->findAll(), 'rango_utilidad_id', 'titulo');
        $listRangoPerdida = CHtml::listData(RangoPerdida::model()->findAll(), 'rango_perdida_id', 'titulo');
        $listRangoFacturacion = CHtml::listData(RangoFacturacion::model()->findAll(), 'rango_facturacion_id', 'titulo');       
        $listGiro = CHtml::listData(TipoGiro::model()->findAll(), 'tipo_giro_id', 'titulo');       
        $criteria = new CDbCriteria;
        $criteria->compare('region_id', $model->region_id);
        $aryCiudad = Ciudad::model()->findAll($criteria);

        if (count($aryCiudad) > 0) {
            $listCiudad = CHtml::listData($aryCiudad, 'ciudad_id', 'nombre');
        } else {
            $listCiudad = CHtml::listData(array(), 'ciudad_id', 'nombre');
        }

        $criteria = new CDbCriteria;
        $criteria->compare('ciudad_id', $model->ciudad_id);
        $aryComuna = Comuna::model()->findAll($criteria);

        if (count($aryComuna) > 0) {
            $listComuna = CHtml::listData($aryComuna, 'comuna_id', 'nombre');
        } else {
            $listComuna = CHtml::listData(array(), 'comuna_id', 'nombre');
        }
        
        $this->render('update', array(
            'model' => $model,
            'listPais' => $listPais,
            'listRegion' => $listRegion,
            'listCiudad' => $listCiudad,
            'listComuna' => $listComuna,
            'listTipoSociedad' => $listTipoSociedad,
            'listTipoAntiguedad'=> $listTipoAntiguedad,   
            'listRangoEmpleado'=> $listRangoEmpleado,
            'listRangoUtilidad'=>$listRangoUtilidad,
            'listRangoPerdida'=>$listRangoPerdida,
            'listRangoFacturacion'=>$listRangoFacturacion,
            'listGiro' => $listGiro
        ));
    }
    
    public function actionAjaxSearch($id) {
        
        $rut = Yii::app()->rut->addFormat($id);
        
        $criteria = new CDbCriteria;
        $criteria->compare('rut', $rut);

        $Empresa = Empresa::model()->find($criteria);

        if ($Empresa === null) {
            $response = array(
                'empresa_id' => 0
            );
        } else {
            $response = array(
                'empresa_id' => $Empresa->empresa_id
            );
        }

        $this->layout = false;
        echo CJSON::encode($response);
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
        $dataProvider = new CActiveDataProvider('Empresa');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Empresa('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Empresa']))
            $model->attributes = $_GET['Empresa'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Empresa the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Empresa::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Empresa $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'empresa-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}










