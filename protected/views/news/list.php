<!-- meio -->
<div class="meio">

	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo"><h2>Todas as notícias</h2></div>

		<? foreach ($all_news as $news): ?>
			<? $link = $this->createUrl('news/view', array('data' => $news->slug)) ?>
			<a name="<?=$news->id?>"></a><a name="<?=$news->slug?>"></a>
			<div class="pagina-palestrantes">
				<h1>
					<a href="<?=$link?>" title="<?=$news->title?>">
						<img src="<?=$news->getImageUrl('imageFile',true)?>" alt="<?=$news->title?>" width="82" height="82" border="1" align="left" style="margin-right:15px;" />
					</a>
					<img src="img/seta.jpg" alt="palestras" width="8" height="15" style="margin-right:5px;" />
					<a href="<?=$link?>"><?=$news->title?></a>
				</h1>
				<h3><?=date('d/m/Y', strtotime($news->datetime))?></h3>

				<p><?=$news->short_desc?></p>

				<br />
			</div>
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