<?php

class Y2012Module extends CWebModule {

	public function init() {
//		define('FINISHED', time() >= strtotime('2011-11-04 15:00:00'));

		Yii::app()->params = Yii::app()->params[2012];
		Yii::app()->setComponent('db', Yii::app()->db12);

		$this->setImport(array(
			'y2012.models.*',
			'y2012.components.*',
		));
	}

	public function beforeControllerAction($controller, $action) {
		if (parent::beforeControllerAction($controller, $action)) {
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

}
