<?php

class BuscadorController extends Controller {

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
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'resultado', 'json', 'download','tmp'),
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

    public function actionDownload() {
        $DateTime = new DateTime('NOW');
        $filename = "PucInforme_" . $DateTime->format('Y-m-d_H_i_s') . ".xls";
        header('Content-Encoding: UTF-8');
        header('Content-type: application/vnd.ms-excel; charset=UTF-8');
        header("Content-Disposition: attachment; filename=$filename");
        header("Pragma: public");
        header("Expires: 0");
        echo "\xEF\xBB\xBF"; // UTF-8 BOM
        echo $_POST['tabla'];
    }

    public function actionIndex() {
        $listFiltro = CHtml::listData(BuscadorFiltro::model()->findAll(), 'buscador_filtro_id', 'titulo');

        $this->render('index', array(
            'listFiltro' => $listFiltro
        ));
    }

    public function actionJson() {
        $this->layout = false;
        $cs = Yii::app()->clientScript;
        $cs->reset();

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/controller.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/config.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/buscador.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jszip/dist/jszip-utils.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jszip/dist/jszip.js');
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/zip/zip.js');
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/zip/inflate.js');
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/zip/deflate.js');
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/zip/zip-fs.js');
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/zip/zip-ext.js');
//        
        Yii::app()->clientScript->registerScript('config', 'Config.baseUrl = "' . Yii::app()->baseUrl . '";');

        $jsClassName = str_replace('Controller', '', get_class(Yii::app()->getController()));
        $jsObjectName = lcfirst($jsClassName);

        Yii::app()->clientScript->registerScript(Yii::app()->controller->id . '_init', 'var ' . $jsObjectName . ' = new ' . $jsClassName . '();');
        Yii::app()->clientScript->registerScript(Yii::app()->controller->id, $jsObjectName . '.' . Yii::app()->controller->action->id . '();');


        $this->render('json');
    }

    public function actionResultado() {

//        $basePath = 'C:/AppServ/www/yii/project/puc_dev/json/usuario_tmp.js';
//        $basePathFinal = 'C:/AppServ/www/yii/project/puc_dev/json/usuario.js';
//        
//        $sql = "SELECT 
//                    usuario_id as id,
//                    tipo_fuente_ingreso_id as tfi,
//                    sexo_id as si,
//                    rut as ru,
//                    nombre as nm,
//                    apellido_paterno as ap,
//                    apellido_materno as am,
//                    fecha_nacimiento as fn,
//                    fecha_creacion as fc,
//                    identidad_id as ii
//                FROM usuario";
//        
//        file_put_contents($basePath, CJSON::encode(Yii::app()->db->createCommand($sql)->queryAll()));
//        
//        $options = [ 'gs' => [ 'Content-Type' => 'application/javascript', 'acl' => 'public-read', 'read_cache_expiry_seconds'=>300]];
//        $ctx = stream_context_create($options);
//        
//        rename($basePath, $basePathFinal, $ctx);
//        
//        exit();

        if (isset($_GET['Buscador'])) {
            
            $natural = '';
            $laboral = '';
            $pregrado = '';
            $postgrado = '';
            if (isset($_GET['Buscador']['filtroDato'])) {
                foreach ($_GET['Buscador']['filtroDato'] as $dato) {

                    if ($dato == 'natural') {
                        $natural = $dato;
                    } else if ($dato == 'laboral') {
                        $laboral = $dato;
                    } else if ($dato == 'pregrado') {
                        $pregrado = $dato;
                    } else if ($dato == 'postgrado') {
                        $postgrado = $dato;
                    }
                }
            }

            $criteria = new CDbCriteria();
            $criteria->compare('buscador_filtro_id', $_GET['Buscador']['buscadorfiltro']);
            $criteria->order = 'tabla';
            $aryFiltroItem = BuscadorFiltroItem::model()->findAll($criteria);

            if (empty($aryFiltroItem)) {
            
                $strUsuarioSql = 'SELECT * FROM usuario LIMIT '.$_GET['inicio'].',5000';
                $aryUsuario = Usuario::model()->findAllBySql($strUsuarioSql);
//                
                if ($_GET['yt0'] == 'Buscar') {
                    $this->createTable($aryUsuario, false, $natural, $laboral, $pregrado, $postgrado);
                } else
                if ($_GET['yt1'] == 'Descarga excel') {
                    $this->createTable($aryUsuario, true, $natural, $laboral, $pregrado, $postgrado);
                }
            } else {
                
                $QueryFinaly = $this->getUsuarioSql($aryFiltroItem);
                
                if (strlen($QueryFinaly) > 0) {
                    $aryUsuario = Usuario::model()->findAllBySql($QueryFinaly);
                    if (count($aryUsuario) > 0) {
                        if ($_GET['yt0'] == 'Buscar') {
                            $this->createTable($aryUsuario, false, $natural, $laboral, $pregrado, $postgrado);
                        } else
                        if ($_GET['yt1'] == 'Descarga excel') {
                            $this->createTable($aryUsuario, true, $natural, $laboral, $pregrado, $postgrado);
                        }
                    } else {

                        echo 'No se encuentran coincidencias con los filtros de busqueda asignados. '
                        . 'Favor edite su filtro y vuelva a instentarlo';
                    }
                } else {

                    echo 'No se encuentran coincidencias con los filtros de busqueda asignados. '
                    . 'Favor edite su filtro y vuelva a instentarlo';
                }
            }
        }
    }

    private function createTable($aryUsuario, $download, $natural, $laboral, $pregrado, $postgrado) {


        if ($download) {

            $DateTime = new DateTime('NOW');
            $filename = "PucInforme_" . $DateTime->format('Y-m-d_H_i_s') . ".xls";
            header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header("Content-Disposition: attachment; filename=$filename");
            header("Pragma: public");
            header("Expires: 0");
            echo "\xEF\xBB\xBF"; // UTF-8 BOM
        } else {
            header('Content-Type: text/html; charset=utf-8');
        }

        //$fichero = Yii::app()->getBasePath().'/data/informe.html';
        
// Abre el fichero para obtener el contenido existente
//        $actual = file_get_contents($fichero);
//
//        file_put_contents($fichero, '');
        
//        $tableHeader = '';
//        $tableHeader .= '<table width="4000" border="1">';
//        $tableHeader .= '<tr>';
//        $tableHeader .= '<th>ID</th>';
//        $tableHeader .= '<th>Rut</th>';
//        $tableHeader .= '<th>Nombre</th>';
//        $tableHeader .= '<th>Sexo</th>';
//        $tableHeader .= '<th>Fuente de Ingreso</th>';
//        if ($natural == 'natural') {
//            //usuario natural
//
//            $tableHeader .= '<th>Pais</th>';
//            $tableHeader .= '<th>Región</th>';
//            $tableHeader .= '<th>Ciudad</th>';
//            $tableHeader .= '<th>Comuna</th>';
//            $tableHeader .= '<th>Direccion</th>';
//            $tableHeader .= '<th>Telefono fijo</th>';
//            $tableHeader .= '<th>Telefono celular</th>';
//            $tableHeader .= '<th>Email</th>';
//        }
//        if ($laboral == 'laboral') {
//            //usuario laboral
//
//            $tableHeader .= '<th>Empresa</th>';
//            $tableHeader .= '<th>Industria</th>';
//            $tableHeader .= '<th>Area experiencia</th>';
//            $tableHeader .= '<th>Cargo</th>';
//            $tableHeader .= '<th>Email Comercial</th>';
//            $tableHeader .= '<th>Fecha ingreso</th>';
//            $tableHeader .= '<th>Fecha egreso</th>';
//        }
//        if ($pregrado == 'pregrado') {
//            //usuario profesion
//
//            $tableHeader .= '<th>Institucion</th>';
//            $tableHeader .= '<th>Carrera</th>';
//            $tableHeader .= '<th>Fecha egreso</th>';
//        }
//
//        if ($postgrado == 'postgrado') {
//            //usuario profesion
//
//            $tableHeader .= '<th>Programa de Estudio</th>';
//            $tableHeader .= '<th>Estado Postgrado</th>';
//            $tableHeader .= '<th>Situacion Postgrado</th>';
//            $tableHeader .= '<th>Fecha Matricula</th>';
//            $tableHeader .= '<th>Año Version</th>';
//        }
//        $tableHeader .= '</tr>';
//        
////        file_put_contents($fichero, $tableHeader,FILE_APPEND);
//        
//        //contenido
//        $i = 1;
//        $tableContent = '';    
//        foreach ($aryUsuario as $usuario) {
//            
//            $tableContent .= '';
//            
//            $tableContent .= '<tr>';
//            $tableContent .= '<td>' . $i . '</td>';
//            $tableContent .= '<td>' . $usuario->rut . '</td>';
//            $tableContent .= '<td>' . $usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno . '</td>';
//            $tableContent .= '<td>' . $usuario->sexo->nombre . '</td>';
//            $tableContent .= '<td>' . $usuario->tipo_fuente_ingreso->titulo . '</td>';
//            if ($natural == 'natural') {
//                //usuario natural
//                $tableContent .= '<td>' . $usuario->usuario_natural[0]->pais->nombre . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_natural[0]->region->nombre . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_natural[0]->ciudad->nombre . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_natural[0]->comuna->nombre . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_natural[0]->direccion . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_natural[0]->telefono_fijo . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_natural[0]->telefono_celular . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_natural[0]->email . '</td>';
//            }
//            if ($laboral == 'laboral') {
//                //usuario laboral
//
//                $tableContent .= '<td>' . $usuario->usuario_laboral[0]->empresa->nombre . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_laboral[0]->industria->titulo . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_laboral[0]->area_experiencia->titulo . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_laboral[0]->cargo->titulo . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_laboral[0]->email . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_laboral[0]->fecha_ingreso . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_laboral[0]->fecha_egreso . '</td>';
//            }
//            if ($pregrado == 'pregrado') {
//                //usuario preGrado
//
//                $criteria = new CDbCriteria();
//                $criteria->compare('usuario_id', $usuario->usuario_id);
//                $criteria->compare('profesion_id', 1);
//                $userPregrado = UsuarioPregrado::model()->find($criteria);
//
//                $institucion = Institucion::model()->findByPk($userPregrado->institucion_id);
//                $carrera = Carrera::model()->findByPk($userPregrado->carrera_id);
//
//                $tableContent .= '<td>' . $institucion->nombre . '</td>';
//                $tableContent .= '<td>' . $carrera->nombre . '</td>';
//                $tableContent .= '<td>' . $userPregrado->fecha_titulacion . '</td>';
//            }
//            if ($postgrado == 'postgrado') {
//                //usuario PostGrado
//                $tableContent .= '<td>' . $usuario->usuario_postgrado[0]->programa_estudio->titulo . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_postgrado[0]->tipo_estado_postgrado->titulo . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_postgrado[0]->tipo_situacion_postgrado->titulo . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_postgrado[0]->fecha_matricula . '</td>';
//                $tableContent .= '<td>' . $usuario->usuario_postgrado[0]->fecha_version . '</td>';
//            }
//            $tableContent .= '</tr>';
//            $i++;
//        }
//        
////        file_put_contents($fichero, $tableContent,FILE_APPEND);
//        
//        //end
//        $tableFooter =  '</table>';
//        
////        file_put_contents($fichero, $tableFooter,FILE_APPEND);
//        echo 'END';
//        exit();

        $i = 1;
        $table = '';
        echo '<table width="4000" border="1">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Rut</th>';
        echo '<th>Nombre</th>';
        echo '<th>Sexo</th>';
        echo '<th>Fuente de Ingreso</th>';
        if ($natural == 'natural') {
            //usuario natural

            echo '<th>Pais</th>';
            echo '<th>Región</th>';
            echo '<th>Ciudad</th>';
            echo '<th>Comuna</th>';
            echo '<th>Direccion</th>';
            echo '<th>Telefono fijo</th>';
            echo '<th>Telefono celular</th>';
            echo '<th>Email</th>';
        }
        if ($laboral == 'laboral') {
            //usuario laboral

            echo '<th>Empresa</th>';
            echo '<th>Industria</th>';
            echo '<th>Area experiencia</th>';
            echo '<th>Cargo</th>';
            echo '<th>Email Comercial</th>';
            echo '<th>Fecha ingreso</th>';
            echo '<th>Fecha egreso</th>';
        }
        if ($pregrado == 'pregrado') {
            //usuario profesion

            echo '<th>Institucion</th>';
            echo '<th>Carrera</th>';
            echo '<th>Fecha egreso</th>';
        }

        if ($postgrado == 'postgrado') {
            //usuario profesion

            echo '<th>Programa de Estudio</th>';
            echo '<th>Estado Postgrado</th>';
            echo '<th>Situacion Postgrado</th>';
            echo '<th>Fecha Matricula</th>';
            echo '<th>Año Version</th>';
        }
        echo '</tr>';
        
        foreach ($aryUsuario as $usuario) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
//            echo '<td>a</td>';
//            echo '<td>a</td>';
//            echo '<td>a</td>';
//            echo '<td>a</td>';
            
            echo '<td>' . $usuario->rut . '</td>';
            echo '<td>' . $usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno . '</td>';
            echo '<td>' . $usuario->sexo->nombre . '</td>';
            echo '<td>' . $usuario->tipo_fuente_ingreso->titulo . '</td>';
            if ($natural == 'natural') {
                //usuario natural
                echo '<td>' . $usuario->usuario_natural[0]->pais->nombre . '</td>';
                echo '<td>' . $usuario->usuario_natural[0]->region->nombre . '</td>';
                echo '<td>' . $usuario->usuario_natural[0]->ciudad->nombre . '</td>';
                echo '<td>' . $usuario->usuario_natural[0]->comuna->nombre . '</td>';
                echo '<td>' . $usuario->usuario_natural[0]->direccion . '</td>';
                echo '<td>' . $usuario->usuario_natural[0]->telefono_fijo . '</td>';
                echo '<td>' . $usuario->usuario_natural[0]->telefono_celular . '</td>';
                echo '<td>' . $usuario->usuario_natural[0]->email . '</td>';
                
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
            }
            if ($laboral == 'laboral') {
                //usuario laboral

                echo '<td>' . $usuario->usuario_laboral[0]->empresa->nombre . '</td>';
                echo '<td>' . $usuario->usuario_laboral[0]->industria->titulo . '</td>';
                echo '<td>' . $usuario->usuario_laboral[0]->area_experiencia->titulo . '</td>';
                echo '<td>' . $usuario->usuario_laboral[0]->cargo->titulo . '</td>';
                echo '<td>' . $usuario->usuario_laboral[0]->email . '</td>';
                echo '<td>' . $usuario->usuario_laboral[0]->fecha_ingreso . '</td>';
                echo '<td>' . $usuario->usuario_laboral[0]->fecha_egreso . '</td>';
                
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
            }
            if ($pregrado == 'pregrado') {
                //usuario preGrado

                $criteria = new CDbCriteria();
                $criteria->compare('usuario_id', $usuario->usuario_id);
                $criteria->compare('profesion_id', 1);
                $userPregrado = UsuarioPregrado::model()->find($criteria);

                $institucion = Institucion::model()->findByPk($userPregrado->institucion_id);
                $carrera = Carrera::model()->findByPk($userPregrado->carrera_id);

                echo '<td>' . $institucion->nombre . '</td>';
                echo '<td>' . $carrera->nombre . '</td>';
                echo '<td>' . $userPregrado->fecha_titulacion . '</td>';
                 
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
            }
            if ($postgrado == 'postgrado') {
                //usuario PostGrado
                echo '<td>' . $usuario->usuario_postgrado[0]->programa_estudio->titulo . '</td>';
                echo '<td>' . $usuario->usuario_postgrado[0]->tipo_estado_postgrado->titulo . '</td>';
                echo '<td>' . $usuario->usuario_postgrado[0]->tipo_situacion_postgrado->titulo . '</td>';
                echo '<td>' . $usuario->usuario_postgrado[0]->fecha_matricula . '</td>';
                echo '<td>' . $usuario->usuario_postgrado[0]->fecha_version . '</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
//                echo '<td>a</td>';
            }
            echo '</tr>';
            $i++;
        }

        echo '</table>';

        echo $table;        
    }
    
    public function actionTmp(){
        
    }

    public function getUsuarioSql($aryFiltroItem) {
        //ARRAY para los Where
        //usuarioNatural
        $JoinNatural = '';
        $JoinLaboral = '';
        $JoinProfecional = '';
        $JoinPostgrado = '';

        $aryWhereTipoFuenteIngreso = array();
        $aryWhereUnPais = array();
        $aryWhereUnRegion = array();

        //usuariolaboral - usuarioLaboral
        $aryWhereUcEmpresa = array();
        $aryWhereUcIndustria = array();
        $aryWhereUcAreaExperiencia = array();
        $aryWhereUcCargo = array();

        //usuarioProfesion - usuarioPregrado
        $aryWhereUpInstitucion = array();
        $aryWhereUpCarrera = array();
        $aryWhereFecha_egreso = array();

        //usuarioPostgrado
        $aryWhereUgProgramaEstudioPostgrado = array();
        $aryWhereUgTipoEstadoPostgrado = array();
        $aryWhereUgTipoSituacionPostgrado = array();
        $aryWhereVersionPostgrado = array();
        //Llenado de los Array Con where Por tablas
        foreach ($aryFiltroItem as $filtroItem) {
            switch ($filtroItem->tabla) {

                //USUARIO POSTGRADO
                case 'tipo_fuente_ingreso';
                    $aryWhereTipoFuenteIngreso[] = $filtroItem->tabla_id;
                    break;
                //USUARIO NATURAL
                case 'pais';
                    $JoinNatural = 'Inner Join usuario_natural AS un ON un.usuario_id = u.usuario_id';
                    $aryWhereUnPais[] = $filtroItem->tabla_id;
                    break;
                case 'region';
                    $JoinNatural = 'Inner Join usuario_natural AS un ON un.usuario_id = u.usuario_id';
                    $aryWhereUnRegion[] = $filtroItem->tabla_id;
                    break;
                //USUARIO COMERCIAL O LABORAL
                case 'empresa';
                    $JoinLaboral = 'Inner Join usuario_laboral AS uc ON uc.usuario_id = u.usuario_id';
                    $aryWhereUcEmpresa[] = $filtroItem->tabla_id;
                    break;
                case 'area_experiencia';
                    $JoinLaboral = 'Inner Join usuario_laboral AS uc ON uc.usuario_id = u.usuario_id';
                    $aryWhereUcAreaExperiencia[] = $filtroItem->tabla_id;
                    break;
                case 'cargo';
                    $JoinLaboral = 'Inner Join usuario_laboral AS uc ON uc.usuario_id = u.usuario_id';
                    $aryWhereUcCargo[] = $filtroItem->tabla_id;
                    break;
                case 'industria';
                    $JoinLaboral = 'Inner Join usuario_laboral AS uc ON uc.usuario_id = u.usuario_id';
                    $aryWhereUcIndustria[] = $filtroItem->tabla_id;
                    break;
                //USUARIO PROFESION O PREGRADO
                case 'institucion';
                    $JoinProfecional = 'Inner Join usuario_pregrado AS up ON up.usuario_id = u.usuario_id';
                    $aryWhereUpInstitucion[] = $filtroItem->tabla_id;
                    break;
                case 'carrera';
                    $JoinProfecional = 'Inner Join usuario_pregrado AS up ON up.usuario_id = u.usuario_id';
                    $aryWhereUpCarrera[] = $filtroItem->tabla_id;
                    break;
                case 'fecha_egreso';
                    $JoinProfecional = 'Inner Join usuario_pregrado AS up ON up.usuario_id = u.usuario_id';
                    $aryWhereFecha_egreso[] = 'YEAR(up.fecha_titulacion) = ' . $filtroItem->tabla_id;
                    break;
                //USUARIO POSTGRADO
                case 'programa_estudio';
                    $JoinPostgrado = 'Inner Join usuario_postgrado AS ug ON ug.usuario_id = u.usuario_id';
                    $aryWhereUgProgramaEstudioPostgrado[] = $filtroItem->tabla_id;
                    break;
                case 'tipo_estado_postgrado';
                    $JoinPostgrado = 'Inner Join usuario_postgrado AS ug ON ug.usuario_id = u.usuario_id';
                    $aryWhereUgTipoEstadoPostgrado[] = $filtroItem->tabla_id;
                    break;
                case 'tipo_situacion_postgrado';
                    $JoinPostgrado = 'Inner Join usuario_postgrado AS ug ON ug.usuario_id = u.usuario_id';
                    $aryWhereUgTipoSituacionPostgrado[] = $filtroItem->tabla_id;
                    break;
                case 'version';

                    $JoinPostgrado = 'Inner Join usuario_postgrado AS ug ON ug.usuario_id = u.usuario_id';
                    $aryWhereVersionPostgrado[] = 'ug.fecha_version like ' . '"' . $filtroItem->tabla_id . '-%-%' . '"';
                    break;
                default:
                    break;
            }
        }

        $ArrayAnd = array();
//USUARIO NATURAL
        if (count($aryWhereUnPais) > 0) {
            $ArrayAnd[] = 'un.pais_id IN (' . implode(' , ', $aryWhereUnPais) . ')';
        }
        if (count($aryWhereUnRegion) > 0) {
            $ArrayAnd[] = 'un.region_id IN (' . implode(' , ', $aryWhereUnRegion) . ')';
        }

        if (count($aryWhereTipoFuenteIngreso) > 0) {
            $ArrayAnd[] = 'u.tipo_fuente_ingreso_id IN (' . implode(' , ', $aryWhereTipoFuenteIngreso) . ')';
        }
//USUARIO COMERCIAL O LABORAL
        if (count($aryWhereUcEmpresa) > 0) {
            $ArrayAnd[] = 'uc.empresa_id IN (' . implode(' , ', $aryWhereUcEmpresa) . ')';
        }
        if (count($aryWhereUcAreaExperiencia) > 0) {
            $ArrayAnd[] = 'uc.area_experiencia_id IN (' . implode(' , ', $aryWhereUcAreaExperiencia) . ')';
        }
        if (count($aryWhereUcCargo) > 0) {
            $ArrayAnd[] = 'uc.cargo_id IN (' . implode(' , ', $aryWhereUcCargo) . ')';
        }
        if (count($aryWhereUcIndustria) > 0) {
            $ArrayAnd[] = 'uc.industria_id IN (' . implode(' , ', $aryWhereUcIndustria) . ')';
        }

//USUARIO PROFESION O PREGRADO
        if (count($aryWhereUpInstitucion) > 0) {
            $ArrayAnd[] = 'up.institucion_id IN (' . implode(' , ', $aryWhereUpInstitucion) . ') AND up.profesion_id = 1';
        }
        if (count($aryWhereUpCarrera) > 0) {
            $ArrayAnd[] = 'up.carrera_id IN (' . implode(' , ', $aryWhereUpCarrera) . ')';
        }
        if (count($aryWhereFecha_egreso) > 0) {
            $ArrayAnd[] = '(' . implode(' OR ', $aryWhereFecha_egreso) . ')';
        }

//USUARIO POSTGRADO

        if (count($aryWhereUgProgramaEstudioPostgrado) > 0) {
            $ArrayAnd[] = 'ug.programa_estudio_id IN (' . implode(' , ', $aryWhereUgProgramaEstudioPostgrado) . ')';
        }
        if (count($aryWhereUgTipoEstadoPostgrado) > 0) {
            $ArrayAnd[] = 'ug.tipo_estado_postgrado_id IN (' . implode(' , ', $aryWhereUgTipoEstadoPostgrado) . ')';
        }
        if (count($aryWhereUgTipoSituacionPostgrado) > 0) {
            $ArrayAnd[] = 'ug.tipo_situacion_postgrado_id IN (' . implode(' , ', $aryWhereUgTipoSituacionPostgrado) . ')';
        }

        if (count($aryWhereVersionPostgrado) > 0) {
            $ArrayAnd[] = '(' . implode(' OR ', $aryWhereVersionPostgrado) . ')';
        }

        $StrImplodeAND = implode(' AND ', $ArrayAnd);
        $strUsuarioSql = 'Select Distinct u.* From usuario AS u ' . $JoinNatural . ' ' . $JoinLaboral . ' ' . $JoinProfecional . ' ' . $JoinPostgrado . ' Where ' . $StrImplodeAND . '';

        return $strUsuarioSql;
    }

}
