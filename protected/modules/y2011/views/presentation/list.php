<!-- meio -->
<div class="meio">
	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo"><h2>Palestras</h2></div>

		<? foreach ($presentations as $num => $pres): ?>
			<!-- box palestras -->
			<a name="<?=$pres->id?>"></a><a name="<?=$pres->slug?>"></a>
			<div class="palestras">
				<h1>
					<img src="imagens/seta.jpg" alt="palestras" width="8" height="15" style="margin-right:5px;" />
					<?=$pres->title?>
					<? if ($pres->hasFile || $pres->link): ?>
						<span style="font-size: 14px">-
							<? if ($pres->hasFile) { ?><a href="<?=$pres->fileUrl?>">Baixar arquivo(s)</a><? } ?>
							<? if ($pres->hasFile && $pres->link) { ?> || <? } ?>
							<? if ($pres->link) { ?><a target="_blank" style="background: url(/img/2011/external-12.png) no-repeat center right; padding-right: 16px;" href="<?=$pres->link?>">Link da palestra</a><? } ?>
						</span>
					<? endif ?>
				</h1>
				<h3>
					<?php
						$speaker_links = array();
						foreach ($pres->speakers as $speaker)
							$speaker_links[] = CHtml::link($speaker->name, array('speaker/list', '#' => $speaker->slug));
						echo implode(' | ', $speaker_links);
					?>
				</h3>
				<p><?=$pres->description?></p>
			</div>
			<!-- box palestras -->
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