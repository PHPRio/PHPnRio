<?php
$thisUsuáriobreadcrumbs=array(
	'Users'=>array('index'),
	'Novo',
);

$this->menu=array(
	array('label'=>'Listar Usuários', 'url'=>array('index')),
);
?>

<h1>Novo User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>