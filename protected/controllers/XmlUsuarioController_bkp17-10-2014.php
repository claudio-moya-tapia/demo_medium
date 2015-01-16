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


    public function actionIndex() {
        for ($i = 0; $i <= 19999; $i+=200) {
            $xml = simplexml_load_file("http://portal.mbauc.cl/iit-rayalab-service/xmlUsuario?inicio=".$i."&fin=200");
        foreach ($xml->puc->listado->usuario as $usuario) {
                list($apellido_paterno) = explode(' ', $usuario->apellidos);
                $apellido_materno = trim(str_replace($apellido_paterno, '', $usuario->apellidos));
                $apellidopaterno = $this->stringFormat->applyCamelcase($apellido_paterno);
                $apellido_maternoreset = $this->stringFormat->applyCamelcase($apellido_materno);

                $insertUsuario = new Usuario();
                if ($usuario->datos_particulares->pais->valor != '') { 
                    $parametroPais = strtolower($usuario->datos_particulares->pais->valor);
                    if ($parametroPais == "Chile") {
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
                $insertUsuario->nombre = $this->stringFormat->applyCamelcase($usuario->nombres);
                $insertUsuario->apellido_paterno = $apellidopaterno;
                $insertUsuario->apellido_materno = $apellido_maternoreset;
                $insertUsuario->fecha_creacion = date('Y-m-d H:i:s');
                $insertUsuario->fecha_nacimiento = $this->stringFormat->clearFecha($usuario->datos_particulares->fecha_nacimiento);

                if ($usuario->datos_particulares->genero->valor != "") {
                    $parametroSexo = $usuario->datos_particulares->genero->valor;
                    if ($parametroSexo == "M") {
                        $insertUsuario->sexo_id = 1;
                    } else {
                        $insertUsuario->sexo_id = 2;
                    }
                }
                $insertUsuario->insert();


                $insertNatural = new UsuarioNatural();
                $insertNatural->usuario_id = $insertUsuario->usuario_id;
                if ($usuario->datos_particulares->estado_civil->valor != "") {
                    $criteria = new CDbCriteria();
                    $criteria->compare('nombre', strtolower($usuario->datos_particulares->estado_civil->valor));
                    $estadoCivil = EstadoCivil::model()->find($criteria);
                    if ($estadoCivil == null) {
                        $estado = new EstadoCivil();
                        $estado->nombre = $usuario->datos_particulares->estado_civil->valor;
                        $estado->insert();
                        $insertNatural->estado_civil_id = $estado->estado_civil_id;
                    } else {
                        $insertNatural->estado_civil_id = $estadoCivil->estado_civil_id;
                    }
                }

                if (strpos($usuario->datos_comerciales->listado->email_particular, '@')) {
                    $insertNatural->email = strtolower($usuario->datos_comerciales->listado->email_particular);
                } else {
                    $insertNatural->email = strtolower($usuario->datos_comerciales->listado->email_comercial);
                }
                $insertNatural->direccion = strtolower($usuario->datos_particulares->direccion);
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
                    if ($item->empresa->valor != '' && $item->empresa->valor != 'NO ENCONTRADO' && $item->empresa->valor != ' ') {
                        $insertLaboralActual = new UsuarioLaboral();
                        $criteria = new CDbCriteria();
                        $criteria->compare('nombre', strtolower($item->empresa->valor));
                        $EmpresaFind = Empresa::model()->find($criteria);
                        
                        if ($EmpresaFind != null) {
                            
                            $insertLaboralActual->usuario_id = $insertUsuario->usuario_id;
                            $insertLaboralActual->actual_id = 1;
                            $insertLaboralActual->empresa_id = $EmpresaFind->empresa_id;
                            $insertLaboralActual->xml_nodo_id = $item->id;
                            if (strpos($item->email_comercial, '@')) {
                                $insertLaboralActual->email = strtolower($item->email_comercial);
                            }

                            if ($item->cargo != '-' && $item->cargo != ' - ' && $item->cargo != '' && $item->cargo != ' ') {
                                $criteria = new CDbCriteria();
                                $criteria->compare('titulo', trim(strtolower($item->cargo)));
                                $CargoFind = Cargo::model()->find($criteria);
                                if ($CargoFind == null) {
                                    $cargo = new Cargo();
                                    $cargo->titulo = trim(strtolower($item->cargo));
                                    $cargo->insert();
                                    $insertLaboralActual->cargo_id = $cargo->cargo_id;
                                } else {
                                    $insertLaboralActual->cargo_id = $CargoFind->cargo_id;
                                }
                                
                            }
                            $insertLaboralActual->fecha_ingreso = '0000-00-00';
                            $insertLaboralActual->fecha_egreso = '0000-00-00';
                          
                            $insertLaboralActual->insert();
                        }
                    }
                    
                }

                foreach ($usuario->datos_academicos->trayectoria_educacional->listado as $itemPregrado) {
                    $insertPregrado = new UsuarioPregrado();
                    if ($itemPregrado->institucion->valor != '') {
                        $criteria = new CDbCriteria();
                        $criteria->compare('nombre', trim(strtolower($itemPregrado->institucion->valor)));
                        $institucion = Institucion::model()->find($criteria);
                        if ($institucion != null) {
                             if ($itemPregrado->carrera->valor != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', trim(strtolower($itemPregrado->carrera->valor)));
                            $Carrera = Carrera::model()->find($criteria);
                            if ($Carrera != null) {
                                $insertPregrado->carrera_id = $Carrera->carrera_id;
                            }
                        }
                        $insertPregrado->usuario_id = $insertUsuario->usuario_id;
                        $insertPregrado->fecha_egreso = $this->stringFormat->clearFecha($itemPregrado->fecha_inicio);
                        $insertPregrado->fecha_titulacion = $this->stringFormat->clearFecha($itemPregrado->fecha_termino);
                        $insertPregrado->institucion_id = $institucion->institucion_id;
                        $insertPregrado->xml_nodo_id = $itemPregrado->id;
                        if($itemPregrado->profesion == 'SI'){
                              $insertPregrado->profesion_id = 1;
                        }else{
                              $insertPregrado->profesion_id = 2;
                        }
                        
                        $insertPregrado->insert();  
                        }
                    }
                }

                
                foreach ($usuario->datos_laborales->listado as $item) {

                    if ($item->empresa->valor != 'NO ENCONTRADO' && $item->empresa->valor != '' && $item->empresa->valor != ' ') {
                        $insertLaboral = new UsuarioLaboral();
                        $criteria = new CDbCriteria();
                        $criteria->compare('nombre', trim(strtolower($item->empresa->valor)));
                        $EmpresaFind = Empresa::model()->find($criteria);
                        if ($EmpresaFind != null) {

                            $insertLaboral->empresa_id = $EmpresaFind->empresa_id;
                            $insertLaboral->xml_nodo_id = $item->id;
                            if ($item->cargo != '-' && $item->cargo != ' - ' && $item->cargo != '' && $item->cargo != ' ') {
                                $criteria = new CDbCriteria();
                                $criteria->compare('titulo', trim(strtolower($item->cargo)));
                                $CargoFind = Cargo::model()->find($criteria);
                                if ($CargoFind == null) {
                                    $cargo = new Cargo();
                                    $cargo->titulo = trim(strtolower($item->cargo));
                                    $cargo->insert();
                                    $insertLaboral->cargo_id = $cargo->cargo_id;
                                } else {
                                    $insertLaboral->cargo_id = $CargoFind->cargo_id;
                                }
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
                
                foreach ($usuario->datos_matriculas->matricula->listado as $itemPostGrado) {
                    $insertPostgrado = new UsuarioPostgrado();
                    if ($itemPostGrado->producto->valor != '') {
                        $criteria = new CDbCriteria();
                        $criteria->compare('titulo', trim(strtolower($itemPostGrado->producto->valor)));
                        $Progestudio = ProgramaEstudio::model()->find($criteria);
                        if ($Progestudio == null) {
                            $InsertPestudio = new ProgramaEstudio();
                            $InsertPestudio->titulo = trim(strtolower($itemPostGrado->producto->valor));
                            $InsertPestudio->insert();
                            $insertPostgrado->programa_estudio_id = $InsertPestudio->programa_estudio_id;
                        } else {
                            $insertPostgrado->programa_estudio_id = $Progestudio->programa_estudio_id;
                        }

                        if ($itemPostGrado->estado->valor != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', trim((strtolower($itemPostGrado->estado->valor))));
                            $tipoEstado = TipoEstadoPostgrado::model()->find($criteria);
                            if ($tipoEstado == null) {
                                $InsertEstado = new TipoEstadoPostgrado();
                                $InsertEstado->titulo = trim(strtolower($itemPostGrado->estado->valor));
                                $InsertEstado->insert();
                                $insertPostgrado->tipo_estado_postgrado_id = $InsertEstado->tipo_estado_postgrado_id;
                            } else {
                                $insertPostgrado->tipo_estado_postgrado_id = $tipoEstado->tipo_estado_postgrado_id;
                            }
                        }

                        if ($itemPostGrado->situacion_dara->valor != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', trim(strtolower($itemPostGrado->situacion_dara->valor)));
                            $tipoSituacion = TipoSituacionPostgrado::model()->find($criteria);
                            if ($tipoSituacion == null) {
                                $InsertSituacion = new TipoSituacionPostgrado();
                                $InsertSituacion->titulo = trim(strtolower($itemPostGrado->situacion_dara->valor));
                                $InsertSituacion->insert();
                                $insertPostgrado->tipo_situacion_postgrado_id = $InsertSituacion->tipo_situacion_postgrado_id;
                            } else {
                                $insertPostgrado->tipo_situacion_postgrado_id = $tipoSituacion->tipo_situacion_postgrado_id;
                            }
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
    }

  
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
