<?php
$this->breadcrumbs=array(
	'Notícias'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Alterar',
);

$this->menu=array(
	array('label'=>'Listar Notícias', 'url'=>array('index')),
	array('label'=>'Nova Notícia', 'url'=>array('create')),
	array('label'=>'Visualizar Notícia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Notícias', 'url'=>array('admin')),
);
?>

<h1>Alterar Notícias <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>