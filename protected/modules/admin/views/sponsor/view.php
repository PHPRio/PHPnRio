<?php
$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Sponsor', 'url'=>array('index')),
	array('label'=>'Create Sponsor', 'url'=>array('create')),
	array('label'=>'Update Sponsor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sponsor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sponsor', 'url'=>array('admin')),
);
?>

<h1>View Sponsor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
