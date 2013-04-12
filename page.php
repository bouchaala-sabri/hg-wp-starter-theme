<?php get_header(); the_post(); ?>

	<div id="content">

		<div id="main_column">

			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			
		</div> <!-- /#main_column -->
		
		<div id="sidebar">
			<ul><?php dynamic_sidebar('page'); ?></ul>
		</div>	<!-- /#sidebar -->

	</div> <!-- /#content -->

<?php get_footer(); ?>