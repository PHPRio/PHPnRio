<center>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta name="description" content="Principal evento de PHP no Rio de Janeiro" />
			<meta name="keywords" content="PHP, desenvolvimento, programação web, web developer, evento php rio"/>
			<meta name="language" content="pt-br" />
			<meta name="robots" content="index,follow" />
			<meta name="author" content="Rafael Caride, Igor Santos" />
			<link href="/static/2012/css/estilo.css" rel="stylesheet" type="text/css"/>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>PHP'n Rio 2012</title>
			<style type="text/css">
				body {
					background: url(/static/2012/img/top.jpg) #FFF repeat-x center top;
				}
			</style>
		</head>

		<body>
			<!-- inicio conteúdo -->
			<div class="mae">
				<div class="Logo"><img src="/static/2012/img/PHP-n-Rio-2012.png" alt="PHP 'n Rio 2012" width="472" height="440" /></div>
				<?=$this->renderPartial('/layouts/_barrinha_social')?>
				<div class="texto">
					<h1>Pré-inscrições abertas!</h1>
					<p>
						Atenção, atenção!<br />
						Já está aberta a pré-inscrição
						para o <span style="color:#0F4DA8">PHP’nRio 2012</span>!<br />
						Preencha o campo abaixo com seu email e nós vamos
						te avisar assim que o primeiro lote dos ingressos
						estiver disponível.<br />
						Você não vai de fora dessa edição... vai??
					</p>
					<div class="form">
						<? $form=$this->beginWidget('CActiveForm', array('id'=>'page-form', 'enableAjaxValidation'=>true)) ?>
							<div style="width:270px; height:54px; padding-top:5px;  padding-left:60px; float:left;">
								<?=$form->textField($pre,'email',array('size'=>60, 'maxlength'=>255, 'onfocus' => "if (this.value=='Seu email aqui!') this.value = ''", "onblur" => "if (this.value=='') this.value = 'Seu email aqui!'"))?>
								<? if (!empty($msg)) { ?><p class="message <?=(sizeof($pre->errors) == 0)? 'success' : 'error'?>"><?=$msg?></p><? } ?>
<!--								<input type="text" name="email" value="Seu email aqui!" size="30" onfocus="if (this.value=='Seu email aqui!') this.value = ''" onblur="if (this.value=='') this.value = 'Seu email aqui!'"/>-->
							</div>
							<div style=" width:54px; height:54px; float:left;">
								<input type="submit" name="submit" value="" style="background-image:url('/static/2012/img/ok.jpg'); width:54px; height:54px; border:none;" />
							</div>
						<? $this->endWidget() ?>
					</div>

					<h1>09h, 10/11/12<br /> CEFET-RJ Campus Maracanã</h1>

					<div class="links">
						<p><a href="http://www.phpnrio.com.br/2011/" target="_blank">Veja como foram os outros anos de PHP'nRio</a></p>
					</div>

				</div>

			</div>
			<!-- fim conteúdo -->
			<!-- inicio footer -->
			<div class="rodape">
				<div class="footer">
					<div style="float:left; padding-top:9px;">&nbsp;© PHP ‘n Rio 2009 / 2012 - contato@phpnrio.com.br</div>
					<div style="float:right;">
						<a href="http://www.facebook.com/pages/PHPn-Rio/274374152668199" target="_blank">
							<img src="/static/2012/img/facebook.png" alt="Facebook" width="34" height="34" border="0" style="padding-right:10px;" />
						</a>
						<a href="https://twitter.com/phpnrio" target="_blank">
							<img src="/static/2012/img/twitter.png" alt="Twitter" width="34" height="34" border="0" />
						</a>
					</div>
				</div>
			</div>
			<!-- fim footer -->

			<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
			<script type="text/javascript" src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
			<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			<?=$this->renderPartial('/layouts/_tracking')?>
		</body>
	</html>
</center>
