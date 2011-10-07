<?php

class NewsController extends Controller {

	public function actionList() {
		$all_news = News::model()->ordered()->findAll();
		$this->render('list', compact('all_news'));
	}

	public function actionView($data) {
		$news = News::model()->findByAttributes(array((is_numeric($data)? 'id' : 'slug') => $data));
		$other_news = News::model()->ordered()->findAll(array('condition' => "id != $news->id", 'limit' => 4));
		$this->render('view', compact('news', 'other_news'));
	}

}