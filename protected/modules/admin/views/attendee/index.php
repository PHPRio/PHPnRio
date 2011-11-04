<?php
$this->breadcrumbs=array(
	'Inscritos'=>array('index'),
	'Listar',
);

$this->menu=array(
	$this->action->id == 'index'? array('label'=>'Ver Cortesias', 'url'=>array('attendee/free')) : array('label'=>'Ver Inscrições', 'url'=>array('attendee/index')),
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

<h1>Lista de <?=$this->action->id == 'index'? 'Inscritos' : 'Cortesias'?> <?=$this->renderPartial('/layouts/_print_button')?></h1>

<?php
Yii::app()->clientScript->registerCss('table', <<<CSS
	#attendee-grid_c0 { width: 30px; }
	#attendee-grid_c3 { white-space: nowrap; }
CSS
);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attendee-grid',
	'dataProvider'=>$attendees,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'rg',
		'name',
	),
));
?>
