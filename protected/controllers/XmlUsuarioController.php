<?php

class XmlUsuarioController extends Controller {

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

    private function uploadCreateDateFolder() {

        $folderDate = array(date('Y'), date('m'), date('d'), 'log');
        $dir = Yii::app()->getBasePath() . '/xml/';
        foreach ($folderDate as $f => $folder) {
            $directorio = $dir . $folder;
            if (!is_dir($directorio)) {
                mkdir($directorio, 0777, true);
                chmod($directorio, 0777);
                $dir .= $folder . '/';
            } else {
                $dir .= $folder . '/';
            }
        }
    }
    
    private function uploadCreateDateFolderLog() {

        $folderDate = array(date('Y'), date('m'), date('d'), 'log_sincronizacion');
        $dir = Yii::app()->getBasePath() . '/xml/';
        foreach ($folderDate as $f => $folder) {
            $directorio = $dir . $folder;
            if (!is_dir($directorio)) {
                mkdir($directorio, 0777, true);
                chmod($directorio, 0777);
                $dir .= $folder . '/';
            } else {
                $dir .= $folder . '/';
            }
        }
    }

    public function actionIndex() {
        
        Yii::app()->db->setActive(false);
        Yii::app()->db->connectionString = 'mysql:host=localhost;dbname=puc_temp';
        Yii::app()->db->username = 'root';
        Yii::app()->db->password = '$76rPucKsb20#';
        Yii::app()->db->setActive(true);
        
        
        $this->uploadCreateDateFolder();
        $this->uploadCreateDateFolderLog();
        $setLog = "";
        
        $files = array();
        
        $dia = intval(date('d'));
        $volver = $dia -1;
        if($volver < 10){
            $resetVolver = "0".$volver;
            $directory = Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . $resetVolver . '/';
        }else{
            $directory = Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' .  date('m')  . '/' . $volver . '/';  
        }
        $iterator = new DirectoryIterator($directory);
        foreach ($iterator as $fileinfo) {
            if ($fileinfo->isFile()) {
                $name = str_replace(".xml", "", $fileinfo->getFilename());
                $files[$name] = $name;
            }
        }
        sort($files);

        $logtext = date('Y') . '-' . date('m') . '-' . date('d');
        
        if (file_exists(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log/' . $logtext . '.txt')) {
            $inicio = file_get_contents((Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log/' . $logtext . '.txt'));
        } else {
            file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log/' . $logtext . '.txt', 200);
            $inicio = 200;
        }
        
        $hrs = date('Y') . '-' . date('m') . '-' . date('d').':'.date('h').':'.date('i').':'.date('s');
        
        
        
        if($volver < 10){
            $resetVolver = "0".$volver;
            $fileDirect = Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' .$resetVolver . '/' . $inicio . '.xml';
        }else{
            $fileDirect = Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' .$volver . '/' . $inicio . '.xml';
        }
        
        if (file_exists($fileDirect)) {
            
            $xml = simplexml_load_file($fileDirect);
            
            foreach ($xml->puc->listado->usuario as $usuario) {
            $time_start = microtime(true);
            $sqlRutVerificador = "SELECT * FROM usuario WHERE rut = '" . Yii::app()->rut->deleteFormat($usuario->rut) . "'";
            $dr = Yii::app()->db->createCommand($sqlRutVerificador)->queryAll();

            if (count($dr) > 0) {

                //Update usuario Normal Set atributos
                $modelUsuario = Usuario::model()->findByPk($dr[0]["usuario_id"]);
                if ($usuario->datos_particulares->pais->valor != '') {
                    $parametroPais = trim(strtolower($usuario->datos_particulares->pais->valor));
                    if ($parametroPais === "chile") {
                        $modelUsuario->setAttribute('identidad_id', 1);
                    } else {
                        $modelUsuario->setAttribute('identidad_id', 2);
                    }
                } else {
                    $modelUsuario->setAttribute('identidad_id', 1);
                }
                if ($usuario->datos_particulares->genero->id == 0) {
                    $modelUsuario->setAttribute('sexo_id', 1);
                } else {
                    $modelUsuario->setAttribute('sexo_id', 2);
                }

                list($apellido_paterno) = explode(' ', $usuario->apellidos);
                $apellido_materno = trim(str_replace($apellido_paterno, '', $usuario->apellidos));
                $apellidopaterno = $this->stringFormat->applyCamelcase($apellido_paterno);
                $apellido_maternoreset = $this->stringFormat->applyCamelcase($apellido_materno);

                $modelUsuario->setAttribute('apellido_paterno', $apellidopaterno);
                $modelUsuario->setAttribute('apellido_materno', $apellido_maternoreset);
                $modelUsuario->setAttribute('nombre', trim($this->stringFormat->applyCamelcase($usuario->nombres)));
                $modelUsuario->setAttribute('fecha_nacimiento', $this->stringFormat->clearFecha($usuario->datos_particulares->fecha_nacimiento));
                $modelUsuario->setAttribute('fecha_creacion', date('Y-m-d H:i:s'));
                $modelUsuario->save();
                
                $setLog = "".$hrs.':'.$time_start."  Update Usuario Normal ".$dr[0]["usuario_id"]."\r\n";
                file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                //Update usuarioNatural Set atributos
                $criteria = new CDbCriteria();
                $criteria->addCondition("usuario_id = " . $dr[0]["usuario_id"] . " ");
                $modelNatural = UsuarioNatural::model()->find($criteria);
                $estado_civil_id = 0;
                $email_natural = "";
                $direccion = "";
                $telefono = "";
                $movil = "";
                switch ($usuario->datos_particulares->estado_civil->id) {
                    case 100001:
                        $estado_civil_id = 2;
                        break;
                    case 100002:
                        $estado_civil_id = 3;
                        break;
                    case 100003:
                        $estado_civil_id = 4;
                        break;
                    case 100004:
                        $estado_civil_id = 1;
                        break;
                    case 100005:
                        $estado_civil_id = 5;
                        break;
                    default:
                        $estado_civil_id = 0;
                        break;
                }

                if (strpos($usuario->datos_comerciales->listado->email_particular, "@")) {
                    $email_natural = strtolower($usuario->datos_comerciales->listado->email_particular);
                } else {
                    $email_natural = strtolower($usuario->datos_comerciales->listado->email_comercial);
                }
                $direccion = trim(strtolower($usuario->datos_particulares->direccion));
                $movil = $usuario->datos_particulares->telefono_movil;
                $telefono = $usuario->datos_particulares->telefono_fijo;

                $modelNatural->setAttribute('estado_civil_id', $estado_civil_id);
                $modelNatural->setAttribute('direccion', $apellido_maternoreset);
                $modelNatural->setAttribute('telefono_fijo', $telefono);
                $modelNatural->setAttribute('telefono_celular', $movil);
                $modelNatural->setAttribute('email', $email_natural);

                $criteria = new CDbCriteria();
                $criteria->compare('nombre', strtolower($usuario->datos_particulares->comuna));
                $ComunaFind = Comuna::model()->find($criteria);

                $criteria = new CDbCriteria();
                $criteria->compare('nombre', strtolower($usuario->datos_particulares->ciudad));
                $CiudadFind = Ciudad::model()->find($criteria);

                $criteria = new CDbCriteria();
                $criteria->compare('nombre', strtolower($usuario->datos_particulares->pais->valor));
                $PaisFind = Pais::model()->find($criteria);


                if ($ComunaFind != null) {
                    $modelNatural->setAttribute('pais_id', $ComunaFind->pais_id);
                    $modelNatural->setAttribute('region_id', $ComunaFind->region_id);
                    $modelNatural->setAttribute('ciudad_id', $ComunaFind->ciudad_id);
                    $modelNatural->setAttribute('comuna_id', $ComunaFind->comuna_id);
                } else if ($CiudadFind != null) {
                    $modelNatural->setAttribute('pais_id', $CiudadFind->pais_id);
                    $modelNatural->setAttribute('region_id', $CiudadFind->region_id);
                    $modelNatural->setAttribute('ciudad_id', $CiudadFind->ciudad_id);
                } else if ($PaisFind != null) {
                    $modelNatural->setAttribute('pais_id', $PaisFind->pais_id);
                }

                $modelNatural->save();
                
                $setLog = "".$hrs.':'.$time_start."   Update Usuario Natural ".$dr[0]["usuario_id"]."\r\n";
                file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                //INSERT O UPDATE USUARIOLABORAL
                foreach ($usuario->datos_comerciales->listado as $item) {

                    //Update usuarioLaboral Set atributos datosComercial
                    $sqlEmpresa = "SELECT * FROM empresa WHERE empresa_vertical_id = " . $item->empresa->id . "";
                    $dataReaderComercialEmpresa = Yii::app()->db->createCommand($sqlEmpresa)->queryAll();

                    if (count($dataReaderComercialEmpresa) > 0) {

                        //$sqlXml = "SELECT * FROM usuario_laboral WHERE xml_nodo_id = 0 AND usuario_id = " . $dr[0]["usuario_id"] . "";
                        $sqlXml = "SELECT usuario_id FROM usuario_laboral WHERE xml_nodo_id = 0 AND usuario_id = " . $dr[0]["usuario_id"] . "";
                        $dataReaderXmlNodo = Yii::app()->db->createCommand($sqlXml)->queryAll();
                        
                        if (count($dataReaderXmlNodo) == 0) {

                            $insertLaboralActual = new UsuarioLaboral();
                            $insertLaboralActual->usuario_id = $dr[0]["usuario_id"];
                            $insertLaboralActual->actual_id = 1;
                            $insertLaboralActual->empresa_id = $dataReaderComercialEmpresa[0]['empresa_id'];
                            $insertLaboralActual->xml_nodo_id = $item->id;
                            if (strpos($item->email_comercial, '@')) {
                                $insertLaboralActual->email = strtolower($item->email_comercial);
                            }
                            $cargo = str_replace("'", "", $item->cargo);
                            $sqlCargo = "SELECT * FROM cargo as c WHERE c.titulo = " . "'$cargo'" . "";
                            $dataReaderComercialCargo = Yii::app()->db->createCommand($sqlCargo)->queryAll();

                            if (count($dataReaderComercialCargo) > 0) {
                                $insertLaboralActual->cargo_id = $dataReaderComercialCargo[0]['cargo_id'];
                            } else if (trim(strtolower($item->cargo) != "")) {
                                $cargo = new Cargo();
                                $cargo->titulo = trim(strtolower($item->cargo));
                                $cargo->insert();
                                $insertLaboralActual->cargo_id = $cargo->cargo_id;
                            }
                            
                            $insertLaboralActual->insert();
                            $setLog = "".$hrs.':'.$time_start."    Insert Usuario Comercial ".$dr[0]["usuario_id"]."\r\n";
                            file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                            
                        } else {

                            $criteria = new CDbCriteria();
                            $criteria->addCondition("xml_nodo_id = 0 AND usuario_id = " . $dr[0]["usuario_id"] . "");
                            $modelLaboral = UsuarioLaboral::model()->find($criteria);

                            $modelLaboral->setAttribute('empresa_id', $dataReaderComercialEmpresa[0]["empresa_id"]);

                            $cargo = str_replace("'", "", $item->cargo);
                            //$sqlCargo = "SELECT * FROM cargo as c WHERE c.titulo = " . "'$cargo'" . "";
                            $sqlCargo = "SELECT cargo_id FROM cargo  WHERE titulo = " . "'$cargo'" . "";
                            $dataReaderComercialCargo = Yii::app()->db->createCommand($sqlCargo)->queryAll();

                            if (count($dataReaderComercialCargo) > 0) {
                                $modelLaboral->setAttribute('cargo_id', $dataReaderComercialCargo[0]["cargo_id"]);
                            } else if (trim(strtolower($item->cargo) != "")) {
                                $cargo = new Cargo();
                                $cargo->titulo = trim(strtolower($item->cargo));
                                $cargo->insert();
                                $modelLaboral->setAttribute('cargo_id', $cargo->cargo_id);
                            }
                            if (strpos($item->email_comercial, '@')) {
                                $modelLaboral->setAttribute('email', strtolower($item->email_comercial));
                            }
                            $modelLaboral->save();
                            $setLog = "".$hrs.':'.$time_start."    Update Usuario Comercial ".$dr[0]["usuario_id"]."\r\n";
                            file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                        }
                    }
                }

                //INSERT O UPDATE USUARIOLABORAL
                foreach ($usuario->datos_laborales->listado as $item) {

                    $sqlEmpresa = "SELECT * FROM empresa WHERE empresa_vertical_id = " . $item->empresa->id . "";
                    $dataReaderLaboralEmpresa = Yii::app()->db->createCommand($sqlEmpresa)->queryAll();
                    if (count($dataReaderLaboralEmpresa) > 0) {


                        $sqlXml = "SELECT * FROM usuario_laboral WHERE xml_nodo_id = " . $item->id . "";
                        $dataReaderXmlNodo = Yii::app()->db->createCommand($sqlXml)->queryAll();
                        if (count($dataReaderXmlNodo) == 0) {

                            $insertLaboral = new UsuarioLaboral();
                            $insertLaboral->empresa_id = $dataReaderLaboralEmpresa[0]['empresa_id'];
                            $insertLaboral->xml_nodo_id = $item->id;
                            $cargo = str_replace("'", "", $item->cargo);
                            $sqlCargo = "SELECT * FROM cargo as c WHERE c.titulo = " . "'$cargo'" . "";
                            $dataReaderLaboralCargo = Yii::app()->db->createCommand($sqlCargo)->queryAll();

                            if (count($dataReaderLaboralCargo) > 0) {
                                $insertLaboral->cargo_id = $dataReaderLaboralCargo[0]['cargo_id'];
                            } else if (trim(strtolower($item->cargo) != "")) {
                                $cargo = new Cargo();
                                $cargo->titulo = trim(strtolower($item->cargo));
                                $cargo->insert();
                                $insertLaboral->cargo_id = $cargo->cargo_id;
                            }
                            if (strpos($usuario->datos_comerciales->listado->email_comercial, '@')) {
                                $insertLaboral->email = strtolower($usuario->datos_comerciales->listado->email_comercial);
                            }

                            $insertLaboral->actual_id = 2;
                            $insertLaboral->fecha_ingreso = $this->stringFormat->clearFecha($item->fecha_inicio);

                            if ($item->fecha_termino != '') {
                                $insertLaboral->fecha_egreso = $this->stringFormat->clearFecha($item->fecha_termino);
                            } else {
                                $insertLaboral->fecha_egreso = '0000-00-00';
                            }

                            $insertLaboral->usuario_id = $dr[0]["usuario_id"];
                            $insertLaboral->insert();
                            
                            $setLog = "".$hrs.':'.$time_start."    Insert Usuario Laboral ".$dr[0]["usuario_id"]."\r\n";
                            file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                            
                        } else {

                            $criteria = new CDbCriteria();
                            $criteria->addCondition("xml_nodo_id =  " . $item->id . "");
                            $modelLaboral = UsuarioLaboral::model()->find($criteria);
                            $cargo = str_replace("'", "", $item->cargo);
                            $sqlCargo = "SELECT * FROM cargo as c WHERE c.titulo = " . "'$cargo'" . "";
                            $dataReaderLaboralCargo = Yii::app()->db->createCommand($sqlCargo)->queryAll();

                            if (count($dataReaderLaboralCargo) > 0) {
                                $modelLaboral->setAttribute('cargo_id', $dataReaderLaboralCargo[0]['cargo_id']);
                            } else if (trim(strtolower($item->cargo) != "")) {
                                $cargo = new Cargo();
                                $cargo->titulo = trim(strtolower($item->cargo));
                                $cargo->insert();
                                $modelLaboral->setAttribute('cargo_id', $cargo->cargo_id);
                            }
                            if (strpos($usuario->datos_comerciales->listado->email_comercial, '@')) {
                                $modelLaboral->setAttribute('email', strtolower($usuario->datos_comerciales->listado->email_comercial));
                            }

                            $modelLaboral->setAttribute('fecha_ingreso', $this->stringFormat->clearFecha($item->fecha_inicio));

                            if ($item->fecha_termino != '') {
                                $modelLaboral->setAttribute('fecha_egreso', $this->stringFormat->clearFecha($item->fecha_termino));
                            } else {
                                $modelLaboral->setAttribute('fecha_egreso', '0000-00-00');
                            }

                            $sqlE = "SELECT * FROM empresa WHERE empresa_vertical_id = " . $item->empresa->id . "";
                            $dataRea = Yii::app()->db->createCommand($sqlE)->queryAll();
                            $modelLaboral->setAttribute('empresa_id', $dataRea[0]['empresa_id']);

                            $modelLaboral->save();
                            
                            $setLog = "".$hrs.':'.$time_start."    Update Usuario Laboral ".$dr[0]["usuario_id"]."\r\n";
                            file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                        }
                    }
                }

                //INSERT O UPDATE USUARIOPREGRADO
                foreach ($usuario->datos_academicos->trayectoria_educacional->listado as $itemPregrado) {

                    $sqlnodo = "SELECT * FROM usuario_pregrado WHERE xml_nodo_id = " . $itemPregrado->id . "";
                    $dataReadernodo = Yii::app()->db->createCommand($sqlnodo)->queryAll();
                    if (count($dataReadernodo) > 0) {

                        $criteria = new CDbCriteria();
                        $criteria->addCondition("xml_nodo_id =  " . $itemPregrado->id . "");
                        $modelPregrado = UsuarioPregrado::model()->find($criteria);

                        $sqlInstitucion = "SELECT * FROM institucion as inst WHERE inst.institucion_vertical_id = " . $itemPregrado->institucion->id . "";
                        $dataReaderInstitucion = Yii::app()->db->createCommand($sqlInstitucion)->queryAll();

                        $sqlCarrera = "SELECT * FROM carrera as crr WHERE crr.carrera_vertical_id = " . $itemPregrado->carrera->id . "";
                        $dataReaderCarrera = Yii::app()->db->createCommand($sqlCarrera)->queryAll();

                        $modelPregrado->setAttribute('institucion_id', $dataReaderInstitucion[0]['institucion_id']);
                        $modelPregrado->setAttribute('carrera_id', $dataReaderCarrera[0]['carrera_id']);
                        $modelPregrado->setAttribute('fecha_egreso', $this->stringFormat->clearFecha($itemPregrado->fecha_inicio));
                        $modelPregrado->setAttribute('fecha_titulacion', $this->stringFormat->clearFecha($itemPregrado->fecha_termino));
                        if ($itemPregrado->profesion == "SI") {
                            $modelPregrado->setAttribute('profesion_id', 1);
                        } else {
                            $modelPregrado->setAttribute('profesion_id', 2);
                        }
                        $modelPregrado->save();
                        $setLog = "".$hrs.':'.$time_start."    Update Usuario Pregrado ".$dr[0]["usuario_id"]."\r\n";
                        file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                        
                    } else {

                        $insertPregrado = new UsuarioPregrado();
                        $sqlInstitucion = "SELECT * FROM institucion as inst WHERE inst.institucion_vertical_id = " . $itemPregrado->institucion->id . "";
                        $dataReaderInstitucion = Yii::app()->db->createCommand($sqlInstitucion)->queryAll();
                        if (count($dataReaderInstitucion) > 0) {

                            $sqlCarrera = "SELECT * FROM carrera as crr WHERE crr.carrera_vertical_id = " . $itemPregrado->carrera->id . "";
                            $dataReaderCarrera = Yii::app()->db->createCommand($sqlCarrera)->queryAll();
                            if (count($dataReaderCarrera) > 0) {
                                $insertPregrado->carrera_id = $dataReaderCarrera[0]['carrera_id'];
                            }
                            $insertPregrado->usuario_id = $dr[0]["usuario_id"];
                            $insertPregrado->fecha_egreso = $this->stringFormat->clearFecha($itemPregrado->fecha_inicio);
                            $insertPregrado->fecha_titulacion = $this->stringFormat->clearFecha($itemPregrado->fecha_termino);
                            $insertPregrado->institucion_id = $dataReaderInstitucion[0]['institucion_id'];
                            $insertPregrado->xml_nodo_id = $itemPregrado->id;
                            if ($itemPregrado->profesion == "SI") {
                                $insertPregrado->profesion_id = 1;
                            } else {
                                $insertPregrado->profesion_id = 2;
                            }

                            $insertPregrado->insert();
                            
                            $setLog = "".$hrs.':'.$time_start."    Insert Usuario Pregrado ".$dr[0]["usuario_id"]."\r\n";
                            file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                        }
                    }
                }

                //INSERT O UPDATE USUARIOPOSTGRADO
                foreach ($usuario->datos_matriculas->matricula->listado as $itemPostGrado) {

                    $sqlnodo = "SELECT * FROM usuario_postgrado WHERE xml_nodo_id = " . $itemPostGrado->id . "";
                    $dataReadernodo = Yii::app()->db->createCommand($sqlnodo)->queryAll();
                    if (count($dataReadernodo) > 0) {

                        $criteria = new CDbCriteria();
                        $criteria->addCondition("xml_nodo_id =  " . $itemPostGrado->id . "");
                        $modelPostgrado = UsuarioPostgrado::model()->find($criteria);


                        $sqlPrograma = "SELECT * FROM programa_estudio as pest WHERE pest.programa_estudio_vertical_id = " . $itemPostGrado->producto->id . "";
                        $dataReaderPrograma = Yii::app()->db->createCommand($sqlPrograma)->queryAll();

                        $sqlEstadoPost = "SELECT * FROM tipo_estado_postgrado as etad WHERE etad.tipo_estado_postgrado_vertical_id = " . $itemPostGrado->estado->id . "";
                        $dataReaderEstadoPost = Yii::app()->db->createCommand($sqlEstadoPost)->queryAll();

                        $sqlSituacion = "SELECT * FROM tipo_situacion_postgrado as sta WHERE sta.tipo_situacion_postgrado_vertical_id = " . $itemPostGrado->situacion_dara->id . "";
                        $dataReaderSituacion = Yii::app()->db->createCommand($sqlSituacion)->queryAll();

                        $estado_id = "";
                        $programa_estudio_id = "";
                        $situcion_id = "";
                        if (count($dataReaderPrograma) > 0) {
                            $programa_estudio_id = $dataReaderPrograma[0]['programa_estudio_id'];
                        } else {
                            $InsertPestudio = new ProgramaEstudio();
                            $InsertPestudio->titulo = trim(strtolower($itemPostGrado->producto->valor));
                            $InsertPestudio->programa_estudio_vertical_id = $itemPostGrado->producto->id;
                            $InsertPestudio->insert();
                            $programa_estudio_id = $InsertPestudio->programa_estudio_id;
                        }



                        if (count($dataReaderEstadoPost) > 0) {
                            $estado_id = $dataReaderEstadoPost[0]['tipo_estado_postgrado_id'];
                        } else {
                            $InsertEstado = new TipoEstadoPostgrado();
                            $InsertEstado->titulo = trim(strtolower($itemPostGrado->estado->valor));
                            $InsertEstado->tipo_estado_postgrado_vertical_id = $itemPostGrado->estado->id;
                            $InsertEstado->insert();
                            $estado_id = $InsertEstado->tipo_estado_postgrado_id;
                        }


                        if (count($dataReaderSituacion) > 0) {
                            $situcion_id = $dataReaderSituacion[0]['tipo_situacion_postgrado_id'];
                        } else {
                            $InsertSituacion = new TipoSituacionPostgrado();
                            $InsertSituacion->titulo = trim(strtolower($itemPostGrado->situacion_dara->valor));
                            $InsertSituacion->tipo_situacion_postgrado_vertical_id = $itemPostGrado->situacion_dara->id;
                            $InsertSituacion->insert();
                            $situcion_id = $InsertSituacion->tipo_situacion_postgrado_id;
                        }

                        $version = '01-' . $itemPostGrado->version->fecha;
                        $modelPostgrado->setAttribute('programa_estudio_id', $programa_estudio_id);
                        $modelPostgrado->setAttribute('tipo_estado_postgrado_id', $estado_id);
                        $modelPostgrado->setAttribute('tipo_situacion_postgrado_id', $situcion_id);
                        $modelPostgrado->setAttribute('fecha_matricula', $this->stringFormat->clearFecha($itemPostGrado->fecha_matricula));
                        $modelPostgrado->setAttribute('fecha_version', $this->stringFormat->clearFecha($version));
                        $modelPostgrado->save();
                        
                        $setLog = "".$hrs.':'.$time_start."  Update Usuario Postgrado ".$dr[0]["usuario_id"]."\r\n";
                        file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                        
                    } else {
                        $insertPostgrado = new UsuarioPostgrado();
                        $sqlPrograma = "SELECT * FROM programa_estudio as pest WHERE pest.programa_estudio_vertical_id = " . $itemPostGrado->producto->id . "";
                        $dataReaderPrograma = Yii::app()->db->createCommand($sqlPrograma)->queryAll();
                        if (count($dataReaderPrograma) > 0) {
                            $insertPostgrado->programa_estudio_id = $dataReaderPrograma[0]['programa_estudio_id'];
                        } else {
                            $InsertPestudio = new ProgramaEstudio();
                            $InsertPestudio->titulo = trim(strtolower($itemPostGrado->producto->valor));
                            $InsertPestudio->programa_estudio_vertical_id = $itemPostGrado->producto->id;
                            $InsertPestudio->insert();
                            $insertPostgrado->programa_estudio_id = $InsertPestudio->programa_estudio_id;
                        }

                        $sqlEstadoPost = "SELECT * FROM tipo_estado_postgrado as etad WHERE etad.tipo_estado_postgrado_vertical_id = " . $itemPostGrado->estado->id . "";
                        $dataReaderEstadoPost = Yii::app()->db->createCommand($sqlEstadoPost)->queryAll();
                        if (count($dataReaderEstadoPost) > 0) {
                            $insertPostgrado->tipo_estado_postgrado_id = $dataReaderEstadoPost[0]['tipo_estado_postgrado_id'];
                        } else {
                            $InsertEstado = new TipoEstadoPostgrado();
                            $InsertEstado->titulo = trim(strtolower($itemPostGrado->estado->valor));
                            $InsertEstado->tipo_estado_postgrado_vertical_id = $itemPostGrado->estado->id;
                            $InsertEstado->insert();
                            $insertPostgrado->tipo_estado_postgrado_id = $InsertEstado->tipo_estado_postgrado_id;
                        }

                        $sqlSituacion = "SELECT * FROM tipo_situacion_postgrado as sta WHERE sta.tipo_situacion_postgrado_vertical_id = " . $itemPostGrado->situacion_dara->id . "";
                        $dataReaderSituacion = Yii::app()->db->createCommand($sqlSituacion)->queryAll();
                        if (count($dataReaderSituacion) > 0) {
                            $insertPostgrado->tipo_situacion_postgrado_id = $dataReaderSituacion[0]['tipo_situacion_postgrado_id'];
                        } else {
                            $InsertSituacion = new TipoSituacionPostgrado();
                            $InsertSituacion->titulo = trim(strtolower($itemPostGrado->situacion_dara->valor));
                            $InsertSituacion->tipo_situacion_postgrado_vertical_id = $itemPostGrado->situacion_dara->id;
                            $InsertSituacion->insert();
                            $insertPostgrado->tipo_situacion_postgrado_id = $InsertSituacion->tipo_situacion_postgrado_id;
                        }


                        $insertPostgrado->usuario_id = $dr[0]["usuario_id"];
                        $version = '01-' . $itemPostGrado->version->fecha;

                        $insertPostgrado->fecha_version = $this->stringFormat->clearFecha($version);
                        $insertPostgrado->fecha_matricula = $this->stringFormat->clearFecha($itemPostGrado->fecha_matricula);
                        $insertPostgrado->xml_nodo_id = $itemPostGrado->id;
                        $insertPostgrado->save();
                        
                        $setLog = "".$hrs.':'.$time_start."  Insert Usuario Postgrado ".$dr[0]["usuario_id"]."\r\n";
                        file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log_sincronizacion/' . $logtext . '.txt', $setLog,FILE_APPEND);

                    }
                }
            } else {

                list($apellido_paterno) = explode(' ', $usuario->apellidos);
                $apellido_materno = trim(str_replace($apellido_paterno, '', $usuario->apellidos));
                $apellidopaterno = $this->stringFormat->applyCamelcase($apellido_paterno);
                $apellido_maternoreset = $this->stringFormat->applyCamelcase($apellido_materno);
                $insertUsuario = new Usuario();
                if ($usuario->datos_particulares->pais->valor != '') {
                    $parametroPais = trim(strtolower($usuario->datos_particulares->pais->valor));
                    if ($parametroPais === "chile") {
                        $insertUsuario->rut = Yii::app()->rut->deleteFormat($usuario->rut);
                        $insertUsuario->identidad_id = 1;
                    } else {
                        $insertUsuario->rut = Yii::app()->rut->deleteFormat($usuario->rut);
                        $insertUsuario->identidad_id = 2;
                    }
                } else {
                    $insertUsuario->rut = Yii::app()->rut->deleteFormat($usuario->rut);
                    $insertUsuario->identidad_id = 1;
                }

                $insertUsuario->tipo_fuente_ingreso_id = 1;
                $insertUsuario->nombre = trim($this->stringFormat->applyCamelcase($usuario->nombres));
                $insertUsuario->apellido_paterno = $apellidopaterno;
                $insertUsuario->apellido_materno = $apellido_maternoreset;
                $insertUsuario->fecha_creacion = date('Y-m-d H:i:s');
                $insertUsuario->fecha_nacimiento = $this->stringFormat->clearFecha($usuario->datos_particulares->fecha_nacimiento);

                if ($usuario->datos_particulares->genero->id == 0) {
                    $insertUsuario->sexo_id = 1;
                } else {
                    $insertUsuario->sexo_id = 2;
                }

                $insertUsuario->insert();


                $insertNatural = new UsuarioNatural();

                $insertNatural->usuario_id = $insertUsuario->usuario_id;

                switch ($usuario->datos_particulares->estado_civil->id) {
                    case 100001:
                        $insertNatural->estado_civil_id = 2;
                        break;
                    case 100002:
                        $insertNatural->estado_civil_id = 3;
                        break;
                    case 100003:
                        $insertNatural->estado_civil_id = 4;
                        break;
                    case 100004:
                        $insertNatural->estado_civil_id = 1;
                        break;
                    case 100005:
                        $insertNatural->estado_civil_id = 5;
                        break;
                    default:
                        $insertNatural->estado_civil_id = 0;
                        break;
                }

                if (strpos($usuario->datos_comerciales->listado->email_particular, "@")) {
                    $insertNatural->email = strtolower($usuario->datos_comerciales->listado->email_particular);
                } else {
                    $insertNatural->email = strtolower($usuario->datos_comerciales->listado->email_comercial);
                }
                $insertNatural->direccion = trim(strtolower($usuario->datos_particulares->direccion));
                $insertNatural->telefono_celular = $usuario->datos_particulares->telefono_movil;
                $insertNatural->telefono_fijo = $usuario->datos_particulares->telefono_fijo;


                $criteria = new CDbCriteria();
                $criteria->compare('nombre', strtolower($usuario->datos_particulares->comuna));
                $ComunaFind = Comuna::model()->find($criteria);

                $criteria = new CDbCriteria();
                $criteria->compare('nombre', strtolower($usuario->datos_particulares->ciudad));
                $CiudadFind = Ciudad::model()->find($criteria);

                $criteria = new CDbCriteria();
                $criteria->compare('nombre', strtolower($usuario->datos_particulares->pais->valor));
                $PaisFind = Pais::model()->find($criteria);


                if ($ComunaFind != null) {
                    $insertNatural->comuna_id = $ComunaFind->comuna_id;
                    $insertNatural->ciudad_id = $ComunaFind->ciudad_id;
                    $insertNatural->region_id = $ComunaFind->region_id;
                    $insertNatural->pais_id = $ComunaFind->pais_id;
                } else if ($CiudadFind != null) {
                    $insertNatural->ciudad_id = $CiudadFind->ciudad_id;
                    $insertNatural->region_id = $CiudadFind->region_id;
                    $insertNatural->pais_id = $ComunaFind->pais_id;
                } else if ($PaisFind != null) {
                    $insertNatural->pais_id = $PaisFind->pais_id;
                }
                $insertNatural->insert();



                foreach ($usuario->datos_comerciales->listado as $item) {

                    $sqlEmpresa = "SELECT * FROM empresa WHERE empresa_vertical_id = " . $item->empresa->id . "";
                    $dataReaderComercialEmpresa = Yii::app()->db->createCommand($sqlEmpresa)->queryAll();

                    if (count($dataReaderComercialEmpresa) > 0) {

                        $insertLaboralActual = new UsuarioLaboral();
                        $insertLaboralActual->usuario_id = $insertUsuario->usuario_id;
                        $insertLaboralActual->actual_id = 1;
                        $insertLaboralActual->empresa_id = $dataReaderComercialEmpresa[0]['empresa_id'];
                        $insertLaboralActual->xml_nodo_id = $item->id;
                        if (strpos($item->email_comercial, '@')) {
                            $insertLaboralActual->email = strtolower($item->email_comercial);
                        }
                        $cargo = str_replace("'", "", $item->cargo);
                        //$sqlCargo = "SELECT * FROM cargo as c WHERE c.titulo = " . "'$cargo'" . "";
                        $sqlCargo = "SELECT cargo_id FROM cargo WHERE titulo = " . "'$cargo'" . "";
                        $dataReaderComercialCargo = Yii::app()->db->createCommand($sqlCargo)->queryAll();

                        if (count($dataReaderComercialCargo) > 0) {
                            $insertLaboralActual->cargo_id = $dataReaderComercialCargo[0]['cargo_id'];
                        } else if (trim(strtolower($item->cargo) != "")) {
                            $cargo = new Cargo();
                            $cargo->titulo = trim(strtolower($item->cargo));
                            $cargo->insert();
                            $insertLaboralActual->cargo_id = $cargo->cargo_id;
                        }
                        $insertLaboralActual->insert();
                    }
                }


                foreach ($usuario->datos_laborales->listado as $item) {

                    $sqlEmpresa = "SELECT * FROM empresa WHERE empresa_vertical_id = " . $item->empresa->id . "";
                    $dataReaderLaboralEmpresa = Yii::app()->db->createCommand($sqlEmpresa)->queryAll();
                    if (count($dataReaderLaboralEmpresa) > 0) {

                        $sqlXml = "SELECT * FROM usuario_laboral WHERE xml_nodo_id = " . $item->id . "";
                        $dataReaderXmlNodo = Yii::app()->db->createCommand($sqlXml)->queryAll();
                        if (count($dataReaderXmlNodo) == 0) {



                            $insertLaboral = new UsuarioLaboral();
                            $insertLaboral->empresa_id = $dataReaderLaboralEmpresa[0]['empresa_id'];
                            $insertLaboral->xml_nodo_id = $item->id;
                            $cargo = str_replace("'", "", $item->cargo);
                            $sqlCargo = "SELECT * FROM cargo as c WHERE c.titulo = " . "'$cargo'" . "";
                            $dataReaderLaboralCargo = Yii::app()->db->createCommand($sqlCargo)->queryAll();

                            if (count($dataReaderLaboralCargo) > 0) {
                                $insertLaboral->cargo_id = $dataReaderLaboralCargo[0]['cargo_id'];
                            } else {
                                $cargo = new Cargo();
                                $cargo->titulo = trim(strtolower($item->cargo));
                                $cargo->insert();
                                $insertLaboral->cargo_id = $cargo->cargo_id;
                            }
                            if (strpos($usuario->datos_comerciales->listado->email_comercial, '@')) {
                                $insertLaboral->email = strtolower($usuario->datos_comerciales->listado->email_comercial);
                            }

                            $insertLaboral->actual_id = 2;
                            $insertLaboral->fecha_ingreso = $this->stringFormat->clearFecha($item->fecha_inicio);

                            if ($item->fecha_termino != '') {
                                $insertLaboral->fecha_egreso = $this->stringFormat->clearFecha($item->fecha_termino);
                            } else {
                                $insertLaboral->fecha_egreso = '0000-00-00';
                            }

                            $insertLaboral->usuario_id = $insertUsuario->usuario_id;
                            $insertLaboral->insert();
                        }
                    }
                }

                foreach ($usuario->datos_academicos->trayectoria_educacional->listado as $itemPregrado) {
                    $insertPregrado = new UsuarioPregrado();
                    $sqlInstitucion = "SELECT * FROM institucion as inst WHERE inst.institucion_vertical_id = " . $itemPregrado->institucion->id . "";
                    $dataReaderInstitucion = Yii::app()->db->createCommand($sqlInstitucion)->queryAll();
                    if (count($dataReaderInstitucion) > 0) {

                        $sqlInstitucion = "SELECT * FROM carrera as crr WHERE crr.carrera_vertical_id = " . $itemPregrado->carrera->id . "";
                        $dataReaderCarrera = Yii::app()->db->createCommand($sqlInstitucion)->queryAll();
                        if (count($dataReaderCarrera) > 0) {
                            $insertPregrado->carrera_id = $dataReaderCarrera[0]['carrera_id'];
                        }
                        $insertPregrado->usuario_id = $insertUsuario->usuario_id;
                        $insertPregrado->fecha_egreso = $this->stringFormat->clearFecha($itemPregrado->fecha_inicio);
                        $insertPregrado->fecha_titulacion = $this->stringFormat->clearFecha($itemPregrado->fecha_termino);
                        $insertPregrado->institucion_id = $dataReaderInstitucion[0]['institucion_id'];
                        $insertPregrado->xml_nodo_id = $itemPregrado->id;
                        if ($itemPregrado->profesion == "SI") {
                            $insertPregrado->profesion_id = 1;
                        } else {
                            $insertPregrado->profesion_id = 2;
                        }

                        $insertPregrado->insert();
                    }
                }

                foreach ($usuario->datos_matriculas->matricula->listado as $itemPostGrado) {
                    $insertPostgrado = new UsuarioPostgrado();
                    $sqlPrograma = "SELECT * FROM programa_estudio as pest WHERE pest.programa_estudio_vertical_id = " . $itemPostGrado->producto->id . "";
                    $dataReaderPrograma = Yii::app()->db->createCommand($sqlPrograma)->queryAll();
                    if (count($dataReaderPrograma) > 0) {
                        $insertPostgrado->programa_estudio_id = $dataReaderPrograma[0]['programa_estudio_id'];
                    } else {
                        $InsertPestudio = new ProgramaEstudio();
                        $InsertPestudio->titulo = trim(strtolower($itemPostGrado->producto->valor));
                        $InsertPestudio->programa_estudio_vertical_id = $itemPostGrado->producto->id;
                        $InsertPestudio->insert();
                        $insertPostgrado->programa_estudio_id = $InsertPestudio->programa_estudio_id;
                    }

                    $sqlEstadoPost = "SELECT * FROM tipo_estado_postgrado as etad WHERE etad.tipo_estado_postgrado_vertical_id = " . $itemPostGrado->estado->id . "";
                    $dataReaderEstadoPost = Yii::app()->db->createCommand($sqlEstadoPost)->queryAll();
                    if (count($dataReaderEstadoPost) > 0) {
                        $insertPostgrado->tipo_estado_postgrado_id = $dataReaderEstadoPost[0]['tipo_estado_postgrado_id'];
                    } else {
                        $InsertEstado = new TipoEstadoPostgrado();
                        $InsertEstado->titulo = trim(strtolower($itemPostGrado->estado->valor));
                        $InsertEstado->tipo_estado_postgrado_vertical_id = $itemPostGrado->estado->id;
                        $InsertEstado->insert();
                        $insertPostgrado->tipo_estado_postgrado_id = $InsertEstado->tipo_estado_postgrado_id;
                    }

                    $sqlSituacion = "SELECT * FROM tipo_situacion_postgrado as sta WHERE sta.tipo_situacion_postgrado_vertical_id = " . $itemPostGrado->situacion_dara->id . "";
                    $dataReaderSituacion = Yii::app()->db->createCommand($sqlSituacion)->queryAll();
                    if (count($dataReaderSituacion) > 0) {
                        $insertPostgrado->tipo_situacion_postgrado_id = $dataReaderSituacion[0]['tipo_situacion_postgrado_id'];
                    } else {
                        $InsertSituacion = new TipoSituacionPostgrado();
                        $InsertSituacion->titulo = trim(strtolower($itemPostGrado->situacion_dara->valor));
                        $InsertSituacion->tipo_situacion_postgrado_vertical_id = $itemPostGrado->situacion_dara->id;
                        $InsertSituacion->insert();
                        $insertPostgrado->tipo_situacion_postgrado_id = $InsertSituacion->tipo_situacion_postgrado_id;
                    }


                    $insertPostgrado->usuario_id = $insertUsuario->usuario_id;
                    $version = '01-' . $itemPostGrado->version->fecha;

                    $insertPostgrado->fecha_version = $this->stringFormat->clearFecha($version);
                    $insertPostgrado->fecha_matricula = $this->stringFormat->clearFecha($itemPostGrado->fecha_matricula);
                    $insertPostgrado->xml_nodo_id = $itemPostGrado->id;
                    $insertPostgrado->insert();
                }
            }
        }
        
        }

        $reset = file_get_contents((Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log/' . $logtext . '.txt'));
        file_put_contents(Yii::app()->getBasePath() . '/xml/' . date('Y') . '/' . date('m') . '/' . date('d') . '/log/' . $logtext . '.txt', $reset + 200);
    }

}
