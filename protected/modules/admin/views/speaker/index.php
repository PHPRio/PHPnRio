<?php
$this->breadcrumbs=array(
	'Palestrantes',
);

$this->menu=array(
	array('label'=>'Novo Palestrante', 'url'=>array('create')),
	array('label'=>'Administrar Palestrantes', 'url'=>array('admin')),
);
?>

<h1>Palestrantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
