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

// EDITOR THEME OPTIONS
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );


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

// CHECK FOR CATEGORY SINGLES (single-category-{$category})
add_filter('single_template', 'check_for_category_single_template');
function check_for_category_single_template( $t )
{
	foreach( (array) get_the_category() as $cat ) 
	{ 
		if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php"; 
		if($cat->parent)
		{
			$cat = get_the_category_by_ID( $cat->parent );
			if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
		}
	} 
	return $t;
}

// FOOTER MENU
function hg_get_footer_menu( $menu_name = 'footer' )
{
	hg_get_footer_menu_logic( (array) wp_get_nav_menu_items( $menu_name ));
}

function hg_get_footer_menu_logic($footer_items)
{
	$num_footer_items = count($footer_items);
	
	if($num_footer_items >= 1)
	{
		echo "<div id=\"footer-nav\">\n";
		$end_of_loop = $num_footer_items - 1;
		foreach( (array) $footer_items as $c => $nav_item)
		{
			$add_target = ($nav_item->target) ? " target='{$nav_item->target}'" : "";
			echo "	<a href=\"{$nav_item->url}\"{$add_target}>{$nav_item->title}</a>";
			if($c < $end_of_loop) { echo " &bull; \n"; }
		}
		echo "</div>\n";
	}
}

?>