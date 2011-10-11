<style>
table.programacao {text-align: center; border: 1px solid #000; font-size: .7em;}

table.programacao th  {
  background-color: #003A66;
  color: #fff; 
  width: 65px;
}

table.programacao tr  {
  background-color: #EBEBEB;
  color: #195383;
  font-weight: bold;
  height: 50px;
}

table.programacao td.oficina  {
  background-color: #D9F2FF;
}
table.programacao td.intervalo {
  background-color: #CAEBE3;
}
</style>
<!-- meio -->
<div class="meio">
	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Programação</h2>
		</div>

		<!-- box programação -->
		<div class="programacao">
			<table>
				<tr>
					<td>Horário</td>
					<td>Trilha Vermelha</td>
					<td>Trilha Azul</td>
					<td>Oficina Jedi 1</td>
					<td>Oficina Jedi 2</td>
					<td>Desconf</td>
				</tr>
				<tr>
					<td>09:00/09:20</td>
					<td colspan="5">Credenciamento e Breakfast</td>
				</tr>
				<tr>
					<td>09:20/09:30</td>
					<td colspan="5">ABERTURA – Auditório Principal</td>
				</tr>
				<tr>
					<td>09:30/10:30</td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'padroes-de-projeto-em-php-importancia-e-implementacao'))?>">Padrões de projeto em PHP: importância e implementação</a></td>
					<td><a href="<?=$this->createUrl('presentation/list')?>">Não confirmado</a></td>
					<td rowspan="3"class="oficina"><a href="<?=$this->createUrl('presentation/list', array('#' => 'iniciando-no-drupal-7'))?>">Iniciando no Drupal&nbsp;7</a></td>
					<td rowspan="3"class="oficina"><a href="<?=$this->createUrl('presentation/list', array('#' => 'how-stuff-works'))?>">How Stuff Works</a></td>
					<td rowspan="3" class="desconf">Desconf</td>
				</tr>
				<tr>
					<td>10:30/11:30</td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'magento-experiencias-de-mercado'))?>">Magento: Experiências de mercado</a></td>
					<td><a href="<?=$this->createUrl('presentation/list')?>">Não confirmado</a></td>
				</tr>
				<tr>
					<td>11:30/12:30</td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'scrum-antes-durante-e-depois'))?>">Scrum: Antes, durante e depois</a></td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'mongodb-com-php'))?>">MongoDb com PHP</a></td>
				</tr>
				<tr>
					<td>12:30/13:30</td>
					<td colspan="5" class="intervalo">ALMOÇO</td>
				</tr>
				<tr>
					<td>13:30/14:30</td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'aplicativos-mobile-com-jquery-mobile'))?>">Aplicativos Mobile com jQuery Mobile</a></td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'certificacao-zend-php-e-valorizacao-no-mercado'))?>">Certificação Zend PHP e valorização no mercado</a></td>
					<td rowspan="3" class="oficina"><a href="<?=$this->createUrl('presentation/list', array('#' => 'criando-uma-loja-virtual-em-tres-horas-com-cakephp'))?>">Criando uma Loja Virtual em três horas com CakePHP</a></td>
					<td rowspan="3" class="oficina"><a href="<?=$this->createUrl('presentation/list', array('#' => 'doctrine-2'))?>">Doctrine 2</a></td>
					<td rowspan="5" class="desconf">Desconf</td>
				</tr>
				<tr>
					<td>14:30/15:30</td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'como-usar-html5-sem-uma-maquina-do-tempo'))?>">Como usar HTML5 sem uma máquina do tempo</a></td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'introducao-a-criacao-de-extensoes-php'))?>">Introdução à criação de extensões PHP</a></td>
				</tr>
                                <tr>
					<td>15:30/16:00</td>
					<td colspan="2" class="intervalo" >Coffe-break</td>
				</tr>
				<tr>
					<td>16:00/17:00</td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'seo-x-velocidade-de-carregamento'))?>">SEO x Velocidade de carregamento</a></td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'php-maroto'))?>">PHP Maroto</a></td>
				</tr>

				<tr>
					<td>17:00/18:00</td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'introducao-zf2-patterns'))?>">Introdução ZF2 Patterns</a></td>
					<td><a href="<?=$this->createUrl('presentation/list', array('#' => 'php-for-android'))?>">PHP for Android</a></td>
					<td>-</td>
				</tr>
				<tr>
					<td>18:00/18:30</td>
					<td colspan="5" class="intervalo">Encerramento - Auditório Principal</td>
				</tr>
			</table>

		</div>
		<!-- box programação -->

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