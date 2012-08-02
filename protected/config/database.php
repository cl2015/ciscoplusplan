<?php

/**
 * @version $Id: database.php 591 2012-06-06 06:35:09Z lihe $ 
 */

$databaseConfig = array(
    // application components
    'components' => array (
        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=cisco',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'dev',
            'charset' => 'utf8',
        ),
//        'db'=>array(
//            'connectionString' => 'mysql:host=203.130.38.8;dbname=db_5i5j',
//            'emulatePrepare' => true,
//            'username' => 'lida',
//            'password' => 'lida',
//            'charset' => 'utf8',
//            //'tablePrefix' => 'bigbang_',
//        )
    )
);
return $databaseConfig;

?>
