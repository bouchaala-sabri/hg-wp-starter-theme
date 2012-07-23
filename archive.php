<?php get_header(); ?>

	<div id="content">
	
		<h1>
			<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: %s' ), '<span>' . get_the_date() . '</span>' ); ?>
			<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: %s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format' ) ) . '</span>' ); ?>
			<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: %s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' ); ?>
			<?php else : ?>
				<?php _e( 'Blog Archives' ); ?>
			<?php endif; ?>
		</h1>
		
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
				
				page_navigation(); 
			?>
		</div> <!-- /#main_column -->
		
		<div id="sidebar">
			<ul><?php dynamic_sidebar('category'); ?></ul>
		</div>	<!-- /#sidebar -->

	</div> <!-- /#content -->

<?php get_footer(); ?>