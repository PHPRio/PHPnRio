<? $enabled = @include(YiiBase::getPathOfAlias('application.config._temp_form_enabled').'.php'); ?>
<div class="meio">
	<div class="conteudo">
		<div class="titulo">
			<h2>Chegou atrasado é? tsc tsc...</h2>
		</div>
		<br />
		<br />

		<? if ($enabled): ?>
			<form target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/cart.html?action=add" method="post">
				<input type="hidden" name="receiverEmail" value="projeto-phpnrio@alta.org.br" />
				<input type="hidden" name="currency" value="BRL" />
				<input type="hidden" name="itemId" value="1" />
				<input type="hidden" name="itemDescription" value="Inscricao para o evento PHP'n Rio 2011 para o dia 5/11/2011" />
				<input type="hidden" name="itemQuantity" value="1" />
				<input type="hidden" name="itemAmount" value="30.00" />
				<input type="hidden" name="itemWeight" value="" />
				<input type="hidden" name="itemShippingCost" value="0.00" />
				<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/205x30-pagar.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
			</form>
		<? else: ?>
			<p>Chegou tarde demais <strong>:P</strong></p>
		<? endif ?>
	</div>
</div>