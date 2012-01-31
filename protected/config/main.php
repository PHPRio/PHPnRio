<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
$config = array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => "PHP'n Rio 2011",
	'language' => 'pt_br',
	'sourceLanguage' => 'pt_br',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
	),

	'modules' => array(
		// comment this crap after finishing creating models!!!
//		'gii' => array('class' => 'system.gii.GiiModule', 'password' => 'gii', 'ipFilters' => array('127.0.0.1', '::1')),
		'admin',
	),

	'components' => array(
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'loginUrl'=> array('/admin/default/login'),
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

		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => require '_routes.php',
		),

		'db' => ((ENV == 'pagoda')?
			array(
			        'connectionString' => "mysql:host={$_SERVER['DB1_HOST']};mysql:port={$_SERVER['DB1_PORT']};dbname={$_SERVER['DB1_NAME']}",
			        'emulatePrepare' => true,
			        'username' => $_SERVER['DB1_USER'],
			        'password' => $_SERVER['DB1_PASS'],
			        'charset' => 'utf8',
			) :
			require '_database.php'),

		'errorHandler' => array('errorAction' => 'site/error'),

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
	'params' => array(
		'imgPath' => 'img/conteudo',
		'imgUrl' => 'img/conteudo',
		'email' => 'phpnrio@phprio.org'
	),
);

if (!PRODUCTION) {
	$config['components']['log']['routes'][] = array('class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute');
	$config['components']['db']['enableProfiling'] = true;
	$config['components']['db']['enableParamLogging'] = true;
}

return $config;
