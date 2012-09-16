<?php
return array(
	'2011' => array(
		'class' => 'CDbConnection',
		'connectionString' => PRODUCTION?
			"mysql:host={$_SERVER['DB1_HOST']};port={$_SERVER['DB1_PORT']};dbname={$_SERVER['DB1_NAME']}" :
			'mysql:host=localhost;dbname=phpnrio2011',
		'username' => PRODUCTION? $_SERVER['DB1_USER'] : 'phpnrio',
		'password' => PRODUCTION? $_SERVER['DB1_PASS'] : 'phpnrio',
		'emulatePrepare' => true,
		'charset' => 'utf8',
	),
	'2012' => array(
		'class' => 'CDbConnection',
		'connectionString' => PRODUCTION?
			"mysql:host={$_SERVER['DB2_HOST']};port={$_SERVER['DB2_PORT']};dbname={$_SERVER['DB2_NAME']}" :
			'mysql:host=localhost;dbname=phpnrio2012',
		'username' => PRODUCTION? $_SERVER['DB2_USER'] : 'phpnrio',
		'password' => PRODUCTION? $_SERVER['DB2_PASS'] : 'phpnrio',
		'emulatePrepare' => true,
		'charset' => 'utf8',
	),
);
