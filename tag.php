<?php get_header(); ?>

	<div id="content">
	
		<h1>Posts tagged '<?php echo single_tag_title( '', false ); ?>'</h1>
		
		<div id="main_column">
			<?php 
				if ( have_posts() )
				{
					while( have_posts() )
					{
						the_post();
						get_template_part( 'loop', get_post_format() );
					}
				}
				else
				{
					echo "<p class=\"nothing-found\">" . __('Sorry, nothing found.') . "</p>";
				}
				
				hg_page_navigation(); 
			?>
		</div> <!-- /#main_column -->
		
		<div id="sidebar">
			<ul><?php dynamic_sidebar('category'); ?></ul>
		</div>

	</div>

<?php get_footer(); ?>