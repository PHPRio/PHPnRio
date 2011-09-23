<?php
$this->breadcrumbs=array(
	'Palestrantes'=>array('index'),
	'Novo',
);

$this->menu=array(
	array('label'=>'Listar Palestrante', 'url'=>array('index')),
	array('label'=>'Administrar Palestrantes', 'url'=>array('admin')),
);
?>

<h1>Novo Palestrante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>