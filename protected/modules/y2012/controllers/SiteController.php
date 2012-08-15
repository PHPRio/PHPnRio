<?php

class SiteController extends Y2012Controller {

	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array('class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF),

			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
//			'page' => array('class' => 'CViewAction'),
		);
	}

	public function actionIndex() {
		$pre = new Preinscription();
		$pre->email = 'Seu email aqui!';
		$msg = '';

		if (isset($_POST['Preinscription'])) {
			$pre->email = $_POST['Preinscription']['email'];
			if ($pre->save()) {
				$msg = 'Pronto! Aguarde novidades.';
			}
			else {
				$msg = $pre->errors['email'][0];
			}
		}

		$this->render('index', compact('pre', 'msg'));
	}

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

}