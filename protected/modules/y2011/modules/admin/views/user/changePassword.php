<?php
$this->breadcrumbs=array(
	'Usuários'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Alterar',
);

$this->menu=array(
	array('label'=>'Novo Usuário', 'url'=>array('create')),
	array('label'=>'Visualizar Usuário', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listar Usuários', 'url'=>array('index')),
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'new_password'); ?>
		<?php echo $form->passwordField($model,'new_password',array('size'=>20)); ?>
		<?php echo $form->error($model,'new_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat',array('size'=>20)); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>

	<p class="note">Senha com mínimo de <span class="required">6</span> caracteres.</p>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar senha'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->