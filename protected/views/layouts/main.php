<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>PHP'n Rio 2011: Dia 5 de Novembro no CEFET-RJ campus Maracanã</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Principal evento de PHP no Rio de Janeiro" />
		<meta name="keywords" content="PHP, desenvolvimento, programação web, web developer, evento php rio, evento php, phprio"/>
		<meta name="language" content="pt-br" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="Rafael Caride, Igor Santos" />

<? if (ENV != 'dev'): ?>
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		<script type="text/javascript" src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
		<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<? endif ?>

		<link href="/css/estilo.css" rel="stylesheet" type="text/css"/>
		<style type="text/css">
			body {
				background-position:center top;
				background-image: url(/img/<?=($this->getUniqueId() == 'site' && $this->action->getId() == 'index')? 'bg.gif' : 'bg-internas.jpg'?>);
				background-repeat:no-repeat;
				background-color: #fff;
			}
		</style>
		<? if (ENV != 'dev') { ?><link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css' /><? } ?>

		<? if (PRODUCTION) echo $this->renderPartial('/layouts/_ga') ?>
	</head>
	<body>
		<center>
			<div class="mae">
				<!-- topo -->
				<div class="topo">
					<div class="logo"><a href="/"><img src="/img/logo.gif" alt="PHP'n Rio 2011" width="204" height="51" border="0" /></a></div>

					<?=$this->renderPartial('/layouts/_barrinha_social')?>

					<div id="menu">
						<ul>
							<?php /* Submenu Grade, Palestrantes, Local, Informações */ ?>
							<li><?=CHtml::link('O EVENTO',			array('site/page', 'view' => 'evento'))?></li>
							<li><?=CHtml::link('INSCRIÇÕES',		array('site/page', 'view' => 'inscricoes'))?></li>
							<? /* <li><?=CHtml::link('GRADE',				array('presentation/grid'))?></li>
							<li><?=CHtml::link('PATROCINADORES',	array('sponsor/list'))?></li> */ ?>
							<li><?=CHtml::link('ORGANIZAÇÃO',		array('teamMember/list'))?></li>
						</ul>
					</div>
				</div>
				<!-- topo -->

				<?=$content?>

			</div>
			<!-- footer 1-->
			<div class="rodape-top">
				<div class="logos-patrocinio">
					<?php
						for ($s = 0; $s < 6; $s++):
							if (isset($this->sponsors[$s])) {
								$img = $this->sponsors[$s]->getImageUrl('imageFile');
								$name = $this->sponsors[$s]['name'];
								$hash = $this->sponsors[$s]['id'];
							}
							else {
								$img = '/img/patrocine-aqui.jpg';
								$name = "Patrocine o PHP'n Rio";
								$hash = 'patrocine';
							}
						?>
						<div class="box-logos-patrocinio">
							<a href="<?=$this->sponsors[$s]->url?>">
								<img src="<?=$img?>" alt="<?=$name?>" width="115" height="79" border="0" />
							</a>
						</div>
					<? endfor ?>
				</div>
			</div>
			<!-- footer 1-->

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
							<li>phpnrio@phprio.org</li>
					</div>

					<div class="rodape-creditos"><img src="/img/logo-php-in-rio-2011-rodape.gif" alt="Php'n Rio 2011" width="92" height="42" /><br />
						<p style="padding-top:7px;"><a href="http://www.rafaelcaride.com.br">Design e Frontend<br /> Rafael Caride</a></p>
					</div>

				</div>
			</div>
			<!-- footer 2-->

			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
			<script type="text/javascript" src="/js/prettify.js"></script>
		</center>
	</body>
</html>