<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>"PHP'n Rio 2011 Command Line Tool",
	'components'=>array(
		'db' => require (isset($_ENV['USE_REMOTE_DB']) && $_ENV['USE_REMOTE_DB'])? '_database_remote.php' : '_database.php',
	),
);