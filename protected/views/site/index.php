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

		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		<script type="text/javascript" src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
		<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
		<style type="text/css">
			body {
				background-position:center top;
				background-image: url(img/bg.gif);
				background-repeat:no-repeat;
				background-color: #fff;
			}
		</style>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<center>
			<div class="mae">
				<!-- topo -->
				<div class="topo">
					<div class="logo"><a href="index.php"><img src="img/logo.gif" alt="PHP 'n Rio 2011" width="204" height="51" border="0" /></a></div>

					<?=$this->renderPartial('_barrinha_social')?>

					<div id="menu">
						<ul>
							<?php /* Submenu Grade, Palestrantes, Local, Informações */ ?>
							<li><?=CHtml::link('O EVENTO',			array('site/page', 'view' => 'evento'))?></li>
							<li><?=CHtml::link('INSCRIÇÕES',		array('site/page', 'view' => 'inscricoes'))?></li>
							<li><?=CHtml::link('GRADE',				array('presentation/grid'))?></li>
							<li><?=CHtml::link('PATROCINADORES',	array('sponsor/list'))?></li>
							<li><?=CHtml::link('ORGANIZAÇÃO',		array('teamMembers/list'))?></li>
						</ul>
					</div>
				</div>
				<!-- topo -->

				<!-- cadastre-se -->
				<div class="info">
					<pre>
<span class="op">&lt;?php</span>
    <span class="imp">$evento</span> <span>=</span> <span>array</span><span>(</span>
        <span class="imp">'data'</span>  <span>=></span> <span class="imp" style="font-size:19px; font-weight:bold;">'05/11/2011'</span><span>,</span>
        <span class="imp">'local'</span> <span>=></span> <span class="imp" style="font-size:19px; font-weight:bold;">'CEFET-RJ campus Maracanã'</span>
    <span>);</span>
<span class="op">?&gt;</span>
					</pre>
					<a href="<?=$this->createUrl('site/page', array('view' => 'inscricoes'))?>" style="float:right;">
						<img src="img/bt-inscreva-se.png" alt="Cadastre-se" width="165" height="47" border="0" />
					</a>
				</div>
				<!-- cadastre-se -->

				<!-- carrosel -->
				<div id="palestrantes">
					<a href="#" class="prev">&lt;</a>
					<div id="scroller">
						<ul>
							<? foreach($speakers as $speaker): ?>
								<? $speaker_url = $this->createUrl('speaker/list', array('#' => $speaker->id)); ?>
								<li>
									<div class="palestrante">
										<a href="<?=$speaker_url?>"><img src="<?=$speaker->getImageUrl('imageFile',true)?>" alt="<?=$speaker->name?>" style="float:left; padding-right:10px;" /></a>
										<h3><a href="<?=$speaker_url?>"><?=$speaker->name?></a></h3>
										<? foreach($speaker->presentations as $presentation): ?>
											<a href="<?=$this->createUrl('presentation/list', array('#' => $presentation->id))?>"><p><?=$presentation->title?></p></a>
										<? endforeach ?>
									</div>
								</li>
							<? endforeach ?>
						</ul>
					</div>
					<a href="#" class="next">&gt;</a>
				</div>
				<!-- carrosel -->

				<!-- notícias -->
				<div class="noticias">
					<div class="titulo"><h2>Notícias</h2></div>

					<? foreach ($all_news as $news): ?>
						<? $url = $this->createUrl('news/view', array('id' => $news->id)) ?>
						<div class="box-noticias">
							<a href="<?=$url?>"><img src="<?=$news->getImageUrl('imageFile', true)?>" alt="<?=$news->title?>" width="70" height="70" border="0" style="float:left;" />							</a>

							<div class="chamada-noticia">
								<a href="<?=$url?>"><p style="font-size:16px; color:#60a7aa;"><?=$news->title?></p></a>
								<a href="<?=$url?>"><p style="font-size:14px; color:#333333;"><?=$news->short_desc?></p></a>
							</div>
						</div>
					<? endforeach ?>

					<? if ($news_total > 6): ?>
						<p align="right" style="padding-right:20px; font-size:11px; float:right;"><a href="<?=$this->createUrl('news/list')?>" style="color:#60a7aa;">+ notícias</a></p>
					<? endif ?>

				</div>
				<!-- notícias -->

				<!-- coluna direita -->
				<div class="coluna-direita">
					<?=$this->renderPartial('_redes_sociais')?>
				</div>
				<!-- coluna direita -->

			</div>
			<!-- footer 1-->
			<div class="rodape-top">
				<div class="logos-patrocinio">
					<?php
						for ($s = 1; $s <= 6; $s++):
							if (isset($sponsors[$s])) {
								$img = $sponsors[$s]->getImageUrl('imageFile', true);
								$name = $sponsors[$s]['name'];
								$hash = $sponsors[$s]['name'];
							}
							else {
								$img = '/img/patrocine-aqui.jpg';
								$name = "Patrocine o PHP'n Rio";
								$hash = 'patrocine';
							}
						?>
						<div class="box-logos-patrocinio">
							<a href="<?=$this->createUrl('sponsor/list', array('#' => $hash))?>">
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
							<li>phprio@phprio.org.br</li>
					</div>

					<div class="rodape-creditos"><img src="img/logo-php-in-rio-2011-rodape.gif" alt="Php'n Rio 2011" width="92" height="42" /><br />
						<p style="padding-top:7px;">Design by<br />
							<a href="http://www.rafaelcaride.com.br">Rafael Caride</a></p>
					</div>

				</div>
			</div>
			<!-- footer 2-->

			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<!--			<script type="text/javascript" src="/js/jcarousellite_1.0.1.min.js"></script>-->
			<script type="text/javascript" src="/js/prettify.js"></script>
			<script type="text/javascript">
			$(function() {
				$("#scroller").jCarouselLite({
					btnPrev : '.prev',
					btnNext : '.next',
					auto    : null,
					speed   : 3000,
					visible : 4
				});

			});
			</script>
		</center>
	</body>
</html>