<?php get_header(); ?>

	<div id="content">
	
		<h1><?php bloginfo( 'name' ); ?></h1>
		
		<div id="main_column">
			<?php 
				if ( have_posts() )
				{
					while( have_post() )
					{
						the_post();
						get_template_part( 'loop', get_post_format() );
					}
				}
				else
				{
					echo "<p class=\"nothing-found\">" . __('Sorry, nothing found.') . "</p>";
				}
				
				page_navigation(); 
			?>
		</div> <!-- /#main_column -->
		
		<div id="sidebar">
			<ul><?php dynamic_sidebar('category'); ?></ul>
		</div>	<!-- /#sidebar -->

	</div> <!-- /#content -->

<?php get_footer(); ?>