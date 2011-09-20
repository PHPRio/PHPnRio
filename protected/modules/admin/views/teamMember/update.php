<?php
$this->breadcrumbs=array(
	'Team Members'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TeamMember', 'url'=>array('index')),
	array('label'=>'Create TeamMember', 'url'=>array('create')),
	array('label'=>'View TeamMember', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TeamMember', 'url'=>array('admin')),
);
?>

<h1>Update TeamMember <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>