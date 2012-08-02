<?php

/**
 * @version $Id: main.php 1192 2012-07-10 07:22:18Z lida $ 
 */

$backend = dirname(dirname(__FILE__));
$frontend = dirname($backend);
Yii::setPathOfAlias('backend', $backend);

return array(
    'name' => '后台管理',
    'language' => 'zh_cn',
    'basePath' => $frontend,
 
    'controllerPath' => $backend . DS . 'controllers',
    'viewPath' => $backend . DS . 'views',
    'runtimePath' => $backend . DS . 'runtime',
    
     // preloading 'log' component
    'preload' => array('log'),
    
    'import' => array(
        'application.models.*',
        'application.components.*',
        'backend.models.*',
        'backend.components.*',
    ),
    
    'defaultController' => 'admin',

    // application components
    'components' => array (
        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
        'user' => array (
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('admin/login'),
            'stateKeyPrefix' => '5i5jadmin',
        ),
        
        'authManager'=>array(
            'class' => 'CDbAuthManager',
            'defaultRoles' => array('authenticated', 'guest'),
        ),
        // file cache
        'cache' => array (
            'class' => 'CFileCache',      
        ),
    	
        
        'errorHandler' => array (
            // use 'site/error' action to display errors
            'errorAction' => 'admin/error'
        ),
      /**  
        'urlManager' => array (
        	'baseUrl' => '/admin',
            'urlFormat' => 'path',
            'urlSuffix' => '/',
            'showScriptName' => false,
            'rules' => array (
                '<user:(admin)?><opt:(\/)?>login' => 'admin/login',
                '<user:(admin)?><opt:(\/)?>logout' => 'admin/logout',
                '<user:(admin)?><opt:(\/)?><controller:\w+>/' => '<controller>/index',
                '<user:(admin)?><opt:(\/)?><controller:\w+>/<action:\w+>/*' => '<controller>/<action>',
            ),
        ),
        */
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array (
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
//                 array (
//                     'class' => 'CWebLogRoute',
//                     'levels' => 'profile, trace, error'
//                 ),
//                 array (
//                     'class' => 'CProfileLogRoute',
//                     'levels' => 'prfile'
//                 )
            ),
        ),
    ),
    'params' => require $backend . DS . 'config' . DS . 'params.php'
);