<?php

// NO DIRECT ACCESS
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) { die ( __('Please do not load this page directly. Thanks!') ); }

// PASSWORD PROTECTED POST		
if ( post_password_required() ) { echo '<p class="nocomments">' . __('This post is password protected. Enter the password to view comments.') . '</p>'; }


function mytheme_comment($comment, $args, $depth) 
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
	
		<div class="top-right">
			<?php edit_comment_link(__('(Edit Comment)', THEME_NAME),'<div>','</div>') ?>
			<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
		</div>
	
 		<div class="comment-author vcard">
			<div class="img"><?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?></div>
			<div class="name">
				<div><?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', THEME_NAME), get_comment_author_link()) ?></div>
				<div><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', THEME_NAME), get_comment_date(),  get_comment_time()) ?></a></div>
			</div>
			<div class="clr"></div>
		</div>
	  
		<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.', THEME_NAME) ?></em><br />
		<?php endif; ?>
	
	 	<?php comment_text() ?>
	 	
	</div>
</li>
<?php } ?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number( __('No Responses', THEME_NAME), __('One Response', THEME_NAME), __('% Responses', THEME_NAME) );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : ?>

	<?php if ( comments_open() ) : ?>

	 <?php else : // comments are closed ?>
		<p class="nocomments"><?php echo __('Comments are closed.', THEME_NAME); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

	<h3><?php comment_form_title( __('Leave a Reply', THEME_NAME), __('Leave a Reply to %s', THEME_NAME) ); ?></h3>

	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php sprintf( __('You must be <a href="%url">logged in</a> to post a comment.', THEME_NAME), wp_login_url( get_permalink()) ); ?></p>
	<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>
			
			<p><?php _e('Logged in as:', THEME_NAME); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', THEME_NAME); ?>"><?php _e('Log out', THEME_NAME); ?> &raquo;</a></p>

		<?php else : ?>

			<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			<label for="author"><small><?php _e('Name', THEME_NAME); ?> <?php if ($req) echo "(" . __('required', THEME_NAME) . ")"; ?></small></label></p>
			
			<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			<label for="email"><small><?php _e('Mail (will not be published)', THEME_NAME); ?> <?php if ($req) echo "(" . __('required', THEME_NAME) . ")"; ?></small></label></p>
			
			<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			<label for="url"><small><?php _e('Website', THEME_NAME); ?></small></label></p>

		<?php endif; ?>

			<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>
	
			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', THEME_NAME); ?>" />
				<?php comment_id_fields(); ?>
			</p>
		
			<?php do_action('comment_form', $post->ID); ?>

		</form>

	<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>