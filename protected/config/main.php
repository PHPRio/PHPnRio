<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
$config = array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => "PHP'n Rio 2011",

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
	),

	'components' => array(
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
//			'rules'=>array(
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//			),
		),

		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=phpnrio2011',
			'emulatePrepare' => true,
			'username' => 'phpnrio2011',
			'password' => 'phpnrio',
			'charset' => 'utf8',
		),

		'errorHandler' => array(
			'errorAction' => 'site/error',
		),

		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
			),
		),
	),
	// application-level parameters that can be accessed using Yii::app()->params['paramName']
	'params' => array(
	),
);

if (PRODUCTION) {

} else {
	$config['components']['log']['routes'][] = array('class' => 'CWebLogRoute');
}

return $config;