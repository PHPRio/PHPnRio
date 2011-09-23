<?php
$this->breadcrumbs=array(
	'Palestras'=>array('index'),
	'Nova',
);

$this->menu=array(
	array('label'=>'Listar Palestras', 'url'=>array('index')),
);
?>

<h1>Novo Palestra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>