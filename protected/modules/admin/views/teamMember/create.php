<?php
$this->breadcrumbs=array(
	'Membros'=>array('index'),
	'Novo',
);

$this->menu=array(
	array('label'=>'Listar Membros', 'url'=>array('index')),
	array('label'=>'Administrar Membros', 'url'=>array('admin')),
);
?>

<h1>Novo Membro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>