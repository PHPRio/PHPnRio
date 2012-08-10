<?php return array(
/********************************* TEMPORARY ROUTES *********************************/
'/2012/*' => 'y2012/site/index',

/********************************* IMMUTABLE ROUTES *********************************/
'/gii' => '/gii/default',

/*********************************** NORMAL ROUTES **********************************/
'<module:\d{4}>/admin'									=> 'y<module>/admin/default',
'<module:\d{4}>/admin/<action:(login|logout|prizes)>'	=> 'y<module>/admin/default/<action>',
'<module:\d{4}>/admin/print/<route>'					=> 'y<module>/admin/default/print',

'<module:\d{4}>/certificado/<code:([at]-\d*)>' => 'y<module>/site/getCertificate',
'<module:\d{4}>/'				=> 'y<module>/site/index',
'<module:\d{4}>/patrocinadores'	=> 'y<module>/sponsor/list',
'<module:\d{4}>/palestrantes'	=> 'y<module>/speaker/list',
'<module:\d{4}>/equipe'			=> 'y<module>/teamMember/list',
'<module:\d{4}>/grade'			=> 'y<module>/schedule/index',
'<module:\d{4}>/grade/<action>'	=> 'y<module>/schedule/<action>',
'<module:\d{4}>/palestras'		=> 'y<module>/presentation/list',
'<module:\d{4}>/palestras/grade'=> 'y<module>/presentation/grid',
'<module:\d{4}>/noticias'		=> 'y<module>/news/list',
'<module:\d{4}>/noticia/<data>'	=> 'y<module>/news/view',
'<module:\d{4}>/<view>'			=> 'y<module>/site/page',

/*************************** BACKWARD COMPATIBILITY ROUTES **************************/
'certificado/<code:([at]-\d*)>' => 'site/backwardCompatibility',
'/'					=> 'site/backwardCompatibility',
'patrocinadores'	=> 'site/backwardCompatibility',
'palestrantes'		=> 'site/backwardCompatibility',
'equipe'			=> 'site/backwardCompatibility',
'grade'				=> 'site/backwardCompatibility',
'grade/<action>'	=> 'site/backwardCompatibility',
'palestras'			=> 'site/backwardCompatibility',
'palestras/grade'	=> 'site/backwardCompatibility',
'noticias'			=> 'site/backwardCompatibility',
'noticia/<data>'	=> 'site/backwardCompatibility',
'<view>'			=> 'site/backwardCompatibility',
);