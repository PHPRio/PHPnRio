<!-- meio -->
<div class="meio">

	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Patrocinadores e Apoiadores</h2>
			<p>
			  O PHP'n Rio 2011 agradece todos os patrocinadores e apoiadores do evento.
			</p>
			<p>
			  Caso queira a sua marca associada ao evento, entre em contato através do e-mail <a href="mailto:phpnrio@phprio.org">phpnrio@phprio.org</a>
			</p>
		</div>

		<!-- box palestrantes -->
		<? foreach ($this->sponsors as $sponsor): ?>
			<a name="<?=$sponsor->id?>"></a>
			<div class="pagina-palestrantes">
				<h1>
					<img src="<?=$sponsor->getImageUrl('imageFile')?>" alt="<?=$sponsor->name?>" width="115" height="79" border="1" align="left" style="margin-right:15px;" />
					<img src="img/seta.jpg" alt="palestras" width="8" height="15" style="margin-right:5px;" />
					<?=$sponsor->name?>
				</h1>

					<h3><?=CHtml::link($sponsor->url, $sponsor->url)?></h3>

				<? if (!empty($sponsor->twitter)) { ?>
					<p style="color:#60a7aa">
						<a href="http://<?=$sponsor->twitterLink?>" target="_blank" style="color:#60a7aa;">@<?=$sponsor->twitter?></a>
					</p>
				<? } ?>

				<p><?=$sponsor->description?></p>

				<br />
			</div>
		<? endforeach ?>
		<!-- box palestrantes -->
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