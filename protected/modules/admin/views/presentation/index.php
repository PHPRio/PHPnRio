<?php
$this->breadcrumbs=array(
	'Presentations',
);

$this->menu=array(
	array('label'=>'Create Presentation', 'url'=>array('create')),
	array('label'=>'Manage Presentation', 'url'=>array('admin')),
);
?>

<h1>Presentations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
