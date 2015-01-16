<?php

class RegistroXmlController extends Controller {

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

        $this->uploadCreateDateFolder();
        $files = array();
        $directory = Yii::app()->getBasePath().'/xml/'.date('Y').'/'.date('m').'/'.date('d').'/';
        $iterator = new DirectoryIterator($directory);
        foreach ($iterator as $fileinfo) {
             if ($fileinfo->isFile()) {
                $name = str_replace(".xml", "", $fileinfo->getFilename());
                $files[$name] = $name;
             }
        }
       
        krsort($files);
        
        if(empty($files)){
            $inicio =  0;
            $page = simplexml_load_file('http://portal.mbauc.cl/iit-rayalab-service/xmlUsuario?inicio=0&fin=200');  
         }else{
            $inicio =  reset($files);
            $page = simplexml_load_file('http://portal.mbauc.cl/iit-rayalab-service/xmlUsuario?inicio='.$inicio.'&fin=200');
        }
        
        
        if(count($page->puc->listado->usuario) == 0){
            //echo "Estoy Vacio";
        }else{
            $save = $inicio + 200;
            $xmlFile = file_get_contents('http://portal.mbauc.cl/iit-rayalab-service/xmlUsuario?inicio='.$inicio.'&fin=200');
            file_put_contents(Yii::app()->getBasePath().'/xml/'.date('Y').'/'.date('m').'/'.date('d').'/'.$save.'.xml',$xmlFile);
        }
               
        


  
    }

    private function uploadCreateDateFolder() {

        $folderDate = array(date('Y'), date('m'), date('d'));
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

//    private function uploadCreateDateFolder() {
//        /**
//         * Crear directorio de la fecha de hoy
//         */
//        $folderDate = array(date('Y'), date('m'), date('d'));
//        $dir =  Yii::app()->getBaseUrl(true) . '/xml/';
//
//        foreach ($folderDate as $f => $folder) {
//            $directorio = $dir . $folder;
//            if (!is_dir($directorio)) {
//                mkdir($directorio, 0777, true);
//                chmod($directorio, 0777);
//                $dir .= $folder . '/';
//            } else {
//                $dir .= $folder . '/';
//            }
//        }
//
//        return $dir;
//    }
}
