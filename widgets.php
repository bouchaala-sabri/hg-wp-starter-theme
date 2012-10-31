<?php

/*

 SUPER BASIC WIDGET TEMPLATE
 To create settings: http://pippinsplugins.com/simple-wordpress-widget-template/

class NewWidget extends WP_Widget
{
  function NewWidget()
  {
    $widget_ops = array('classname' => 'NewWidget', 'description' => 'Description' );
    $this->WP_Widget('NewWidget', 'New Widget', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( ) );
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo "Content";
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("NewWidget");') );

*/

?>