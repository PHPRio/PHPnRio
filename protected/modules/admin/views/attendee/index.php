<?php
$this->breadcrumbs=array(
	'Inscritos'=>array('index'),
	'Listar',
);

$this->menu=array(
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sponsor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'transaction.code',
		'rg',
		'name',
	),
)); ?>
