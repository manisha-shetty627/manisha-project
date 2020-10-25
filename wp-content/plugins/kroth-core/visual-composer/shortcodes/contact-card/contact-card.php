<?php
/* ==========================================================
    Contact Card
=========================================================== */
if ( !function_exists('krth_contact_card_function')) {
  function krth_contact_card_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'contact_card_title'  => '',
      'link_text'  => '',
      'link'  => '',
      'open_link'  => '',
      'exact_height'  => '',
      'class'  => '',
      // Colors
      'title_color'  => '',
      'text_color'  => '',
      'link_color'  => '',
      'link_line_color'  => '',
      'overlay_bg'  => '',
      'bg_img'  => '',
      // Size
      'title_size'  => '',
      'text_size'  => '',
      'link_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Background
    if ( $bg_img || $exact_height ) {
      $image_url = wp_get_attachment_url( $bg_img );
      $inline_style .= '.krth-cc-card-'. $e_uniqid .'.krth-contact-card {';
      $inline_style .= ( $bg_img ) ? 'background-image:url('. $image_url .');' : '';
      $inline_style .= ( $exact_height ) ? 'min-height:'. $exact_height .';' : '';
      $inline_style .= '}';
    }
    if ( $overlay_bg ) {
      $inline_style .= '.krth-cc-card-'. $e_uniqid .'.krth-contact-card:after {';
      $inline_style .= ( $overlay_bg ) ? 'background:'. $overlay_bg .';' : '';
      $inline_style .= '}';
    }
    // Color & Size
    if ( $title_color || $title_size ) {
      $inline_style .= '.krth-cc-card-'. $e_uniqid .'.krth-contact-card .bcc-content h2 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
      $inline_style .= '}';
    }
    if ( $text_color || $text_size ) {
      $inline_style .= '.krth-cc-card-'. $e_uniqid .'.krth-contact-card .bcc-content p {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
      $inline_style .= '}';
    }
    if ( $link_color || $link_size ) {
      $inline_style .= '.krth-cc-card-'. $e_uniqid .'.krth-contact-card .bcc-content .bcc-btn {';
      $inline_style .= ( $link_color ) ? 'color:'. $link_color .';' : '';
      $inline_style .= ( $link_size ) ? 'font-size:'. $link_size .';' : '';
      $inline_style .= '}';
    }
    if ( $link_line_color ) {
      $inline_style .= '.krth-cc-card-'. $e_uniqid .'.krth-contact-card .bcc-content .bcc-btn:after {';
      $inline_style .= ( $link_line_color ) ? 'background-color:'. $link_line_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-cc-card-'. $e_uniqid;

    // Atts If
    $contact_card_title = ( $contact_card_title ) ? '<h2>'. $contact_card_title .'</h2>' : '';
    $link = ( $link ) ? 'href="'. $link .'"' : '';
    $open_link = ( $open_link ) ? ' target="_blank"' : '';
    $link_text = ( $link_text ) ? '<a '. $link . $open_link .' class="bcc-btn">'. $link_text .'</a>' : '';
    $class = ( $class ) ? ' '. $class : '';

    // Starts
    $output  = '<div class="krth-contact-card'. $styled_class . $class .'">';
    $output .= '<div class="bcc-content">'. $contact_card_title . $content . $link_text .'</div>';
    $output .= '</div>';

    return $output;

  }
}
add_shortcode( 'krth_contact_card', 'krth_contact_card_function' );
