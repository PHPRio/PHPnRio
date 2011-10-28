<? $plural = $transaction->total_attendees > 1; ?>
<html>
	<head>
		<title>PHP'n Rio - Finalizar Inscrição</title>
	</head>
	<body>
		<img src="http://www.phpnrio.com.br/img/mailling_cabecalho.png" />
		<table width="600"><tr><td width="600">
			<p>Olá!</p>

			<p>Recebemos um pagamento referente a <?=$plural? 'inscrições' : 'uma inscrição'?> para o PHP'n Rio, no nome de "<?=$transaction->name?>".<br />
			Agora, para finalizar o processo, precisamos que você vá ao site do PHP'n Rio para nos informar o <?=$plural? 'nome e um documento das pessoas inscritas' : 'seu nome e um documento'?>, para o credenciamento no dia do evento.
			Também pedimos que você preencha, informalmente, quais são as palestras que você pretende assistir. Esses dados são necessários para que possamos separar as palestras nas salas disponíveis de acordo com o público esperado. Vale lembrar que a circulação pelas áreas do evento é totalmente livre, e essa informação é puramente estatística.</p>

			<p>Para isso, acesse <a href="http://www.phpnrio.com.br/grade" target="_blank">http://www.phpnrio.com.br/grade</a> e informe, no box da direita, o código da transação do PagSeguro.<br />
			O seu código é <b><?=$transaction->code?></b></p>

			<p>Não se esqueça de preencher os dados de inscrição, pois eles serão necessários para o credenciamento dos participantes. Também será necessário que todos os inscritos levem a identidade.</p>

			<p>Em tempo: já viu nossa <a href="http://www.facebook.com/pages/PHPRio/160383237381004" target="_blank">página no Facebook</a>? Não esqueça também de marcar que <a href="http://www.facebook.com/event.php?eid=160928950657248" target="_blank">vai ao evento</a>!</p>


			<p><br />Agradecemos desde já, e um excelente evento pra você<?=$plural?'s':''?>!</p>

			<p>Equipe PHP'n Rio.</p>
		</td></tr></table>
		<img src="http://www.phpnrio.com.br/img/mailling_rodape.png" />
	</body>
</html>