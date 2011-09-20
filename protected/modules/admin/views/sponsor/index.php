<?php
$this->breadcrumbs=array(
	'Sponsors',
);

$this->menu=array(
	array('label'=>'Create Sponsor', 'url'=>array('create')),
	array('label'=>'Manage Sponsor', 'url'=>array('admin')),
);
?>

<h1>Sponsors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
