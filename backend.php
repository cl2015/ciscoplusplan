<?php

/**
 * @version $Id: backend.php 83 2012-05-10 06:47:02Z lida $ 
 */


date_default_timezone_set('Asia/Shanghai');
define('YII_DEBUG', true);
define('BASE_PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

//change the following paths if necessary
$yii=dirname(__FILE__).'/../../../yii/framework/yii.php';
require_once($yii);
require_once(BASE_PATH . '/protected/components/Globals.php');
require_once(BASE_PATH . '/protected/config/constants.php');

$databaseConfig = require BASE_PATH . '/protected/config/database.php';
$paramsConfig = require BASE_PATH . '/protected/config/params.php';
$mainConfig = require BASE_PATH . '/protected/admin/config/main.php';
$config = CMap::mergeArray($databaseConfig, $paramsConfig, $mainConfig);
Yii::createWebApplication($config)->run();