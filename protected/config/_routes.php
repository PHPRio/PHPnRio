<?php return array(
'admin/<action:(login|logout|prizes)>' => 'admin/default/<action>',
'admin/print/<route>' => 'admin/default/print',
'patrocinadores' => 'sponsor/list',
'palestrantes' => 'speaker/list',
'equipe' => 'teamMember/list',
'grade' => 'schedule/index',
'grade/<action>' => 'schedule/<action>',
'palestras' => 'presentation/list',	'palestras/grade' => 'presentation/grid',
'noticias' => 'news/list',			'noticia/<data>' => 'news/view',
'/admin' => 'admin/default',
'/gii' => 'gii/default',
'/<view>' => 'site/page',
//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);