<?php return array(
'admin/<action:(login|logout)>' => 'admin/default/<action>',
'patrocinadores' => 'sponsor/list',
'palestrantes' => 'speaker/list',
'equipe' => 'teamMember/list',
'palestras' => 'presentation/list',	'palestras/grade' => 'presentation/grid',
'noticias' => 'news/list',			'noticia/<data>' => 'news/view',
'/admin' => 'admin/default',
'/gii' => 'gii/default',
'/<view>' => 'site/page',
//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);