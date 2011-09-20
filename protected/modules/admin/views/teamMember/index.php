<?php
$this->breadcrumbs=array(
	'Team Members',
);

$this->menu=array(
	array('label'=>'Create TeamMember', 'url'=>array('create')),
	array('label'=>'Manage TeamMember', 'url'=>array('admin')),
);
?>

<h1>Team Members</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
