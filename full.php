<?php
/**
 * Template Name: Full-Width Template
 */

get_header();
the_post(); 
?>

	<div id="content" class="full">
	
		<h1><?php $h1 = get_post_custom_values('h1'); echo ($h1[0]) ? $h1[0] : the_title(); ?></h1>
		
		<?php the_content(); ?>

	</div> <!-- /#content -->

<?php get_footer(); ?>