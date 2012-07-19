<?php


// [HIGHLIGHT]
function hg_highlight_func( $atts, $content = null ) 
{
     return "<div class='highlight'>$content</div>";
}
add_shortcode('highlight', 'hg_highlight_func');


// [BUTTON]
function hg_button( $atts, $content = null ) 
{
   return '<a class="button ' . $atts['class'] . '" href="' . $atts['href'] . '" target="' . $atts['target'] . '">' . $content . '</a>';
}
add_shortcode('button', 'hg_button');

?>