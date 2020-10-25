<?php
/* ==========================================================
  Accordion
=========================================================== */
if( ! function_exists( 'krth_vt_accordion_function' ) ) {
  function krth_vt_accordion_function( $atts, $content = '', $key = '' ) {

    global $vt_accordion_tabs;
    $vt_accordion_tabs = array();

    extract( shortcode_atts( array(
      'accordion_style' => '',
      'id'            => '',
      'class'         => '',
      'one_active'    => '',
      'icon_color'    => '',
      'border_color'  => '',
      'active_tab'    => 0,
    ), $atts ) );

    do_shortcode( $content );

    // is not empty clients
    if( empty( $vt_accordion_tabs ) ) { return; }

    $id          = ( $id ) ? ' id="'. $id .'"' : '';
    $class       = ( $class ) ? ' '. $class : '';
    $one_active  = ( $one_active ) ? ' collapse-others' : '';
    $uniqtab     = uniqid();

    // Style
    if ($accordion_style === 'style-two') {
      $accordion_class = ' krth-panel-two';
    } elseif($accordion_style === 'style-three') {
      $accordion_class = ' krth-panel-three';
    } else {
      $accordion_class = ' krth-panel-one';
    }

    $el_style    = ( $border_color ) ? ' style="border-color:'. $border_color .';"' : '';
    $icon_style  = ( $icon_color ) ? ' style="color:'. $icon_color .';"' : '';

    // begin output
    $output      = '<div'. $id .' class="panel-group '. $accordion_class . $one_active . $class .'">';

    foreach ( $vt_accordion_tabs as $key => $tab ) {

      $selected  = ( ( $key + 1 ) == $active_tab ) ? ' in' : '';
      $opened    = ( ( $key + 1 ) == $active_tab ) ? ' in' : '';
      $icon      = ( isset( $tab['atts']['icon'] ) ) ? '<i class="'. $tab['atts']['icon'] .'"'. $icon_style .'></i>' : '';
      if ($accordion_style === 'style-three') {
        if ($tab['atts']['sub_title']) {
          $sub_title = '<span>'. $tab['atts']['sub_title'] .'</span>';
        } else{
          $sub_title = '';
        }
      } else{
        $sub_title = '';
      }
      if ($accordion_style === 'style-three') {
        $sub_title = ( $sub_title ) ? $sub_title : '';
        $title     = '<a href="#'. $uniqtab .'-'. $key .'" class="panel-title accordion-toggle" data-toggle="collapse">'. $icon .'<strong>'. $tab['atts']['title'] .'</strong>'. $sub_title .'</a>';
      } else {
        $title     = '<a href="#'. $uniqtab .'-'. $key .'" class="panel-title accordion-toggle" data-toggle="collapse">'. $icon .'<span>'. $tab['atts']['title'] .'</span></a>';
      }

      $output   .= '<div class="panel panel-default"'. $el_style .'>';
      $output   .= '<div class="panel-heading'. $selected .'">'. $title .'</div>';
      $output   .= '<div id="'. $uniqtab .'-'. $key .'" class="panel-collapse collapse'. $opened .'"><div class="panel-body">'. do_shortcode( $tab['content'] ) . '</div></div>';
      $output   .= '</div>';

    }

    $output     .= '</div>';
    // end output

    return $output;
  }
  add_shortcode( 'vc_accordion', 'krth_vt_accordion_function' );
}


/**
 *
 * Accordion Shortcode
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if( ! function_exists( 'krth_vt_accordion_tab' ) ) {
  function krth_vt_accordion_tab( $atts, $content = '', $key = '' ) {
    global $vt_accordion_tabs;
    $vt_accordion_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode( 'vc_accordion_tab', 'krth_vt_accordion_tab' );
}