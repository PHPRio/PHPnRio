<!-- meio -->
<div class="meio">
	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Organização</h2>
		</div>

		<? foreach ($members as $member): ?>
			<!-- box organizadores -->
			<div class="organizadores">
				<h1>
					<img src="<?=$member->getImageUrl('imageFile')?>" alt="<?=$member->name?>" width="73" height="82" border="1" align="left" style="margin-right:15px;" />
					<img src="imagens/seta.jpg" alt="palestras" width="8" height="15" style="margin-right:5px;" />
					<?=$member->name?>
				</h1>
				<? if ($member->twitter) { ?><h3><a href="http://<?=$member->twitterLink?>" style="color:#0075c4;">@<?=$member->twitter?></a></h3><? } ?>
				<p style="color:#60a7aa"><a href="<?=$member->portifolio?>" style="color:#60a7aa;"><?=$member->portifolio?></a></p>
				<p><?=$member->description?></p>
			</div>
			<!-- box organizadores -->
		<? endforeach ?>


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