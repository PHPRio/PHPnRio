<div class="form">
	<?php
		echo CHtml::beginForm($this->createUrl('transaction/uploadList'), 'post', array('enctype' => 'multipart/form-data'));

		echo CHtml::label('Arquivo XML do PagSeguro: ', 'file');
		echo CHtml::fileField('file');
		echo CHtml::submitButton('Atualizar!');
	?>
	<p class="note">Subir um XML com novos registros enviará um email para cada um dos<br />novos inscritos, informando sobre a página de finalização das inscrições.</p>
	<? echo CHtml::endForm(); ?>
</div>