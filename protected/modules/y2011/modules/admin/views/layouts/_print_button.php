<?php
if (!isset($GLOBALS['printing']))
	echo CHtml::htmlButton('Imprimir', array('submit' => array('default/print', 'route' => strtr($this->route,'/','-'))));
else
	echo CHtml::htmlButton('Voltar', array('onClick' => 'history.back()'));