<?php
$this->breadcrumbs=array(
	'Inscritos'=>array('index'),
	'Listar',
);

$this->menu=array(
	array('label'=>'Ver Cortesias', 'url'=>array('attendee/free')),
	array('label'=>'Ver Transações', 'url'=>array('transaction/index')),
	array('label'=>'Trans. sem inscritos', 'url'=>array('transaction/unconfirmedAttendees')),
	array('label'=>'Interesse nas Palestras', 'url'=>array('presentation/interest')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sponsor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Lista de Inscritos</h1>

<?php
Yii::app()->clientScript->registerCss('table', <<<CSS
	#attendee-grid_c0 { width: 30px; }
	#attendee-grid_c2 { width: 100px; }
CSS
);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attendee-grid',
	'dataProvider'=>$attendees,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'transaction.code',
		'rg',
		'name',
	),
));
?>
