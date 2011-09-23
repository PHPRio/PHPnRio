<?php
$this->breadcrumbs=array(
	'Notícias'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Nova Notícia', 'url'=>array('create')),
	array('label'=>'Alterar Notícia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar Notícia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listar Notícias', 'url'=>array('index')),
);
?>

<h1>Visualizar Notícia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'short_desc',
		'text',
		'author',
	),
)); ?>
