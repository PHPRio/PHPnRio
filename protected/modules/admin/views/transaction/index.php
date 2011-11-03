<?php
$unconfirmed_page = $this->action->id == 'unconfirmedAttendees';

$this->breadcrumbs=array(
	'Transações'=>array('index'),
	'Listar',
);

$this->menu=array(
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
	$unconfirmed_page? array('label'=>'Todas as Transações', 'url'=>array('transaction/index')) : array('label'=>'Trans. sem inscritos', 'url'=>array('transaction/unconfirmedAttendees')),
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

$this->renderPartial('_form');
?>
<br />
<hr />
<br />

<h1>Lista de Transações <?=!$unconfirmed_page? 'Importadas' : 'sem Inscritos '.CHtml::htmlButton('Reenviar email a eles', array('submit' => array('transaction/sendEmailToUnconfirmed'), 'confirm' => 'Tem certeza? Isso enviará o email com as instruções novamente a todas as transações sem inscrições confirmadas.'))?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attendee-grid',
	'dataProvider'=>$transactions,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'status',
		'payment_type',
		'total_attendees',
		'received',
		'transaction_date',
		array('class'=>'CButtonColumn', 'template' => '{view}'),
	),
));
?>