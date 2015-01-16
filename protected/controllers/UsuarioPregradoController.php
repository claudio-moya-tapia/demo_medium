<?php

class UsuarioPregradoController extends Controller {

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
    
    public function actionList($id) {

        $usuario = Usuario::model()->findByPk($id);
        
        $criteria = new CDbCriteria;
        $criteria->compare('t.usuario_id', $id);

        $aryUsuarioPregrado = UsuarioPregrado::model()
                ->with('usuario')
                ->with('institucion')
                ->with('carrera')
                ->findAll($criteria);

        $this->render('list', array(
            'usuario'=>$usuario,
            'aryUsuarioPregrado' => $aryUsuarioPregrado,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        
        $model = UsuarioPregrado::model()
                ->with('usuario')
                ->with('institucion')
                ->with('carrera')
                ->findByPk($id);
        
        $usuario = Usuario::model()->findByPk($model->usuario_id);
        
        $this->render('view', array(
            'model' => $model,
            'usuario' => $usuario
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $model = new UsuarioPregrado;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['UsuarioPregrado'])) {
            $model->attributes = $_POST['UsuarioPregrado'];
            $model->setAttribute('fecha_egreso', $this->stringFormat->clearFecha($_POST['UsuarioPregrado']['fecha_egreso']));
            $model->setAttribute('fecha_titulacion', $this->stringFormat->clearFecha($_POST['UsuarioPregrado']['fecha_titulacion']));

            if ($model->save())
                $this->redirect(array('list', 'id' => $model->usuario_id));
        }
        
        $model->usuario_id = $id;
        $usuario = Usuario::model()->findByPk($id);
        
        $criteria = new CDbCriteria;        
        $criteria->order = 'nombre';
        
        $listInstitucion = CHtml::listData(Institucion::model()->findAll($criteria), 'institucion_id', 'nombre');
        $listCarreras = CHtml::listData(Carrera::model()->findAll($criteria), 'carrera_id', 'nombre');
       
        $this->render('create', array(
            'model' => $model,
            'usuario' => $usuario,
            'listInstitucion' => $listInstitucion,
            'listCarreras' => $listCarreras,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['UsuarioPregrado'])) {
            $model->attributes = $_POST['UsuarioPregrado'];
            
            $model->setAttribute('fecha_egreso', $this->stringFormat->clearFecha($_POST['UsuarioPregrado']['fecha_egreso']));
            $model->setAttribute('fecha_titulacion', $this->stringFormat->clearFecha($_POST['UsuarioPregrado']['fecha_titulacion']));

            if ($model->save()){
               $this->redirect(array('list', 'id' => $model->usuario_id));                
            }            
        }
        
        $usuario = Usuario::model()->findByPk($model->usuario_id);
        
        $model->setAttribute('fecha_egreso', $this->stringFormat->applyFecha($model->getAttribute('fecha_egreso')));
        $model->setAttribute('fecha_titulacion', $this->stringFormat->applyFecha($model->getAttribute('fecha_titulacion')));
        
        $criteria = new CDbCriteria;
        $criteria->compare('institucion_id', $model->institucion_id);
        $criteria->order = 'nombre';
        $listInstitucion = CHtml::listData(Institucion::model()->findAll(), 'institucion_id', 'nombre');
        
       
        $criteria = new CDbCriteria;
        $criteria->compare('carrera_id', $model->carrera_id);
        $criteria->order = 'nombre';
        $listCarreras = CHtml::listData(Carrera::model()->findAll(), 'carrera_id', 'nombre');


        $this->render('update', array(
            'model' => $model,
            'usuario'=>$usuario,
            'listInstitucion' => $listInstitucion,
            'listCarreras' => $listCarreras,
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
        $dataProvider = new CActiveDataProvider('UsuarioPregrado');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UsuarioPregrado('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UsuarioPregrado']))
            $model->attributes = $_GET['UsuarioPregrado'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UsuarioPregrado the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UsuarioPregrado::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UsuarioPregrado $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-pregrado-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
