<?php
$env = getenv('ENVIRONMENT');
define('ENV', $env? $env : 'prod');
define('PRODUCTION', ENV == 'prod');

if (PRODUCTION) {
	$config = dirname(__FILE__).'/protected/config/main.php';
	$yii = '/etc/yii/yii-1.1.8/framework/yiilite.php';
}
else {
	$config = dirname(__FILE__).'/../protected/config/main.php';
	$yii = '/var/www/shared/yii/1.1.8-orig/framework/yii.php';
}

defined('YII_DEBUG') or define('YII_DEBUG', !PRODUCTION);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', PRODUCTION? 0 : 3);

require_once($yii);
Yii::createWebApplication($config)->run();