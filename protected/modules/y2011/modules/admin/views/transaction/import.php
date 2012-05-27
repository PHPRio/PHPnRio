<?php
$unconfirmed_page = $this->action->id == 'unconfirmedAttendees';

$this->breadcrumbs=array(
	'Transações'=>array('index'),
	'Listar',
);

$this->menu=array(
	array('label'=>'Gráfico', 'url'=>array('transaction/graph')),
	array('label'=>'Ver Inscritos', 'url'=>array('attendee/index')),
	array('label'=>'Ver Cortesias', 'url'=>array('attendee/free')),
	array('label'=>'Todas as Transações', 'url'=>array('transaction/index')),
	array('label'=>'Trans. sem inscritos', 'url'=>array('transaction/unconfirmedAttendees')),
	array('label'=>'Interesse nas Palestras', 'url'=>array('presentation/interest')),
);
?>

<h1>
	Importação de Transações do PagSeguro
</h1>

<div class="form" id="transaction-import">
	<?php
		echo CHtml::beginForm($this->createUrl('transaction/uploadList'), 'post', array('enctype' => 'multipart/form-data'));

		echo CHtml::label('XML do PagSeguro:', 'file');
		echo CHtml::fileField('file');
		echo '<br /><br />';
		echo CHtml::submitButton('Atualizar!');
	?>
	<br />
	<br />
	<p class="note" style="text-decoration: line-through">
		Subir um XML com novos registros enviará um email para cada um dos novos inscritos e os que<br />
		tiveram seu pagamento confirmado, informando sobre a página de finalização das inscrições.
	</p>
	<p class="note">O envio de emails foi desativado por todo o sistema, já que o evento já acabou.</p>
	<? echo CHtml::endForm(); ?>
</div>