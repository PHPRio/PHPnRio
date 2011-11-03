<?php $this->beginContent('/layouts/main'); ?>
<div class="container">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array('title'=>'Operações'));
				$this->widget('zii.widgets.CMenu', array('items'=>$this->menu, 'htmlOptions'=>array('class'=>'operations')));
			$this->endWidget();

			if (isset($this->total_attendees) && is_array($this->total_attendees)) {
				$this->beginWidget('zii.widgets.CPortlet', array('title'=>'Totais de inscritos'));
		?>
			<table id="total_attendees" border="0">
				<tr>
					<th>Total de pessoas</th>
					<td><?=$this->total_attendees['total_attendees']?></td>
				</tr>
				<tr>
					<th><?=CHtml::link('Inscritos', array('attendee/index'))?></th>
					<td><?=$this->total_attendees['confirmed_attendees']?></td>
				</tr>
				<tr>
					<th><?=CHtml::link('Não-inscritos', array('transaction/unconfirmedAttendees'))?></th>
					<td><?=$this->total_attendees['unconfirmed_attendees']?></td>
				</tr>
				<tr><td colspan="2"><hr /></td></tr>
				<tr>
					<th><?=CHtml::link('Transações', array('transaction/index'))?></th>
					<td><?=$this->total_attendees['total_transactions']?></td>
				</tr>
				<tr>
					<th>Pagas</th>
					<td><?=$this->total_attendees['paid_transactions']?></td>
				</tr>
				<tr>
					<th>Aguardando</th>
					<td><?=$this->total_attendees['unpaid_transactions']?></td>
				</tr>
			</table>
		<?php
				$this->endWidget();
			}
		?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>