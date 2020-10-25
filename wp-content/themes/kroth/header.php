<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
?><!DOCTYPE html>
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
// Metabox
global $post;
$kroth_id    = ( isset( $post ) ) ? $post->ID : false;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $kroth_id : false;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );

// Parallax
$kroth_bg_parallax = cs_get_option('theme_bg_parallax');
$kroth_hav_parallax = $kroth_bg_parallax ? ' parallax-window' : '';
$kroth_parallax_speed = cs_get_option('theme_bg_parallax_speed');
$kroth_bg_parallax_speed = $kroth_parallax_speed ? $kroth_parallax_speed : '0.4';

// Theme Layout Width
$kroth_bg_overlay_color  = cs_get_option( 'theme_bg_overlay_color' );
$kroth_layout_width  = cs_get_option( 'theme_layout_width' );
$kroth_layout_width_class = ($kroth_layout_width === 'container') ? 'layout-boxed'. $kroth_hav_parallax : 'layout-full';

// Header Style
if ($kroth_meta) {
  $kroth_header_design  = $kroth_meta['select_header_design'];
  $kroth_sticky_header  = $kroth_meta['sticky_header'];
  $kroth_search_icon    = $kroth_meta['search_icon'];
} else {
  $kroth_header_design  = cs_get_option('select_header_design');
  $kroth_sticky_header  = cs_get_option('sticky_header');
  $kroth_search_icon    = cs_get_option('search_icon');
}
if ($kroth_header_design === 'default') {
  $kroth_header_design_actual  = cs_get_option('select_header_design');
} else {
  $kroth_header_design_actual = ( $kroth_header_design ) ? $kroth_header_design : cs_get_option('select_header_design');
}
if ($kroth_meta && $kroth_header_design !== 'default') {
  $kroth_sticky_header  = $kroth_meta['sticky_header'];
  $kroth_search_icon    = $kroth_meta['search_icon'];
} else {
  $kroth_sticky_header  = cs_get_option('sticky_header');
  $kroth_search_icon    = cs_get_option('search_icon');
}
if ($kroth_header_design_actual === 'style_two') {
  $kroth_header_class = 'krth-header-two ';
  $kroth_sticky_header_class = $kroth_sticky_header ? ' krth-sticky' : '';
} else {
  $kroth_sticky_header_class = '';
  $kroth_header_class = 'krth-header-one ';
}

// Header Transparent
if ($kroth_meta) {
  $kroth_transparent_header = $kroth_meta['transparency_header'];
  $kroth_transparent_header = $kroth_transparent_header ? ' header-transparent' : ' dont-transparent';
  // Shortcode Banner Type
  $kroth_banner_type = ' '. $kroth_meta['banner_type'];
  $actual_banner_type = $kroth_meta['banner_type'];
} else { $kroth_transparent_header = ' dont-transparent'; $kroth_banner_type = '';$actual_banner_type = ''; }

wp_head();
?>
</head>
<body <?php echo body_class(); ?>>
<?php
if ($kroth_bg_parallax) { ?>
  <div class="<?php echo esc_attr($kroth_layout_width_class); ?>" data-stellar-background-ratio="<?php echo esc_attr($kroth_bg_parallax_speed); ?>">
<?php } else {?>
  <div class="<?php echo esc_attr($kroth_layout_width_class); ?>">
<?php } ?>

<?php if($kroth_bg_overlay_color) { ?>
<div class="layout-overlay" style="background-color: <?php echo esc_attr($kroth_bg_overlay_color); ?>;"></div>
<?php } ?>

<div id="vtheme-wrapper"> <!-- #vtheme-wrapper -->

  <!-- Header -->
  <header class="<?php echo esc_attr($kroth_header_class . $kroth_transparent_header . $kroth_banner_type); ?>">

  <?php if ($kroth_header_design_actual === 'style_two') {
    if($kroth_search_icon) { ?>
    <!-- Search Bar - Trigger -->
    <div class="krth-search-two">
      <div class="container">
      <div class="row">
      <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
          <input type="text" name="s" id="s" placeholder="<?php esc_html_e('Search Here...','kroth'); ?>" />
        </form>
        <span class="krth-search-close"></span>
      </div>
      </div>
    </div>
    <!-- Search Bar - Trigger -->
  <?php } }

  // Topbar
  get_template_part( 'layouts/header/top', 'bar' );

  if ($kroth_meta) {
    $kroth_hide_header = $kroth_meta['hide_header'];
  } else { $kroth_hide_header = ''; }

  // Header Style
  if ($kroth_meta && $kroth_header_design !== 'default') {
    $kroth_address_info  = $kroth_meta['header_address_info'];
  } else {
    $kroth_address_info  = cs_get_option('header_address_info');
  }

  if (!$kroth_hide_header) { // Hide Header - Metabox
    ?>

    <!-- Brand & Info -->
    <div class="krth-brand <?php echo esc_attr($kroth_sticky_header_class); ?>">
      <div class="container">
      <div class="row">

        <?php
          // Brand Logo
          get_template_part( 'layouts/header/logo' );
          if ($kroth_header_design_actual !== 'style_two') {
            echo '<div class="header-brand-info">';
            echo do_shortcode($kroth_address_info);
            echo '</div>';
          } else {
            get_template_part( 'layouts/header/menu', 'bar' );
          }
        ?>

      </div> <!-- Row -->
      </div> <!-- Container -->
    </div> <!-- Brand Info -->

    <?php
      // Navigation
      if ($kroth_header_design_actual !== 'style_two') {
        get_template_part( 'layouts/header/menu', 'bar' );
      } else {}

    } // Hide Header - Metabox
    ?>

  </header>

  <?php
  // Title Area
  $kroth_need_title_bar = cs_get_option('need_title_bar');
  if (isset($kroth_need_title_bar)) {
    get_template_part( 'layouts/header/title', 'bar' );
  }
  if(($kroth_meta && $actual_banner_type === 'revolution-slider') && !isset($kroth_need_title_bar)) { // Hide Title Area
    echo do_shortcode($kroth_meta['page_revslider']);
  }

  // Breadcrumbs
  $kroth_need_breadcrumbs = cs_get_option('need_breadcrumbs');
  if (isset($kroth_need_breadcrumbs)) {
    get_template_part( 'layouts/header/breadcrumbs', 'bar' );
  }