<?php
$env = getenv('ENVIRONMENT');
define('ENV', $env? $env : 'prod');
define('PRODUCTION', ENV == 'prod');

$config = dirname(__FILE__).'/../protected/config/main.php';
$yii = dirname(__FILE__).'/../yii/framework/'.((ENV == 'dev')? 'yii' : 'yiilite').'.php';

require_once($yiic);