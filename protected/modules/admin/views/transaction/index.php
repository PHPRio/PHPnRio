<?php
$this->breadcrumbs=array(
	'Participantes'=>array('index'),
	'Listar',
);

$this->renderPartial('_form');

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
		'transaction_date'
	),
));
?>