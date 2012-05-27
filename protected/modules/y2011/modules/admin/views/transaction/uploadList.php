<p>Foram encontrados os seguintes erros durante a importação de um registro:</p>
<ul>
	<? foreach ($errors as $field => $error_messages): ?>
		<? foreach ($error_messages as $message) { ?><li><?=$message?></li><? } ?>
	<? endforeach ?>
</ul>