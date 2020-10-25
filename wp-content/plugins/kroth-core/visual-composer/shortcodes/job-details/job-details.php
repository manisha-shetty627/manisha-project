<?php
/* ==========================================================
  Job Details
=========================================================== */
if ( !function_exists('krth_job_details_function')) {
  function krth_job_details_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'job_details_column'  => '',
      'job_details_items'  => '',
      'class'  => '',
      // Style - Colors
      'icon_color'  => '',
      'title_color'  => '',
      'text_color'  => '',
      'border_color'  => '',
      'bg_color'  => '',
      // Style - Size
      'icon_size'  => '',
      'title_size'  => '',
      'text_size'  => '',
    ), $atts));

    // Group Field
    $job_details_items = (array) vc_param_group_parse_atts( $job_details_items );
    $get_each_job_details = array();
    foreach ( $job_details_items as $job_item ) {
      $each_job_details = $job_item;
      $each_job_details['select_icon'] = isset( $job_item['select_icon'] ) ? $job_item['select_icon'] : '';
      $each_job_details['job_details_title'] = isset( $job_item['job_details_title'] ) ? $job_item['job_details_title'] : '';
      $each_job_details['job_details_text'] = isset( $job_item['job_details_text'] ) ? $job_item['job_details_text'] : '';
      $get_each_job_details[] = $each_job_details;
    }

    // Columns
    $job_details_column = ( $job_details_column ) ? $job_details_column : 'krth-jd-col-3';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Icon Style
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.krth-job-'. $e_uniqid .' .bjd-each .bjd-icon {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. kroth_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    // Title Style
    if ( $title_color || $title_size ) {
      $inline_style .= '.krth-job-'. $e_uniqid .' .bjd-each .bjd-category {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. kroth_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Text Style
    if ( $text_color || $text_size ) {
      $inline_style .= '.krth-job-'. $e_uniqid .' .bjd-each .bjd-ans {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. kroth_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }
    // Box Style
    if ( $border_color || $bg_color ) {
      $inline_style .= '.krth-job-'. $e_uniqid .'.krth-job-details {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= ( $bg_color ) ? 'background-color:'. kroth_core_check_px($bg_color) .';' : '';
      $inline_style .= '}';
    }
    if ( $border_color || $bg_color ) {
      $inline_style .= '.krth-job-'. $e_uniqid .'.krth-job-details .bjd-each {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-job-'. $e_uniqid;

    // Starts
    $output = '<div class="krth-job-details rounded-three '. $job_details_column . $styled_class .'">';

    // Group Param Output
    foreach ( $get_each_job_details as $job_item ) {

      // Category Icon
      $job_icon = ( $job_item['select_icon'] ) ? '<span class="bjd-icon"><i class="'. $job_item['select_icon'] .'"></i></span>' : '';
      // Category Title
      $job_title = ( $job_item['job_details_title'] ) ? '<span class="bjd-category">'. $job_item['job_details_title'] .'</span>' : '';
      // Category Text
      $job_text = ( $job_item['job_details_text'] ) ? '<span class="bjd-ans">'. $job_item['job_details_text'] .'</span>' : '';

      $output .= '<div class="bjd-each">'. $job_icon .'<div class="bjd-content">'. $job_title . $job_text .'</div></div>';
    }

    $output .= '</div>';
    // End

    return $output;
  }
}
add_shortcode( 'krth_job_details', 'krth_job_details_function' );
