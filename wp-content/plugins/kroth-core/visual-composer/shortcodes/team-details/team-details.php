<?php
/* Team Details */
if ( !function_exists('krth_team_details_function')) {
  function krth_team_details_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'team_details_name'  => '',
      'team_details_profession'  => '',
      'class'  => '',
      // Color
      'name_color'  => '',
      'profession_color'  => '',
      // Size
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Style
    if ( $name_color || $name_size ) {
      $inline_style .= '.krth-team-details-'. $e_uniqid .'.krth-team-details .tm-name {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. kroth_core_check_px($name_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.krth-team-details-'. $e_uniqid .'.krth-team-details .tm-pro {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. kroth_core_check_px($profession_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-team-details-'. $e_uniqid;

    // Team Details Column
    $class = $class ? ' '. $class : '';
    $name = $team_details_name ? '<div class="tm-name">'. $team_details_name .'</div>' : '';
    $pro = $team_details_profession ? '<div class="tm-pro">'. $team_details_profession .'</div>' : '';

    $output  = '<div class="krth-team-details'. $class . $styled_class .'">';
    $output .= $name . $pro . do_shortcode($content);
    $output .= '</div>';

    return $output;

  }
}
add_shortcode( 'krth_team_details', 'krth_team_details_function' );