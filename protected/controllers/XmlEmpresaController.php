<?php

class XmlEmpresaController extends Controller {

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
        $dataReader = "";
        Yii::app()->db->setActive(false);
        Yii::app()->db->connectionString = 'mysql:host=localhost;dbname=puc_temp';
        Yii::app()->db->username = 'root';
        Yii::app()->db->password = '$76rPucKsb20#';
        Yii::app()->db->setActive(true);
        for ($i = 0; $i <= 6000; $i+=200) {

            $xml = simplexml_load_file("http://portal.mbauc.cl/iit-rayalab-service/xmlEmpresa?inicio=" . $i . "&fin=200");

            foreach ($xml->puc->empresa->listado as $empresaVertical) {

                $sqlEmpresa = "SELECT * FROM empresa WHERE empresa_vertical_id = " . $empresaVertical->id . "";
                $dataReader = Yii::app()->db->createCommand($sqlEmpresa)->queryAll();
                if (count($dataReader) == 0) {

                    $InsertEmpresa = new Empresa();
                    $InsertEmpresa->empresa_vertical_id = $empresaVertical->id;
                    $InsertEmpresa->nombre = $this->stringFormat->applyUnderCase(trim($empresaVertical->nombre));
                    $InsertEmpresa->codigo_postal = $empresaVertical->codigo_postal;
                    $InsertEmpresa->direccion = $this->stringFormat->applyUnderCase(trim($empresaVertical->direccion));
                    $InsertEmpresa->telefono_fijo = $empresaVertical->telefono;
                    $InsertEmpresa->telefono_fax = $empresaVertical->fax;
                    $InsertEmpresa->url = $empresaVertical->sitio_web;
                    $InsertEmpresa->razon_social = $this->stringFormat->applyUnderCase(trim($empresaVertical->razon_social));
                    $InsertEmpresa->rut = $empresaVertical->rut;
                    if ($empresaVertical->comuna->valor != "") {
                        $sqlComuna = "SELECT * FROM comuna WHERE nombre = "."'$empresaVertical->comuna->valor'"."";
                        $dataReader = Yii::app()->db->createCommand($sqlComuna)->queryAll();
                        if (count($dataReader) > 0) {
                            $InsertEmpresa->comuna_id = $dataReader->comuna_id;
                            $InsertEmpresa->ciudad_id = $dataReader->ciudad_id;
                            $InsertEmpresa->region_id = $dataReader->region_id;
                            $InsertEmpresa->pais_id = $dataReader->pais_id;
                        } else if ($empresaVertical->ciudad->valor != "") {
                            $sqlCiudad = "SELECT * FROM ciudad WHERE nombre = "."'$empresaVertical->ciudad->valor'"."";
                            $dataReader = Yii::app()->db->createCommand($sqlCiudad)->queryAll();
                            if (count($dataReader) > 0) {
                                $InsertEmpresa->ciudad_id = $dataReader->ciudad_id;
                                $InsertEmpresa->region_id = $dataReader->region_id;
                                $InsertEmpresa->pais_id = $dataReader->pais_id;
                            } else if ($empresaVertical->pais->valor != "") {

                                $sqlCiudad = "SELECT * FROM pais WHERE nombre = "."'$empresaVertical->pais->valor'"."";
                                $dataReader = Yii::app()->db->createCommand($sqlCiudad)->queryAll();

                                if (count($dataReader) > 0) {
                                    $InsertEmpresa->pais_id = $dataReader->pais_id;
                                } else {
                                    $InsertEmpresa->comuna_id = 0;
                                    $InsertEmpresa->ciudad_id = 0;
                                    $InsertEmpresa->region_id = 0;
                                    $InsertEmpresa->pais_id = 0;
                                }
                            }
                        }
                    }

                    if ($empresaVertical->giro->valor != "") {
       
                        $sqlGiro= "SELECT * FROM tipo_giro as tg WHERE tg.titulo = "."'$empresaVertical->giro->valor'"."";
                        $dataReader = Yii::app()->db->createCommand($sqlGiro)->queryAll();

                        if (count($dataReader) > 0) {
                            $InsertEmpresa->tipo_giro_id = $dataReader->tipo_giro_id;
                        } else {
                            $giroInsert = new TipoGiro();
                            $giroInsert->titulo = trim(strtolower($empresaVertical->giro->valor));
                            $giroInsert->insert();
                            $InsertEmpresa->tipo_giro_id = $giroInsert->tipo_giro_id;
                        }
                    }
                    
                    $InsertEmpresa->insert();
                }else{
                    
                    $modelEmpresa = Empresa::model()->findByPk($dataReader[0]["empresa_id"]);
                    $modelEmpresa->setAttribute('empresa_vertical_id', $empresaVertical->id);
                    $modelEmpresa->setAttribute('nombre', $this->stringFormat->applyUnderCase(trim($empresaVertical->nombre)));
                    $modelEmpresa->setAttribute('codigo_postal', $empresaVertical->codigo_postal);
                    $modelEmpresa->setAttribute('direccion', $this->stringFormat->applyUnderCase(trim($empresaVertical->direccion)));
                    $modelEmpresa->setAttribute('telefono_fijo', $empresaVertical->telefono);
                    $modelEmpresa->setAttribute('telefono_fax', $empresaVertical->fax);
                    $modelEmpresa->setAttribute('url', $empresaVertical->sitio_web);
                    $modelEmpresa->setAttribute('razon_social', $this->stringFormat->applyUnderCase(trim($empresaVertical->razon_social)));
                    $modelEmpresa->setAttribute('rut', $empresaVertical->rut);
                    
                     if ($empresaVertical->comuna->valor != "") {
                        $sqlComuna = "SELECT * FROM comuna WHERE nombre = "."'$empresaVertical->comuna->valor'"."";
                        $dataReader = Yii::app()->db->createCommand($sqlComuna)->queryAll();
                        if (count($dataReader) > 0) {
                            $modelEmpresa->setAttribute('comuna_id',$dataReader->comuna_id);
                            $modelEmpresa->setAttribute('ciudad_id',$dataReader->ciudad_id);
                            $modelEmpresa->setAttribute('region_id',$dataReader->region_id);
                            $modelEmpresa->setAttribute('pais_id',$dataReader->pais_id);
                        } else if ($empresaVertical->ciudad->valor != "") {
                            $sqlCiudad = "SELECT * FROM ciudad WHERE nombre = "."'$empresaVertical->ciudad->valor'"."";
                            $dataReader = Yii::app()->db->createCommand($sqlCiudad)->queryAll();
                            if (count($dataReader) > 0) {
                                $modelEmpresa->setAttribute('ciudad_id',$dataReader->ciudad_id);
                                $modelEmpresa->setAttribute('region_id',$dataReader->region_id);
                                $modelEmpresa->setAttribute('pais_id',$dataReader->pais_id);
                            } else if ($empresaVertical->pais->valor != "") {

                                $sqlCiudad = "SELECT * FROM pais WHERE nombre = "."'$empresaVertical->pais->valor'"."";
                                $dataReader = Yii::app()->db->createCommand($sqlCiudad)->queryAll();

                                if (count($dataReader) > 0) {
                                    $modelEmpresa->setAttribute('pais_id',$dataReader->pais_id);
                                } else {
                                    $modelEmpresa->setAttribute('comuna_id',0);
                                    $modelEmpresa->setAttribute('ciudad_id',0);
                                    $modelEmpresa->setAttribute('region_id',0);
                                    $modelEmpresa->setAttribute('pais_id',0);
                                }
                            }
                        }
                    }

                    if ($empresaVertical->giro->valor != "") {
       
                        $sqlGiro= "SELECT * FROM tipo_giro as tg WHERE tg.titulo = "."'$empresaVertical->giro->valor'"."";
                        $dataReader = Yii::app()->db->createCommand($sqlGiro)->queryAll();

                        if (count($dataReader) > 0) {
                            $modelEmpresa->setAttribute('tipo_giro_id',$dataReader->tipo_giro_id);
                        } else {
                            $giroInsert = new TipoGiro();
                            $giroInsert->titulo = trim(strtolower($empresaVertical->giro->valor));
                            $giroInsert->insert();
                            $modelEmpresa->setAttribute('tipo_giro_id',$giroInsert->tipo_giro_id);
                          
                        }
                    }
                    
                    $modelEmpresa->save();
                }
            }
        }
    }

}
