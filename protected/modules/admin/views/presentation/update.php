<?php
$this->breadcrumbs=array(
	'Palestras'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Alterar',
);

$this->menu=array(
	array('label'=>'Nova Palestra', 'url'=>array('create')),
	array('label'=>'Visualizar Palestra', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listar Palestras', 'url'=>array('index')),
	array('label'=>'Interesse nas Palestras', 'url'=>array('interest')),
	array('label'=>'Ver Transações', 'url'=>array('transaction/index')),
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
);
?>

<h1>Alterar Palestra <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>