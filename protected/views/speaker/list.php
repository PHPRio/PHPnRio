<!-- meio -->
<div class="meio">

	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Palestrantes</h2>
		</div>

		<!-- box palestrantes -->
		<? foreach ($speakers as $speaker): ?>
			<a name="<?=$speaker->id?>"></a>
			<div class="pagina-palestrantes">
				<h1>
					<img src="<?=$speaker->getImageUrl('imageFile',true)?>" alt="<?=$speaker->name?>" width="73" height="82" border="1" align="left" style="margin-right:15px;" />
					<img src="img/seta.jpg" alt="palestras" width="8" height="15" style="margin-right:5px;" />
					<?=$speaker->name?>
				</h1>

				<? if (!empty($speaker->twitter)) { ?>
					<p style="color:#60a7aa">
						<a href="http://<?=$speaker->twitterLink?>" target="_blank" style="color:#60a7aa;">@<?=$speaker->twitter?></a>
					</p>
				<? } ?>

				<p><?=$speaker->description?></p>

				<br />
				<? foreach ($speaker->presentations as $pres): ?>
					<h3><?=CHtml::link($pres->title, array('presentation/list', '#' => $pres->id))?></h3>
				<? endforeach ?>
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