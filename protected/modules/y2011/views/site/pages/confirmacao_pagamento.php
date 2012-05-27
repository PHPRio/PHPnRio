<?
Yii::app()->getClientScript()->registerScript('redirect_to_main_site',
<<<JS
if (window.location.href.indexOf('igorsantos.com.br') > 0) window.location = 'http://www.phpnrio.com.br/confirmacao_pagamento'
JS
, CClientScript::POS_HEAD);
?>
<!-- meio -->
<div class="meio">

	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Inscrição efetuada!</h2>
		</div>
		<p style="margin-top:15px;">
			Recebemos seu pagamento!<br />
			Em breve você receberá um e-mail do PagSeguro com os detalhes e a confirmação do mesmo.
		</p>
		<br />
		<p><strong>Lembre-se:</strong></p>
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