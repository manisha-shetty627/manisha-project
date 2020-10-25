<?php
/* ==========================================================
  Partner
=========================================================== */
if ( !function_exists('krth_counter_function')) {
  function krth_counter_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'counter_style'  => '',
      'counter_title'  => '',
      'counter_value'  => '',
      'counter_value_in'  => '',
      'class'  => '',

      // Style
      'counter_title_color'  => '',
      'counter_value_color'  => '',
      'counter_value_in_color'  => '',
      'counter_title_size'  => '',
      'counter_value_size'  => '',
      'counter_value_in_size'  => '',
    ), $atts));

    // Style
    $counter_title_color = $counter_title_color ? 'color:'. $counter_title_color .';' : '';
    $counter_value_color = $counter_value_color ? 'color:'. $counter_value_color .';' : '';
    $counter_value_in_color = $counter_value_in_color ? 'color:'. $counter_value_in_color .';' : '';
    // Size
    $counter_title_size = $counter_title_size ? 'font-size:'. $counter_title_size .';' : '';
    $counter_value_size = $counter_value_size ? 'font-size:'. $counter_value_size .';' : '';
    $counter_value_in_size = $counter_value_in_size ? 'font-size:'. $counter_value_in_size .';' : '';

    // Counter Title
    $counter_title = $counter_title ? '<div class="counter-label" style="'. $counter_title_color . $counter_title_size .'">'. $counter_title .'</div>' : '';

    // Value
    $counter_value = $counter_value ? '<div class="cvalues" style="'. $counter_value_color . $counter_value_size .'">'. $counter_value .'</div>' : '';

    // Value In
    $counter_value_in = $counter_value_in ? '<div class="cvalue-in" style="'. $counter_value_in_color . $counter_value_in_size .'">'. $counter_value_in .'</div>' : '';

    // Counters
    if ($counter_style === 'krth-counter-two') {
      $output = '<div class="krth-counter-two '. $class .'"><div class="counter-values">'. $counter_value . $counter_value_in .'</div>'. $counter_title .'</div>';
    } else {
      $output = '<div class="krth-counter-one '. $class .'"><div class="counter-values">'. $counter_value . $counter_value_in .'</div>'. $counter_title .'</div>';
    }

    // Output
    return $output;

  }
}
add_shortcode( 'krth_counter', 'krth_counter_function' );
