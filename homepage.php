<?php
/**
 * Template Name: Homepage Template
 */

get_header();
the_post(); 
?>

	<div id="content">
		
		<div id="rotator">
			ROTATOR PLACEHOLDER
		</div> <!-- /#rotator -->
	
		<div id="homepage-content" class="cf">
		
			<h1><?php $h1 = get_post_custom_values('h1'); echo ($h1[0]) ? $h1[0] : the_title(); ?></h1>
		
			<?php the_content(); ?>
			
		</div> <!-- /#homepage-content -->
		
		<div id="sidebar">
			<ul><?php dynamic_sidebar('homepage'); ?></ul>
		</div>
	
	</div> <!-- /#content -->

<?php get_footer(); ?>