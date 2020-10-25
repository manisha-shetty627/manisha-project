<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('krth_tab_links_function')) {
  function krth_tab_links_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'tab_links'  => '',
      'class'  => '',
    ), $atts));

    // Group Field
    $tab_links = (array) vc_param_group_parse_atts( $tab_links );
    $get_client_logos = array();
    foreach ( $tab_links as $tab_link ) {
      $each_logo = $tab_link;
      $each_logo['title_link'] = isset( $tab_link['title_link'] ) ? $tab_link['title_link'] : '';
      $each_logo['right_icon'] = isset( $tab_link['right_icon'] ) ? $tab_link['right_icon'] : '';
      $get_client_logos[] = $each_logo;
    }

    $output = '<ul class="krth-tab-links rounded-two">';

    // Group Param Output
    foreach ( $get_client_logos as $each_logo ) {
      // Link and Title
      if ( function_exists( 'vc_parse_multi_attribute' ) ) {
        $parse_args = vc_parse_multi_attribute( $each_logo['title_link'] );
        $url        = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
        $title      = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : '';
        $target     = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
      }

      // Right Icon
      $right_icon = $each_logo['right_icon'] === 'true' ? 'class="btl-view-all"' : '';

      $output .= '<li><a href="'. $url .'" target="'. $target .'" '. $right_icon .'>'. $title .'</a></li>';

    }

    $output .= '</ul>';

    return $output;
  }
}
add_shortcode( 'krth_tab_links', 'krth_tab_links_function' );
