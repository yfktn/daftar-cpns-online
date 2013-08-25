<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

function gTRACE($what) {
    echo Yii::trace(CVarDumper::dumpAsString($what),'vardump');
}

if(!($_SERVER['HTTP_HOST']=='cpns.local')) {
    // change the following paths if necessary
    $yii=dirname(__FILE__).'/../yii/framework/yii.php';

    $config=dirname(__FILE__).'/protected/config/production.php';

    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
} else {
    // remove the following lines when in production mode
    defined('YII_DEBUG') or define('YII_DEBUG',true);
    // do we in local?
    defined('YII_IN_LOCAL') or define('YII_IN_LOCAL', true);
    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}
require_once($yii);
Yii::createWebApplication($config)->run();
