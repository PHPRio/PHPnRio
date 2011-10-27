<? $plural = $transaction->total_attendees > 1; ?>
Olá!

Recebemos um pagamento referente a <?=$plural? 'inscrições' : 'uma inscrição'?> para o PHP'n Rio, no nome de "<?=$transaction->name?>".
Agora, para finalizar o processo, precisamos do <?=$plural? 'nome e RG das pessoas inscritas' : 'seu nome e RG'?>, para o credenciamento no dia do evento.
Também pedimos que você preencha, informalmente, quais são as palestras que você pretende assistir. Esses dados são necessários para que possamos separar as palestras nas salas disponíveis de acordo com o público esperado. Vale lembrar que a circulação pelas áreas do evento é totalmente livre, e essa informação é puramente estatística.

Para finalizar o processo, é necessário que você entre em http://www.phpnrio.com.br/grade e informe, no box da direita, o código da transação do PagSeguro.
O seu código é <?=$transaction->code?> .

Não se esqueça de preencher os dados de inscrição, pois eles serão necessários para o credenciamento dos participantes.


Agradecemos desde já, e um excelente evento pra você<?=$plural?'s':''?>!

Equipe PHP'n Rio.