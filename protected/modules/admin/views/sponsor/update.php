<?php
$this->breadcrumbs=array(
	'Patrocinadores'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Alterar',
);

$this->menu=array(
	array('label'=>'Listar Patrocinadores', 'url'=>array('index')),
	array('label'=>'Novo Patrocinador', 'url'=>array('create')),
	array('label'=>'Visualizar Patrocinador', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Patrocinadores', 'url'=>array('admin')),
);
?>

<h1>Alterar Patrocinador <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>