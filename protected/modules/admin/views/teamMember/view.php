<?php
$this->breadcrumbs=array(
	'Membros'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Membros', 'url'=>array('index')),
	array('label'=>'Novo Membro', 'url'=>array('create')),
	array('label'=>'Alterar Membro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar Membro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Membros', 'url'=>array('admin')),
);
?>

<h1>Visualizar Membro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'team_member_col',
	),
)); ?>
