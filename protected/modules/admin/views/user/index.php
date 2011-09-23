<?php
$this->breadcrumbs=array(
	'Usuário',
);

$this->menu=array(
	array('label'=>'Novo Usuário', 'url'=>array('create')),
	array('label'=>'Administrar Usuários', 'url'=>array('admin')),
);
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
