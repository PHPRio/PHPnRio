<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'speaker-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
		<?php if (!$model->isNewRecord) { ?>
			<p class="note" style="color: crimson">
				Lembre-se: o slug (parte que forma a URL desse registro) é atualizado automaticamente a partir deste campo.<br />
				Evite editá-lo se o link atual já foi divulgado.
			</p>
		<?php } ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('cols'=>80,'rows'=>6)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'twitter'); ?>
		@<?php echo $form->textField($model,'twitter',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'twitter'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->