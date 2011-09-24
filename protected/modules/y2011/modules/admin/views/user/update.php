<?php
$this->breadcrumbs=array(
	'Usuários'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Alterar',
);

$this->menu=array(
	array('label'=>'Alterar minha senha', 'url'=>array('changePassword')),
	array('label'=>'Novo Usuário', 'url'=>array('create')),
	array('label'=>'Visualizar Usuário', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listar Usuários', 'url'=>array('index')),
);
?>

<h1>Alterar Usuário <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>