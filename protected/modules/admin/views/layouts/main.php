<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />

		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

		<?php
			echo CGoogleApi::init();
			echo CHtml::script(CGoogleApi::load('jquery', '1.6.4'));
		?>

		<title>PHP'n Rio 2011 Admin - <?= substr($this->getRoute(), strlen('admin/')) ?></title>
	</head>

	<body>

		<div class="container" id="page">

			<div id="header">
				<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
			</div><!-- header -->

			<div id="mainmenu">
				<?php
				$this->widget('zii.widgets.CMenu', array(
					'items' => array(
						array('label' => 'Notícias', 'url' => $this->createUrl('news/index')),
						array('label' => 'Palestrantes', 'url' => $this->createUrl('speaker/index')),
						array('label' => 'Palestras', 'url' => $this->createUrl('presentation/index')),
						array('label' => 'Patrocinadores', 'url' => $this->createUrl('sponsor/index')),
						array('label' => 'Membros da Equipe', 'url' => $this->createUrl('teamMember/index')),
						array('label' => 'Inscrições', 'url' => $this->createUrl('transaction/index')),
						array('label' => 'Usuários', 'url' => $this->createUrl('user/index')),
						array('label' => 'Login', 'url' => array('login'), 'visible' => Yii::app()->user->isGuest),
						array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest)
					),
				));
				?>
			</div><!-- mainmenu -->
			<?php if (isset($this->breadcrumbs)): ?>
				<?php
				$this->widget('zii.widgets.CBreadcrumbs', array(
					'links' => $this->breadcrumbs,
				));
				?><!-- breadcrumbs -->
			<?php endif ?>

				<?php echo $content; ?>

			<div id="footer">
			Criado com <a href="http://www.yiiframework.com">Yii Framework</a><br />
				<a href="https://github.com/igorsantos07/PHP-n-Rio-2011/">Código-fonte do site</a> ||
				<a href="https://github.com/igorsantos07/PHP-n-Rio-2011/issues/">Tarefas e bugs</a>
			</div>

		</div><!-- page -->
	</body>
</html>