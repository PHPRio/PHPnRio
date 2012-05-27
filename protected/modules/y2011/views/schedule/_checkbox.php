<?php
	if (!$this->transaction) return null;

	$attr = '';
	if (isset($checked) && $checked) $attr .= 'checked="checked" ';
	if (isset($disabled) && $disabled) $attr .= 'disabled="disabled" ';
	if (isset($slug) && isset($this->presentations[$slug])) {
		$id = $this->presentations[$slug]->id;
		$attr .= "value=\"$id\" ";
		foreach ($this->transaction->presentations as $pres)
			if ($pres->id == $id) {
				$attr .= 'checked="checked" ';
				break;
			}
	}
?>
<input type="radio" id="<?=$code?>" name="<?=strtok($code,'-')?>" value="<?=strtok('-')?>"<?=$attr?>/>
<label for="<?=$code?>">Selecionar</label>
<br />