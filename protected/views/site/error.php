<? $this->pageTitle = "Erro $code"; ?>

<!-- meio -->
<div class="meio">
	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2><?=$this->pageTitle?></h2>
		</div>

		<? switch ($code) {
			case 404: ?>
				<h3>A página não foi encontrada.</h3>
				<p>Tem certeza que você digitou o endereço corretamente? Talvez o link esteja quebrado.</p>
				<!--
					<? var_dump(Yii::app()->request->pathInfo); var_dump(Yii::app()->controller); ?>
				-->
			<? break;
			   default: ?>
				<h3>Estamos atualizando o site</h3>
				<p>Volte brevemente, teremos novidades!</p>
		<? } ?>
		<!-- <?=$message?> -->
	</div>
</div>
<!-- meio -->