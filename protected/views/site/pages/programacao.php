<!-- meio -->
<div class="meio">
	<!-- conteúdo -->
	<div class="conteudo">
		<div class="titulo">
			<h2>Programação</h2>
		</div>

		<!-- box programação -->
		<div class="programacao">
			<table width="706" border="0" align="center" cellpadding="1" cellspacing="1" style="border:#999999 solid 1px; padding:5px; text-align:center;">
				<tr style="background-color:#0070C1; border:#999999 solid 1px; color:#FFFFFF;">
					<td width="94" height="61">Horário</td>
					<td width="150">Auditório</td>
					<td width="150">Sala Vip</td>
					<td width="150">Treinamento Jedi 1</td>
					<td width="150">Treinamento Jedi 2</td>
				</tr>
				<tr style="margin:5px;">
					<td height="40" bgcolor="#EBEBEB">09:00/09:20</td>
					<td colspan="4" bgcolor="#FFFF99">Credenciamento e Breakfast – Área aberta</td>
				</tr>
				<tr>
				<tr style="margin:5px;">
					<td height="40" bgcolor="#EBEBEB">09:20/09:30</td>
					<td colspan="4" bgcolor="#FFFF99">ABERTURA – Auditório Principal</td>
				</tr>
				<tr>
					<td height="40" bgcolor="#EBEBEB">09:30/10:30</td>
					<td bgcolor="#EBEBEB"><a href="/palestras#padroes-de-projeto-em-php-importancia-e-implementacao">Padrões de projeto em PHP: importância e implementação</a></td>
					<td bgcolor="#EBEBEB"><a href="/palestras">Não confirmado</a></td>
					<td rowspan="3" bgcolor="#D9F2FF"><a href="/palestras#iniciando-no-drupal-7">Iniciando no Drupal 7</a></td>
					<td rowspan="3" bgcolor="#D9F2FF"><a href="/palestras#how-stuff-works">How Stuff Works</a></td>
				</tr>
				<tr>
					<td height="40" bgcolor="#EBEBEB">10:30/11:30</td>
					<td bgcolor="#EBEBEB"><a href="/palestras#magento-experiencias-de-mercado">Magento: Experiências de mercado</a></td>
					<td bgcolor="#EBEBEB"><a href="/palestras">Não confirmado</a></td>
				</tr>
				<tr>
					<td height="40" bgcolor="#EBEBEB">11:30/12:30</td>
					<td bgcolor="#EBEBEB"><a href="/palestras">Scrum: Antes, durante e depois</a></td>
					<td bgcolor="#EBEBEB"><a href="/palestras">MongoDb com PHP</a></td>
				</tr>
				<tr>
					<td height="40" bgcolor="#EBEBEB">12:30/13:30</td>
					<td colspan="4" bgcolor="#FFFF99">ALMOÇO</td>
				</tr>
				<tr>
					<td height="40" bgcolor="#EBEBEB">13:30/14:30</td>
					<td bgcolor="#EBEBEB"><a href="/palestras">Aplicativos Mobile com jQuery Mobile</a></td>
					<td bgcolor="#EBEBEB"><a href="/palestras">Certificação Zend PHP e valorização no mercado</a></td>
					<td rowspan="3" bgcolor="#D9F2FF"><a href="/palestras#criando-uma-loja-virtual-em-tres-horas-com-cakephp">Criando uma Loja Virtual em três horas com CakePHP</a></td>
					<td rowspan="3" bgcolor="#D9F2FF"><a href="/palestras#doctrine-2">Doctrine 2</a></td>
				</tr>
				<tr>
					<td height="40" bgcolor="#EBEBEB">14:30/15:30</td>
					<td bgcolor="#EBEBEB"><a href="/palestras">Como usar HTML5 sem uma máquina do tempo</a></td>
					<td bgcolor="#EBEBEB"><a href="/palestras">Introdução à criação de extensões PHP</a></td>
				</tr>
                                <tr>
					<td height="40" bgcolor="#EBEBEB">15:30/16:00</td>
					<td colspan="4" bgcolor="#FFFF99">Coffe-break</td>
				</tr>
				<tr>
					<td height="40" bgcolor="#EBEBEB">16:00/17:00</td>
					<td bgcolor="#EBEBEB"><a href="/palestras">SEO x Velocidade de carregamento</a></td>
					<td bgcolor="#EBEBEB"><a href="/palestras">PHP Maroto</a></td>
				</tr>

				<tr>
					<td height="40" bgcolor="#EBEBEB">17:00/18:00</td>
					<td bgcolor="#EBEBEB"><a href="/palestras">Introdução ZF2 Patterns</a></td>
					<td bgcolor="#EBEBEB"><a href="/palestras">PHP for Android</a></td>
				</tr>
				<tr>
					<td height="40" bgcolor="#EBEBEB">18:00/18:30</td>
					<td colspan="4" bgcolor="#FFFF99">Encerramento - Auditório Principal</td>
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