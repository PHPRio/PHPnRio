<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'presentation-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
		<?php if (!$model->isNewRecord) { ?>
			<p class="note" style="color: crimson">
				Lembre-se: o slug (parte que forma a URL desse registro) é atualizado automaticamente a partir deste campo.<br />
				Evite editá-lo se o link atual já foi divulgado.
			</p>
		<?php } ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>80)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'speaker_id'); ?>
		<?php echo $form->dropDownList($model,'speaker_id', CHtml::listData(Speaker::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'speaker_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period'); ?>
		<?php echo $form->dropDownList($model,'period', Presentation::$periods); ?>
		<?php echo $form->error($model,'period'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->