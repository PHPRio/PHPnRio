<!-- cadastre-se -->
<div class="info">
	<pre>
<span class="op">&lt;?php</span>
    <span class="imp">$evento</span> <span>=</span> <span>array</span><span>(</span>
        <span class="imp">'data'</span>  <span>=></span> <span class="imp" style="font-size:19px; font-weight:bold;">'05/11/2011'</span><span>,</span>
        <span class="imp">'local'</span> <span>=></span> <span class="imp" style="font-size:19px; font-weight:bold;">'CEFET-RJ campus Maracanã'</span>
    <span>);</span>
<span class="op">?&gt;</span>
	</pre>

	<a href="<?=$this->createUrl('site/page', array('view' => 'inscricoes'))?>" style="float:right;">
		<img src="img/bt-inscreva-se.png" alt="Cadastre-se" width="165" height="47" border="0" />
	</a>
</div>
<!-- cadastre-se -->

<!-- carrosel -->
<div id="palestrantes">
	<a href="#" class="prev">&lt;</a>
	<div id="scroller">
		<ul>
			<? foreach($speakers as $speaker): ?>
				<? $speaker_url = $this->createUrl('speaker/list', array('#' => $speaker->slug)); ?>
				<li>
					<div class="palestrante">
						<a href="<?=$speaker_url?>"><img src="<?=$speaker->getImageUrl('imageFile')?>" alt="<?=$speaker->name?>" style="float:left; padding-right:10px;" /></a>
						<h3><a href="<?=$speaker_url?>"><?=$speaker->name?></a></h3>
						<? foreach($speaker->presentations as $presentation): ?>
							<a href="<?=$this->createUrl('presentation/list', array('#' => $presentation->slug))?>"><p><?=$presentation->title?></p></a>
						<? endforeach ?>
					</div>
				</li>
			<? endforeach ?>
		</ul>
	</div>
	<a href="#" class="next">&gt;</a>
</div>
<!-- carrosel -->

<!-- notícias -->
<div class="noticias">
	<div class="titulo"><h2>Notícias</h2></div>

	<? foreach ($all_news as $news): ?>
		<? $url = $this->createUrl('news/view', array('data' => $news->slug)) ?>
		<div class="box-noticias">
			<a href="<?=$url?>"><img src="<?=$news->getImageUrl('imageFile', true)?>" alt="<?=$news->title?>" width="70" height="70" border="0" style="float:left;" /></a>

			<div class="chamada-noticia">
				<a href="<?=$url?>"><p style="font-size:16px; color:#60a7aa;"><?=$news->title?></p></a>
				<a href="<?=$url?>"><p style="font-size:14px; color:#333333;"><?=$news->short_desc?></p></a>
			</div>
		</div>
	<? endforeach ?>

	<? if ($news_total > 6): ?>
		<p align="right" style="padding-right:20px; font-size:11px; float:right;"><a href="<?=$this->createUrl('news/list')?>" style="color:#60a7aa;">+ notícias</a></p>
	<? endif ?>

</div>
<!-- notícias -->

<!-- coluna direita -->
<div class="coluna-direita">
	<?=$this->renderPartial('/layouts/_redes_sociais')?>
</div>
<!-- coluna direita -->

<?php
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile('/js/jcarousellite_1.0.1.min.js', CClientScript::POS_END);
	$cs->registerScript('jcarousel',
		"$('#scroller').jCarouselLite({
			btnPrev : '.prev',
			btnNext : '.next',
			auto    : true,
			speed   : 2000,
			visible : 3
		});",
	CClientScript::POS_READY);
?>