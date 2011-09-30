<?php

class NewsController extends Controller {

	public function actionList() {
		$news = News::model()->findAll();
		$this->render('list', compact('news'));
	}

	public function actionView($id) {
		$news = News::model()->findByPk($id);
		$other_news = News::model()->findAll(array('condition' => "id != $news->id", 'limit' => 4));
		$this->render('view', compact('news', 'other_news'));
	}

}