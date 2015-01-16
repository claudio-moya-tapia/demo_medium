<?php

class UsuarioInteresController extends Controller {

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
                'actions' => array('create', 'update', 'manage','list'),
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
        $criteria->order = 'interes.nombre';

        $aryUsuarioInteres = UsuarioInteres::model()
                ->with('usuario')
                ->with('interes')
                ->findAll($criteria);
       
      
        $this->render('list', array(
            'usuario' => $usuario,
            'aryUsuarioInteres' => $aryUsuarioInteres,
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

    public function actionManage($id) {

        $model = new UsuarioInteres();
        $model->usuario_id = $id;

        if (isset($_POST['UsuarioInteres'])) {

            $criteria = new CDbCriteria;
            $criteria->addInCondition('usuario_id', array($id));
            UsuarioInteres::model()->deleteAll($criteria);

            if (count($_POST['UsuarioInteres']['interes']) > 0) {

                foreach ($_POST['UsuarioInteres']['interes'] as $interes) {

                    $usuarioInteres = new UsuarioInteres();
                    $usuarioInteres->usuario_id = $id;
                    $usuarioInteres->interes_id = $interes;
                    $usuarioInteres->insert();
                }
            }
            $this->redirect(array('list', 'id' => $model->usuario_id));
        }
        
        $usuario = Usuario::model()->findByPk($id);

        $criteria = new CDbCriteria;
        $criteria->order = 'nombre ASC';
        $listIntereses = CHtml::listData(Interes::model()->findAll($criteria), 'interes_id', 'nombre');
                
        $criteria = new CDbCriteria;
        $criteria->addInCondition('usuario_id', array($id));
        $listUsuarioIntereses = CHtml::listData(UsuarioInteres::model()->findAll($criteria), 'interes_id', 'interes_id');

        $this->render('manage', array(
            'model' => $model,
            'usuario' => $usuario,
            'listIntereses' => $listIntereses,
            'listUsuarioIntereses' => $listUsuarioIntereses
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new UsuarioInteres;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['UsuarioInteres'])) {
            $model->attributes = $_POST['UsuarioInteres'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->usuario_interes_id));
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

        if (isset($_POST['UsuarioInteres'])) {
            $model->attributes = $_POST['UsuarioInteres'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->usuario_interes_id));
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
        $dataProvider = new CActiveDataProvider('UsuarioInteres');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UsuarioInteres('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UsuarioInteres']))
            $model->attributes = $_GET['UsuarioInteres'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UsuarioInteres the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UsuarioInteres::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UsuarioInteres $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-interes-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
