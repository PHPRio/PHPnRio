<? $this->pageTitle = $news->title; ?>

<!-- meio -->
<div class="meio">
	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Notícias</h2>
		</div>

		<!-- noticia -->
		<div class="pagina-palestrantes">
			<h1><?=$news->title?></h1>
			<p>&nbsp;</p>
			<p><?=$news->text?></p>
		</div>
		<!-- noticia -->

		<? if (sizeof($other_news) > 0): ?>
			<div class="titulo">
				<h2>Outras Notícias</h2>
			</div>

			<?php
				foreach($other_news as $news):
					$link = $this->createUrl('news/view', array('id' => $news->id));
			?>

				<div class="box-noticias">
					<a href="<?=$link?>">
						<img src="<?=$news->getImageUrl('imageFile', true)?>" alt="<?=$news->title?>" width="70" height="70" border="0" style="float:left;" />
					</a>

					<div class="chamada-noticia">
						<a href="<?=$link?>"><p style="font-size:16px; color:#60a7aa;"><?=$news->title?></p></a>
						<a href="<?=$link?>"><p style="font-size:14px; color:#333333;"><?=$news->short_desc?></p></a>
					</div>
				</div>
			<? endforeach ?>
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