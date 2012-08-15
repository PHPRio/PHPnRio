<?php
$env = getenv('ENVIRONMENT');
define('ENV', $env? $env : 'prod');
define('PRODUCTION', ENV == 'prod');

$config = dirname(__FILE__).'/../protected/config/console.php';
$yiic = dirname(__FILE__).'/../yii/framework/yiic.php';

require_once($yiic);