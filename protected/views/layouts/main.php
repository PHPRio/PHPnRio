<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>PHP'n Rio 2011 - <?=$this->pageTitle?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Principal evento de PHP no Rio de Janeiro" />
		<meta name="keywords" content="PHP, desenvolvimento, programação web, web developer, evento php rio, evento php, phprio"/>
		<meta name="language" content="pt-br" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="Rafael Caride, Igor Santos" />

		<link href="/css/estilo.css" rel="stylesheet" type="text/css"/>
		<style type="text/css">
			body {
				background-position:center top;
				background-image: url(/img/<?=($this->getUniqueId() == 'site' && $this->action->getId() == 'index')? 'bg.gif' : 'bg-internas.jpg'?>);
				background-repeat:no-repeat;
				background-color: #fff;
			}
		</style>

		<? if (PRODUCTION) echo $this->renderPartial('/layouts/_ga') ?>
	</head>
	<body>
		<center>
			<div class="mae">
				<!-- topo -->
				<div class="topo">
					<div id="logo"><a href="/"><img src="/img/logo.gif" alt="PHP'n Rio 2011" width="204" height="51" border="0" /></a></div>

					<?=$this->renderPartial('/layouts/_barrinha_social')?>

					<div id="menu">
						<ul>
							<?php /* Submenu Grade, Palestrantes, Local, Informações */ ?>
							<li><?=CHtml::link('O EVENTO',		array('site/page', 'view' => 'evento'))?></li>
							<li><?=CHtml::link('INSCRIÇÕES',		array('site/page', 'view' => 'inscricoes'))?></li>
							<li><?=CHtml::link('GRADE',			array('site/page', 'view' => 'grade'))?></li>
							<li><?=CHtml::link('PATROCINADORES',	array('sponsor/list'))?></li>
							<li><?=CHtml::link('ORGANIZAÇÃO',		array('teamMember/list'))?></li>
						</ul>
					</div>
				</div>
				<!-- topo -->

				<?=$content?>

			</div>

			<? if ($this->getUniqueId() != 'sponsor'): ?>
				<!-- footer 1-->
				<div class="rodape-top">
					<div class="logos-patrocinio">
						<div class="titulo-logos"><h2>PATROCÍNIO</h2></div>
						<?php
							if (isset($this->sponsors['sponsor']) && is_array($this->sponsors['sponsor'])):
								foreach ($this->sponsors['sponsor'] as $sponsor)
									echo $this->renderPartial('/layouts/_box_sponsor', array('link'=> $sponsor->url, 'img' => $sponsor->getImageUrl('imageFile'), 'name' => $sponsor->name, 'sponsor' => true));
							endif;
						?>
					</div>

					<? if (isset($this->sponsors['supporter']) && is_array($this->sponsors['supporter'])): ?>
						<div class="logos-patrocinio">
						<div class="titulo-logos"><h2>APOIO</h2></div>
							<?php
								foreach ($this->sponsors['supporter'] as $sponsor)
									echo $this->renderPartial('/layouts/_box_sponsor', array('link'=> $sponsor->url, 'img' => $sponsor->getImageUrl('imageFile'), 'name' => $sponsor->name, 'sponsor' => false));

								echo $this->renderPartial('/layouts/_box_sponsor', array(
									'link'	=> $this->createUrl('sponsor/list'),
									'img'	=> '/img/patrocine-aqui.jpg',
									'name'	=> "Patrocine o PHP'n Rio!",
									'sponsor' => false,
								));
							?>
						</div>
					<? endif ?>
				</div>
				<!-- footer 1-->
			<? endif ?>

			<!-- footer 2-->
			<div class="rodape-bottom">
				<div class="conteudo-rodape">

					<div class="menu-rodape">
						<p style="margin-bottom:5px;">O EVENTO</p>
						<ul>
							<li><?=CHtml::link('Palestrantes',	array('speaker/list'))?></li>
							<li><?=CHtml::link('Palestras',		array('presentation/list'))?></li>
							<li><?=CHtml::link('Informações',	array('site/page', 'view' => 'evento'))?></li>
							<li><a href="http://www.phprio.org/phpnrio10">PHP'n Rio 10</a></li>
							<li><a href="http://www.phprio.org/phpnrio09">PHP'n Rio 09</a></li>
						</ul>
					</div>

					<div class="menu-rodape">
						<p style="margin-bottom:5px;">Precisa falar conosco?</p>
						<ul>
							<li><a href="mailto:phpnrio@phprio.org">phpnrio@phprio.org</a></li>
					</div>

					<div class="rodape-creditos"><img src="/img/logo-php-in-rio-2011-rodape.gif" alt="Php'n Rio 2011" width="92" height="42" /><br />
						<p style="padding-top:7px;"><a href="http://www.rafaelcaride.com.br" target="_blank">Design e Frontend<br />Rafael Caride</a></p>
						<p style="padding-top:7px;"><a href="http://www.igorsantos.com.br" target="_blank">Desenvolvimento<br />Igor Santos </a></p>
					</div>

				</div>
			</div>
			<!-- footer 2-->

			<?php
				echo CGoogleApi::init();
				echo CHtml::script(CGoogleApi::load('jquery','1.6.4'));
			?>
			<script type="text/javascript" src="/js/prettify.js"></script>
			<? if (ENV != 'dev'): ?>
				<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
				<script type="text/javascript" src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			<? endif ?>
		</center>
	</body>
</html>
