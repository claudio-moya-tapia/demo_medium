<?php

class UsuarioDocenteController extends Controller {

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
                'actions' => array('create', 'update'),
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

        $model = UsuarioDocente::model()
                ->with('usuario')
                ->with('tipo_docente')
                ->with('tipo_area_especialidad')
                ->with('tipo_estado_laboral_docente')
                ->find($criteria);

        if ($model == null) {
            $model = new UsuarioDocente();
            $model->usuario_id = $id;
        }

        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $model = new UsuarioDocente;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model->usuario_id = $id;
        $listTipoDocente = CHtml::listData(TipoDocente::model()->findAll(), 'tipo_docente_id', 'titulo');
        $listTipoAreaEspecialidad = CHtml::listData(TipoAreaEspecialidad::model()->findAll(), 'tipo_area_especialidad_id', 'titulo');
        $listTipoEstadoLaboralDocente = CHtml::listData(TipoEstadoLaboralDocente::model()->findAll(), 'tipo_estado_laboral_docente_id', 'titulo');

        if (isset($_POST['UsuarioDocente'])) {
            $model->attributes = $_POST['UsuarioDocente'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->usuario_id));
        }

        $this->render('create', array(
            'model' => $model,
            'listTipoDocente' => $listTipoDocente,
            'listTipoAreaEspecialidad' => $listTipoAreaEspecialidad,
            'listTipoEstadoLaboralDocente' => $listTipoEstadoLaboralDocente,
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

        $listTipoDocente = CHtml::listData(TipoDocente::model()->findAll(), 'tipo_docente_id', 'titulo');
        $listTipoAreaEspecialidad = CHtml::listData(TipoAreaEspecialidad::model()->findAll(), 'tipo_area_especialidad_id', 'titulo');
        $listTipoEstadoLaboralDocente = CHtml::listData(TipoEstadoLaboralDocente::model()->findAll(), 'tipo_estado_laboral_docente_id', 'titulo');

        if (isset($_POST['UsuarioDocente'])) {
            $model->attributes = $_POST['UsuarioDocente'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->usuario_id));
        }

        $this->render('update', array(
            'model' => $model,
            'listTipoDocente' => $listTipoDocente,
            'listTipoAreaEspecialidad' => $listTipoAreaEspecialidad,
            'listTipoEstadoLaboralDocente' => $listTipoEstadoLaboralDocente,
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
        $dataProvider = new CActiveDataProvider('UsuarioDocente');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UsuarioDocente('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UsuarioDocente']))
            $model->attributes = $_GET['UsuarioDocente'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UsuarioDocente the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UsuarioDocente::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UsuarioDocente $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-docente-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}