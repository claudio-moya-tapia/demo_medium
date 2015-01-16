<?php

class SincronizacionController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    private $usuario;
    private $xmlUsuario;

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
                'actions' => array('index', 'view','leerarchivo','sincroempresa','sincrocarrera','sincroinstitucion','registroxml','resetxml'),
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

    private function SincronizacionUsuario($i) {

        $usuarioNormalId = $this->UsuarioNormal();
        if($usuarioNormalId != ''){
        echo 'Usuario Normal OK! ' . $i . '</br>';
        }else{
        echo 'Error Usuario Normal ' . $i . '</br>';
        }
        $usuarioNaturalId = $this->UsuarioNatural();
        if($usuarioNaturalId != ''){
        echo 'Usuario Natural OK! ' . $i . '</br>';
        }else{
        echo 'Error Usuario Natural ' . $i . '</br>';
        }
        $usuarioLaboralId = $this->UsuarioLaboral();
        if($usuarioLaboralId != ''){
        echo 'Usuario Laboral OK! ' . $i . '</br>';
        }else{
        echo 'Error Usuario Laboral ' . $i . '</br>';
        }
        $usuarioComercallId = $this->UsuarioComercial();
        if($usuarioComercallId != ''){
        echo 'Usuario Comercial OK! ' . $i . '</br>';
        }else{
        echo 'Error Usuario Comercial ' . $i . '</br>';
        }
        $usuarioPregradoId = $this->UsuarioPregrado();
        if($usuarioPregradoId != ''){
        echo 'Usuario Pregrado OK! ' . $i . '</br>';
        }else{
        echo 'Error Usuario Pregrado ' . $i . '</br>';
        }
        $usuarioPostgradoId = $this->UsuarioPostgrado();
        if($usuarioPostgradoId != ''){
        echo 'Usuario Postgrado OK! ' . $i . '</br>';
        }else{
        echo 'Error Usuario Postgrado ' . $i . '</br>';
        }
    }
    
    
    public function actionResetxml() {
        if ($_SERVER['HTTP_HOST'] == '192.168.1.49') {
            //Local
            $basePath = 'C:/AppServ/www/yii/project/puc_dev/xml/xmlRegistro.txt';
            $basePathFinal = 'C:/AppServ/www/yii/project/puc_dev/xml/xmlRegistro.txt';
            $file=fopen($basePath,"a") or die("Problemas");
        } else {
            //Google
            $basePath = Yii::app()->params['baseUrlGs'] . '/xml/xmlRegistro.txt';
            $basePathFinal = Yii::app()->params['baseUrlGs'] . '/xml/xmlRegistro.txt';
            $file=fopen($basePath,"a") or die("Problemas");
        }
            fclose($file);
            file_put_contents($basePath, '0');  
    }
    
    
    public function actionRegistroxml() {

        if ($_SERVER['HTTP_HOST'] == '192.168.1.49') {
            //Local
            $basePath = 'C:/AppServ/www/yii/project/puc_dev/xml/xmlRegistro.txt';
            $basePathFinal = 'C:/AppServ/www/yii/project/puc_dev/xml/xmlRegistro.txt';
        } else {
            //Google
            $basePath = Yii::app()->params['baseUrlGs'] . '/xml/xmlRegistro.txt';
            $basePathFinal = Yii::app()->params['baseUrlGs'] . '/xml/xmlRegistro.txt';
        }
            $content = file_get_contents("$basePath");
            $this->Leerarchivo($content);
    }
    
    
    private function Leerarchivo($inicio=null){
        $start = microtime(true);
        $xml = file_get_contents("http://portal.mbauc.cl/iit-rayalab-service/xmlUsuario?inicio=".$inicio."&fin=500");
        $start2 = round((microtime(true) - $start), 2) . 'segs';
        $name = 'usuarioXML_'.$inicio.'_'.$fin.'_'.$start2;
        $basePath = 'C:/AppServ/www/yii/project/puc_dev/xml/' . $name . '_tmp.xml';
        $basePathFinal = 'C:/AppServ/www/yii/project/puc_dev/xml/' . $name . '.xml';
        
        if ($_SERVER['HTTP_HOST'] == '192.168.1.49') {
            //Local
            $basePathRegistro = 'C:/AppServ/www/yii/project/puc_dev/xml/xmlRegistro.txt';
            $basePath = 'C:/AppServ/www/yii/project/puc_dev/xml/' . $name . '_tmp.xml';
            $basePathFinal = 'C:/AppServ/www/yii/project/puc_dev/xml/' . $name . '.xml';
        } else {
            //Google
            $basePathRegistro = 'C:/AppServ/www/yii/project/puc_dev/xml/xmlRegistro.txt';
            $basePath = Yii::app()->params['baseUrlGs'] . '/xml/' . $name . '_tmp.xml';
            $basePathFinal = Yii::app()->params['baseUrlGs'] . '/xml/' . $name . '.xml';
        }

        error_reporting(E_ALL);
        ini_set('display_errors', '1');


        file_put_contents($basePath, $xml);

        $options = [ 'gs' => [ 'Content-Type' => 'text/xml', 'acl' => 'public-read', 'read_cache_expiry_seconds' => 300]];
        $ctx = stream_context_create($options);

        rename($basePath, $basePathFinal, $ctx);
        
        $registro = $inicio + 500;
        file_put_contents($basePathRegistro, $registro);
    }
    
    public function actionIndex($us=null) {
        //20.0000
        //500 
        //40 x WS manual
        // inicio=0&fin=500&us=puc-sincr
        // inicio=500&fin=500
        // inicio=1000&fin=500
        //... + 2
        
        if($us == 'puc-sincr'){
          $e = 0;
    //        for ($i = 0; $i <= 20; $i+=10) {

            $xml = simplexml_load_file("../puc_dev/xml/usuarioXML0-500.xml");
            
            foreach ($xml->puc->listado->usuario as $xmlUsuario) {

                    $this->usuario = $this->UsuarioVerificacion($xmlUsuario->rut);
                    $this->xmlUsuario = $xmlUsuario;
                    $this->SincronizacionUsuario($e);
                    $e++;
                }
    //        }
        }
    }

    private function UsuarioVerificacion($Xmlrut) {

        $rut = Yii::app()->rut->deleteFormat($Xmlrut);
        $criteria = new CDbCriteria();
        $criteria->compare('rut', $rut);
        $usuario = Usuario::model()->find($criteria);

        return $usuario;
    }

    public function sincroInstitucion() {
        $connection = Yii::app()->db;
        $comm = $connection->createCommand('truncate table institucion');
        $comm->execute();
        $xml = simplexml_load_file("http://portal.mbauc.cl/iit-rayalab-service/xmlUsuariosListado");
        foreach ($xml->puc->institucion->listado as $institucion) {

            $criteria = new CDbCriteria();
            $criteria->compare('nombre', strtolower($institucion->valor));
            $instituciones = Institucion::model()->find($criteria);
            if ($instituciones == null) {
                $InsertInstitucion = new Institucion();
                $InsertInstitucion->institucion_json_id = $institucion->id;
                $InsertInstitucion->nombre = strtolower($institucion->valor);
                $InsertInstitucion->insert();
            }
        }
    }

    public function sincroCarrera() {
        $connection = Yii::app()->db;
        $comm = $connection->createCommand('truncate table carrera');
        $comm->execute();
        $xml = simplexml_load_file("http://portal.mbauc.cl/iit-rayalab-service/xmlUsuariosListado");
        foreach ($xml->puc->carreras->listado as $carreras) {

            $criteria = new CDbCriteria();
            $criteria->compare('nombre', strtolower($carreras->valor));
            $carrera = Carrera::model()->find($criteria);
            if ($carrera == null) {
                $InsertCarreras = new Carrera();
                $InsertCarreras->carrera_id_json = $carreras->id;
                $InsertCarreras->nombre = strtolower($carreras->valor);
                $InsertCarreras->insert();
            }
        }
    }

    public function sincroEmpresa() {
        $connection = Yii::app()->db;
        $comm = $connection->createCommand('truncate table empresa');
        $comm->execute();
        for ($i = 0; $i <= 20000; $i+=200) {
            
            $xml = simplexml_load_file("http://portal.mbauc.cl/iit-rayalab-service/xmlEmpresa?inicio=" . $i . "&fin=200");

            //check item vacio break!
            
            foreach ($xml->puc->empresa->listado as $empresa) {

                $criteria = new CDbCriteria();
                $criteria->compare('nombre', strtolower($this->stringFormat->applyUnderCase($empresa->nombre)));
                $CheckEmpresa = Empresa::model()->find($criteria);

                if ($empresa->nombre != '') {
                    if ($CheckEmpresa == null) {
                        $InsertEmpresa = new Empresa();
                        $InsertEmpresa->nombre = $this->stringFormat->applyUnderCase($empresa->nombre);
                        $InsertEmpresa->codigo_postal = $empresa->codigo_postal;
                        $InsertEmpresa->direccion = $this->stringFormat->applyUnderCase($empresa->direccion);
                        $InsertEmpresa->telefono_fijo = $empresa->telefono;
                        $InsertEmpresa->telefono_fax = $empresa->fax;
                        $InsertEmpresa->url = $empresa->sitio_web;
                        $razonSocial = $this->stringFormat->resetNum($empresa->razon_social);
                        if (is_numeric($razonSocial)) {
                            $InsertEmpresa->razon_social = '';
                            $InsertEmpresa->rut = $razonSocial;
                        } else if (strrpos($razonSocial, 'k')) {
                            $sinK = str_replace('k', '', $razonSocial);
                            if (is_numeric($sinK)) {
                                $InsertEmpresa->razon_social = '';
                                $InsertEmpresa->rut = $razonSocial;
                            } else {
                                $InsertEmpresa->razon_social = $this->stringFormat->applyUnderCase($empresa->razon_social);
                                $InsertEmpresa->rut = $empresa->rut;
                            }
                        } else {
                            $InsertEmpresa->razon_social = $this->stringFormat->applyUnderCase($empresa->razon_social);
                            $InsertEmpresa->rut = $empresa->rut;
                        }

                        if ($empresa->comuna->valor != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', strtolower($empresa->comuna->valor));
                            $comuna = Comuna::model()->find($criteria);
                            if ($comuna != null) {
                                $InsertEmpresa->comuna_id = $comuna->comuna_id;
                                $InsertEmpresa->ciudad_id = $comuna->ciudad_id;
                                $InsertEmpresa->region_id = $comuna->region_id;
                                $InsertEmpresa->pais_id = $comuna->pais_id;
                            } else if ($empresa->ciudad->valor != '') {

                                $criteria = new CDbCriteria();
                                $criteria->compare('nombre', strtolower($empresa->ciudad->valor));
                                $ciudad = Ciudad::model()->find($criteria);
                                if ($ciudad != null) {
                                    $InsertEmpresa->ciudad_id = $ciudad->ciudad_id;
                                    $InsertEmpresa->region_id = $ciudad->region_id;
                                    $InsertEmpresa->pais_id = $ciudad->pais_id;
                                } else if ($empresa->pais->valor != '') {
                                    $criteria = new CDbCriteria();
                                    $criteria->compare('nombre', strtolower($empresa->pais->valor));
                                    $pais = Pais::model()->find($criteria);
                                    if ($pais == null) {
                                        $InsertEmpresa->pais_id = 0;
                                    } else {
                                        $InsertEmpresa->pais_id = $pais->pais_id;
                                    }
                                }
                            }
                        }

                        if ($empresa->giro->valor != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', strtolower($empresa->giro->valor));
                            $giro = TipoGiro::model()->find($criteria);
                            if ($giro == null) {
                                $giroInsert = new TipoGiro();
                                $giroInsert->titulo = strtolower($empresa->giro->valor);
                                $giroInsert->insert();
                                $InsertEmpresa->tipo_giro_id = $giroInsert->tipo_giro_id;
                            } else {
                                $InsertEmpresa->tipo_giro_id = $giro->tipo_giro_id;
                            }
                        }
                        $criteria = new CDbCriteria();
                        $criteria->compare('titulo', strtolower($empresa->rango_de_venta->valor));
                        $ventas = RangoFacturacion::model()->find($criteria);
                        if ($ventas == null) {
                            if ($empresa->rango_de_venta->valor != '') {
                                $factInsert = new RangoFacturacion();
                                $factInsert->titulo = strtolower($empresa->rango_de_venta->valor);
                                $factInsert->insert();
                                $InsertEmpresa->rango_facturacion_id = $factInsert->rango_facturacion_id;
                            } else {
                                $InsertEmpresa->rango_facturacion_id = 0;
                            }
                        } else {
                            $InsertEmpresa->rango_facturacion_id = $ventas->rango_facturacion_id;
                        }
                        $InsertEmpresa->insert();
                    }
                }
            }
        }
    }

    private function UsuarioNormal() {

        list($apellido_paterno) = explode(' ', $this->xmlUsuario->apellidos);
        $apellido_materno = trim(str_replace($apellido_paterno, '', $this->xmlUsuario->apellidos));
        $apellidopaterno = $this->stringFormat->applyCamelcase($apellido_paterno);
        $apellido_maternoreset = $this->stringFormat->applyCamelcase($apellido_materno);
        $nombre = $this->stringFormat->applyCamelcase($this->xmlUsuario->nombres);
        $fechaNacimiento = $this->stringFormat->clearFecha($this->xmlUsuario->datos_particulares->fecha_nacimiento);
        $pais = strtolower($this->xmlUsuario->datos_particulares->pais->valor);
        if ($pais = 'Chile') {
            $identidad = 1;
        } else {
            $identidad = 2;
        }

        if ($this->xmlUsuario->datos_particulares->genero->valor != '') {
            $parametroSexo = $this->xmlUsuario->datos_particulares->genero->valor;
            if ($parametroSexo == 'M') {
                $sexoId = 1;
            } else {
                $sexoId = 2;
            }
        }

        if ($this->usuario->rut != '') {
            //Update Usuario Normal
            $this->usuario->nombre = $nombre;
            $this->usuario->apellido_paterno = $apellidopaterno;
            $this->usuario->apellido_materno = $apellido_maternoreset;
            $this->usuario->identidad_id = $identidad;
            $this->usuario->tipo_fuente_ingreso_id = 1;
            $this->usuario->fecha_creacion = date('Y-m-d H:i:s');
            $this->usuario->fecha_nacimiento = $fechaNacimiento;
            $this->usuario->sexo_id = $sexoId;
            $this->usuario->update();
            return $this->usuario->usuario_id;
        } else {
            $insertUsuariNormal = new Usuario();
            $insertUsuariNormal->nombre = $nombre;
            $insertUsuariNormal->apellido_paterno = $apellidopaterno;
            $insertUsuariNormal->apellido_materno = $apellido_maternoreset;
            $insertUsuariNormal->identidad_id = $identidad;
            $insertUsuariNormal->tipo_fuente_ingreso_id = 1;
            $insertUsuariNormal->fecha_creacion = date('Y-m-d H:i:s');
            $insertUsuariNormal->fecha_nacimiento = $fechaNacimiento;
            $insertUsuariNormal->rut = Yii::app()->rut->deleteFormat($this->xmlUsuario->rut);
            $insertUsuariNormal->sexo_id = $sexoId;
            $insertUsuariNormal->Insert();
            
            $criteria = new CDbCriteria();
            $criteria->compare('id', $insertUsuariNormal->usuario_id);
            $usuario = Usuario::model()->find($criteria);
            $this->usuario = $usuario;
            
            return $insertUsuariNormal->usuario_id;
        }
    }

    private function UsuarioNatural() {

        $criteria = new CDbCriteria();
        $criteria->addSearchCondition('usuario_id', $this->usuario->usuario_id);
        $usuario = UsuarioNatural::model()->find($criteria);
        $array = $this->SetvaloresNatural();

        if ($usuario == null) {
            //insert Natural
            $usuario = new UsuarioNatural();
            $isNew = true;
        } else {
            //update Natural
            $isNew = false;
        }

        $usuario->comuna_id = $array['comunaId'];
        $usuario->ciudad_id = $array['ciudadId'];
        $usuario->region_id = $array['regionId'];
        $usuario->pais_id = $array['paisId'];
        $usuario->direccion = $array['direccion'];
        $usuario->telefono_celular = $array['Tcelular'];
        $usuario->telefono_fijo = $array['Tfijo'];
        $usuario->estado_civil_id = $array['estadoCivilid'];
        $usuario->email = $array['email'];

        if ($isNew) {
            $usuario->insert();
        } else {
            $usuario->update();
        }

        return $usuario->usuario_natural_id;
    }

    private function UsuarioLaboral() {
        foreach ($this->xmlUsuario->datos_laborales->listado as $item) {

            $array = $this->SetvaloresLaboral($item);
            //comprobar llenado de array
            if ($array != '') {
                $criteria = new CDbCriteria();
                $criteria->compare('xml_nodo_id', $item->id);
                $UsuarioLaboral = UsuarioLaboral::model()->find($criteria);
                if ($UsuarioLaboral == null) {
                    //insert
                    $UsuarioLaboral = new UsuarioLaboral();
                    $isNew = true;
                } else {
                    //update
                    $isNew = false;
                }

                $UsuarioLaboral->empresa_id = $array['empresaId'];
                $UsuarioLaboral->cargo_id = $array['cargoId'];
                $UsuarioLaboral->actual_id = $array['actualId'];
                $UsuarioLaboral->fecha_ingreso = $array['fechaIngreso'];
                $UsuarioLaboral->fecha_egreso = $array['fechaTermino'];
                $UsuarioLaboral->email = $array['email'];

                if ($isNew) {
                    $UsuarioLaboral->usuario_id = $this->usuario->usuario_id;
                    $UsuarioLaboral->insert();
                } else {
                    $UsuarioLaboral->update();
                }
                return $UsuarioLaboral->usuario_laboral_id;
            } else {
                return '';
            }
        }
    }

    private function UsuarioComercial() {
        foreach ($this->xmlUsuario->datos_comerciales->listado as $item) {

            $array = $this->SetvaloresLaboral($item);
            //comprobar llenado de array
            if ($array != '') {
                $criteria = new CDbCriteria();
                $criteria->compare('rut', $this->xmlUsuario->rut);
                $rutUser = Usuario::model()->find($criteria);

                $criteria = new CDbCriteria();
                $criteria->compare('usuario_id', $rutUser->usuario_id);
                $criteria->compare('actual_id', 1);
                $UsuarioLaboral = UsuarioLaboral::model()->find($criteria);

                if ($UsuarioLaboral == null) {
                    //insert
                    $UsuarioLaboral = new UsuarioLaboral();
                    $isNew = true;
                } else {
                    //insert
                    $isNew = false;
                }

                $UsuarioLaboral->empresa_id = $array['empresaId'];
                $UsuarioLaboral->cargo_id = $array['cargoId'];
                $UsuarioLaboral->actual_id = $array['actualId'];
                $UsuarioLaboral->fecha_ingreso = $array['fechaIngreso'];
                $UsuarioLaboral->fecha_egreso = $array['fechaTermino'];
                $UsuarioLaboral->email = $array['email'];

                if ($isNew) {
                    $UsuarioLaboral->insert();
                } else {
                    $UsuarioLaboral->update();
                }
                return $UsuarioLaboral->usuario_laboral_id;
            } else {
                return '';
            }
        }
    }

    private function UsuarioPregrado() {
        foreach ($this->xmlUsuario->datos_academicos->trayectoria_educacional->listado as $itemPregrado) {
            $array = $this->SetvaloresPregrado($itemPregrado);

            if ($array != '') {
                $criteria = new CDbCriteria();
                $criteria->compare('xml_nodo_id', $itemPregrado->id);
                $UsuarioPregrado = UsuarioPregrado::model()->find($criteria);
                if ($UsuarioPregrado == null) {
                    //insert
                    $UsuarioPregrado = new UsuarioPregrado();
                    $isNew = true;
                } else {
                    //update
                    $isNew = false;
                }

                $UsuarioPregrado->institucion_id = $array['institucion_id'];
                $UsuarioPregrado->xml_nodo_id = $array['xmlnodo_id'];
                $UsuarioPregrado->carrera_id = $array['carrera_id'];
                $UsuarioPregrado->fecha_egreso = $array['fechaEgreso'];
                $UsuarioPregrado->fecha_titulacion = $array['fechaTitulacion'];
                $UsuarioPregrado->profesion_id = $array['profesion'];

                if ($isNew) {
                    $UsuarioPregrado->usuario_id = $this->usuario->usuario_id;
                    $UsuarioPregrado->insert();
                } else {
                    $UsuarioPregrado->update();
                }
                return $UsuarioPregrado->usuario_pregrado_id;
            } else {
                return '';
            }
        }
    }

    private function UsuarioPostgrado() {
        foreach ($this->xmlUsuario->datos_matriculas->matricula->listado as $item) {
            $array = $this->SetvaloresPostgrado($item);

            if ($array != '') {
                $criteria = new CDbCriteria();
                $criteria->compare('xml_nodo_id', $item->id);
                $UsuarioPostgrado = UsuarioPostgrado::model()->find($criteria);
                if ($UsuarioPostgrado == null) {
                    //insert
                    $UsuarioPostgrado = new UsuarioPostgrado();
                    $isNew = true;
                } else {
                    //update
                    $isNew = false;
                }

                $UsuarioPostgrado->tipo_estado_postgrado_id = $array['tipoEstado'];
                $UsuarioPostgrado->xml_nodo_id = $item->id;
                $UsuarioPostgrado->programa_estudio_id = $array['programaestudio'];
                $UsuarioPostgrado->fecha_version = $array['version'];
                $UsuarioPostgrado->fecha_matricula = $array['fecha_matricula'];
                $UsuarioPostgrado->tipo_situacion_postgrado_id = $array['tipoSituacion'];

                if ($isNew) {
                    $UsuarioPostgrado->usuario_id = $this->usuario->usuario_id;
                    $UsuarioPostgrado->insert();
                } else {
                    $UsuarioPostgrado->update();
                }
                return $UsuarioPostgrado->usuario_postgrado_id;
            } else {
                return '';
            }
        }
    }

    private function SetvaloresNatural() {
        $usuario_id = $this->usuario->usuario_id;
        $estadoCivil = strtolower($this->xmlUsuario->datos_particulares->estado_civil->valor);
        $direccion = strtolower($this->xmlUsuario->datos_particulares->direccion);
        $Tcelular = $this->xmlUsuario->datos_particulares->telefono_movil;
        $Tfijo = $this->xmlUsuario->datos_particulares->telefono_fijo;
        if (strpos($this->xmlUsuario->datos_comerciales->listado->email_particular, '@')) {
            $email = $this->xmlUsuario->datos_comerciales->listado->email_comercial;
        } else {
            $email = $this->xmlUsuario->datos_comerciales->listado->email_particular;
        }

        $criteria = new CDbCriteria();
        $criteria->compare('nombre', $estadoCivil);
        $esCivil = EstadoCivil::model()->find($criteria);
        if ($esCivil != null) {
            $estadoCivilId = $esCivil->estado_civil_id;
        }

        $criteria = new CDbCriteria();
        $criteria->compare('nombre', strtolower($this->xmlUsuario->datos_particulares->comuna));
        $ComunaFind = Comuna::model()->find($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('nombre', strtolower($this->xmlUsuario->datos_particulares->ciudad));
        $CiudadFind = Ciudad::model()->find($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('nombre', strtolower($this->xmlUsuario->datos_particulares->pais->valor));
        $PaisFind = Pais::model()->find($criteria);

        if ($ComunaFind != null) {
            $comunaId = $ComunaFind->comuna_id;
            $ciudadId = $ComunaFind->ciudad_id;
            $regionId = $ComunaFind->region_id;
            $paisId = $ComunaFind->pais_id;
        } else if ($CiudadFind != null) {
            $comunaId = '';
            $ciudadId = $ComunaFind->ciudad_id;
            $regionId = $ComunaFind->region_id;
            $paisId = $ComunaFind->pais_id;
        } else if ($PaisFind != null) {
            $comunaId = '';
            $ciudadId = '';
            $regionId = '';
            $paisId = $ComunaFind->pais_id;
        }

        $ArryNatural = Array(
            'estadoCivilid' => $estadoCivilId,
            'direccion' => $direccion,
            'Tcelular' => $Tcelular,
            'Tfijo' => $Tfijo,
            'comunaId' => $comunaId,
            'ciudadId' => $ciudadId,
            'regionId' => $regionId,
            'paisId' => $paisId,
            'email' => $email,
            'usuarioId' => $usuario_id,
        );

        return $ArryNatural;
    }

    private function SetvaloresLaboral($item) {

        $criteria = new CDbCriteria();
        $criteria->compare('nombre', trim(strtolower($item->empresa->valor)));
        $EmpresaFind = Empresa::model()->find($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('titulo', trim(strtolower($item->cargo)));
        $CargoFind = Cargo::model()->find($criteria);

        if ($CargoFind == null) {
            $cargo = new Cargo();
            $cargo->titulo = trim(strtolower($item->cargo));
            $cargo->insert();
            $cargo_id = $cargo->cargo_id;
        } else {
            $cargo_id = $CargoFind->cargo_id;
        }

        $fechaInicio = $item->fecha_inicio;
        $fechaTermino = $item->fecha_termino;
        if (strpos($this->xmlUsuario->datos_comerciales->listado->email_comercial, '@')) {
            $email = strtolower($this->xmlUsuario->datos_comerciales->listado->email_comercial);
        } else {
            $email = strtolower($this->xmlUsuario->datos_comerciales->listado->email_particular);
        }
        if ($EmpresaFind != null) {

            $arrayLaboral = array(
                'empresaId' => $EmpresaFind->empresa_id,
                'cargoId' => $cargo_id,
                'actualId' => 2,
                'fechaIngreso' => $fechaInicio,
                'fechaTermino' => $fechaTermino,
                'email' => $email,
            );

            return $arrayLaboral;
        } else {
            return '';
        }
    }

    private function SetvaloresComercial($item) {

        $criteria = new CDbCriteria();
        $criteria->compare('nombre', trim(strtolower($item->empresa->valor)));
        $EmpresaFind = Empresa::model()->find($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('titulo', trim(strtolower($item->cargo)));
        $CargoFind = Cargo::model()->find($criteria);

        if ($CargoFind == null) {
            $cargo = new Cargo();
            $cargo->titulo = trim(strtolower($item->cargo));
            $cargo->insert();
            $cargo_id = $cargo->cargo_id;
        } else {
            $cargo_id = $CargoFind->cargo_id;
        }

        if (strpos($item->email_comercial, '@')) {
            $email = strtolower($item->email_comercial);
        } else {
            $email = strtolower($item->email_particular);
        }
        if ($EmpresaFind != null) {

            $arrayLaboral = Array(
                'empresaId' => $EmpresaFind->empresa_id,
                'cargoId' => $cargo_id,
                'actualId' => 1,
                'fechaIngreso' => '0000-00-00',
                'fechaTermino' => '0000-00-00',
                'email' => $email,
            );

            return $arrayLaboral;
        } else {
            return '';
        }
    }

    private function SetvaloresPregrado($item) {

        $criteria = new CDbCriteria();
        $criteria->compare('nombre', trim(strtolower($item->institucion->valor)));
        $institucion = Institucion::model()->find($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('nombre', trim(strtolower($item->carrera->valor)));
        $carrera = Carrera::model()->find($criteria);


        if ($institucion != null && $carrera != null) {
            if ($item->profesion == 'SI') {
                $profesion = $item->profesion_id = 1;
            } else {
                $profesion = $item->profesion_id = 2;
            }

            $xmlnodo_id = $item->id;
            $institucion_id = $institucion->institucion_id;
            $carrera_id = $carrera->carrera_id;
            $fecha_egreso = $this->stringFormat->clearFecha($item->fecha_inicio);
            $fecha_titulacion = $this->stringFormat->clearFecha($item->fecha_termino);


            $arrayPregrado = Array(
                'xmlnodo_id' => $xmlnodo_id,
                'institucion_id' => $institucion_id,
                'carrera_id' => $carrera_id,
                'fechaEgreso' => $fecha_egreso,
                'fechaTitulacion' => $fecha_titulacion,
                'profesion' => $profesion,
            );
            return $arrayPregrado;
        } else {
            return '';
        }
    }

    private function SetvaloresPostgrado($item) {

        $criteria = new CDbCriteria();
        $criteria->compare('titulo', trim(strtolower($item->producto->valor)));
        $programaestudio = ProgramaEstudio::model()->find($criteria);

        if ($programaestudio != null) {

            if ($item->estado->valor != '') {
                $criteria = new CDbCriteria();
                $criteria->compare('titulo', trim(strtolower($item->estado->valor)));
                $tipoEstado = TipoEstadoPostgrado::model()->find($criteria);
                if ($tipoEstado == null) {
                    $InsertEstado = new TipoEstadoPostgrado();
                    $InsertEstado->titulo = trim(strtolower($item->estado->valor));
                    $InsertEstado->insert();
                    $tipoEstado = $InsertEstado->tipo_estado_postgrado_id;
                } else {
                    $tipoEstado = $tipoEstado->tipo_estado_postgrado_id;
                }
            }


            if ($item->situacion_dara->valor != '') {
                $criteria = new CDbCriteria();
                $criteria->compare('titulo', trim(strtolower($item->situacion_dara->valor)));
                $tipoSituacion = TipoSituacionPostgrado::model()->find($criteria);
                if ($tipoSituacion == null) {
                    $InsertSituacion = new TipoSituacionPostgrado();
                    $InsertSituacion->titulo = trim(strtolower($item->situacion_dara->valor));
                    $InsertSituacion->insert();
                    $tipoSituacion = $InsertSituacion->tipo_situacion_postgrado_id;
                } else {
                    $tipoSituacion = $tipoSituacion->tipo_situacion_postgrado_id;
                }
            }

            $version = '01-' . $item->version->fecha;
            $version = $this->stringFormat->clearFecha($version);
            $fecha_matricula = $this->stringFormat->clearFecha($item->fecha_matricula);
            $arrayPregrado = Array(
                'tipoEstado' => $tipoEstado,
                'tipoSituacion' => $tipoSituacion,
                'programaestudio' => $programaestudio->programa_estudio_id,
                'version' => $version,
                'fecha_matricula' => $fecha_matricula,
            );
            return $arrayPregrado;
        } else {
            return '';
        }
    }

}
