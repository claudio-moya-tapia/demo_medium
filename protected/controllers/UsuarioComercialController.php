<?php

class UsuarioComercialController extends Controller {

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
                'actions' => array('create', 'update', 'list'),
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
        $model = UsuarioLaboral::model()
                ->with('usuario')
                ->with('empresa')
                ->with('industria')
                ->with('area_experiencia')
                ->with('cargo')
                ->with('actual')
                ->findByPk($id);

        $usuario = Usuario::model()->findByPk($model->usuario_id);

        $this->render('view', array(
            'model' => $model,
            'usuario' => $usuario
        ));
    }

    public function actionList($id) {

        $usuario = Usuario::model()->findByPk($id);
        $criteria = new CDbCriteria;
        $criteria->compare('t.usuario_id', $id);
        $criteria->compare('t.actual_id', '1');
        $aryUsuarioComercial = UsuarioLaboral::model()
                ->with('usuario')
                ->with('empresa')
                ->with('industria')
                ->with('area_experiencia')
                ->with('cargo')
                ->with('actual')
                ->findAll($criteria);

        $this->render('list', array(
            'usuario' => $usuario,
            'aryUsuarioComercial' => $aryUsuarioComercial,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $model = new UsuarioLaboral;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['UsuarioLaboral'])) {
            
            $usuariosLaboral = UsuarioLaboral::model()->findAll($id);
            foreach ($usuariosLaboral as $item) {
               $Newusuario = UsuarioLaboral::model()->findByPk($item->usuario_laboral_id);
               $Newusuario->actual_id = 2;
               $Newusuario->update();
            }
            
            $model->attributes = $_POST['UsuarioLaboral'];
            $model->setAttribute('fecha_ingreso', $this->stringFormat->clearFecha($_POST['UsuarioLaboral']['fecha_ingreso']));
            $model->setAttribute('fecha_egreso', $this->stringFormat->clearFecha($_POST['UsuarioLaboral']['fecha_egreso']));
            
            
            if ($model->save())
                $this->redirect(array('list', 'id' => $model->usuario_id));
        }

        $model->usuario_id = $id;
        $usuario = Usuario::model()->findByPk($id);
        $criteria = new CDbCriteria;
        $criteria->order = 'nombre ASC';
        $listEmpresa = CHtml::listData(Empresa::model()->findAll($criteria), 'empresa_id', 'nombre');
        
        $criteria = new CDbCriteria;
        $criteria->order = 'titulo ASC';
        $listIndustria = CHtml::listData(Industria::model()->findAll($criteria), 'industria_id', 'titulo');
        
        
        $criteria = new CDbCriteria;
        $criteria->order = 'titulo ASC';
        $listAreaExperiencia = CHtml::listData(AreaExperiencia::model()->findAll($criteria), 'area_experiencia_id', 'titulo');
        
        $listCargo = CHtml::listData(Cargo::model()->findAll($criteria), 'cargo_id', 'titulo');

        $this->render('create', array(
            'model' => $model,
            'usuario' => $usuario,
            'listEmpresa' => $listEmpresa,
            'listIndustria' => $listIndustria,
            'listAreaExperiencia' => $listAreaExperiencia,
            'listCargo' => $listCargo,
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

        if (isset($_POST['UsuarioLaboral'])) {

            $model->attributes = $_POST['UsuarioLaboral'];
            $model->setAttribute('fecha_ingreso', $this->stringFormat->clearFecha($_POST['UsuarioLaboral']['fecha_ingreso']));
            $model->setAttribute('fecha_egreso', $this->stringFormat->clearFecha($_POST['UsuarioLaboral']['fecha_egreso']));
            if ($model->save())
                $this->redirect(array('list', 'id' => $model->usuario_id));
        }

        $model->setAttribute('fecha_ingreso', $this->stringFormat->applyFecha($model->getAttribute('fecha_ingreso')));
        $model->setAttribute('fecha_egreso', $this->stringFormat->applyFecha($model->getAttribute('fecha_egreso')));

        $usuario = Usuario::model()->findByPk($model->usuario_id);
                
        $criteria = new CDbCriteria;
        $criteria->order = 'nombre';
        $listEmpresa = CHtml::listData(Empresa::model()->findAll($criteria), 'empresa_id', 'nombre');
        
        $criteria = new CDbCriteria;
        $criteria->order = 'titulo ASC';
        $listIndustria = CHtml::listData(Industria::model()->findAll($criteria), 'industria_id', 'titulo');
        
        
        $criteria = new CDbCriteria;
        $criteria->order = 'titulo';
        $listAreaExperiencia = CHtml::listData(AreaExperiencia::model()->findAll($criteria), 'area_experiencia_id', 'titulo');
        $listCargo = CHtml::listData(Cargo::model()->findAll($criteria), 'cargo_id', 'titulo');

        $this->render('update', array(
            'model' => $model,
            'usuario'=>$usuario,
            'listEmpresa' => $listEmpresa,
            'listIndustria' => $listIndustria,
            'listAreaExperiencia' => $listAreaExperiencia,
            'listCargo' => $listCargo,
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
        $dataProvider = new CActiveDataProvider('UsuarioComercial');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UsuarioLaboral('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UsuarioComercial']))
            $model->attributes = $_GET['UsuarioComercial'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UsuarioLaboral the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UsuarioLaboral::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UsuarioLaboral $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-comercial-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
