<?php

class UsuarioIdiomaController extends Controller {

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

        $aryUsuarioIdioma = UsuarioIdioma::model()
                ->with('usuario')
                ->with('idioma')
                ->with('idiomanivel')
                ->findAll($criteria);

        $this->render('list', array(
            'usuario' => $usuario,
            'aryUsuarioIdioma' => $aryUsuarioIdioma,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        
        $model = UsuarioIdioma::model()->findByPk($id);
        $usuario = Usuario::model()                                
                ->findByPk($model->usuario_id);
                
        $model->setAttribute('fecha_cursado', $this->stringFormat->applyFecha($model->getAttribute('fecha_cursado')));
        
        $this->render('view', array(
            'model' => $model,
            'usuario' => $usuario,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $model = new UsuarioIdioma();
        $model->usuario_id = $id;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['UsuarioIdioma'])) {
            $model->attributes = $_POST['UsuarioIdioma'];
            $model->setAttribute('fecha_cursado', $this->stringFormat->clearFecha($model->getAttribute('fecha_cursado')));
            if ($model->save())
                $this->redirect(array('list', 'id' => $model->usuario_id));
        }
        
        $usuario = Usuario::model()->findByPk($model->usuario_id);
        $ListIdiomas = CHtml::listData(Idioma::model()->findAll(), 'idioma_id', 'nombre');
        $ListNiveles = CHtml::listData(IdiomaNivel::model()->findAll(), 'idioma_nivel_id', 'nombre');

        $this->render('create', array(
            'model' => $model,
            'usuario' => $usuario,
            'ListIdiomas' => $ListIdiomas,
            'ListNiveles' => $ListNiveles,
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
        $ListIdiomas = CHtml::listData(Idioma::model()->findAll(), 'idioma_id', 'nombre');
        $ListNiveles = CHtml::listData(IdiomaNivel::model()->findAll(), 'idioma_nivel_id', 'nombre');

        if (isset($_POST['UsuarioIdioma'])) {
            $model->attributes = $_POST['UsuarioIdioma'];
            
            $model->setAttribute('fecha_cursado', $this->stringFormat->clearFecha($model->getAttribute('fecha_cursado')));
            
            if ($model->save())
                $this->redirect(array('list', 'id' => $model->usuario_id));
        }

        $usuario = Usuario::model()->findByPk($model->usuario_id);
        
        $model->setAttribute('fecha_cursado', $this->stringFormat->applyFecha($model->getAttribute('fecha_cursado')));
        
        $this->render('update', array(
            'model' => $model,
            'usuario' => $usuario,
            'ListIdiomas' => $ListIdiomas,
            'ListNiveles' => $ListNiveles,
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
        $dataProvider = new CActiveDataProvider('UsuarioIdioma');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UsuarioIdioma('search');
        $model->unsetAttributes();  // clear any default values
        
        if (isset($_GET['UsuarioIdioma']))
            $model->attributes = $_GET['UsuarioIdioma'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UsuarioIdioma the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UsuarioIdioma::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UsuarioIdioma $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-idioma-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
