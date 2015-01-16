<?php

class XmlInstitucionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
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
        foreach ($xml->puc->institucion->listado as $institucion) {
            
                        $sqlCarrera = "SELECT * FROM institucion WHERE institucion_vertical_id = " . $institucion->id . "";
                        $dataReader = Yii::app()->db->createCommand($sqlCarrera)->queryAll();
                         if (count($dataReader) == 0) {
                            $InsertInstitucion = new Institucion();
                            $InsertInstitucion->institucion_vertical_id = $institucion->id;
                            $InsertInstitucion->nombre = trim(strtolower($institucion->valor));
                            $InsertInstitucion->insert(); 
                         }else{
                           $modelInstitucion = Institucion::model()->findByPk($dataReader[0]["institucion_id"]);
                           $modelInstitucion->nombre = strtolower($institucion->valor);
                           $modelInstitucion->save(); 
                         }
            }
        
    }

}
