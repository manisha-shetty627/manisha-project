<?php
/* ==========================================================
    Contact Section
=========================================================== */
if ( !function_exists('krth_contact_section_function')) {
  function krth_contact_section_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'section_style'  => '',
      'section_title'  => '',
      'section_alignment'  => '',
      'id'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_bg_color'  => '',
      'title_bg_image'  => '',
      'title_alignment'  => '',
      'title_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Background Color
    if ( $title_bg_image ) {
      $inline_style .= '.krth-cs-'. $e_uniqid .' .extended-content-container {';
      $inline_style .= ( $title_bg_image ) ? 'background-image:url('. wp_get_attachment_url($title_bg_image) .');' : '';
      $inline_style .= '}';
    }
    if ( $title_bg_color ) {
      $inline_style .= '.krth-cs-'. $e_uniqid .' .krth-contact-first-overlay {';
      $inline_style .= ( $title_bg_color ) ? 'background-color:'. $title_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $title_color || $title_size ) {
      $inline_style .= '.krth-cs-'. $e_uniqid .' .section-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. kroth_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-cs-'. $e_uniqid;

    // Atts If
    $id = ( $id ) ? $id : '';
    $section_style = ( $section_style ) ? ' '. $section_style : '';
    $section_alignment = ( $section_alignment ) ? ' '. $section_alignment : ' section-content-left';
    $section_title = ( $section_title ) ? '<h2 class="section-title">'. $section_title .'</h2>' : '';
    $class = ( $class ) ? ' '. $class : '';
    $title_alignment = ( $title_alignment ) ? ' '. $title_alignment : ' text-center';

    // Starts
    $output  = '<div class="krth-contact-section'. $section_style . $section_alignment . $class . $styled_class .'">';
    $output .= '<div class="krth-contact-first extended-content-container'. $title_alignment .'">';
    $output .= '<div class="krth-contact-first-overlay"></div>';
    $output .= $section_title;
    $output .= '</div>';
    $output .= '<div class="container"><div class="krth-cs-area"><div class="krth-section-content">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    $output .= '<div class="krth-contact-form-section">';
    $output .= do_shortcode( '[contact-form-7 id="'. $id .'"]' );
    $output .= '</div></div></div>';
    $output .= '</div>';

    return $output;

  }
}
add_shortcode( 'krth_contact_section', 'krth_contact_section_function' );