<?php

class Y2012Module extends CWebModule {

	public function init() {
		define('FINISHED', time() >= strtotime('2012-11-09 23:59:59'));
		Yii::app()->params = Yii::app()->params[2012];
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		// import the module-level models and components
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
