<?php
$this->breadcrumbs=array(
	'Presentations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Presentation', 'url'=>array('index')),
	array('label'=>'Manage Presentation', 'url'=>array('admin')),
);
?>

<h1>Create Presentation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>