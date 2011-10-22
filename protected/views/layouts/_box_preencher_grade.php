<div class="titulo"><h2>Preencha sua grade!</h2></div>
<div class="box-preencher-grade">
	<div>
		Já se inscreveu? Então ajude-nos a organizar a grade de palestras de acordo com o melhor espaço, marcando quais delas você pretende assistir.<br /><br />
		<p>Preencha aqui o código da sua Transação do PagSeguro e prossiga.</p>
	</div>

	<form action="<?=$this->createUrl('schedule/identifyAttendee')?>" method="post">
		<input type="text" name="transaction" maxlength="36" />
		<input type="submit" value="Identificar" />
		<? if ($_SESSION['transaction'] === false) { ?>
			<p class="error">Código inválido. Talvez sua transação ainda não tenha sido processada pelo site. Tente novamente mais tarde.</p>
		<? } elseif (is_string($_SESSION['transaction'])) { ?>
			<p class="success">Código identificado, <?=$_SESSION['first_name']?>! Marque as palestras ao lado e clique em Salvar.</p>
		<? } ?>
	</form>
</div>