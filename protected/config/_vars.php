<?php
$env = getenv('ENVIRONMENT');
define('ENV', $env? $env : 'prod');
define('PRODUCTION', in_array(ENV, array('prod', 'pagoda')));
define('CURRENT_YEAR', 2012);