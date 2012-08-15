<?php
require_once 'protected/config/_vars.php';

define('CURRENT_EDITION', getenv('CURRENT_EDITION'));

$config = dirname(__FILE__).'/protected/config/main.php';
$yii = dirname(__FILE__).'/yii/framework/'.((ENV == 'dev')? 'yii' : 'yiilite').'.php';

defined('YII_DEBUG') or define('YII_DEBUG', !PRODUCTION);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', PRODUCTION? 0 : 3);

require_once($yii);
Yii::createWebApplication($config)->run();