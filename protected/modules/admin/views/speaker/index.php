<?php
$this->breadcrumbs=array(
	'Speakers',
);

$this->menu=array(
	array('label'=>'Create Speaker', 'url'=>array('create')),
	array('label'=>'Manage Speaker', 'url'=>array('admin')),
);
?>

<h1>Speakers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
