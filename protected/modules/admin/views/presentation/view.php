<?php
$this->breadcrumbs=array(
	'Presentations'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Presentation', 'url'=>array('index')),
	array('label'=>'Create Presentation', 'url'=>array('create')),
	array('label'=>'Update Presentation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Presentation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Presentation', 'url'=>array('admin')),
);
?>

<h1>View Presentation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'begin',
		'end',
		'speaker_id',
	),
)); ?>
