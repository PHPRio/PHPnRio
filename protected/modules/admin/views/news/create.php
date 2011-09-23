<?php
$this->breadcrumbs=array(
	'Notícias'=>array('index'),
	'Nova',
);

$this->menu=array(
	array('label'=>'Listar Notícias', 'url'=>array('index')),
);
?>

<h1>Nova Notícia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>