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
                'actions' => array('create', 'update', 'resultado'),
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

    public function actionIndex() {
        $listFiltro = CHtml::listData(BuscadorFiltro::model()->findAll(), 'buscador_filtro_id', 'titulo');

        $this->render('index', array(
            'listFiltro' => $listFiltro,
            'aryUsuario' => $aryUsuario
        ));
    }

    public function actionResultado() {

        
        
        if (isset($_POST['Buscador'])) {

            if(isset($_POST['Buscador']['filtroDato'])){
                foreach($_POST['Buscador']['filtroDato'] as $dato){
                    if($dato == 'natural'){
                        $natural = $dato;
                    }else if ($dato == 'laboral') {
                        $laboral = $dato;
                    }else if($dato == 'pregrado'){
                        $pregrado = $dato;
                    }else if($dato == 'postgrado'){
                          $postgrado = $dato;
                    }
                }
            }

            $criteria = new CDbCriteria();
            $criteria->compare('buscador_filtro_id', $_POST['Buscador']['buscadorfiltro']);
            $criteria->order = 'tabla';
            $aryFiltroItem = BuscadorFiltroItem::model()->findAll($criteria);

            if (empty($aryFiltroItem)) {
                $strUsuarioSql = 'SELECT * FROM usuario';
                $aryUsuario = Usuario::model()->findAllBySql($strUsuarioSql);
                        if ($_POST['yt0'] == 'Buscar') {
                            $this->createTable($aryUsuario, false,$natural,$laboral,$pregrado,$postgrado);
                        } else
                        if ($_POST['yt1'] == 'Descarga excel') {
                            $this->createTable($aryUsuario, true,$natural,$laboral,$pregrado,$postgrado);
                        }
            } else {

                $QueryFinaly = $this->getUsuarioSql($aryFiltroItem);
               
                if (strlen($QueryFinaly) > 0) {
                    $aryUsuario = Usuario::model()->findAllBySql($QueryFinaly);
                    if (count($aryUsuario) > 0) {
                        if ($_POST['yt0'] == 'Buscar') {
                            $this->createTable($aryUsuario, false,$natural,$laboral,$pregrado,$postgrado);
                        } else
                        if ($_POST['yt1'] == 'Descarga excel') {
                            $this->createTable($aryUsuario, true,$natural,$laboral,$pregrado,$postgrado);
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

    private function createTable($aryUsuario, $download,$natural,$laboral,$pregrado,$postgrado) {
       
        
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


        $i = 1;
        $table = '';
        $table .= '<table width="4000" border="1">';
        $table .= '<tr>';
        $table .= '<th>ID</th>';
        $table .= '<th>Rut</th>';
        $table .= '<th>Nombre</th>';
        $table .= '<th>Sexo</th>';
        $table .= '<th>Fuente de Ingreso</th>';
        
        if($natural == 'natural'){
                    //usuario natural
            
                    $table .= '<th>Pais</th>';
                    $table .= '<th>Región</th>';
                    $table .= '<th>Ciudad</th>';
                    $table .= '<th>Comuna</th>';
                    $table .= '<th>Direccion</th>';
                    $table .= '<th>Telefono fijo</th>';
                    $table .= '<th>Telefono celular</th>';
                    $table .= '<th>Email</th>';  
        }
        if($laboral == 'laboral'){
                    //usuario laboral
            
                    $table .= '<th>Empresa</th>';
                    $table .= '<th>Industria</th>';
                    $table .= '<th>Area experiencia</th>';
                    $table .= '<th>Cargo</th>';
                    $table .= '<th>Email Comercial</th>';
                    $table .= '<th>Fecha ingreso</th>';
                    $table .= '<th>Fecha egreso</th>';
        }
        if($pregrado == 'pregrado'){
                    //usuario profesion
            
                    $table .= '<th>Institucion</th>';
                    $table .= '<th>Carrera</th>';
                    $table .= '<th>Fecha egreso</th>';
                 
        }
        
        if($postgrado == 'postgrado'){
                    //usuario profesion
            
                    $table .= '<th>Programa de Estudio</th>';
                    $table .= '<th>Estado Postgrado</th>';
                    $table .= '<th>Situacion Postgrado</th>';
                    $table .= '<th>Fecha Matricula</th>';
                    $table .= '<th>Año Version</th>';
                 
        }
        $table .= '</tr>';
        
        foreach ($aryUsuario as $usuario) 
        {
            $table .= '<tr>';
            $table .= '<td>' . $i . '</td>';
            $table .= '<td>' . $usuario->rut . '</td>';
            $table .= '<td>' . $usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno . '</td>';
            $table .= '<td>' . $usuario->sexo->nombre . '</td>';
            $table .= '<td>' . $usuario->tipo_fuente_ingreso->titulo . '</td>';
                    if($natural == 'natural'){
                    //usuario natural
                        $table .= '<td>' . $usuario->usuario_natural[0]->pais->nombre . '</td>';
                        $table .= '<td>' . $usuario->usuario_natural[0]->region->nombre . '</td>';
                        $table .= '<td>' . $usuario->usuario_natural[0]->ciudad->nombre . '</td>';
                        $table .= '<td>' . $usuario->usuario_natural[0]->comuna->nombre . '</td>';
                        $table .= '<td>' . $usuario->usuario_natural[0]->direccion . '</td>';
                        $table .= '<td>' . $usuario->usuario_natural[0]->telefono_fijo . '</td>';
                        $table .= '<td>' . $usuario->usuario_natural[0]->telefono_celular . '</td>';
                        $table .= '<td>' . $usuario->usuario_natural[0]->email . '</td>';
                    }
                    if($laboral == 'laboral'){
                    //usuario laboral
                        $table .= '<td>' . $usuario->usuario_laboral[0]->empresa->nombre . '</td>';
                        $table .= '<td>' . $usuario->usuario_laboral[0]->industria->titulo . '</td>';
                        $table .= '<td>' . $usuario->usuario_laboral[0]->area_experiencia->titulo . '</td>';
                        $table .= '<td>' . $usuario->usuario_laboral[0]->cargo->titulo . '</td>';
                        $table .= '<td>' . $usuario->usuario_laboral[0]->email . '</td>';
                        $table .= '<td>' . $usuario->usuario_laboral[0]->fecha_ingreso . '</td>';
                        $table .= '<td>' . $usuario->usuario_laboral[0]->fecha_egreso . '</td>';
                    }
                    if($pregrado == 'pregrado'){
                    //usuario preGrado
                        $table .= '<td>' . $usuario->usuario_pregrado[0]->institucion->nombre . '</td>';
                        $table .= '<td>' . $usuario->usuario_pregrado[0]->carrera->nombre . '</td>';    
                        $table .= '<td>' . $usuario->usuario_pregrado[0]->fecha_titulacion . '</td>';   
                    }
                    if($postgrado == 'postgrado'){
                    //usuario PostGrado
                        $table .= '<td>' . $usuario->usuario_postgrado[0]->programa_estudio->titulo . '</td>';
                        $table .= '<td>' . $usuario->usuario_postgrado[0]->tipo_estado_postgrado->titulo . '</td>';  
                        $table .= '<td>' . $usuario->usuario_postgrado[0]->tipo_situacion_postgrado->titulo . '</td>'; 
                        $table .= '<td>' . $usuario->usuario_postgrado[0]->fecha_matricula . '</td>'; 
                        $table .= '<td>' . $usuario->usuario_postgrado[0]->fecha_version . '</td>'; 
                    }
            $table .= '</tr>';
            $i++;
        }

        $table .= '</table>';

        echo $table;        
    }

    public function getUsuarioSql($aryFiltroItem) {
        //ARRAY para los Where
        
        //usuarioNatural
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
                    $aryWhereFecha_egreso[] = 'YEAR(up.fecha_titulacion) = '. $filtroItem->tabla_id;
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
                    $aryWhereVersionPostgrado[] = 'ug.fecha_version like '.'"'.$filtroItem->tabla_id.'-%-%'.'"';
                    break;
                default:
                    break;
            }
        }
       
        $ArrayAnd = array();
//USUARIO NATURAL
        if(count($aryWhereUnPais) > 0){            
            $ArrayAnd[] = 'un.pais_id IN ('.implode(' , ', $aryWhereUnPais).')';
        }
        if(count($aryWhereUnRegion) > 0){            
            $ArrayAnd[] = 'un.region_id IN ('.implode(' , ', $aryWhereUnRegion).')';
        }

        if(count($aryWhereTipoFuenteIngreso) > 0){
            $ArrayAnd[] = 'u.tipo_fuente_ingreso_id IN ('.implode(' , ', $aryWhereTipoFuenteIngreso).')';
        }
//USUARIO COMERCIAL O LABORAL
        if(count($aryWhereUcEmpresa) > 0){            
            $ArrayAnd[] = 'uc.empresa_id IN ('.implode(' , ', $aryWhereUcEmpresa).')';
        }
        if(count($aryWhereUcAreaExperiencia) > 0){            
            $ArrayAnd[] = 'uc.area_experiencia_id IN ('.implode(' , ', $aryWhereUcAreaExperiencia).')';
        }
        if(count($aryWhereUcCargo) > 0){            
            $ArrayAnd[] = 'uc.cargo_id IN ('.implode(' , ', $aryWhereUcCargo).')';
        }
        if(count($aryWhereUcIndustria) > 0){            
            $ArrayAnd[] = 'uc.industria_id IN ('.implode(' , ', $aryWhereUcIndustria).')';
        }
        
//USUARIO PROFESION O PREGRADO
        if(count($aryWhereUpInstitucion) > 0){            
            $ArrayAnd[] = 'up.institucion_id IN ('.implode(' , ', $aryWhereUpInstitucion).')';
        }
        if(count($aryWhereUpCarrera) > 0){            
            $ArrayAnd[] = 'up.carrera_id IN ('.implode(' , ', $aryWhereUpCarrera).')';
        }
        if(count($aryWhereFecha_egreso) > 0){            
            $ArrayAnd[] =  '('.implode(' OR ', $aryWhereFecha_egreso).')';
        }
        
//USUARIO POSTGRADO
        
        if(count($aryWhereUgProgramaEstudioPostgrado) > 0){            
            $ArrayAnd[] = 'ug.programa_estudio_id IN ('.implode(' , ', $aryWhereUgProgramaEstudioPostgrado).')';
        }
        if(count($aryWhereUgTipoEstadoPostgrado) > 0){            
            $ArrayAnd[] = 'ug.tipo_estado_postgrado_id IN ('.implode(' , ', $aryWhereUgTipoEstadoPostgrado).')';
        }
        if(count($aryWhereUgTipoSituacionPostgrado) > 0){            
            $ArrayAnd[] = 'ug.tipo_situacion_postgrado_id IN ('.implode(' , ', $aryWhereUgTipoSituacionPostgrado).')';
        }
        
        if(count($aryWhereVersionPostgrado) > 0){            
            $ArrayAnd[] =  '('.implode(' OR ', $aryWhereVersionPostgrado).')';
        }

        $StrImplodeAND = implode(' AND ', $ArrayAnd);
        $strUsuarioSql = 'Select Distinct u.* From usuario AS u ' . $JoinNatural .' '.$JoinLaboral.' '.$JoinProfecional.' '.$JoinPostgrado.' Where '.$StrImplodeAND.'';
        return $strUsuarioSql;
    }

}
