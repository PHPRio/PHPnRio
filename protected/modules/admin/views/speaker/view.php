<?php
$this->breadcrumbs=array(
	'Speakers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Speaker', 'url'=>array('index')),
	array('label'=>'Create Speaker', 'url'=>array('create')),
	array('label'=>'Update Speaker', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Speaker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Speaker', 'url'=>array('admin')),
);
?>

<h1>View Speaker #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'twitter',
	),
)); ?>
