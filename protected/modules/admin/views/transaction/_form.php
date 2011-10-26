<?php
echo CHtml::beginForm($this->createUrl('transaction/uploadList'), 'post', array('enctype' => 'multipart/form-data'));

echo CHtml::label('Arquivo XML do PagSeguro: ', 'file');
echo CHtml::fileField('file');
echo CHtml::submitButton('Atualizar!');