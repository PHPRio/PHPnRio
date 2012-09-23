<?php
$this->breadcrumbs=array(
	'Home (Lista de pré-inscrições)',
);
?>

<h1>Lista de pré-inscrições</h1>

<a href="<?=$this->createUrl('/2012/admin/prizes')?>">Baixar CSV dos pré-inscritos</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'preinscription-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'email',
	),
)); ?>
