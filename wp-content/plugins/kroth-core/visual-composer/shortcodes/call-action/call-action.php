<?php
/* Call to Action */
if ( !function_exists('krth_ctas_function')) {
  function krth_ctas_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'cta_style'  => '',
      'cta_alignment'  => '',
      'class'  => '',
    ), $atts));

    // Style
    $cta_style = ($cta_style === 'style-two') ? 'krth-cta-two ' : 'krth-cta-one ';
    $cta_alignment = ($cta_alignment === 'cta-cnt-right') ? 'cta-cnt-right ' : 'cta-cnt-left ';

    // Output
    $output   = '<div class="krth-cta '. $cta_style . $cta_alignment . $class .'">';
    $output  .= do_shortcode($content);
    $output  .= '</div>';
    return $output;

  }
}
add_shortcode( 'krth_ctas', 'krth_ctas_function' );

/* Call to Action */
if ( !function_exists('krth_cta_function')) {
  function krth_cta_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'content_width'  => '',
      'class'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
    $content = $content ? do_shortcode($content) : '';
    $content_width = $content_width ? 'style="width:'. $content_width .';"' : '';

    // Output
    return '<div class="krth-cta-cnt '. $class .'" '. $content_width .'>'. $content .'</div>';

  }
}
add_shortcode( 'krth_cta', 'krth_cta_function' );