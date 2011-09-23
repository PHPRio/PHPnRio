<?php
$this->breadcrumbs=array(
	'Usuário'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Novo Usuário', 'url'=>array('create')),
	array('label'=>'Alterar Usuário', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Remover Usuário', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listar Usuários', 'url'=>array('index')),
);
?>

<h1>Visualizar Usuário #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'username',
	),
)); ?>
