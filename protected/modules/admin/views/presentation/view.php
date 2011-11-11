<?php
$this->breadcrumbs=array(
	'Palestras'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Nova Palestra', 'url'=>array('create')),
	array('label'=>'Alterar Palestra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar Palestra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listar Palestras', 'url'=>array('index')),
	array('label'=>'Interesse nas Palestras', 'url'=>array('interest')),
	array('label'=>'Ver Transações', 'url'=>array('transaction/index')),
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
);
?>

<h1>Visualizar Palestra #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'periodTime',
		array('name' => 'Palestrante(s)', 'type' => 'html', 'value' => $model->getSpeakersNames(true)),
	),
)); ?>
