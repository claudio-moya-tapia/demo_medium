<?php

class XmlCarreraController extends Controller {

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
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

   public function actionIndex() {
        Yii::app()->db->setActive(false);
        Yii::app()->db->connectionString = 'mysql:host=localhost;dbname=puc_temp';
        Yii::app()->db->username = 'root';
        Yii::app()->db->password = '$76rPucKsb20#';
        Yii::app()->db->setActive(true);
        $xml = simplexml_load_file("http://portal.mbauc.cl/iit-rayalab-service/xmlUsuariosListado");

        foreach ($xml->puc->carreras->listado as $carreras) {
                        $sqlCarrera = "SELECT * FROM carrera WHERE carrera_vertical_id = " . $carreras->id . "";
                        $dataReader = Yii::app()->db->createCommand($sqlCarrera)->queryAll();
                        if (count($dataReader) == 0) {
                            $InsertCarreras = new Carrera();
                            $InsertCarreras->carrera_vertical_id = $carreras->id;
                            $InsertCarreras->nombre = strtolower($carreras->valor);
                            $InsertCarreras->insert();
                        }else{
                           $modelCarrera = Carrera::model()->findByPk($dataReader[0]["carrera_id"]);
                           $modelCarrera->nombre = strtolower($carreras->valor);
                           $modelCarrera->save();
                        }
        
            }
        
    }
}
