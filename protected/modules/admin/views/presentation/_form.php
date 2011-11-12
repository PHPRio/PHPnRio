ain<div class="form">

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
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file'); ?>
		<?php echo $form->error($model,'file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size' => 30, 'maxlength' => 100)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'speakers',array('style' => 'display: inline-block')); ?>
		<input type="button" onclick="addSpeaker(this)" value="+" />
		<?php
			$total_fields = ($model->isNewRecord)? 1 : sizeof($model->speakers);
			for ($i = 0; $i < $total_fields; $i++):
		?>
			<div>
				<?php echo $form->dropDownList($model, "speakers[$i]", CHtml::listData(Speaker::model()->findAll(), 'id', 'name')); ?>
				<?php echo $form->error($model,'speakers'); ?>
				<input type="button" onclick="removeSpeaker(this)" value="-" />
			</div>
		<? endfor ?>
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

<?php Yii::app()->getClientScript()->registerScript('functions',
<<<JS
	function addSpeaker(button) {
		var div = $($(button).siblings("div")[0]),
			select = div.find('select')
		select.attr('name', select.attr('name').replace(/\[\d*\]/, '[]'))
		div.clone().insertAfter(div)
	}

	function removeSpeaker(button) {
		div = $(button).parent("div")
		if (div.siblings('div').length > 0)
			div.remove()
		else
			alert('É necessário ao menos um palestrante')
	}
JS
, CClientScript::POS_END);
?>