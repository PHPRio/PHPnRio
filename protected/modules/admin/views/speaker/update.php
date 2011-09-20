<?php
$this->breadcrumbs=array(
	'Speakers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Speaker', 'url'=>array('index')),
	array('label'=>'Create Speaker', 'url'=>array('create')),
	array('label'=>'View Speaker', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Speaker', 'url'=>array('admin')),
);
?>

<h1>Update Speaker <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>