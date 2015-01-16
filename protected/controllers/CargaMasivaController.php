<?php

class CargaMasivaController extends Controller {

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
            array('allow',
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('cargaUsuario'),
                'users' => array('@'),
            ),
            array('deny','users' => array('*'),
            ),
        );
    }

    public function actionCargaUsuario() {
       
        if (isset($_POST['CargaUsuario'])) {
        
            $aryUsuario = $this->getCSV();
            foreach ($aryUsuario['usuario'] as $usuario) {

                $criteria = new CDbCriteria();
                $criteria->addInCondition('rut', array($usuario['rut']));
                   if (Usuario::model()->count($criteria) == 0) {
                       //insertamos data en las tablas correspondientes
                        $usuarioGrabo = new Usuario();
                        $usuarioGrabo->rut = $usuario['rut'];
                        $usuarioGrabo->sexo_id = $usuario['sexo'];
                        $usuarioGrabo->nombre = ucwords($usuario['nombre']);
                        $usuarioGrabo->apellido_paterno = ucwords($usuario['apellido_paterno']);
                        $usuarioGrabo->apellido_materno = ucwords($usuario['apellido_materno']);
                        $usuarioGrabo->insert();
                        
                        
                        $usuario_id_nuevo_reg = $usuarioGrabo->primaryKey;
                        
                        $usuarioNaturalGrabo = new UsuarioNatural();
                        $usuarioNaturalGrabo->usuario_id = $usuario_id_nuevo_reg;
                        
                        if ($usuario['ciudad'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', $usuario['ciudad']);
                            $ciudadId = Ciudad::model()->find($criteria);
                            
                        }
                        
                        if ($usuario['comuna'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', $usuario['comuna']);
                            $comunaId = Comuna::model()->find($criteria);
                            
                        }
                        
                        $usuarioNaturalGrabo->ciudad_id = $ciudadId->ciudad_id;
                        $usuarioNaturalGrabo->comuna_id = $comunaId->comuna_id;
                        
                        $usuarioNaturalGrabo->direccion = $usuario['direccion'];
                        list($telefono_fijo_codigo,$telefono_fijo)=explode("-",$usuario['telefono_fijo']);
                        $usuarioNaturalGrabo->telefono_fijo_codigo = $telefono_fijo_codigo;
                        $usuarioNaturalGrabo->telefono_fijo = $telefono_fijo;
                        list($telefono_movil_codigo,$telefono_movil)=explode("-",$usuario['telefono_movil']);
                        $usuarioNaturalGrabo->telefono_celular_codigo = $telefono_movil_codigo;
                        $usuarioNaturalGrabo->telefono_celular = $telefono_movil;
                        $usuarioNaturalGrabo->email = $usuario['email_personal'];
                        $usuarioNaturalGrabo->insert();
                        
                        if ($usuario['empresa_id'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('empresa_vertical_id', $usuario['empresa_id']);
                            $empresaId = Empresa::model()->find($criteria);

                            if ($empresaId == null) {
                                $empresaId = new Empresa();
                                $empresaId->razon_social = $usuario['empresa_rs'];
                                $empresaId->telefono_fijo = $usuario['telefono_fijo_empresa'];
                                $empresaId->telefono_celular = $usuario['telefono_movil_empresa'];
                                $empresaId->email=$usuario['email_comercial'];
                                $empresaId->empresa_vertical_id = $usuario['empresa_id'];
                                $empresaId->insert();
                            }
                            
                            
                        }
                        
                        if ($usuario['area'] != '') {
                           //dato en blanco  
                        }
                        
                        
                        
                        $usuarioLaboralGrabo = new UsuarioLaboral();
                        $usuarioLaboralGrabo->usuario_id=$usuario_id_nuevo_reg;
                        $usuarioLaboralGrabo->empresa_id=$empresaId->empresa_id;
                        
                        $usuario['fecha_ingreso']=$this->fechaNulaVuelta1($usuario['fecha_ingreso']);
                        
                        if (substr_count($usuario['fecha_ingreso'], '-') > 0){
                            
                            $usuario['fecha_ingreso']=  str_replace("-","/",$usuario['fecha_ingreso']);
                        }
                        
                        list($dayin, $monthin, $yearin) = explode('/', $usuario['fecha_ingreso']);
                        
                        $usuarioLaboralGrabo->fecha_ingreso=$yearin.'-'.$monthin.'-'.$dayin;
                        
                        $usuario['fecha_termino']=$this->fechaNulaVuelta1($usuario['fecha_termino']);
                        if (substr_count($usuario['fecha_termino'], '-') > 0){
                            
                            $usuario['fecha_termino']=  str_replace("-","/",$usuario['fecha_termino']);
                        }
                        
                        list($dayeg, $montheg, $yeareg) = explode('/', $usuario['fecha_termino']);
                        $usuarioLaboralGrabo->fecha_egreso=$yeareg.'-'.$montheg.'-'. $dayeg;
                        $usuarioLaboralGrabo->actual_id=1;
                        
                        if ($usuario['cargo_id'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', $usuario['cargo_id']);
                            $cargoId = Cargo::model()->find($criteria);

                            if ($cargoId == null) {
                                $cargoId = new Cargo();
                                $cargoId->titulo = $usuario['cargo'];
                                $cargoId->insert();
                            }
                        }
                        //verificar
                        $usuarioLaboralGrabo->cargo_id=$cargoId->primaryKey;
                        $usuarioLaboralGrabo->insert();
                        
                        //mover afuera generar colector
                        if ($usuario['institucion_id'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('institucion_vertical_id', $usuario['institucion_id']);
                            $institucionId = Institucion::model()->find($criteria);

                            if ($institucionId == null) {
                                $institucionId = new Institucion();
                                $institucionId->nombre = $usuario['institucion'];
                                $institucionId->institucion_vertical_id = $usuario['institucion_id'];
                                $institucionId->insert();
                            }
                        }
                        
                        if ($usuario['facultad'] != '') {
                           //dato en blanco  
                        }
                        
                        if ($usuario['carrera_id'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('carrera_vertical_id', $usuario['carrera_id']);
                            $carreraId = Carrera::model()->find($criteria);

                            if ($carreraId == null) {
                                $carreraId = new Carrera();
                                $carreraId->nombre = $usuario['carrera'];
                                $carreraId->carrera_vertical_id=$usuario['carrera_id'];
                                $carreraId->insert();
                            }
                        }
                        
                        if ($usuario['escuela'] != '') {
                           //dato en blanco  
                        }
                        
                        if ($usuario['fecha_egreso'] != '') {
                           // dato en blanco  
                        }
                        $idioma_id='';
                        if ($usuario['idioma'] != '') {
                            
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', $usuario['idioma']);
                            $idiomaId = Idioma::model()->find($criteria);

                            if ($idiomaId == null) {
                                $idiomaId = new Idioma();
                                $idiomaId->nombre = $usuario['idioma'];
                                $idiomaId->insert();
                            }
                            $idioma_id=$idiomaId->idioma_id;
                        }
                        
                        if ($usuario['nivel_idioma'] != '') {
                            
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', $usuario['nivel_idioma']);
                            $idiomaNivelId = IdiomaNivel::model()->find($criteria);

                            if ($idiomaNivelId == null) {
                                $idiomaNivelId = new IdiomaNivel();
                                $idiomaNivelId->nombre = $usuario['nivel_idioma'];
                                $idiomaNivelId->insert();
                            }
                            $idioma_nivel_id=$idiomaNivelId->idioma_nivel_id;
                        }
                        
                        if ($idioma_id !=''){
                            $UsuarioIdiomaGrabo = new UsuarioIdioma();
                            $UsuarioIdiomaGrabo->usuario_id=$usuario_id_nuevo_reg;
                            $UsuarioIdiomaGrabo->idioma_id=$idioma_id;
                            $UsuarioIdiomaGrabo->idioma_nivel_id=$idioma_nivel_id;
                            $UsuarioIdiomaGrabo->insert();
                        }
                        
                        if ($usuario['programa_estudio'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', $usuario['programa_estudio']);
                            $programaEstudio = ProgramaEstudio::model()->find($criteria);

                            $programa_estudio_id=$programaEstudio->programa_estudio_id;
                        }
                        
                        if ($usuario['tipo_estado_postgrado'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', $usuario['tipo_estado_postgrado']);
                            $tipoEstadoPostGrado = TipoEstadoPostgrado::model()->find($criteria);

                            $tipo_estado_postgrado_id=$tipoEstadoPostGrado->tipo_estado_postgrado_id;
                        }
                        
                        if ($usuario['tipo_situacion_postgrado'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', $usuario['tipo_situacion_postgrado']);
                            $tipoSituacionPostGrado = TipoSituacionPostgrado::model()->find($criteria);

                            $tipo_situacion_postgrado_id=$tipoSituacionPostGrado->tipo_situacion_postgrado_id;
                        }
                        
                        $usuarioPostGradoGrabo = new UsuarioPostgrado();
                        $usuarioPostGradoGrabo->usuario_id=$usuario_id_nuevo_reg;
                        $usuarioPostGradoGrabo->programa_estudio_id=$programa_estudio_id;
                        $usuarioPostGradoGrabo->tipo_estado_postgrado_id=$tipo_estado_postgrado_id;
                        $usuarioPostGradoGrabo->tipo_situacion_postgrado_id=$tipo_situacion_postgrado_id;
                        
                        $usuario['fecha_matricula']=$this->fechaNulaVuelta1($usuario['fecha_matricula']);
                        if (substr_count($usuario['fecha_matricula'], '-') > 0){
                            
                            $usuario['fecha_matricula']=  str_replace("-","/",$usuario['fecha_matricula']);
                        }
                        
                        list($daym, $monthm, $yearm) = explode('/', $usuario['fecha_matricula']);
                        
                        $usuarioPostGradoGrabo->fecha_matricula=$yearm.'-'.$monthm.'-'.$daym;
                        
                        $usuario['fecha_version']=$this->fechaNulaVuelta1($usuario['fecha_version']);
                        if (substr_count($usuario['fecha_version'], '-') > 0){
                            
                            $usuario['fecha_version']=  str_replace("-","/",$usuario['fecha_version']);
                        }
                        
                        list($dayv, $monthv, $yearv) = explode('/', $usuario['fecha_version']);
                        
                        $usuarioPostGradoGrabo->fecha_version=$yearv.'-'.$monthv.'-'.$dayv;
                        $usuarioPostGradoGrabo->insert();
                        
                        $usuarioPreGradoGrabo = new UsuarioPregrado();
                        $usuarioPreGradoGrabo->usuario_id=$usuario_id_nuevo_reg;
                        $usuarioPreGradoGrabo->institucion_id=$institucionId->institucion_id;
                        $usuarioPreGradoGrabo->carrera_id=$carreraId->carrera_id;
                        
                        $usuario['fecha_egreso']=$this->fechaNulaVuelta1($usuario['fecha_egreso']);
                        if (substr_count($usuario['fecha_egreso'], '-') > 0){
                            
                            $usuario['fecha_egreso']=  str_replace("-","/",$usuario['fecha_egreso']);
                        }
                        
                        list($daye, $monthe, $yeare) = explode('/', $usuario['fecha_version']);
                        $usuarioPreGradoGrabo->fecha_egreso=$yeare. '-' .$monthe.'-'.$daye;
                        $usuarioPreGradoGrabo->insert();
                        
                        
                   }else {
                        /*$criteria = new CDbCriteria();
                        $criteria->compare('rut', $usuario['rut']);
                        $usuarioRutb = Usuario::model()->find($criteria);
                        
                            
                            $usuario_id_nuevo_reg=$usuarioRutb->usuario_id;
                            $modelUsuario = UsuarioLaboral::model()->findByPk($usuarioRutb->usuario_id);
                            $modelUsuario->setAttribute('actual_id', 2);
                            $modelUsuario->save();
                            
                            $usuarioGrabo = new Usuario();
                        $usuarioGrabo->rut = $usuario['rut'];
                        $usuarioGrabo->sexo_id = $usuario['sexo'];
                        $usuarioGrabo->nombre = $usuario['nombre'];
                        $usuarioGrabo->apellido_paterno = $usuario['apellido_paterno'];
                        $usuarioGrabo->apellido_materno = $usuario['apellido_materno'];
                        $usuarioGrabo->insert();
                        
                        
                        $usuario_id_nuevo_reg = $usuarioGrabo->primaryKey;
                        
                        $usuarioNaturalGrabo = new UsuarioNatural();
                        $usuarioNaturalGrabo->usuario_id = $usuario_id_nuevo_reg;
                        
                        if ($usuario['ciudad'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', $usuario['ciudad']);
                            $ciudadId = Ciudad::model()->find($criteria);
                            
                        }
                        
                        if ($usuario['comuna'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', $usuario['comuna']);
                            $comunaId = Comuna::model()->find($criteria);
                            
                        }
                        
                        $usuarioNaturalGrabo->ciudad_id = $ciudadId->ciudad_id;
                        $usuarioNaturalGrabo->comuna_id = $comunaId->comuna_id;
                        
                        $usuarioNaturalGrabo->direccion = $usuario['direccion'];
                        list($telefono_fijo_codigo,$telefono_fijo)=explode("-",$usuario['telefono_fijo']);
                        $usuarioNaturalGrabo->telefono_fijo_codigo = $telefono_fijo_codigo;
                        $usuarioNaturalGrabo->telefono_fijo = $telefono_fijo;
                        list($telefono_movil_codigo,$telefono_movil)=explode("-",$usuario['telefono_movil']);
                        $usuarioNaturalGrabo->telefono_celular_codigo = $telefono_movil_codigo;
                        $usuarioNaturalGrabo->telefono_celular = $telefono_movil;
                        $usuarioNaturalGrabo->email = $usuario['email_personal'];
                        $usuarioNaturalGrabo->insert();
                        
                        if ($usuario['empresa_id'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('empresa_vertical_id', $usuario['empresa_id']);
                            $empresaId = Empresa::model()->find($criteria);

                            if ($empresaId == null) {
                                $empresaId = new Empresa();
                                $empresaId->razon_social = $usuario['empresa_rs'];
                                $empresaId->telefono_fijo = $usuario['telefono_fijo_empresa'];
                                $empresaId->telefono_celular = $usuario['telefono_movil_empresa'];
                                $empresaId->email=$usuario['email_comercial'];
                                $empresaId->empresa_vertical_id = $usuario['empresa_id'];
                                $empresaId->insert();
                            }
                            
                            
                        }
                        
                        if ($usuario['area'] != '') {
                           //dato en blanco  
                        }
                        
                        
                        
                        $usuarioLaboralGrabo = new UsuarioLaboral();
                        $usuarioLaboralGrabo->usuario_id=$usuario_id_nuevo_reg;
                        $usuarioLaboralGrabo->empresa_id=$empresaId->empresa_id;
                        
                        $usuario['fecha_ingreso']=$this->fechaNulaVuelta1($usuario['fecha_ingreso']);
                        
                        if (substr_count($usuario['fecha_ingreso'], '-') > 0){
                            
                            $usuario['fecha_ingreso']=  str_replace("-","/",$usuario['fecha_ingreso']);
                        }
                        
                        list($dayin, $monthin, $yearin) = explode('/', $usuario['fecha_ingreso']);
                        
                        $usuarioLaboralGrabo->fecha_ingreso=$yearin.'-'.$monthin.'-'.$dayin;
                        
                        $usuario['fecha_termino']=$this->fechaNulaVuelta1($usuario['fecha_termino']);
                        if (substr_count($usuario['fecha_termino'], '-') > 0){
                            
                            $usuario['fecha_termino']=  str_replace("-","/",$usuario['fecha_termino']);
                        }
                        
                        list($dayeg, $montheg, $yeareg) = explode('/', $usuario['fecha_termino']);
                        $usuarioLaboralGrabo->fecha_egreso=$yeareg.'-'.$montheg.'-'. $dayeg;
                        $usuarioLaboralGrabo->actual_id=1;
                        
                        if ($usuario['cargo_id'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', $usuario['cargo_id']);
                            $cargoId = Cargo::model()->find($criteria);

                            if ($cargoId == null) {
                                $cargoId = new Cargo();
                                $cargoId->titulo = $usuario['cargo'];
                                $cargoId->insert();
                            }
                        }
                        //verificar
                        $usuarioLaboralGrabo->cargo_id=$cargoId->primaryKey;
                        $usuarioLaboralGrabo->insert();
                        
                        //mover afuera generar colector
                        if ($usuario['institucion_id'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('institucion_vertical_id', $usuario['institucion_id']);
                            $institucionId = Institucion::model()->find($criteria);

                            if ($institucionId == null) {
                                $institucionId = new Institucion();
                                $institucionId->nombre = $usuario['institucion'];
                                $institucionId->institucion_vertical_id = $usuario['institucion_id'];
                                $institucionId->insert();
                            }
                        }
                        
                        if ($usuario['facultad'] != '') {
                           //dato en blanco  
                        }
                        
                        if ($usuario['carrera_id'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('carrera_vertical_id', $usuario['carrera_id']);
                            $carreraId = Carrera::model()->find($criteria);

                            if ($carreraId == null) {
                                $carreraId = new Carrera();
                                $carreraId->nombre = $usuario['carrera'];
                                $carreraId->carrera_vertical_id=$usuario['carrera_id'];
                                $carreraId->insert();
                            }
                        }
                        
                        if ($usuario['escuela'] != '') {
                           //dato en blanco  
                        }
                        
                        if ($usuario['fecha_egreso'] != '') {
                           // dato en blanco  
                        }
                        $idioma_id='';
                        if ($usuario['idioma'] != '') {
                            
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', $usuario['idioma']);
                            $idiomaId = Idioma::model()->find($criteria);

                            if ($idiomaId == null) {
                                $idiomaId = new Idioma();
                                $idiomaId->nombre = $usuario['idioma'];
                                $idiomaId->insert();
                            }
                            $idioma_id=$idiomaId->idioma_id;
                        }
                        
                        if ($usuario['nivel_idioma'] != '') {
                            
                            $criteria = new CDbCriteria();
                            $criteria->compare('nombre', $usuario['nivel_idioma']);
                            $idiomaNivelId = IdiomaNivel::model()->find($criteria);

                            if ($idiomaNivelId == null) {
                                $idiomaNivelId = new IdiomaNivel();
                                $idiomaNivelId->nombre = $usuario['nivel_idioma'];
                                $idiomaNivelId->insert();
                            }
                            $idioma_nivel_id=$idiomaNivelId->idioma_nivel_id;
                        }
                        
                        if ($idioma_id !=''){
                            $UsuarioIdiomaGrabo = new UsuarioIdioma();
                            $UsuarioIdiomaGrabo->usuario_id=$usuario_id_nuevo_reg;
                            $UsuarioIdiomaGrabo->idioma_id=$idioma_id;
                            $UsuarioIdiomaGrabo->idioma_nivel_id=$idioma_nivel_id;
                            $UsuarioIdiomaGrabo->insert();
                        }
                        
                        if ($usuario['programa_estudio'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', $usuario['programa_estudio']);
                            $programaEstudio = ProgramaEstudio::model()->find($criteria);

                            $programa_estudio_id=$programaEstudio->programa_estudio_id;
                        }
                        
                        if ($usuario['tipo_estado_postgrado'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', $usuario['tipo_estado_postgrado']);
                            $tipoEstadoPostGrado = TipoEstadoPostgrado::model()->find($criteria);

                            $tipo_estado_postgrado_id=$tipoEstadoPostGrado->tipo_estado_postgrado_id;
                        }
                        
                        if ($usuario['tipo_situacion_postgrado'] != '') {
                            $criteria = new CDbCriteria();
                            $criteria->compare('titulo', $usuario['tipo_situacion_postgrado']);
                            $tipoSituacionPostGrado = TipoSituacionPostgrado::model()->find($criteria);

                            $tipo_situacion_postgrado_id=$tipoSituacionPostGrado->tipo_situacion_postgrado_id;
                        }
                        
                        $usuarioPostGradoGrabo = new UsuarioPostgrado();
                        $usuarioPostGradoGrabo->usuario_id=$usuario_id_nuevo_reg;
                        $usuarioPostGradoGrabo->programa_estudio_id=$programa_estudio_id;
                        $usuarioPostGradoGrabo->tipo_estado_postgrado_id=$tipo_estado_postgrado_id;
                        $usuarioPostGradoGrabo->tipo_situacion_postgrado_id=$tipo_situacion_postgrado_id;
                        
                        $usuario['fecha_matricula']=$this->fechaNulaVuelta1($usuario['fecha_matricula']);
                        if (substr_count($usuario['fecha_matricula'], '-') > 0){
                            
                            $usuario['fecha_matricula']=  str_replace("-","/",$usuario['fecha_matricula']);
                        }
                        
                        list($daym, $monthm, $yearm) = explode('/', $usuario['fecha_matricula']);
                        
                        $usuarioPostGradoGrabo->fecha_matricula=$yearm.'-'.$monthm.'-'.$daym;
                        
                        $usuario['fecha_version']=$this->fechaNulaVuelta1($usuario['fecha_version']);
                        if (substr_count($usuario['fecha_version'], '-') > 0){
                            
                            $usuario['fecha_version']=  str_replace("-","/",$usuario['fecha_version']);
                        }
                        
                        list($dayv, $monthv, $yearv) = explode('/', $usuario['fecha_version']);
                        
                        $usuarioPostGradoGrabo->fecha_version=$yearv.'-'.$monthv.'-'.$dayv;
                        $usuarioPostGradoGrabo->insert();
                        
                        $usuarioPreGradoGrabo = new UsuarioPregrado();
                        $usuarioPreGradoGrabo->usuario_id=$usuario_id_nuevo_reg;
                        $usuarioPreGradoGrabo->institucion_id=$institucionId->institucion_id;
                        $usuarioPreGradoGrabo->carrera_id=$carreraId->carrera_id;
                        
                        $usuario['fecha_egreso']=$this->fechaNulaVuelta1($usuario['fecha_egreso']);
                        if (substr_count($usuario['fecha_egreso'], '-') > 0){
                            
                            $usuario['fecha_egreso']=  str_replace("-","/",$usuario['fecha_egreso']);
                        }
                        
                        list($daye, $monthe, $yeare) = explode('/', $usuario['fecha_version']);
                        $usuarioPreGradoGrabo->fecha_egreso=$yeare. '-' .$monthe.'-'.$daye;
                        $usuarioPreGradoGrabo->insert();*/
                        
                        $colectorExistentes[$i]=$usuario;
                   }
            }

        }
        
        $this->render('cargaUsuario', array('msg' => $msg));
    }

    private function getCSV() {

        $aryDatos = array();
        $aryDatos['error'] = '';

        if (file_exists($_FILES['CargaUsuario']['tmp_name']['usuariosCSV'])) {

            $lines = file($_FILES['CargaUsuario']['tmp_name']['usuariosCSV'], FILE_IGNORE_NEW_LINES);
            $filaExcel=1;
            
            foreach ($lines as $key => $value) {
                $item = implode(',', str_getcsv($value));
                list(
                        $rut, 
                        $sexo, 
                        $nombre, 
                        $apellidoP, 
                        $apellidoM, 
                        $ciudad, 
                        $comuna, 
                        $direccion,
                        $telefonoF, 
                        $telefonoM, 
                        $emailP, 
                        $empresaId,
                        $empresaRS,
                        $area,
                        $cargoId,
                        $cargo,
                        $fechaIngreso,
                        $fechaTermino,
                        $emailC,
                        $telefonoFE,
                        $telefonoME,
                        $institucionId,
                        $institucion,
                        $facultad,
                        $carreraId,
                        $carrera,
                        $escuela,
                        $fechaEgreso,
                        $idioma,
                        $nivelIdioma,
                        $programaEstudio,
                        $tipoEstadoPostGrado,
                        $tipoSituacionPostgrado,
                        $fechaMatricula,
                        $fechaVersion
                        ) = explode(';', $item);

                    
                    if ($filaExcel == 1) {
                        
                    }  else {
                        
                    
                    
                            $aryDatos['usuario'][] = array(
                                'rut' =>  trim(mb_strtolower(utf8_encode(str_replace(".","",$rut)), 'UTF-8')),
                                'sexo' =>  trim(mb_strtolower(utf8_encode($sexo), 'UTF-8')),
                                'nombre' =>  trim(mb_strtolower(utf8_encode($nombre), 'UTF-8')),
                                'apellido_paterno' =>  trim(mb_strtolower(utf8_encode($apellidoP), 'UTF-8')),
                                'apellido_materno' =>  trim(mb_strtolower(utf8_encode($apellidoM), 'UTF-8')),
                                'ciudad' =>  trim(mb_strtolower(utf8_encode($ciudad), 'UTF-8')),
                                'comuna' =>  trim(mb_strtolower(utf8_encode($comuna), 'UTF-8')),
                                'direccion' =>  trim(mb_strtolower(utf8_encode($direccion), 'UTF-8')),
                                'telefono_fijo' =>  trim(mb_strtolower(utf8_encode($telefonoF), 'UTF-8')),
                                'telefono_movil' =>  trim(mb_strtolower(utf8_encode($telefonoM), 'UTF-8')),
                                'email_personal' =>  trim(mb_strtolower(utf8_encode($emailP), 'UTF-8')),
                                'empresa_id' =>  trim(mb_strtolower(utf8_encode($empresaId), 'UTF-8')),
                                'empresa_rs' =>  trim(mb_strtolower(utf8_encode($empresaRS), 'UTF-8')),
                                'cargo_id' =>  trim(mb_strtolower(utf8_encode($cargoId), 'UTF-8')),
                                'cargo' =>  trim(mb_strtolower(utf8_encode($cargo), 'UTF-8')),
                                'fecha_ingreso' =>  trim(mb_strtolower(utf8_encode($fechaIngreso), 'UTF-8')), 
                                'fecha_termino' =>  trim(mb_strtolower(utf8_encode($fechaTermino), 'UTF-8')),
                                'email_comercial' =>  trim(mb_strtolower(utf8_encode($emailC), 'UTF-8')), 
                                'telefono_fijo_empresa' =>  trim(mb_strtolower(utf8_encode($telefonoFE), 'UTF-8')),
                                'telefono_movile_empresa' =>  trim(mb_strtolower(utf8_encode($telefonoME), 'UTF-8')),
                                'institucion_id' =>  trim(mb_strtolower(utf8_encode($institucionId), 'UTF-8')),
                                'institucion' =>  trim(mb_strtolower(utf8_encode($institucion), 'UTF-8')),
                                'carrera_id' =>  trim(mb_strtolower(utf8_encode($carreraId), 'UTF-8')),
                                'carrera' =>  trim(mb_strtolower(utf8_encode($carrera), 'UTF-8')),
                                'escuela' =>  trim(mb_strtolower(utf8_encode($escuela), 'UTF-8')),
                                'fecha_egreso' =>  trim(mb_strtolower(utf8_encode($fechaEgreso), 'UTF-8')),
                                'idioma' =>  trim(mb_strtolower(utf8_encode($idioma), 'UTF-8')),
                                'nivel_idioma' =>  trim(mb_strtolower(utf8_encode($nivelIdioma), 'UTF-8')),
                                'programa_estudio' =>  trim(mb_strtolower(utf8_encode($programaEstudio), 'UTF-8')),
                                'tipo_estado_postgrado' =>  trim(mb_strtolower(utf8_encode($tipoEstadoPostGrado), 'UTF-8')),
                                'tipo_situacion_postgrado' =>  trim(mb_strtolower(utf8_encode($tipoSituacionPostGrado), 'UTF-8')), 
                                'fecha_matricula' =>  trim(mb_strtolower(utf8_encode($fechaMatricula), 'UTF-8')),
                                'fecha_version' =>  trim(mb_strtolower(utf8_encode($fechaVersion), 'UTF-8')),
                            );
                    }
                $filaExcel++;   
            }
        } else {
            $aryDatos['error'] = 'Debe adjuntar un archivo CSV válido.';
        }

        return $aryDatos;
    }
    private function fechaNulaVuelta1($param) {
        if (strlen($parama) == 0) {
            
        } else {
            if (substr_count($param,"-") == 2 ) {
                return $param;
            } else 
            if (substr_count($param,"-")== 1) {
                return "01-".$param;
            } else 
            if (substr_count($param,"-")== 0) {
                return "-01-01".$param;
            }
        }    
    }
    
    public function actionIndex() {
       
        $this->actionCargaUsuario();
    }
}
