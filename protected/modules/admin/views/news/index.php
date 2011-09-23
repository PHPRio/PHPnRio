<?php
$this->breadcrumbs=array(
	'Notícias',
);

$this->menu=array(
	array('label'=>'Nova Notícia', 'url'=>array('create')),
	array('label'=>'Administrar Notícias', 'url'=>array('admin')),
);
?>

<h1>Notícias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
