<!-- meio -->
<div class="meio">

	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Patrocinadores</h2>
			<p>O PHP'n Rio 2011 agradece todos os patrocinadores e apoiadores do evento.</p>
			<p>Caso queira a sua marca associada ao evento, entre em contato através do e-mail <a href="mailto:phpnrio@phprio.org">phpnrio@phprio.org</a>.</p>
		</div>
		<? if (isset($this->sponsors['sponsor']) && is_array($this->sponsors['sponsor'])): ?>
			<? foreach ($this->sponsors['sponsor'] as $sponsor) echo $this->renderPartial('/sponsor/_box_sponsor', compact('sponsor')) ?>
		<? endif ?>

		<? if (isset($this->sponsors['supporter']) && is_array($this->sponsors['supporter'])): ?>
			<div class="titulo">
				<h2>Apoiadores</h2>
			</div>
			<? foreach ($this->sponsors['supporter'] as $sponsor) echo $this->renderPartial('/sponsor/_box_sponsor', compact('sponsor')) ?>
		<? endif ?>
	</div>
	<!-- conteúdo -->

	<!-- coluna direita -->
	<div class="coluna-direita">
		<?= $this->renderPartial('/layouts/_box_inscricoes') ?>
		<?= $this->renderPartial('/layouts/_redes_sociais') ?>
	</div>
	<!-- coluna direita -->

</div>
<!-- meio -->