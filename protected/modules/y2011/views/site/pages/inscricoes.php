<!-- meio -->
<div class="meio">

	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Inscrições</h2>
		</div>
		<h1 style="padding-top:15px;"><?=FINISHED? "As inscrições para o PHP'n Rio 2011 já se encerraram :(" : "Já estão abertas as inscrições para o PHP'n Rio 2011"?></h1>
		<p style="padding-top:2px;">&nbsp;</p>
		<? if (!FINISHED): ?>
			<p>Clique no botão abaixo para se inscrever! Você será redirecionado ao site do PagSeguro, onde fará um cadastro (caso já não possua) e escolherá a melhor forma de pagamento. Não perca tempo!</p>
			<br />
			<p>Valor de inscrição: R$ 30,00</p>
			<div style="height:80px;">
				<h2 style="text-align:center;">&nbsp;</h2>

				<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
				<form style="width: 205px; margin: 0px auto" target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/cart.html?action=add" method="post">
					<input type="hidden" name="receiverEmail" value="projeto-phpnrio@alta.org.br" />
					<input type="hidden" name="currency" value="BRL" />
					<input type="hidden" name="itemId" value="1" />
					<input type="hidden" name="itemDescription" value="Inscricao para o evento PHP'n Rio 2011 para o dia 5/11/2011" />
					<input type="hidden" name="itemQuantity" value="1" />
					<input type="hidden" name="itemAmount" value="30.00" />
					<input type="hidden" name="itemWeight" value="" />
					<input type="hidden" name="itemShippingCost" value="0.00" />
					<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/205x30-pagar.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
					<? /*
						* botão pagseguro: https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/205x30-pagar.gif
						* botão layout: img/bt-inscreva-se.png
						*/ ?>
				</form>
				<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
			</div>
		<? endif ?>
		<br />
		<p><strong>Observações:</strong></p>
		<p>
			O valor das inscrições será revertido integralmente para o conforto do conferecista, não ficando nenhum valor a ser doado para as Instituições Governamentais que estão apoiando o evento.<br />
			Após confirmada a inscrição, não haverá devolução de valores, mesmo em caso de não comparecimento.
		</p>
	</div>
	<!-- conteúdo -->

	<!-- coluna direita -->
	<div class="coluna-direita">
		<?= $this->renderPartial('/layouts/_redes_sociais') ?>
	</div>
	<!-- coluna direita -->
</div>
<!-- meio -->