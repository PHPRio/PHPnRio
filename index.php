<?php
$env = getenv('ENVIRONMENT');
define('ENV', $env? $env : 'prod');
define('PRODUCTION', in_array(ENV, array('prod', 'pagoda')));

define('FINISHED', time() >= strtotime('2011-11-04 15:00:00'));

switch (ENV) {
	case 'pagoda':
		$config = dirname(__FILE__).'/protected/config/main.php';
		$yii = '/etc/yii/yii-1.1.8/framework/yiilite.php';
	break;

	case 'prod':
		$config = dirname(__FILE__).'/protected/config/main.php';
		$yii = dirname(__FILE__).'/../etc/yii/yii-1.1.8/framework/yiilite.php';
	break;

	case 'test':
		$config = dirname(__FILE__).'/protected/config/main.php';
		$yii = '/etc/yii/yii-1.1.8/framework/yiilite.php';
	break;

	case 'dev':
		$config = dirname(__FILE__).'/protected/config/main.php';
		$yii = '/var/www/shared/yii/1.1.8-orig/framework/yii.php';
	break;
}

defined('YII_DEBUG') or define('YII_DEBUG', !PRODUCTION);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', PRODUCTION? 0 : 3);

require_once($yii);
Yii::createWebApplication($config)->run();
