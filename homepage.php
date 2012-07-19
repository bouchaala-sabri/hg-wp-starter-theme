<?php
/**
 * Template Name: Homepage Template
 */

get_header();
the_post(); 
?>

	<div id="content">
		
		<div id="rotator">
		
		</div> <!-- /#rotator -->

		<h1><?php $h1 = get_post_custom_values('h1'); echo ($h1) ? $h1[0] : the_title(); ?></h1>
	
		<div id="homepage-content" class="cf">
			<?php the_content(); ?>
		</div> <!-- /#homepage-content -->
	
	</div> <!-- /#content -->

<?php get_footer(); ?>