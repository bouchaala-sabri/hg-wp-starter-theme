<?php 
	$featured_image = get_featured_image(get_the_ID(), 'thumbnail', true); 
?>
<div class="list-entry cf">
<?php if($featured_image) { ?>
	<div class="featured_image">
		<a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image ?>" alt="" /></a>
	</div>
<?php } ?>
	<h2><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
	<?php the_excerpt(); ?>
</div>
