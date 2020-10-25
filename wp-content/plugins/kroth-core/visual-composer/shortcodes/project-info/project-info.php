<?php
/* ==========================================================
    Project Info
=========================================================== */
if ( !function_exists('krth_project_info_function')) {
  function krth_project_info_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'project_info_title'  => '',
      'list_details'  => '',
      'class'  => '',
      // Colors
      'title_color'  => '',
      'list_title_color'  => '',
      'list_text_color'  => '',
      'title_bg_color'  => '',
      'border_color'  => '',
      // Style - Size
      'title_size'  => '',
      'list_title_size'  => '',
      'list_text_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Group Field
    $list_details = (array) vc_param_group_parse_atts( $list_details );
    $get_each_list = array();
    foreach ( $list_details as $list_detail ) {
      $each_list = $list_detail;
      $each_list['list_title'] = isset( $list_detail['list_title'] ) ? $list_detail['list_title'] : '';
      $each_list['list_text'] = isset( $list_detail['list_text'] ) ? $list_detail['list_text'] : '';
      $each_list['list_link'] = isset( $list_detail['list_link'] ) ? $list_detail['list_link'] : '';
      $get_each_list[] = $each_list;
    }

    // Alignment & Texts
    $project_info_title = ( $project_info_title ) ? '<h4 class="bpd-heading">'. $project_info_title .'</h4>' : '';
    $class = ( $class ) ? ' '. $class : '';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Title Color & Size
    if ( $title_color || $title_size || $border_color ) {
      $inline_style .= '.krth-project-info-'. $e_uniqid .' .bpd-header .bpd-heading {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. kroth_core_check_px($title_size) .';' : '';
      $inline_style .= ( $border_color ) ? 'border-bottom-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $list_title_color || $list_title_size ) {
      $inline_style .= '.krth-project-info-'. $e_uniqid .'.krth-project-details strong {';
      $inline_style .= ( $list_title_color ) ? 'color:'. $list_title_color .';' : '';
      $inline_style .= ( $list_title_size ) ? 'font-size:'. kroth_core_check_px($list_title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $list_text_color || $list_text_size ) {
      $inline_style .= '.krth-project-info-'. $e_uniqid .'.krth-project-details ul li, .krth-project-info-'. $e_uniqid .'.krth-project-details ul li a {';
      $inline_style .= ( $list_text_color ) ? 'color:'. $list_text_color .';' : '';
      $inline_style .= ( $list_text_size ) ? 'font-size:'. $list_text_size .';' : '';
      $inline_style .= '}';
    }
    if ( $title_bg_color || $border_color ) {
      $inline_style .= '.krth-project-info-'. $e_uniqid .' .bpd-header {';
      $inline_style .= ( $title_bg_color ) ? 'background-color:'. $title_bg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $border_color ) {
      $inline_style .= '.krth-project-info-'. $e_uniqid .'.krth-project-details, .krth-project-info-'. $e_uniqid .' hr {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-project-info-'. $e_uniqid;

    // Starts
    $output = '<div class="krth-project-details rounded-three'. $styled_class . $class .'"><div class="bpd-header rounded-three">'. $project_info_title .'<ul class="simple-fix">';

    foreach ( $get_each_list as $each_list ) {
      if ($each_list['list_link']) {
        $list_link_s = '<a href="'. $each_list['list_link'] .'" target="_blank">';
        $list_link_c = '</a>';
      } else {
        $list_link_s = '';
        $list_link_c = '';
      }
      $output .= '<li><strong>'. $each_list['list_title'] .'</strong> '. $list_link_s . $each_list['list_text'] . $list_link_c .'</li>';
    }
    $output .= '</ul></div><div class="bpd-content">'. do_shortcode($content) .'</div></div>';

    return $output;

  }
}
add_shortcode( 'krth_project_info', 'krth_project_info_function' );
