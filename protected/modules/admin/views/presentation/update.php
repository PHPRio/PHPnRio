<?php
$this->breadcrumbs=array(
	'Presentations'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Presentation', 'url'=>array('index')),
	array('label'=>'Create Presentation', 'url'=>array('create')),
	array('label'=>'View Presentation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Presentation', 'url'=>array('admin')),
);
?>

<h1>Update Presentation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>