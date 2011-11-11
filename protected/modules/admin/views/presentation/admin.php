<?php
$this->breadcrumbs=array(
	'Palestras'=>array('index'),
	'Listar',
);

$this->menu=array(
	array('label'=>'Nova Palestra', 'url'=>array('create')),
	array('label'=>'Interesse nas Palestras', 'url'=>array('interest')),
	array('label'=>'Ver Transações', 'url'=>array('transaction/index')),
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('presentation-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Listar Palestras</h1>

<p>
Você pode opcionalmente inserir um operador de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) no começo de cada um dos campos de busca para especificar como a comparação deve ser feita.
</p>

<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'presentation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'periodTime',
		array('header' => 'Palestrante(s)', 'type' => 'html', 'value' => '$data->getSpeakersNames(true)'),
		array('header' => 'Arquivo', 'type' => 'html', 'value' => '($data->hasFile)? \'<a href="/presentations/\'.basename($data->filename).\'">Baixar</a>\' : \'Não tem\''),
		array('class'=>'CButtonColumn'),
	),
)); ?>
