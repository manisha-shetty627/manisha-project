<?php
/* Map Tabs */
if ( !function_exists('krth_map_tabs_function')) {
  function krth_map_tabs_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'tab_columns'       => '',
      'address_content'   => '',
      'map_height'        => '',
      'next_prev_links'   => '',
      'class'             => '',
      'css'               => '',
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    // fix unclosed/unwanted paragraph tags in $content
    $content  = wpb_js_remove_wpautop($content, true);
    $class    = ( $class ) ? ' '. $class : '';
    $tab_columns  = ( $tab_columns ) ? ' '. $tab_columns : ' map-tab-3-col';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Google Map Height
    if ( $map_height ) {
      $inline_style .= '.krth-location-'. $e_uniqid .' .krth-map-tab-content, .krth-location-'. $e_uniqid .' .krth-map-tab-content .krth-google-map {';
      $inline_style .= ( $map_height ) ? 'min-height:'. kroth_core_check_px($map_height) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-location-'. $e_uniqid;

    // Group Field
    $address_content = (array) vc_param_group_parse_atts( $address_content );

    // Turn output buffer on
    ob_start();

    // Output
    echo '<div class="our-locations'. $custom_css . $class . $styled_class . $tab_columns .'"><div class="krth-mt-container"><ul id="tabs" class="nav nav-tabs krth-locations-tabs" data-tabs="tabs">';
      $i = 0;
      $len = count($address_content);
      foreach ( $address_content as $key => $tab ) {
        if ($i == 0) {
          $active_nav = ' active';
        } else {
          $active_nav = '';
        }
        $title_bg_color = ( isset($tab['title_bg_color']) ) ? 'background-color:'. $tab['title_bg_color'] .';' : '';
        $title_color = ( isset($tab['title_color']) ) ? 'color:'. $tab['title_color'] .';' : '';
        $content_bg_color = ( isset($tab['content_bg_color']) ) ? 'background-color:'. $tab['content_bg_color'] .';' : '';
        echo '<li class="each-location-tab'. $active_nav .'"><a href="#'. $tab['tab_id'] .'" data-toggle="tab" class="each-item-wrapper">';
          if ($tab['title']) {
            echo '<span class="krth-location-name" style="'. $title_bg_color . $title_color .'">'. $tab['title'] .'</span>';
          }
          echo '<span class="location-info" style="'. $content_bg_color .'">'. do_shortcode($tab['content_text']) .'</span></a></li>';
        $i++;
      }
    echo '</ul></div>';
    echo '<div class="tab-content krth-map-tab-content">'. do_shortcode($content) .'</div>';
    if ($next_prev_links) {
      echo '<div class="krth-maptab-controls"><a href="javascript:void(0);" class="btn-previous"><i class="fa fa-angle-left"></i></a><span class="location-title"></span><a href="javascript:void(0);" class="btn-next"><i class="fa fa-angle-right"></i></a></div>';
    }
    echo '</div>';
    ?>
    <script>
    jQuery(document).ready(function($) {

      var intlocationName = $( ".krth-location-<?php echo esc_js($e_uniqid); ?> .krth-locations-tabs > li:first-child > a > .krth-location-name" ).text();
      $(".krth-location-<?php echo esc_js($e_uniqid); ?> .krth-maptab-controls > .location-title").html(intlocationName);
      $('.krth-location-<?php echo esc_js($e_uniqid); ?> .btn-next').click(function(){
        $('.krth-location-<?php echo esc_js($e_uniqid); ?> .nav-tabs > .active').next('li').find('.each-item-wrapper').trigger('click');
      });
      $('.krth-location-<?php echo esc_js($e_uniqid); ?> .btn-previous').click(function(){
        $('.krth-location-<?php echo esc_js($e_uniqid); ?> .nav-tabs > .active').prev('li').find('.each-item-wrapper').trigger('click');
      });
      $('.krth-location-<?php echo esc_js($e_uniqid); ?>.our-locations [data-toggle="tab"]').on('shown.bs.tab', function(e){
        var currentTab = $(e.target).find('.krth-location-name').text(); // get current tab
        $(".krth-location-<?php echo esc_js($e_uniqid); ?> .location-title").html(currentTab);
      });

    });
    </script>
    <?php

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'krth_map_tabs', 'krth_map_tabs_function' );

/* Map Tab */
if ( !function_exists('krth_map_tab_function')) {
  function krth_map_tab_function( $atts, $content = true ) {

    extract(shortcode_atts(array(), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Output
    return do_shortcode($content);

  }
}
add_shortcode( 'krth_map_tab', 'krth_map_tab_function' );