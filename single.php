<?php 
get_header(); 
the_post(); 

$h1 = get_post_custom_values('h1');
$featured_image = get_featured_image($post->ID, 'featured-image', true);
?>

	<div id="content">
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h1><?php echo ($h1) ? $h1[0] : the_title(); ?></h1>
	
			<div id="main_column">

				<?php if($featured_image) { ?>
				<div class="featured_image">
					<img src="<?php echo $featured_image ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
				</div> <!-- /.featured_image -->
				<?php } ?>
		
				<?php the_content(); ?>
				
				<?php the_tags(); ?>
				<?php wp_link_pages(); ?>
			
				<?php comments_template(); ?>
			</div> <!-- /#main_column -->
			
			<div id="sidebar">
				<ul><?php dynamic_sidebar('blog'); ?></ul>
			</div> <!-- /#sidebar -->
	
		</div> <!-- /#post-<?php the_ID(); ?> -->
	
	</div> <!-- /#content -->

<?php get_footer(); ?>