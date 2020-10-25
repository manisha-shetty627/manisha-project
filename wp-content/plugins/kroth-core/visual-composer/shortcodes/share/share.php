<?php
/* ==========================================================
    Share
=========================================================== */
if ( !function_exists('krth_share_function')) {
  function krth_share_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'share_alignment'  => '',
      'share_text'  => '',
      'share_on_text'  => '',
      'class'  => '',
      // Enable & Disable
      'share_twitter'  => '',
      'share_facebook'  => '',
      'share_linkedin'  => '',
      // Colors
      'share_text_color'  => '',
      'share_on_text_color'  => '',
      'icon_color'  => '',
      'icon_bg_color'  => '',
      'icon_border_color'  => '',
      // Style - Size
      'share_text_size'  => '',
      'share_on_text_size'  => '',
    ), $atts));

    // Alignment & Texts
    $share_alignment = ( $share_alignment ) ? ' '. $share_alignment : ' pull-left';
    $share_text = ( $share_text ) ? $share_text : __('Share:', 'kroth-core');
    $share_on_text = ( $share_on_text ) ? $share_on_text : __('Share On', 'kroth-core');
    $class = ( $class ) ? ' '. $class : '';

    // Share get details - dynamic thing
    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;

    // Enable & Disable
    $share_twitter = ( $share_twitter ) ? '<li><a href="//twitter.com/intent/tweet?text='. urlencode($title) .'&url='. urlencode($page_url) .'" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="'. $share_on_text .' '.esc_attr('Twitter', 'kroth').'" target="_blank"><i class="fa fa-twitter"></i></a></li>' : '';
    $share_facebook = ( $share_facebook ) ? '<li><a href="http://www.facebook.com/sharer/sharer.php?u='. urlencode($page_url) .'&amp;t='. urlencode($title) .'" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="'. $share_on_text .' Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>' : '';
    $share_linkedin = ( $share_linkedin ) ? '<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. urlencode($page_url) .'&amp;title='. urlencode($title) .'" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="'. $share_on_text .' Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>' : '';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Icon Style
    if ( $icon_border_color ) {
      $inline_style .= '.krth-share-'. $e_uniqid .'.bp-share > ul {';
      $inline_style .= ( $icon_border_color ) ? 'border-color:'. $icon_border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_border_color || $icon_color || $icon_bg_color ) {
      $inline_style .= '.krth-share-'. $e_uniqid .'.bp-share li a {';
      $inline_style .= ( $icon_border_color ) ? 'border-right-color:'. $icon_border_color .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_bg_color ) ? 'background-color:'. $icon_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $share_text_color || $share_text_size ) {
      $inline_style .= '.krth-share-'. $e_uniqid .'.bp-share > p {';
      $inline_style .= ( $share_text_color ) ? 'color:'. $share_text_color .';' : '';
      $inline_style .= ( $share_text_size ) ? 'font-size:'. kroth_core_check_px($share_text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $share_on_text_color || $share_on_text_size ) {
      $inline_style .= '.krth-share-'. $e_uniqid .'.bp-share .tooltip-inner {';
      $inline_style .= ( $share_on_text_color ) ? 'color:'. $share_on_text_color .';' : '';
      $inline_style .= ( $share_on_text_size ) ? 'font-size:'. kroth_core_check_px($share_on_text_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-share-'. $e_uniqid;

    // Starts
    $output = '<div class="bp-share bp-share-own-shortcode'. $styled_class . $share_alignment . $class .'"><p>'. $share_text .'</p><ul>'. $share_twitter . $share_facebook . $share_linkedin .'</ul></div>';

    return $output;

  }
}
add_shortcode( 'krth_share', 'krth_share_function' );
