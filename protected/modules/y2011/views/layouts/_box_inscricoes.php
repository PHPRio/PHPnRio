<div class="titulo"><h2>Inscrições</h2></div>
<div class="box-inscreva-se">
	<? if (FINISHED): ?>
		<span style="margin-top:5px">As inscrições para o PHP'n Rio 2011 já foram encerradas.<br />Bom evento a todos!</span><br />
	<? else: ?>
		<span style="margin-top:5px">Não perca tempo, faça logo a sua inscrição para a edição de 2011 do PHP'n Rio!</span><br />
		<a href="<?=$this->createUrl('site/page', array('view' => 'inscricoes'))?>">
			<img src="/img/2011/bt-inscreva-se.png" alt="Inscreva-se" width="165" height="47" border="0" align="right" style="padding-right:32px; padding-top:20px;" />
		<a>
	<? endif ?>
</div>