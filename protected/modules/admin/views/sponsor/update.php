<?php
$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sponsor', 'url'=>array('index')),
	array('label'=>'Create Sponsor', 'url'=>array('create')),
	array('label'=>'View Sponsor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sponsor', 'url'=>array('admin')),
);
?>

<h1>Update Sponsor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>