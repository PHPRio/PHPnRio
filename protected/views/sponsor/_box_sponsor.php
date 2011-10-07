<a name="<?=$sponsor->id?>"></a><a name="<?=$sponsor->slug?>"></a>
<div class="pagina-palestrantes">
	<h1>
		<a href="<?=$sponsor->url?>" target="_blank">
			<img src="<?=$sponsor->getImageUrl('imageFile')?>" alt="<?=$sponsor->name?>" width="115" height="79" align="left" style="margin-right:15px;" />
		</a>
		<img src="img/seta.jpg" alt="palestras" width="8" height="15" style="margin-right:5px;" />
		<?=$sponsor->name?>
	</h1>

	<h3><?=CHtml::link($sponsor->url, $sponsor->url, array('target' => '_blank'))?></h3>

	<p><?=$sponsor->description?></p>

	<br />
</div>