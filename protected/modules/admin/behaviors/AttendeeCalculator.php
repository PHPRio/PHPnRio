<?php
class AttendeeCalculator extends CBehavior {

	public function beforeAction() {
		$this->owner->total_attendees = array(
			'paid_transactions'		=> Transaction::model()->count('status = ?',array(Transaction::STATUS_APPROVED)),
			'unpaid_transactions'	=> Transaction::model()->count('status = ?',array(Transaction::STATUS_WAITING)),
			'total_transactions'	=> Transaction::model()->count(),
			'confirmed_attendees'	=> Attendee::model()->count(),
			'unconfirmed_attendees'	=> Yii::app()->db->createCommand('SELECT COUNT(*) FROM transaction WHERE id NOT IN (SELECT transaction_id FROM attendee)')->queryScalar(),
			'total_attendees'		=> Yii::app()->db->createCommand()->select('SUM(total_attendees)')->from('transaction')->queryScalar(),
		);
	}

}