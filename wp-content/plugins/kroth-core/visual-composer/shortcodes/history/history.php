<?php
/* Histories */
if ( !function_exists('krth_histories_function')) {
  function krth_histories_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'class'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Output
    $output   = '<div class="krth-histories '. $class .'"><div class="bh-line"></div>';
    $output  .= do_shortcode($content);
    $output  .= '</div>';
    return $output;

  }
}
add_shortcode( 'krth_histories', 'krth_histories_function' );

/* History */
if ( !function_exists('krth_history_function')) {
  function krth_history_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'content_alignment'  => '',
      'achievement_image'  => '',
      'achievement_image_link'  => '',
      'open_link'  => '',
      'history_title'  => '',
      'history_year'  => '',
      'class'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Content Alignment
    $content_alignment = $content_alignment ? $content_alignment : 'bh-align-right';

    // Achievement Image
    $image_url = wp_get_attachment_url( $achievement_image );
    $image_alt = get_post_meta($achievement_image, '_wp_attachment_image_alt', true);
    $open_link = $open_link ? 'target="_blank"' : '';
    if ($achievement_image_link) {
      $achievement_image = $achievement_image ? '<a href="'. $achievement_image_link .'" class="history-first-section" '. $open_link .'><img class="rounded-three img-responsive" src="'. $image_url .'" alt="'. $image_alt .'"></a>' : '';
    } else {
      $achievement_image = $achievement_image ? '<span class="history-first-section"><img class="rounded-three img-responsive" src="'. $image_url .'" alt="'. $image_alt .'"></span>' : '';
    }

    // Contents
    $history_year = $history_year ? '<span class="bh-year">'. $history_year .'</span>' : '';
    $content = $content ? do_shortcode($content) : '';

    // Link and Title
    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args = vc_parse_multi_attribute( $history_title );
      $url        = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
      $title      = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : '';
      $target     = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }
    if ($url) {
      $history_title = '<a href="'. $url .'" class="bh-achievement" target="'. $target .'">'. $title .'</a>';
    } else {
      $history_title = '<span class="bh-achievement">'. $title .'</span>';
    }

    // Output
    return '<div class="krth-history '. $content_alignment .' '. $class .'">'. $achievement_image .'<div class="history-second-section">'. $history_year . $history_title . $content .'</div></div>';

  }
}
add_shortcode( 'krth_history', 'krth_history_function' );
