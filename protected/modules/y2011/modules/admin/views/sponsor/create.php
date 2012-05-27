<?php
$this->breadcrumbs=array(
	'Patrocinadores'=>array('index'),
	'Novo',
);

$this->menu=array(
	array('label'=>'Listar Patrocinadores', 'url'=>array('index')),
);
?>

<h1>Novo Patrocinador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>