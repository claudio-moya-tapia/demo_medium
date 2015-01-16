<?php

class EmpresasTempController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EmpresasTemp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmpresasTemp']))
		{
			$model->attributes=$_POST['EmpresasTemp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->empresa_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmpresasTemp']))
		{
			$model->attributes=$_POST['EmpresasTemp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->empresa_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	  $listEmpresas = EmpresaJsonTemp::model()->findAll();

           foreach ($listEmpresas as $puntero) {
               
              $nombre = $this->stringFormat->applyCamelcase($puntero->nombre);  
              $Empresa = new Empresa();
              $Empresa->industria_id = 0;
             
              if(Pais::model()->exists('nombre = :nombre', array(":nombre"=> trim($puntero->pais_valor))))
                {
                  $criteria = new CDbCriteria;
                  $criteria->compare('nombre', $puntero->pais_valor);
                  $pais_id = Pais::model()->findAll($criteria);
                  $Empresa->pais_id = $pais_id[0]->pais_id;

                }else{
                   $Empresa->pais_id = 0;  
                }
                    $rutDelete = Yii::app()->rut->deleteFormat($puntero->rut);
                if($puntero->rut != 0){
                 $rutAdd =  Yii::app()->rut->addFormat($rutDelete);
                 $Empresa->rut = $rutAdd;
                }else{
                    $Empresa->rut = '';
                }
              $Empresa->region_id = 0;
              $Empresa->ciudad_id = 0;
              $Empresa->comuna_id = 0;
              $Empresa->tipo_sociedad_id = 0;
              $Empresa->nombre = $nombre;
              $Empresa->direccion = $puntero->direccion;
              $Empresa->url = $puntero->sitio_web;
              $Empresa->tipo_antiguedad_id = 0;
              $Empresa->rango_empleado_id = 0;
              $Empresa->rango_utilidad_id = 0;
              $Empresa->rango_perdida_id = 0;
              $Empresa->rango_facturacion_id = 0;
              $Empresa->telefono_fijo = $puntero->telefono;
              $Empresa->telefono_celular = $puntero->telefono;
              $Empresa->telefono_fax = $puntero->fax;
              
              $Empresa->insert();
              
            }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmpresasTemp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmpresasTemp']))
			$model->attributes=$_GET['EmpresasTemp'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EmpresasTemp the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EmpresasTemp::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EmpresasTemp $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresas-temp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
