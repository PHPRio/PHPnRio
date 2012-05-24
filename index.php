<?php
$env = getenv('ENVIRONMENT');
define('ENV', $env? $env : 'prod');
define('PRODUCTION', in_array(ENV, array('prod', 'pagoda')));

define('FINISHED', time() >= strtotime('2011-11-04 15:00:00'));

$config = dirname(__FILE__).'/protected/config/main.php';
$yii = dirname(__FILE__).'/yii/framework/'.((ENV == 'dev')? 'yii' : 'yiilite').'.php';

defined('YII_DEBUG') or define('YII_DEBUG', !PRODUCTION);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', PRODUCTION? 0 : 3);

require_once($yii);
Yii::createWebApplication($config)->run();