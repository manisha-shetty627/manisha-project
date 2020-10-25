<?php
/*
 * Testimonial Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

class kroth_testimonial_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'krth-testimonial-widget',
      VTHEME_NAME_P . __( ': Testimonial', 'kroth' ),
      array(
        'classname'   => 'krth-testimonial-widget',
        'description' => VTHEME_NAME_P . __( ' widget that displays testimonial.', 'kroth' )
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
      'client_name'   => '',
      'client_pro'    => '',
      'content' => '',
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

    // Client Name
    $client_name_value = esc_attr( $instance['client_name'] );
    $client_name_field = array(
      'id'    => $this->get_field_name('client_name'),
      'name'  => $this->get_field_name('client_name'),
      'type' => 'text',
      'title' => __( 'Name :', 'kroth' ),
    );
    echo cs_add_element( $client_name_field, $client_name_value );

    // Client Profession
    $client_pro_value = esc_attr( $instance['client_pro'] );
    $client_pro_field = array(
      'id'    => $this->get_field_name('client_pro'),
      'name'  => $this->get_field_name('client_pro'),
      'type'  => 'text',
      'title' => __( 'Profession :', 'kroth' ),
    );
    echo cs_add_element( $client_pro_field, $client_pro_value );

    // Content
    $content_value = esc_attr( $instance['content'] );
    $content_field = array(
      'id'    => $this->get_field_name('content'),
      'name'  => $this->get_field_name('content'),
      'type'  => 'textarea',
      'title' => __( 'Content :', 'kroth' ),
      'help' => __( 'Enter your testimonial content', 'kroth' ),
    );
    echo cs_add_element( $content_field, $content_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['client_name']       = strip_tags( stripslashes( $new_instance['client_name'] ) );
    $instance['client_pro']        = strip_tags( stripslashes( $new_instance['client_pro'] ) );
    $instance['content']     = strip_tags( stripslashes( $new_instance['content'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title          = apply_filters( 'widget_title', $instance['title'] );
    $client_name         = $instance['client_name'];
    $client_pro          = $instance['client_pro'];
    $content       = $instance['content'];

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

    echo '<div class="krth-testimonials-five">';
    echo '<div class="testi-content"><p>'. $content .'</p></div>';
    echo '<div class="testi-client-info"><span class="testi-name">'. $client_name .'</span><span class="testi-pro">'. $client_pro .'</span></div>';
    echo '</div>';

    // Display the markup after the widget
    echo $after_widget;
  }
}


// Register the widget using an annonymous function
function kroth_testimonial_widget_function() {
  register_widget( "kroth_testimonial_widget" );
}
add_action( 'widgets_init', 'kroth_testimonial_widget_function' );


