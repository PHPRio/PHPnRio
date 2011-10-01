<div class="titulo"><h2>Redes Sociais</h2></div>
<div class="col" style="float:right; padding-top:10px;">
<? if (ENV != 'dev'): ?>
	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
		new TWTR.Widget({
			version: 2,
			type: 'search',
			search: 'phprio OR phpnrio OR PHP\'nRio',
			interval: 30000,
			title: 'PHP\'n Rio 2011',
			subject: 'O evento Carioca de PHP',
			width: 250,
			height: 110,
			theme: {
				shell: {
					background: '#8ec1da',
					color: '#ffffff'
				},
				tweets: {
					background: '#ffffff',
					color: '#444444',
					links: '#1985b5'
				}
			},
			features: {
				scrollbar: false,
				loop: true,
				live: true,
				hashtags: true,
				timestamp: true,
				avatars: true,
				toptweets: true,
				behavior: 'default'
			}
		}).render().start();
	</script>
<? endif ?>
</div>

<div class="col" style="float:right; padding-top:10px;">
	<div id="fb-root"></div>
	<div class="fb-like-box" data-href="http://www.facebook.com/pages/PHPRio/160383237381004" colorscheme="fff" data-width="250" data-height="180" data-show-faces="true" data-stream="false" data-header="false" style="float:right;"></div>
</div>