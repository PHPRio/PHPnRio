<?php
$this->breadcrumbs=array(
	'Membros'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Alterar',
);

$this->menu=array(
	array('label'=>'Novo Membro', 'url'=>array('create')),
	array('label'=>'Visualizar Membro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listar Membros', 'url'=>array('index')),
);
?>

<h1>Alterar Membro <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>