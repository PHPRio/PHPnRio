<?php
$this->breadcrumbs=array(
	'Palestrantes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Alterar',
);

$this->menu=array(
	array('label'=>'Novo Palestrante', 'url'=>array('create')),
	array('label'=>'Visualizar Palestrante', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listar Palestrantes', 'url'=>array('index')),
);
?>

<h1>Alterar Palestrante <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>