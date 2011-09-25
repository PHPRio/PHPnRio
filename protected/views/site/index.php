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
					<div class="redes-sociais" style="color:#FFFFFF;">
						<span style="padding-top:2px; *padding-top:1px; float:right;">
							<fb:like href="http://www.facebook.com/pages/PHPRio/160383237381004" send="false" layout="button_count" width="80" show_faces="false" font=""></fb:like>
						</span>
						<span style="padding-top:2px; padding-right:15px; float:right;">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="phprio" data-text="PHP'n Rio 2011 dia 5 de Novembro - O evento de desenvolvimento web carioca @phprio" data-lang="en">Tweet</a>
						</span>
						<span style="padding-top:2px; float:right;">
							<g:plusone size="medium" href="http://phprio.org/phpnrio11"></g:plusone>
						</span>
					</div>
					<div id="menu">
						<ul>
							<li><a href="#.php">O EVENTO</a></li><?php /* Submenu Grade, Palestrantes, Local, Informações */ ?>
							<li><a href="#.php">INSCRIÇÕES</a></li>
							<li><a href="#.php">GRADE</a></li>
							<li><a href="#.php">PATROCINADORES</a></li>
							<li><a href="#.php">ORGANIZAÇÃO</a></li>
						</ul>
					</div>
				</div>
				<!-- topo -->

				<!-- cadastre-se -->
				<div class="info">
					<pre>
	<span style="font-size:14px;">&lt;?php</span>
	<span>$evento</span> <span>=</span>
	<span>array</span><span>(</span><span>'data'</span> <span>=></span><span style="font-size:19px; font-weight:bold;">'05/11/2011'</span><span>,</span>
		  <span>&nbsp;&nbsp;'local'</span><span>=></span><span style="font-size:19px; font-weight:bold;">'CEFET-RJ campus Maracanã'</<span><span>);</span>
		  <span style="font-size:14px;">?></span>
					</pre>
					<a href="#" style="float:right;"><img src="img/bt-inscreva-se.png" alt="Cadastre-se" width="165" height="47" border="0" /></a>
				</div>
				<!-- cadastre-se -->

				<!-- carrosel -->
				<div id="palestrantes">
					<a href="#" class="prev">&lt;</a>
					<div id="scroller">
						<ul>
							<? foreach($speakers as $speaker): ?>
								<li>
									<div class="palestrante">
										<img src="<?=$speaker->getImageUrl('imageFile',true)?>" alt="<?=$speaker->name?>" style="float:left; padding-right:10px;" />
										<h3><?=$speaker->name?></h3>
										<? foreach($speaker->presentations as $presentation): ?>
										<p><?=$presentation->title?></p>
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
						<div class="box-noticias"><a href="#"><img src="<?=$news->getImageUrl('imageFile', true)?>" alt="<?=$news->title?>" width="70" height="70" border="0" style="float:left;" /></a>
							<div class="chamada-noticia">
								<a href="#"><p style="font-size:16px; color:#60a7aa;"><?=$news->title?></p></a>
								<a href="#"><p style="font-size:14px; color:#333333;"><?=$news->short_desc?></p></a>
							</div>
						</div>
					<? endforeach ?>

					<? if ($news_total > 6): ?>
						<p align="right" style="padding-right:20px; font-size:11px; float:right;"><a href="#" style="color:#60a7aa;">+ notícias</a></p>
					<? endif ?>

				</div>
				<!-- notícias -->

				<!-- coluna direita -->
				<div class="coluna-direita">
					<div class="titulo"><h2>Redes Sociais</h2></div>
					<div class="col" style="float:right; padding-top:10px;">
						<script src="http://widgets.twimg.com/j/2/widget.js"></script>
						<script>
							new TWTR.Widget({
								version: 2,
								type: 'search',
								search: 'phprio OR phpnrio OR PHP\'nRio',
								interval: 30000,
								title: 'PHP\'n Rio 2011',
								subject: 'O evento Carioca de PHP',
								width: 250,
								height: 110,
								theme: {
									shell: {
										background: '#8ec1da',
										color: '#ffffff'
									},
									tweets: {
										background: '#ffffff',
										color: '#444444',
										links: '#1985b5'
									}
								},
								features: {
									scrollbar: false,
									loop: true,
									live: true,
									hashtags: true,
									timestamp: true,
									avatars: true,
									toptweets: true,
									behavior: 'default'
								}
							}).render().start();
						</script>
					</div>


					<div class="col" style="float:right; padding-top:10px;">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) {return;}
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-like-box" data-href="http://www.facebook.com/pages/PHPRio/160383237381004" colorscheme="fff" data-width="250" data-height="180" data-show-faces="true" data-stream="false" data-header="false" style="float:right;"></div>
					</div>

				</div>
				<!-- coluna direita -->

			</div>
			<!-- footer 1-->
			<div class="rodape-top">
				<div class="logos-patrocinio">
					<? foreach ($sponsors as $sponsor): ?>
						<div class="box-logos-patrocinio"><a href="#"><img src="<?=$sponsor->getImageUrl('imageFile',true)?>" alt="<?=$sponsor->name?>" width="115" height="79" border="0" /></a></div>
					<? endforeach ?>
				</div>
			</div>
			<!-- footer 1-->

			<!-- footer 2-->
			<div class="rodape-bottom">
				<div class="conteudo-rodape">

					<div class="menu-rodape">
						<p style="margin-bottom:5px;">O EVENTO</p>
						<ul><li><a href="#">Palestrantes</a></li>
							<li><a href="#">Palestras</a></li>
							<li><a href="#">Eventos anteriores</a></li>
							<li><a href="#">Informações</a></li>
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

			<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
			<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
			<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
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