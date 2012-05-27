<? if ($sponsor->category == Sponsor::CAT_MEDIA): ?>
	<div class="box-patrocinador apoio-midia">
		<h1>
			<a href="<?=$sponsor->url?>" target="_blank">
				<img class="logo" src="<?=$sponsor->getImageUrl('imageFile')?>" alt="<?=$sponsor->name?>" /><br />
				<?=$sponsor->name?>
			</a>
		</h1>

		<br />
	</div>
<? else: ?>
	<a name="<?=$sponsor->id?>"></a><a name="<?=$sponsor->slug?>"></a>
	<div class="box-patrocinador">
		<h1>
			<a href="<?=$sponsor->url?>" target="_blank">
				<img class="logo" src="<?=$sponsor->getImageUrl('imageFile')?>" alt="<?=$sponsor->name?>" width="115" height="79" align="left" />
			</a>
			<img src="/static/2011/img/seta.jpg" alt="palestras" width="8" height="15" style="margin-right:5px;" />
			<?=$sponsor->name?>
		</h1>

		<h3><?=CHtml::link($sponsor->url, $sponsor->url, array('target' => '_blank'))?></h3>

		<p><?=$sponsor->description?></p>

		<br />
	</div>
<? endif ?>