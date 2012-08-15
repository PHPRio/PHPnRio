<?php
require_once '_vars.php';
$dbs = require_once '_database.php';

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>"PHP'n Rio Command Line Tool",
	'components'=>array(
		'db' => $dbs[CURRENT_YEAR],
	),
);