<?php
$this->breadcrumbs=array(
	'Patrocinadores',
);

$this->menu=array(
	array('label'=>'Novo Patrocinador', 'url'=>array('create')),
	array('label'=>'Administrar Patrocinadores', 'url'=>array('admin')),
);
?>

<h1>Patrocinadores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
