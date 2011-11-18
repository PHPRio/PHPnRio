<p>Olá!</p>

<p>E então, o que você achou do PHP'n Rio 2011? Gostou do evento? E o que poderia melhorar?<br />
Ajude-nos a organizar um PHP'n Rio 2012 melhor ainda respondendo à nossa pesquisa: <a href="http://bit.ly/form-phpnrio11">bit.ly/form-phpnrio11</a>.</p>

<p>
	<? if (sizeof($list) > 1): ?>
		Abaixo segue a lista de Certificados de Participação para esta conta:
	<? else: ?>
		E aqui está seu Certificado de Participação:
	<? endif ?>
</p>

<ul>
	<? foreach($list as $name => $code):?>
		<li><a href="<?=$this->createAbsoluteUrl('/site/getCertificate', array('code' => $code))?>"><?=$name?></a></li>
	<? endforeach; ?>
</ul>

<p>Muito obrigado pela participação no evento!
E fique ligado para saber mais notícias sobre o evento desse ano, e as novidades para o evento do ano que vem:</p>
<ul>
	<li>O site: <a href="http://www.phpnrio.com.br">www.phpnrio.com.br</a></li>
	<li>As fotos do que rolou: <a href="Http://on.fb.me/fotos-phpnrio11">Álbum de fotos</a></li>
	<li>O Twitter do PHPRio: <a href="http://www.twitter.com/phprio">@phprio</a></li>
	<li>O PHPRio no Facebook: <a href="http://on.fb.me/PHPRio">on.fb.me/PHPRio</a></li>
</ul>

<p>Saudações,<br /><br />
	Equipe PHP'n Rio
</p>