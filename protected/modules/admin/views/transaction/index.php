<?php
$this->breadcrumbs=array(
	'Transações'=>array('index'),
	'Listar',
);

$this->menu=array(
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
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

$this->renderPartial('_form');
?>

<h1>Lista de Transações Importadas</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attendee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('type' => 'html', 'header' => 'Nome', 'value' => "'<a href=\"mailto:'.\$data->email.'\">'.\$data->name.'</a>'"),
		'transaction_type',
		'status',
		'payment_type',
		'total_attendees',
		'received',
		'transaction_date',
		array('class'=>'CButtonColumn', 'template' => '{view}'),
	),
));
?>