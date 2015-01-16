<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Sistema de Administración de Base de datos',
    // preloading 'log' component
    //'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
    // uncomment the following to enable the Gii tool
    
      'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'rayalab2013',
      // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters'=>array('127.0.0.1','::1','192.168.*.*'),
      ),
     
    ),
    // application components
    'components' => array(
        'rut'=>array('class'=>'Rut'),
        'stringFormat'=>array('class'=>'StringFormat'),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive'=>true,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),            
        ),
               
        // uncomment the following to use a MySQL database
        'db'=>array(
         'connectionString' => 'mysql:host=localhost;dbname=puc_administracion',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'pass..2014rl',
            'charset' => 'utf8',
        ),
        
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'defaultRoles'=>array('authenticated', 'guest'),
        ),
         
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    'language' => 'es',
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'baseUrlLinux' => '/var/www/html',
        'baseUrl' => 'http://192.168.1.49/yii/project/puc_dev',
    ),
);
