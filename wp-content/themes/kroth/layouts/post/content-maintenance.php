<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$kroth_viewport = cs_get_option('theme_responsive');
if($kroth_viewport == 'on') { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } else { }

// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(KROTH_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$kroth_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($kroth_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($kroth_all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
wp_head();

// Metabox
$kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );

if ($kroth_meta) {
  $kroth_content_padding = $kroth_meta['content_spacings'];
} else { $kroth_content_padding = ''; }
// Padding - Metabox
if ($kroth_content_padding && $kroth_content_padding !== 'padding-none') {
  $kroth_content_top_spacings = $kroth_meta['content_top_spacings'];
  $kroth_content_bottom_spacings = $kroth_meta['content_bottom_spacings'];
  if ($kroth_content_padding === 'padding-custom') {
    $kroth_content_top_spacings = $kroth_content_top_spacings ? 'padding-top:'. kroth_check_px($kroth_content_top_spacings) .';' : '';
    $kroth_content_bottom_spacings = $kroth_content_bottom_spacings ? 'padding-bottom:'. kroth_check_px($kroth_content_bottom_spacings) .';' : '';
    $kroth_custom_padding = $kroth_content_top_spacings . $kroth_content_bottom_spacings;
  } else {
    $kroth_custom_padding = '';
  }
} else {
  $kroth_custom_padding = '';
}
?>
</head>

	<body <?php body_class(); ?>>
    <div class="vt-maintenance-mode">
      <div class="container <?php echo esc_attr($kroth_content_padding); ?> krth-content-area" style="<?php echo esc_attr($kroth_custom_padding); ?>">
     	<div class="row">
        <?php
          $kroth_page = get_post( cs_get_option('maintenance_mode_page') );
          WPBMap::addAllMappedShortcodes();
          echo ( is_object( $kroth_page ) ) ? do_shortcode( $kroth_page->post_content ) : '';
        ?>
      </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>