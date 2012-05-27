<?php
$this->breadcrumbs=array(
	'Palestrantes'=>array('index'),
	'Novo',
);

$this->menu=array(
	array('label'=>'Listar Palestrantes', 'url'=>array('index')),
);
?>

<h1>Novo Palestrante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>