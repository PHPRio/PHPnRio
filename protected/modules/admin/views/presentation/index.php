<?php
$this->breadcrumbs=array(
	'Palestras',
);

$this->menu=array(
	array('label'=>'Nova Palestra', 'url'=>array('create')),
	array('label'=>'Administrar Palestras', 'url'=>array('admin')),
);
?>

<h1>Palestras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
