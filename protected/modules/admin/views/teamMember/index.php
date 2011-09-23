<?php
$this->breadcrumbs=array(
	'Membros',
);

$this->menu=array(
	array('label'=>'Novo Membro', 'url'=>array('create')),
	array('label'=>'Administrar Membros', 'url'=>array('admin')),
);
?>

<h1>Membros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
