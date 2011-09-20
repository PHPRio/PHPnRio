<?php
$this->breadcrumbs=array(
	'Speakers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Speaker', 'url'=>array('index')),
	array('label'=>'Manage Speaker', 'url'=>array('admin')),
);
?>

<h1>Create Speaker</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>