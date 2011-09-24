<?php
$this->breadcrumbs=array(
	'Palestrantes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Novo Palestrante', 'url'=>array('create')),
	array('label'=>'Alterar Palestrante', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar Palestrante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listar Palestrantes', 'url'=>array('index')),
);
?>

<h1>Visualizar Palestrante #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array('name' => 'Twitter', 'type' => 'url', 'value' => $model->twitterLink),
		'description',
	),
)); ?>
