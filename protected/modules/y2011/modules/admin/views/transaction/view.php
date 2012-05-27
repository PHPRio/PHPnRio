<?php
$this->breadcrumbs=array(
	'Patrocinadores'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Gráfico', 'url'=>array('transaction/graph')),
	array('label'=>'Ver Transações', 'url'=>array('transaction/index')),
	array('label'=>'Trans. sem inscritos', 'url'=>array('transaction/unconfirmedAttendees')),
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
	array('label'=>'Ver Cortesias', 'url'=>array('attendee/free')),
	array('label'=>'Interesse nas Palestras', 'url'=>array('presentation/interest')),
);
?>

<h1>Transação <?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'email',
		'payment_method',
		'transaction_type',
		'status',
		'payment_type',
		'total_attendees',
		'price',
		'discount',
		'taxes',
		'received',
		'transaction_date',
		'compensation_date',
	),
)); ?>
