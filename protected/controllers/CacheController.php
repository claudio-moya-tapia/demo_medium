<?php

class CacheController extends Controller {

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
                'actions' => array('index', 'zip'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
//        $host = 'mysql:host=192.168.1.49;dbname=puc_admin_json';
//        $username = 'rayalab';
//        $psw = 'rayalab2013';
//        Yii::app()->db->setActive(false);
//        Yii::app()->db->connectionString = $host;
//        Yii::app()->db->username = $username;
//        Yii::app()->db->password = $psw;
//        Yii::app()->db->setActive(true);

        $this->createCacheFrom($this->usuario(), 'usuario');
        $this->createCacheFrom($this->sexo(), 'sexo');
        $this->createCacheFrom($this->tipoFuenteingreso(), 'tipoFuenteingreso');
        $this->createCacheFrom($this->usuarionatural(), 'usuarioNatural');
        $this->createCacheFrom($this->estadocivil(), 'estadoCivil');
        $this->createCacheFrom($this->pais(), 'pais');
        $this->createCacheFrom($this->region(), 'region');
        $this->createCacheFrom($this->ciudad(), 'ciudad');
        $this->createCacheFrom($this->comuna(), 'comuna');
        $this->createCacheFrom($this->usuariolaboral(), 'usuarioLaboral');
        $this->createCacheFrom($this->empresa(), 'empresa');
        $this->createCacheFrom($this->cargo(), 'cargo');
        $this->createCacheFrom($this->usuariopregrado(), 'usuarioPregrado');
        $this->createCacheFrom($this->institucion(), 'institucion');
        $this->createCacheFrom($this->carrera(), 'carrera');
        $this->createCacheFrom($this->usuariopostgrado(), 'usuarioPostgrado');
        $this->createCacheFrom($this->programaestudio(), 'programaEstudio');
        $this->createCacheFrom($this->tipoestadopostgrado(), 'tipoEstado');
        $this->createCacheFrom($this->tiposituacionpostgrado(), 'tipoSituacion');
        $this->createCacheFrom($this->fechaegreso(), 'fechaEgreso');
        $this->createCacheFrom($this->fechaversion(), 'fechaVersion');
        $this->createCacheFrom($this->industria(), 'industria');
        $this->createCacheFrom($this->areaexperiencia(), 'areaExperiencia');



    }

    private function usuario() {

        $sql = "SELECT
                    usuario_id as id,
                    tipo_fuente_ingreso_id as tfi,
                    sexo_id as si,
                    rut as ru,
                    nombre as nm,
                    apellido_paterno as ap,
                    apellido_materno as am,
                    fecha_nacimiento as fn,
                    fecha_creacion as fc,
                    identidad_id as ii
                FROM usuario ORDER BY usuario_id ASC";

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    private function sexo() {
        $sql = "SELECT
                    sexo_id as si,
                    nombre as nm
                FROM sexo ORDER BY sexo_id ASC";

        $ary = array();
        foreach(Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $ary[$item['si']] = $item;
        }

        return $ary;
    }

    private function tipoFuenteingreso() {
        $sql = "SELECT
                    tipo_fuente_ingreso_id as ti,
                    titulo as tt
                FROM tipo_fuente_ingreso ORDER BY tipo_fuente_ingreso_id ASC";

        $ary = array();
        foreach(Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $ary[$item['ti']] = $item;
        }

        return $ary;
    }

    public function actionZip() {
        $this->layout = false;
        $zip = new ZipStream('example.zip');
        $data = "This is the contents of a dynamically generated text file.";
        $zip->add_file('some_file.txt', $data);
        $zip->finish();
    }

    public function zip() {
        $this->layout = false;
        $zip = new ZipStream('example.zip');
        $data = "This is the contents of a dynamically generated text file.";
        $zip->add_file('some_file.txt', $data);
        $zip->finish();
    }

    private function createCacheFrom($resulset, $name) {
        $basePath = 'C:/AppServ/www/yii/project/puc_dev/json/' . $name . '_tmp.js';
        $basePathFinal = 'C:/AppServ/www/yii/project/puc_dev/json/' . $name . '.js';

        if ($_SERVER['HTTP_HOST'] == '192.168.1.49') {
            //Local
            $basePath = 'C:/AppServ/www/yii/project/puc_dev/json/' . $name . '_tmp.js';
            $basePathFinal = 'C:/AppServ/www/yii/project/puc_dev/json/' . $name . '.js';
            $basePathFinalZipTmp = 'C:/AppServ/www/yii/project/puc_dev/json/' . $name . '_tmp.zip';
            $basePathFinalZipAux = Yii::app()->params['baseUrlGs'] . '/json/' . $name . '_aux.zip';
            $basePathFinalZip = 'C:/AppServ/www/yii/project/puc_dev/json/' . $name . '.zip';
        } else {
            //Google
            $basePath = Yii::app()->params['baseUrlLinux'] . '/json/' . $name . '_tmp.js';
            $basePathFinal = Yii::app()->params['baseUrlLinux'] . '/json/' . $name . '.js';
            $basePathFinalZipTmp = Yii::app()->params['baseUrlLinux'] . '/json/' . $name . '_tmp.zip';
            $basePathFinalZipAux = Yii::app()->params['baseUrlLinux'] . '/json/' . $name . '_aux.zip';
            $basePathFinalZip = Yii::app()->params['baseUrlLinux'] . '/json/' . $name . '.zip';
        }

        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        $zipfile = new zipfile();
        $filename = $name . '.js';
        $zipfile->addFile(json_encode($resulset,JSON_UNESCAPED_UNICODE), $filename);
        $contents = $zipfile->file();
        file_put_contents($basePathFinalZipTmp, $contents);

        $options = [ 'gs' => [ 'Content-Type' => 'application/octet-stream', 'acl' => 'public-read', 'read_cache_expiry_seconds' => 300]];
        $ctx = stream_context_create($options);

        rename($basePathFinalZipTmp, $basePathFinalZip, $ctx);
    }

    private function usuarionatural() {
        $sql = "SELECT
                        usuario_natural_id AS un,
                        usuario_id AS ui,
                        estado_civil_id AS ec,
                        pais_id AS pi,
                        region_id AS ri,
                        ciudad_id AS ci,
                        comuna_id AS co,
                        direccion AS dr,
                        telefono_fijo AS tf,
                        telefono_celular AS tc,
                        email AS em,
                        imagen AS im
               FROM usuario_natural ORDER BY usuario_natural_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $ary[$item['ui']] = $item;
        }

        return $ary;
    }

    private function estadocivil() {
        $sql = "SELECT
                    estado_civil_id AS ec,
                    nombre AS nm
               FROM estado_civil ORDER BY estado_civil_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ec']] = $item;
            $ary[] = array(
                'id'=>$item['ec'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function pais() {
        $sql = "SELECT
                        pais_id AS pi,
                        nombre AS nm
               FROM pais ORDER BY pais_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['pi']] = $item;

            $ary[] = array(
                'id'=>$item['pi'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function region() {
        $sql = "SELECT
                    region_id AS ri,
                    nombre AS nm
               FROM region ORDER BY region_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ri']] = $item;

            $ary[] = array(
                'id'=>$item['ri'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function ciudad() {
        $sql = "SELECT
                        ciudad_id AS ci,
                        nombre AS nm
               FROM ciudad  ORDER BY ciudad_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ci']] = $item;

            $ary[] = array(
                'id'=>$item['ci'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function comuna() {
        $sql = "SELECT
                        comuna_id AS cm,
                        nombre AS nm
               FROM comuna ORDER BY comuna_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['cm']] = $item;

            $ary[] = array(
                'id'=>$item['cm'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function usuariolaboral() {
        $sql = "SELECT
                    usuario_id AS ui,
                    empresa_id AS ei,
                    industria_id AS ii,
                    area_experiencia_id AS ae,
                    cargo_id AS ci,
                    email AS em,
                    fecha_ingreso AS fi,
                    fecha_egreso AS fe,
                    actual_id AS ai
                FROM usuario_laboral ORDER BY usuario_laboral_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $ary[$item['ui']][] = $item;
        }

        return $ary;
    }

    private function empresa() {
        $sql = "SELECT
                        empresa_id AS ei,
                        nombre AS nm
		FROM empresa ORDER BY nombre ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $ary[] = array(
                'id'=>$item['ei'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function industria() {
        $sql = "SELECT
                        industria_id AS ii,
                        titulo AS tt
		FROM industria ORDER BY industria_id ASC";

        $ary = array();
        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ii']] = $item;

              $ary[] = array(
                'id'=>$item['ii'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function areaexperiencia() {
        $sql = "SELECT
                        area_experiencia_id AS ai,
                        titulo AS tt
		FROM area_experiencia ORDER BY area_experiencia_id ASC";

         $ary = array();
        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ai']] = $item;
            $ary[] = array(
                'id'=>$item['ai'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function cargo() {
        $sql = "SELECT
                        cargo_id AS ci,
                        titulo AS tt
		FROM cargo ORDER BY titulo ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){

            $ary[] = array(
                'id'=>$item['ci'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function usuariopregrado() {

        $sql = "SELECT
                    usuario_id AS ui,
                    institucion_id AS ii,
                    carrera_id AS ci,
                    fecha_egreso AS fe,
                    fecha_titulacion AS ft
                FROM usuario_pregrado ORDER BY usuario_pregrado_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $ary[$item['ui']][] = $item;
        }


        return $ary;
    }

    private function institucion() {
        $sql = "SELECT
                        institucion_id AS ii,
                        nombre AS nm
		FROM institucion ORDER BY nombre ASC";

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ii']] = $item;
             $ary[] = array(
                'id'=>$item['ii'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function carrera() {
        $sql = "SELECT
                        carrera_id AS ci,
                        nombre AS nm
		FROM carrera ORDER BY nombre ASC";

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ci']] = $item;
            $ary[] = array(
                'id'=>$item['ci'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function usuariopostgrado() {
        $sql = "SELECT
                        usuario_id AS ui,
                        programa_estudio_id AS pe,
                        tipo_estado_postgrado_id AS te,
                        tipo_situacion_postgrado_id AS ts,
                        fecha_matricula AS fm,
                        fecha_version AS fv
                FROM usuario_postgrado ORDER BY usuario_postgrado_id ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $ary[$item['ui']][] = $item;
        }
        return $ary;
    }

    private function programaestudio() {
        $sql = "SELECT
                        programa_estudio_id AS pi,
                        titulo AS tt
		FROM programa_estudio ORDER BY titulo ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['pi']] = $item;
            $ary[] = array(
                'id'=>$item['pi'],
                'value'=>$item
                    );
        }

        return $ary;
    }

    private function tipoestadopostgrado() {
        $sql = "SELECT
                        tipo_estado_postgrado_id AS ti,
                        titulo AS tt
		FROM tipo_estado_postgrado ORDER BY titulo ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ti']] = $item;

            $ary[] = array(
                'id'=>$item['ti'],
                'value'=>$item
                    );
        }
        return $ary;
    }

    private function tiposituacionpostgrado() {
        $sql = "SELECT
                        tipo_situacion_postgrado_id AS ti,
                        titulo AS tt
		FROM tipo_situacion_postgrado ORDER BY titulo ASC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['ti']] = $item;
            $ary[] = array(
                'id'=>$item['ti'],
                'value'=>$item
                    );
        }
        return $ary;
    }

    private function fechaegreso() {
        $sql = "SELECT YEAR(fecha_egreso) AS yr
                FROM usuario_pregrado
                GROUP BY yr
                ORDER BY yr DESC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['yr']] = $item;

        $ary[] = array(
                'id'=>$item['yr'],
                'value'=>$item
                    );
        }
        return $ary;
    }

    private function fechaversion() {
        $sql = "SELECT YEAR(fecha_version) AS fc
                FROM usuario_postgrado
                GROUP BY fc
                ORDER BY fc DESC";

        $ary = array();

        foreach (Yii::app()->db->createCommand($sql)->queryAll() as $item){
//            $ary[$item['fc']] = $item;
            $ary[] = array(
                'id'=>$item['fc'],
                'value'=>$item
                    );
        }
        return $ary;
    }

}

/*
 * Zip file creation class.
 *
  Based on :
  http://www.zend.com/codex.php?id=535&single=1 By Eric Mueller <eric@themepark.com>
  http://www.zend.com/codex.php?id=470&single=1 By Denis125 <webmaster@atlant.ru>
  a patch from Peter Listiak <mlady@users.sourceforge.net> for last modified date and time of the compressed file
 *
  Official ZIP file format:
  http://www.pkware.com/appnote.txt
 * *
  MODIFIED AND PACKAGED BY JASON STOCKTON 22nd August 2009
  http://thewebdevelopmentblog.com/
  http://www.jasonstockton.com.au/
 * *
 */

class zipfile {

    var $datasec = array();
    var $ctrl_dir = array();
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
    var $old_offset = 0;

    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
        if ($timearray['year'] < 1980) {
            $timearray['year'] = 1980;
            $timearray['mon'] = 1;
            $timearray['mday'] = 1;
            $timearray['hours'] = 0;
            $timearray['minutes'] = 0;
            $timearray['seconds'] = 0;
        } return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) | ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    }

    function addFile($data, $name, $time = 0) {
        $name = str_replace('\\', '/', $name);
        $dtime = dechex($this->unix2DosTime($time));
        $hexdtime = '\x' . $dtime[6] . $dtime[7] . '\x' . $dtime[4] . $dtime[5] . '\x' . $dtime[2] . $dtime[3] . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');
        $fr = "\x50\x4b\x03\x04";
        $fr .= "\x14\x00";
        $fr .= "\x00\x00";
        $fr .= "\x08\x00";
        $fr .= $hexdtime;
        $unc_len = strlen($data);
        $crc = crc32($data);
        $zdata = gzcompress($data);
        $zdata = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
        $c_len = strlen($zdata);
        $fr .= pack('V', $crc);
        $fr .= pack('V', $c_len);
        $fr .= pack('V', $unc_len);
        $fr .= pack('v', strlen($name));
        $fr .= pack('v', 0);
        $fr .= $name;
        $fr .= $zdata;
        $this->datasec[] = $fr;
        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";
        $cdrec .= "\x14\x00";
        $cdrec .= "\x00\x00";
        $cdrec .= "\x08\x00";
        $cdrec .= $hexdtime;
        $cdrec .= pack('V', $crc);
        $cdrec .= pack('V', $c_len);
        $cdrec .= pack('V', $unc_len);
        $cdrec .= pack('v', strlen($name));
        $cdrec .= pack('v', 0);
        $cdrec .= pack('v', 0);
        $cdrec .= pack('v', 0);
        $cdrec .= pack('v', 0);
        $cdrec .= pack('V', 32);
        $cdrec .= pack('V', $this->old_offset);
        $this->old_offset += strlen($fr);
        $cdrec .= $name;
        $this->ctrl_dir[] = $cdrec;
    }

    function file() {
        $data = implode('', $this->datasec);
        $ctrldir = implode('', $this->ctrl_dir);
        return $data . $ctrldir . $this->eof_ctrl_dir . pack('v', sizeof($this->ctrl_dir)) . pack('v', sizeof($this->ctrl_dir)) . pack('V', strlen($ctrldir)) . pack('V', strlen($data)) . "\x00\x00";
    }

}
