<?php
$unconfirmed_page = $this->action->id == 'unconfirmedAttendees';

$this->breadcrumbs=array(
	'Transações'=>array('index'),
	'Listar',
);

$this->menu=array(
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
	array('label'=>'Ver Cortesias', 'url'=>array('attendee/free')),
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

if (!isset($GLOBALS['printing'])) $this->renderPartial('_form');
?>

<h1>
	Lista de Transações <?=!$unconfirmed_page? 'Importadas' : 'sem Inscritos '.CHtml::htmlButton('Reenviar email a eles', array('submit' => array('transaction/sendEmailToUnconfirmed'), 'confirm' => 'Tem certeza? Isso enviará o email com as instruções novamente a todas as transações sem inscrições confirmadas.'))?>
	 <?=$this->renderPartial('/layouts/_print_button')?>
</h1>

<?php
$columns = array(
	'code:text:Código',
	'name:text:Nome',
	'status:text:Status',
	'payment_type:text:Tipo',
	'total_attendees:text:Inscrições'
);
if (!isset($GLOBALS['printing'])) {
	array_unshift($columns,'id');
	$columns = array_merge($columns, array(
		'transaction_date:text:Data',
		array('class'=>'CButtonColumn', 'template' => '{view}'),
	));
}
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attendee-grid',
	'dataProvider'=>$transactions,
	'filter'=>$model,
	'columns'=> $columns
));
?>