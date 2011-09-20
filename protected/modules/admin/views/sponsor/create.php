<?php
$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sponsor', 'url'=>array('index')),
	array('label'=>'Manage Sponsor', 'url'=>array('admin')),
);
?>

<h1>Create Sponsor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>