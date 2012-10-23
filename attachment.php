<?php 
get_header(); 
$alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
?>

	<div id="content">
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<h1><?php the_title(); ?></h1>
			
			<div class="entry-attachment">
				<?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, "large"); ?>
					<div class="attachment">
						<a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="<?php echo $alt; ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php echo $alt; ?>" /></a>
					</div>
					<?php if($post->post_excerpt) { ?><p class="wp-caption"><?php echo $post->post_excerpt; ?></p><?php } ?>
					<?php if($post->post_content) { ?><p><?php echo $post->post_content; ?></p><?php } ?>
				<?php else : ?>
					 <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
				<?php endif; ?>
			</div> <!-- /.entry-attachment -->
		
		<?php endwhile; ?>
		<?php endif; ?>
	
	</div> <!-- /#content -->

<?php get_footer(); ?>