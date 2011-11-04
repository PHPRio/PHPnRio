<!-- meio -->
<div class="meio">

	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>O Evento</h2>
		</div>
		<p style="margin-top:15px;">O PHP é reconhecido como a linguagem de programação mais utilizadas na
			web, utilizado por mais de 5 milhões de desenvolvedores e responsável por 40% das
			aplicações web existentes. É a quarta linguagem de programação mais popular em geral,
			tornando-a uma área de enorme potencial.</p>
		<br />

		<p>O coração e a alma de um evento é a comunidade que ele serve. PHP’n Rio é
			mantida por voluntários apaixonados, trazendo um evento anual que beneficia tanto os
			desenvolvedores quanto suas empresas.</p>
		<br />

		<p>Por isso, o Grupo Local de Usuários de PHP do Rio de Janeiro (PHP Rio)
			vem organizando, anualmente, desde 2009, o evento chamado de PHP'n Rio. Trata-
			se de um evento técnico e com um retorno da comunidade magnífico, de forma que
			contamos sempre com auditório cheio de profissionais e estudantes, que desempenham
			uma participação excepcional. O PHP'n Rio está sendo apoiado juridicamente pela
			Associação Libre de Tecnologias Abertas (ALTA).</p>
		<br />
		<h1><img src="imagens/seta.jpg" alt="grade" width="8" height="15" style="padding-right:5px;" />Grade</h1>
		<p>Veja a <?=CHtml::link('grade',			array('site/page', 'view' => 'grade'))?> de palestras e oficinas.</p>
		<br />
		<h1><img src="imagens/seta.jpg" alt="como chegar" width="8" height="15" style="padding-right:5px;" />Quando?</h1>
		<p>Dia 05 de novembro de 2011(Sábado) de 09:00 às 18:30.</p>
		<br />
		<h1><img src="imagens/seta.jpg" alt="como chegar" width="8" height="15" style="padding-right:5px;" />Onde?</h1>
		<p>CEFET/RJ Maracanã</p>
		<p>
			Rua Gal. Canabarro, 485 - Maracanã, Rio de Janeiro - RJ -
			<a target="_blank" href="http://maps.google.com.br/maps?q=Rua+Gal+Canabarro,+485+-+Maracan%C3%A3,+Rio+de+Janeiro+-+RJ&hl=pt-BR&ie=UTF8&hnear=R.+Gen.+Canabarro,+485+-+Maracan%C3%A3,+Rio+de+Janeiro,+20271-204&t=m&vpsrc=0&hq=&source=embed&z=13&iwloc=A&f=d&daddr=R.+Gen.+Canabarro,+485+-+Maracan%C3%A3,+Rio+de+Janeiro+-+RJ,+20271-204&geocode=%3BCe7m09FZWWNoFe1eov4dYm9s_Sm9DdnNWX6ZADGeCp5it_OPIg">Como chegar?</a>
		</p>
		<br />

		<iframe width="700" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.br/maps?q=Rua+Gal+Canabarro,+485+-+Maracan%C3%A3,+Rio+de+Janeiro+-+RJ&amp;hl=pt-BR&amp;ie=UTF8&amp;hnear=R.+Gen.+Canabarro,+485+-+Maracan%C3%A3,+Rio+de+Janeiro,+20271-204&amp;t=m&amp;vpsrc=0&amp;hq=&amp;source=embed&amp;z=13&amp;ll=-22.913535,-43.225236&amp;output=embed"></iframe><br />
		<small>
			<a target="_blank" href="http://maps.google.com.br/maps?q=Rua+Gal+Canabarro,+485+-+Maracan%C3%A3,+Rio+de+Janeiro+-+RJ&amp;hl=pt-BR&amp;ie=UTF8&amp;hnear=R.+Gen.+Canabarro,+485+-+Maracan%C3%A3,+Rio+de+Janeiro,+20271-204&amp;t=m&amp;vpsrc=0&amp;hq=&amp;source=embed&amp;z=14&amp;ll=-22.913535,-43.225236">Exibir mapa ampliado</a>
		</small>

		<br />
		<br />
		<? /* <h1><img src="imagens/seta.jpg" alt="como chegar" width="8" height="15" style="padding-right:5px;" />Como Chegar?</h1>
		<p>Ônibus:</p>
		<br />
		<p>Metrô:</p>
		<br />
		<p>Trem:</p>
		<br />
		<p>Carro:</p>
		<br /> */ ?>
		<h2>Valor: R$ 30,00</h2>
		<? if (!FINISHED): ?>
			<a href="<?=$this->createUrl('site/page', array('view' => 'inscricoes'))?>">
				<img src="img/bt-inscreva-se.png" alt="inscreva-se" width="165" height="47" border="0" style="float:left; padding-left:277px;" />
			</a>
		<? endif ?>
		<br />
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
