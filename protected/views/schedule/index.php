<style>
table.programacao {text-align: center; border: 1px solid #000; font-size: .7em;}
table.programacao a {
	color: #195383;
	text-decoration: underline;
}
table.programacao th  {
	background-color: #003A66;
	color: #fff;
	font-size: 1.2em;
	width: 65px;
	white-space: nowrap;
}

table.programacao tr  {
	background-color: #DDD;
	color: #444;
	font-weight: bold;
	height: 50px;
}

table.programacao td {
	padding: 3px;
}

table.programacao td.oficina {
	background-color: #EEE;
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
			<form action="<?=$this->createUrl('schedule/setPresentationsAndAttendees')?>" method="post">
				<table class="programacao">
					<thead>
						<tr>
							<th>Horário</th>
							<th>Trilha Vermelha</th>
							<th>Trilha Azul</th>
							<th>Oficina Jedi 1</th>
							<th>Oficina Jedi 2</th>
							<th>Desconf</th>
						</tr>
					</thead>

					<? if (isset($_SESSION['transaction']) && is_string($_SESSION['transaction'])): ?>
						<tfoot>
							<tr>
								<td colspan="6">
									Os dados preenchidos acima são para fins puramente estatísticos, para nos auxiliar a distribuir as palestras de acordo com as salas disponíveis
									na CEFET. Ninguém será impedido de circular pelo evento, nem haverá nenhum tipo de lista para conferência dos presentes em nenhuma palestra.
								</td>
							</tr>
						</tfoot>
					<? endif ?>

					<tbody>
						<tr>
							<td>09:00/09:20</td>
							<td colspan="5" class="intervalo">Credenciamento e Breakfast</td>
						</tr>
						<tr>
							<td>09:20/09:30</td>
							<td colspan="5" class="intervalo">ABERTURA – Auditório Principal</td>
						</tr>
						<tr>
							<td>09:30/10:30</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p1-1', 'slug' => 'padroes-de-projeto-em-php-importancia-e-implementacao'))?>
							   <a href="<?=$this->createUrl('presentation/list', array('#' => 'padroes-de-projeto-em-php-importancia-e-implementacao'))?>">Padrões de projeto em PHP: importância e implementação</a>
							</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p1-2', 'slug' => 'integrando-php-com-arduino'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'integrando-php-com-arduino'))?>">Robótica e PHP: Unindo os dois mundos</a>
							</td>
							<td rowspan="3" class="oficina">
								<?=$this->renderPartial('_checkbox', array('code' => 'o1-1', 'slug' => 'iniciando-no-drupal-7'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'iniciando-no-drupal-7'))?>">Iniciando no Drupal&nbsp;7</a>
							</td>
							<td rowspan="3" class="oficina">
								<?=$this->renderPartial('_checkbox', array('code' => 'o1-2', 'slug' => 'how-stuff-works'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'how-stuff-works'))?>">How Stuff Works</a>
							</td>
							<td rowspan="3" class="desconf"><a href="<?=$this->createUrl('news/view', array('data' => 'desconferencia'))?>">Desconf</a></td>
						</tr>
						<tr>
							<td>10:30/11:30</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p2-1', 'slug' => 'magento-experiencias-de-mercado'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'magento-experiencias-de-mercado'))?>">Magento: Experiências de mercado</a>
							</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p2-2', 'disabled' => true, 'slug' => null))?>
								<a href="<?=$this->createUrl('presentation/list')?>">Não confirmado</a>
							</td>
						</tr>
						<tr>
							<td>11:30/12:30</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p3-1', 'slug' => 'scrum-antes-durante-e-depois'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'scrum-antes-durante-e-depois'))?>">Scrum: Antes, durante e depois</a>
							</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p3-2', 'slug' => 'mongodb-com-php'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'mongodb-com-php'))?>">MongoDb com PHP</a>
							</td>
						</tr>
						<tr>
							<td>12:30/13:30</td>
							<td colspan="5" class="intervalo">ALMOÇO</td>
						</tr>
						<tr>
							<td>13:30/14:30</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p4-1', 'slug' => 'aplicativos-mobile-com-jquery-mobile'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'aplicativos-mobile-com-jquery-mobile'))?>">Aplicativos Mobile com jQuery Mobile</a>
							</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p4-2', 'slug' => 'certificacao-zend-php-e-valorizacao-no-mercado'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'certificacao-zend-php-e-valorizacao-no-mercado'))?>">Certificação Zend PHP e valorização no mercado</a>
							</td>
							<td rowspan="2" class="oficina">
								<?=$this->renderPartial('_checkbox', array('code' => 'o2-1', 'slug' => 'criando-uma-loja-virtual-em-tres-horas-com-cakephp'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'criando-uma-loja-virtual-em-tres-horas-com-cakephp'))?>">Criando uma Loja Virtual em três horas com CakePHP</a>
							</td>
							<td rowspan="2" class="oficina">
								<?=$this->renderPartial('_checkbox', array('code' => 'o2-2', 'slug' => 'doctrine-2'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'doctrine-2'))?>">Doctrine 2</a>
							</td>
							<td rowspan="2" class="desconf"><a href="<?=$this->createUrl('news/view', array('data' => 'desconferencia'))?>">Desconf</a>
							</td>
						</tr>
						<tr>
							<td>14:30/15:30</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p5-1', 'slug' => 'como-usar-html5-sem-uma-maquina-do-tempo'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'como-usar-html5-sem-uma-maquina-do-tempo'))?>">Como usar HTML5 sem uma máquina do tempo</a>
							</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p5-2', 'slug' => 'introducao-a-criacao-de-extensoes-php'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'introducao-a-criacao-de-extensoes-php'))?>">Introdução à criação de extensões PHP</a>
							</td>
						</tr>
										<tr>
							<td>15:30/16:00</td>
							<td colspan="5" class="intervalo">Coffe-break</td>
						</tr>
						<tr>
							<td>16:00/17:00</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p6-1', 'slug' => 'seo-x-velocidade-de-carregamento'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'seo-x-velocidade-de-carregamento'))?>">SEO x Velocidade de carregamento</a>
							</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p6-2', 'slug' => 'php-maroto'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'php-maroto'))?>">PHP Maroto</a>
							</td>
							<td class="oficina">
								<?=$this->renderPartial('_checkbox', array('code' => 'o3-1', 'slug' => 'criando-uma-loja-virtual-em-tres-horas-com-cakephp'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'criando-uma-loja-virtual-em-tres-horas-com-cakephp'))?>">Criando uma Loja Virtual em três horas com CakePHP</a>
							</td>
							<td class="oficina">
								<?=$this->renderPartial('_checkbox', array('code' => 'o3-2', 'slug' => 'doctrine-2'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'doctrine-2'))?>">Doctrine 2</a>
							</td>
							<td rowspan="2" class="desconf"><a href="<?=$this->createUrl('news/view', array('data' => 'desconferencia'))?>">Desconf</a>
							</td>
						</tr>

						<tr>
							<td>17:00/18:00</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p7-1', 'slug' => 'introducao-zf2-patterns'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'introducao-zf2-patterns'))?>">Introdução ZF2 Patterns</a>
							</td>
							<td>
								<?=$this->renderPartial('_checkbox', array('code' => 'p7-2', 'slug' => 'php-for-android'))?>
								<a href="<?=$this->createUrl('presentation/list', array('#' => 'php-for-android'))?>">PHP for Android</a>
							</td>
							<td>-</td>
							<td>-</td>
						</tr>
						<tr>
							<td>18:00/18:30</td>
							<td colspan="5" class="intervalo">Encerramento - Auditório Principal</td>
						</tr>
					</tbody>
				</table>
				 <? if ($this->transaction): ?>
					<? if ($this->transaction->total_attendees == 1) { ?>
						<p>É necessário também preencher o número de algum documento (a ser levado no dia do evento) e seu nome, para inclusão na lista de Credenciamento.</p>
					<? } else { ?>
						<p>
							É necessário também preencher o número de algum documento (a ser levado no dia do evento) e nome de cada inscrito com o seu
							pagamento, para inclusão de todos na lista de Credenciamento. Você pode voltar mais tarde e preencher o formulário se não
							tiver os dados de alguém, mas lembre-se: sem preencher esse formulário até a véspera, a pessoa será impossibilitada de permanecer no evento.
						</p>
					<? } ?>

					<table id="inscricoes">
						<tr>
							<th>Documento</th>
							<th>Nome</th>
						</tr>
						<? for ($i = 0; $i < $this->transaction->total_attendees; $i++): ?>
						<tr>
							<td><input type="text" name="attendee[<?=$i?>][rg]" maxlength="20" size="13" value="<?if (isset($this->transaction->attendees[$i])) echo $this->transaction->attendees[$i]->rg?>" /></td>
							<td><input type="text" name="attendee[<?=$i?>][name]" maxlength="50" size="30" value="<?if (isset($this->transaction->attendees[$i])) echo $this->transaction->attendees[$i]->name?>" /></td>
						</tr>
						<? endfor ?>
					</table>

					<input type="submit" value="Salvar dados" />
				<? endif ?>
			</form>

		</div>
		<!-- box programação -->

	</div>
	<!-- conteúdo -->

	<!-- coluna direita -->
	<div class="coluna-direita">
		<?= $this->renderPartial('/layouts/_box_inscricoes') ?>
		<?= $this->renderPartial('/layouts/_box_preencher_grade') ?>
		<?= $this->renderPartial('/layouts/_redes_sociais') ?>
	</div>
	<!-- coluna direita -->

</div>
<!-- meio -->
<? if (isset($_SESSION['transaction']) && is_string($_SESSION['transaction'])) Yii::app()->getClientScript()->registerScript('radiobuttons',
'$("input[type=radio]").change(function() {
	$radio = $(this),
	id = $radio.attr("id")
	switch (id[0]) {
		case "p":
			switch(id[1]) {
				case "1":
				case "2":
				case "3":
					$("input[type=radio][name=o1]").each(function() { this.checked = false })
				break;
				case "4":
				case "5":
				case "6":
					$("input[type=radio][name=o2],input[type=radio][name=o3]").each(function() { this.checked = false })
				break;
			}
		break;
		case "o":
			switch(id[1]) {
				case "1":
					$("input[type=radio][name=p1],input[type=radio][name=p2],input[type=radio][name=p3]").each(function() { this.checked = false })
				break;
				case "2":
				case "3":
					$("input[type=radio][name=p4],input[type=radio][name=p5],input[type=radio][name=p6]").each(function() { this.checked = false })
					$("#o2-"+id[3]+",#o3-"+id[3]).each(function() { this.checked = true })
				break;
			}
		break;
	}
})',
CClientScript::POS_END); ?>