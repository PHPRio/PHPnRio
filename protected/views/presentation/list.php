<!-- meio -->
<div class="meio">
	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo"><h2>Palestras</h2></div>

		<? foreach ($presentations as $num => $pres): ?>
			<!-- box palestras -->
			<a name="<?=$pres->id?>"></a><a name="<?=$pres->slug?>"></a>
			<div class="palestras">
				<h1><img src="imagens/seta.jpg" alt="palestras" width="8" height="15" style="margin-right:5px;" /><?=$pres->title?></h1>
				<h3><?=CHtml::link($pres->speaker->name, array('speaker/list', '#' => $pres->speaker->slug))?></h3>
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