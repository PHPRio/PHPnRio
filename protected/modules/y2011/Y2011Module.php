<?php

class Y2011Module extends CWebModule {

	public function init() {
		define('FINISHED', time() >= strtotime('2011-11-04 15:00:00'));
		Yii::app()->params = Yii::app()->params[2011];
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		// import the module-level models and components
		$this->setImport(array(
			'y2011.models.*',
			'y2011.components.*',
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
