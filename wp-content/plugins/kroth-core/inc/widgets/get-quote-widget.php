<?php
/*
 * Get a Quote Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

class kroth_gquote_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'krth-get-quote',
      VTHEME_NAME_P . __( ': Get a Quote', 'kroth' ),
      array(
        'classname'   => 'krth-get-quote',
        'description' => VTHEME_NAME_P . __( ' widget that displays get a quote.', 'kroth' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => '',
      'content' => '',
      'btn_text' => '',
      'btn_link' => '',
      'target' => '',
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'kroth' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Content
    $content_value = esc_attr( $instance['content'] );
    $content_field = array(
      'id'    => $this->get_field_name('content'),
      'name'  => $this->get_field_name('content'),
      'type'  => 'textarea',
      'title' => __( 'Content :', 'kroth' ),
    );
    echo cs_add_element( $content_field, $content_value );

    // Button Text
    $btn_text_value = esc_attr( $instance['btn_text'] );
    $btn_text_field = array(
      'id'    => $this->get_field_name('btn_text'),
      'name'  => $this->get_field_name('btn_text'),
      'type'  => 'text',
      'title' => __( 'Button Text :', 'kroth' ),
    );
    echo cs_add_element( $btn_text_field, $btn_text_value );

    // Button Link
    $btn_link_value = esc_attr( $instance['btn_link'] );
    $btn_link_field = array(
      'id'    => $this->get_field_name('btn_link'),
      'name'  => $this->get_field_name('btn_link'),
      'type'  => 'text',
      'title' => __( 'Button Link :', 'kroth' ),
    );
    echo cs_add_element( $btn_link_field, $btn_link_value );

    // Target
    $target_value = esc_attr( $instance['target'] );
    $target_field = array(
      'id'    => $this->get_field_name('target'),
      'name'  => $this->get_field_name('target'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'kroth' ),
      'off_text'  => __( 'No', 'kroth' ),
      'title' => __( 'Open New Window?', 'kroth' ),
    );
    echo cs_add_element( $target_field, $target_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['content']    = strip_tags( stripslashes( $new_instance['content'] ) );
    $instance['btn_text']   = strip_tags( stripslashes( $new_instance['btn_text'] ) );
    $instance['btn_link']   = strip_tags( stripslashes( $new_instance['btn_link'] ) );
    $instance['target']   = strip_tags( stripslashes( $new_instance['target'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title      = apply_filters( 'widget_title', $instance['title'] );
    $content    = $instance['content'];
    $btn_text   = $instance['btn_text'];
    $btn_link   = $instance['btn_link'];
    $target   = $instance['target'];

    // Display the markup before the widget
    echo $before_widget;
    $target = ( $target === '1' ) ? 'target="_blank"' : '';
    if ( $title ) {
      echo '<h4 class="bgq-title">' . $title . '</h4>';
    }

    echo '<p>'. $content .'</p>';
    echo '<a href="'. $btn_link .'" '. $target .' class="bgq-btn">'. $btn_text .'</a>';

    // Display the markup after the widget
    echo $after_widget;
  }
}


// Register the widget using an annonymous function
function kroth_gquote_widget_function() {
  register_widget( "kroth_gquote_widget" );
}
add_action( 'widgets_init', 'kroth_gquote_widget_function' );

