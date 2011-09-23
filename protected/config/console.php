<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>"PHP'n Rio 2011 Command Line Tool",
	'components'=>array(
		'db' => require '_database.php',
	),
);