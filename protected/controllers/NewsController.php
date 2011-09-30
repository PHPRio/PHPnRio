<?php

class NewsController extends Controller {

	public function actionList() {
		$news = News::model()->findAll();
		$this->render('list', compact('news'));
	}
	
	public function actionView($id) {
		$news = News::model()->findByPk($id);
		$this->render('list', compact('news'));
	}

}