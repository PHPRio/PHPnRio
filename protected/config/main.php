<?php
require_once '_vars.php';
$dbs = require '_database.php';

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
$config = array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => "PHP'n Rio",
	'language' => 'pt_br',
	'sourceLanguage' => 'pt_br',

	'preload' => array('log'),

	'import' => array(
		'application.models.*',
		'application.components.*',
	),

	'modules' => array(
		// to make Gii work one need to set one of the databases down there as 'db'
//		'gii' => array('class' => 'system.gii.GiiModule', 'password' => 'gii', 'ipFilters' => array('127.0.0.1', '::1')),
		'y2011' => array('modules' => array('admin')),
		'y2012' => array('modules' => array('admin')),
	),

	'components' => array(
		'errorHandler' => array('errorAction' => 'site/error'),

		'db11' => $dbs[2011],
		'db12' => $dbs[2012],

		'user' => array(
			'allowAutoLogin' => true, // enable cookie-based authentication
			'loginUrl'=> array('/admin/default/login'),
		),

		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => require '_routes.php',
		),

		'mail' => array(
			'class' => 'ext.mail.YiiMail',
			'logging' => true,
			'dryRun' => true,
			'transportType' => 'smtp',
			'transportOptions' => ((ENV == 'pagoda')?
			array(
				'host' => $_SERVER['MAIL_HOST'],
				'encryption' => $_SERVER['MAIL_ENCRYPTION'],
				'username' => $_SERVER['MAIL_USER'],
				'password' => $_SERVER['MAIL_PASS'],
				'port' => $_SERVER['MAIL_PORT'],
			) :
			require '_email.php'),
		),

		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				array(
					'class' => 'CFileLogRoute',
					'logFile' => 'email.log',
					'categories' => 'ext.yii-mail.YiiMail',
				),
			),
		),
	),
	// application-level parameters that can be accessed using Yii::app()->params['paramName']
	'params' => require '_params.php'
);

if (!PRODUCTION) {
	$config['components']['log']['routes'][] = array('class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute');
	$config['components']['db']['enableProfiling'] = true;
	$config['components']['db']['enableParamLogging'] = true;
}

return $config;