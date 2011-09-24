<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'presentation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'speaker_id'); ?>
		<?php echo $form->dropDownList($model,'speaker_id', CHtml::listData(Speaker::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'speaker_id'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label($model->getAttributeLabel('begin').' - '.$model->getAttributeLabel('end'), 'Presentation_begin'); ?>
		<?php $this->widget('CMaskedTextField', array('model'=> $model, 'attribute' => 'begin', 'mask' => '99:99', 'htmlOptions' => array('size' => 5))); ?>
		-
		<?php $this->widget('CMaskedTextField', array('model'=> $model, 'attribute' => 'end', 'mask' => '99:99', 'htmlOptions' => array('size' => 5))); ?>
		<?php echo $form->error($model,'begin'); ?>
		<?php echo $form->error($model,'end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->