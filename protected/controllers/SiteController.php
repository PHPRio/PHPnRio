<?php

class SiteController extends Controller {

	public $defaultAction = 'backwardCompatibility';

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
//		$this->layout = false;
		if ($error = Yii::app()->errorHandler->error) {

			//handling default image for speakers, presentations, etc
			if ($error['code'] == 404 && strpos($error['message'], '.jpg"') !== false) {
				preg_match('/".*"/', $error['message'], $path);
				$path = substr($path[0], 1, -1);
				$asked_img = Yii::app()->getBasePath(true).'/../'.$path;
				$is_thumb = strpos($path, '.thumb.') !== false;
				$default_img = Yii::app()->getBasePath(true).'/../'.dirname($path).'/default'.($is_thumb? '.thumb':'').'.jpg';
				if (!file_exists($asked_img) && file_exists($default_img)) {
					header('Content-type: image/jpeg');
					header('HTTP/1.0 200 OK');
					echo file_get_contents($default_img);
					exit;
				}
			}

			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionBackwardCompatibility() {
		$ano = CURRENT_EDITION;
		
		switch (Yii::app()->request->pathInfo) {
			default:		$route = '/'.$ano.'/'.Yii::app()->request->pathInfo;
		}

		$this->redirect($route, true, 307);
	}

}