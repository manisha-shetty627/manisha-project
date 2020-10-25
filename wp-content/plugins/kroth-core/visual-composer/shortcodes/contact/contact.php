<?php
/* ==========================================================
    Contact
=========================================================== */
if ( !function_exists('krth_contact_function')) {
  function krth_contact_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'id'  => '',
      'box_style'  => '',
      'form_title'  => '',
      'class'  => '',
      // Style
      'submit_size'  => '',
      'submit_color'  => '',
      'submit_bg_color'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Own Styles
    if ( $submit_size || $submit_color || $submit_bg_color ) {
      $inline_style .= '.krth-contact-'. $e_uniqid .' .wpcf7 input[type="submit"] {';
      $inline_style .= ( $submit_size ) ? 'font-size:'. kroth_core_check_px($submit_size) .';' : '';
      $inline_style .= ( $submit_color ) ? 'color:'. $submit_color .';' : '';
      $inline_style .= ( $submit_bg_color ) ? 'background-color:'. $submit_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-contact-'. $e_uniqid;

    // Atts If
    $id = ( $id ) ? $id : '';
    $box_style = ( $box_style ) ? ' '. $box_style : '';
    $form_title = ( $form_title ) ? '<h3 class="form-title">'. $form_title .'</h3>' : '';
    $class = ( $class ) ? ' '. $class : '';

    // Starts
    $output  = '<div class="krth-contact-form'. $styled_class . $box_style . $class .'">';
    $output .= $form_title;
    $output .= do_shortcode( '[contact-form-7 id="'. $id .'"]' );
    $output .= '</div>';

    return $output;

  }
}
add_shortcode( 'krth_contact', 'krth_contact_function' );
