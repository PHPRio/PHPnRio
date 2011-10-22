<?php
	if (!isset($_SESSION['transaction']) || is_string($_SESSION['transaction'])) return null;

	$attr = '';
	if (isset($checked) && $checked) $attr .= 'checked="checked" ';
	if (isset($disabled) && $disabled) $attr .= 'disabled="disabled" ';
	if (isset($slug) && isset($this->presentations[$slug])) $attr .= 'value="'.$this->presentations[$slug]->id.'" ';
?>
<input type="radio" id="<?=$code?>" name="<?=strtok($code,'-')?>" <?=$attr?>/>
<label for="<?=$code?>">Selecionar</label>
<br />