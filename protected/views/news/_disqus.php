<div id="disqus_thread"></div>
<script type="text/javascript">
	var disqus_shortname = 'phpnrio',
		disqus_identifier = '<?=$id?>',
		disqus_url = '<?=Yii::app()->request->getBaseUrl(true).Yii::app()->request->getRequestUri() ?>',
		disqus_developer = <?=(int)ENV == 'dev'?>;

	(function() {
		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	})();
</script>