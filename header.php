<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php tt_meta_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1.0" />

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php 	
		if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }		
		wp_head(); 
	?>
	
	<script>
		// HIDE NAV BAR ON IPHONE
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1);}
	</script>
		
</head>
<body <?php body_class(); ?>>

<div id="shell">
<div id="shell-inner">

	<div id="header">
	
		<div id="logo">
			<img src="" alt="<?php bloginfo( 'name' ); ?>" />
		</div> <!-- /#logo -->
		
		<div id="access" class="cf">
			<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
		</div> <!-- /#access -->

	</div> <!-- /#header -->

	<div id="content-wrap">