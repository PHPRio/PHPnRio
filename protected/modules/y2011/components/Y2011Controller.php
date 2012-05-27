<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Y2011Controller extends CController {

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '/layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();
	/**
	 * @var Sponsor[]
	 */
	public $sponsors = array();
	public $pageTitle = 'Dia 5 de Novembro no CEFET-RJ campus Maracanã';

	protected function beforeAction($action) {
		parent::beforeAction($action);
		$sponsors = Sponsor::model()->findAll();
		$this->sponsors = array();
		foreach ($sponsors as $sponsor) {
			switch ($sponsor->category) {
				case Sponsor::CAT_SUPPORTER: $cat = 'supporter';
					break;
				case Sponsor::CAT_MEDIA: $cat = 'media';
					break;
				default: $cat = 'sponsor';
			}
			$this->sponsors[$cat][] = $sponsor;
		}

		Yii::app()->clientScript->scriptMap = array(
			'jquery.js' => false,
			'jquery.min.js' => false,
		);

		return true;
	}

	protected function beforeRender($view) {
		parent::beforeRender($view);

		if (isset($GLOBALS['printing']) && $GLOBALS['printing'])
			$this->layout = '/layouts/empty';

		return true;
	}

	protected function afterRender($view, &$output) {
		parent::afterRender($view, $output);
		unset($GLOBALS['printing']);
	}

}
