<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    
    /**
     *
     * @var StringFormat StringFormat Helper
     */
    public $stringFormat;

    public function beforeAction($action) {
        
        if (parent::beforeAction($action)) {
            
            $this->stringFormat = Yii::app()->getComponent('stringFormat');
            
            Yii::app()->clientScript->registerCoreScript('jquery');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/uploadify/jquery.uploadify.min.js');
            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js/uploadify/uploadify.css');
            
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/config.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/controller.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/shared.js');                    
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/documento.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rut.min.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.formatter.min.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/buscador.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/buscadorfiltroitem.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/site.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/pais.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/region.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ciudad.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/comuna.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuario.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuarionatural.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuariolaboral.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuariocomercial.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/empresa.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/cargo.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/industria.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/areaexperiencia.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/estadocivil.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuariodocente.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/curso.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuariointeres.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuarioidioma.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuariopregrado.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/buscadorfiltroitem.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/buscadorfiltro.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/institucion.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/programaestudio.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/usuariopostgrado.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/tipoestadopostgrado.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/tiposituacionpostgrado.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/tipofuenteingreso.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/cargamasiva.js');
            
            Yii::app()->clientScript->registerScript('config', 'Config.baseUrl = "' . Yii::app()->baseUrl . '";');  
            
            $jsClassName = str_replace('Controller', '', get_class(Yii::app()->getController()));
            $jsObjectName = lcfirst($jsClassName);
            
            Yii::app()->clientScript->registerScript(Yii::app()->controller->id.'_init', 'var '.$jsObjectName. ' = new '.$jsClassName.'();');
            Yii::app()->clientScript->registerScript(Yii::app()->controller->id, $jsObjectName . '.' . Yii::app()->controller->action->id . '();');

            return true;
        }
        return false;
    }

}
