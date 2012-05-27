<?php

class SiteController extends Y2011Controller {

	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array('class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF),

			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array('class' => 'CViewAction'),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		$speakers	= Speaker::model()->with('presentations')->findAll(array('order' => 'RAND()'));
		$all_news	= News::model()->ordered()->findAll(array('limit' => 6));
		$news_total	= News::model()->count();
		$this->render('index', compact('speakers','all_news','news_total'));
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

	public function actionBiggestName() {
		$n = array();

		$att = Attendee::model()->findAll();
		foreach ($att as $a) $n[strlen($a->name)] = "A$a->id - $a->name (".strlen($a->name).')';
		$trans = Transaction::model()->findAll();
		foreach ($trans as $t) $n[strlen($t->name)] = "T$t->id - $t->name (".strlen($t->name).')';

		ksort($n);
		die(var_dump(array_pop($n)));
	}

	public function actionGetCertificate($code) {
		$cert_path = YiiBase::getPathOfAlias('webroot.certificados')."/$code.pdf";

		$original_code = $code;
		$code = explode('-', $original_code);

		switch ($code[0]) {
			case 'a': $model = Attendee::model();		break;
			case 't': $model = Transaction::model();	break;
		}
		$name = $model->findByPk($code[1])->name;

		if (!$name) throw new CHttpException(404, 'Código inválido!');

		$pdf = new Certificate(utf8_decode($name));
		$pdf->generate();
		$pdf->Output($cert_path, 'I');
	}

}