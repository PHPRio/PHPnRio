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
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules'=>array(
				'admin/<action:(login|logout)>' => 'admin/default/<action>',
				'patrocinadores' => 'sponsor/list',
				'palestrantes' => 'speaker/list',
				'equipe' => 'teamMember/list',
				'palestras' => 'presentation/list',	'palestras/grade' => 'presentation/grid',
				'noticias' => 'news/list',			'noticia/<data>' => 'news/view',
				'/admin' => 'admin/default',
				'/gii' => 'gii/default',
				'/<view>' => 'site/page',
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db' => require '_database.php',

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
		'imgPath' => 'img/conteudo',
		'imgUrl' => 'img/conteudo',
	),
);

if (!PRODUCTION) {
	$config['components']['log']['routes'][] = array('class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute');
	$config['components']['db']['enableProfiling'] = true;
	$config['components']['db']['enableParamLogging'] = true;
}

return $config;