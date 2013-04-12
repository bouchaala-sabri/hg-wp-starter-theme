<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<!--link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css"-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="apple-touch-icon" href="<?php echo site_url(); ?>/apple-touch-icon.png" />
	<link rel="shortcut icon" href="<?php echo site_url(); ?>/favicon.ico" />

	<?php 	
		if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }		
		wp_head(); 
	?>
	
	<script>
		// HIDE NAV BAR ON IPHONE
		if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) 
		{
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1);}
		}
	</script>
		
</head>
<body <?php body_class(); ?>>

<div id="shell">
<div id="shell-inner">

	<div id="header">
	
		<div id="logo">
			<a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>" title="<?php echo esc_attr(get_bloginfo( 'name' )); ?>" /></a>
		</div> <!-- /#logo -->
		
		<div id="access" class="cf">
			<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
		</div> <!-- /#access -->

	</div> <!-- /#header -->

	<div id="content-wrap">