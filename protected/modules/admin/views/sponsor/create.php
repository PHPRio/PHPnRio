<?php
$this->breadcrumbs=array(
	'Patrocinadores'=>array('index'),
	'Novo',
);

$this->menu=array(
	array('label'=>'Listar Patrocinador', 'url'=>array('index')),
	array('label'=>'Administrar Patrocinadores', 'url'=>array('admin')),
);
?>

<h1>Novo Patrocinador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>