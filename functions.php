<?php

$content_width = 980;

//THEME SUPPORT
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

// NAVS
register_nav_menu( 'primary', __('Primary Menu') );
register_nav_menu( 'footer', __('Footer Menu') );

// REGISTER SIDEBAR
register_sidebar( array( 'name' => __('Homepage Sidebar'), 	'id' => 'homepage', 	'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ));
register_sidebar( array( 'name' => __('Blog Sidebar'), 		'id' => 'blog', 		'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ));
register_sidebar( array( 'name' => __('Page Sidebar'), 		'id' => 'page', 		'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ));

// CUSTOM IMAGE SIZES
add_image_size( 'homepage-rotator', '550', '250', true );
add_image_size( 'featured-image', '600', '225', true );

// SHORTCODES & WIDGETS
require_once(dirname(__FILE__) . "/shortcodes.php");
require_once(dirname(__FILE__) . "/widgets.php");

// META TITLE (FROM twentytwelve)
function tt_meta_title()
{
	global $page, $paged;

	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) { echo " | $site_description"; }
	if ( $paged >= 2 || $page >= 2 ) { echo ' | ' . sprintf( 'Page %s' , max( $paged, $page ) ); }
}

// GET FEATURED IMAGE
function hg_get_featured_image( $id, $size = 'post-thumbnail', $allow_empty = false )
{
	$rtn = false;
	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );
	
	if($featured_image) 
	{
		$rtn = $featured_image[0];
	}
	
	if($rtn == "" && !$allow_empty)
	{ 
		$rtn = get_bloginfo('template_directory') . "/images/no-image.jpg";
	}	
	
	return $rtn;
}

// PAGE NAVIGATION
function hg_page_navigation()
{
	if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
	else 
	{ 
		echo '<div class="pagination">';
			echo '<div class="alignleft">';
			echo previous_posts_link('&laquo; Previous Entries');
			echo '</div>';
			
			echo '<div class="alignright">';
			echo next_posts_link('Next Entries &raquo;','');
			echo '</div>';
		echo '</div>';
	}
}

// PAGE EXCERPT
add_action('init', 'hg_pe_init');
function hg_pe_init() { if(function_exists("add_post_type_support")) { add_post_type_support( 'page', 'excerpt' ); } }


// FOOTER MENU
function hg_get_footer_menu( $menu_name = 'footer' )
{
	$footer_nav_items = wp_get_nav_menu_items( $menu_name );
	$num_footer_items = count($footer_nav_items);
	
	if($num_footer_items)
	{
		echo "<div id=\"footer-nav\">\n";
		$end_of_loop = $num_footer_items - 1;
		foreach($footer_nav_items as $c => $nav_item)
		{
			$add_targtet = ($nav_item->target) ? " target='{$nav_item->target}'" : "";
			echo "	<a href=\"{$nav_item->url}\"{$add_targtet}>{$nav_item->title}</a>";
			if($c < $end_of_loop) { echo " &bull; \n"; }
		}
		echo "</div>\n";
	}
}
?>