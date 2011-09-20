<?php
$this->breadcrumbs=array(
	'Team Members'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TeamMember', 'url'=>array('index')),
	array('label'=>'Manage TeamMember', 'url'=>array('admin')),
);
?>

<h1>Create TeamMember</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>