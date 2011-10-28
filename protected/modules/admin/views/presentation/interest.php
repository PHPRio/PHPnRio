<?php
$this->breadcrumbs=array(
	'Palestras'=>array('index'),
	'Interesse',
);

$this->menu=array(
	array('label'=>'Nova Palestra', 'url'=>array('create')),
	array('label'=>'Listar Palestras', 'url'=>array('index')),
	array('label'=>'Ver Transações', 'url'=>array('transaction/index')),
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
);
?>

<h1>Interessados nas Palestras</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'presentation-grid',
	'dataProvider'=>new CArrayDataProvider($presentations, array('pagination' => false)),
	'columns'=>array(
		array('value' => '$data[\'id\']', 'header' => '#'),
		array('value' => "'<a href=\"'.\Yii::app()->createUrl('admin/presentation/view', array('id' =>\$data['id'])).'\">'.\$data['title'].'</a>'", 'type' => 'html', 'header' => 'Palestra'),
		array('value' => '$data[\'total_attendees\']', 'header' => 'Interessados')
	),
));

//'<a href=\"'.$this->createUrl('presentation/view', array('id' =>\$data['id'])).'\">'.$data['title']."</a>"

?>