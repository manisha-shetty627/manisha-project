<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'kroth_dynamic_styles' ) ) {
  function kroth_dynamic_styles() {

    // Typography
    $kroth_vt_get_typography  = kroth_vt_get_typography();

    $all_element_color  = cs_get_customize_option( 'all_element_colors' );

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

    // Layout
    $bg_type = cs_get_option('theme_layout_bg_type');
    $bg_pattern = cs_get_option('theme_layout_bg_pattern');
    $bg_image = cs_get_option('theme_layout_bg');
    $bg_overlay_color = cs_get_option('theme_bg_overlay_color');

    // Footer
    $footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
    $footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
    $footer_text_color  = cs_get_customize_option( 'footer_text_color' );
    $footer_link_color  = cs_get_customize_option( 'footer_link_color' );
    $footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );

  ob_start();

global $post;
$kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );

/* Layout - Theme Options - Background */
if ($bg_type === 'bg-image') {

  $layout_boxed = ( ! empty( $bg_image['image'] ) ) ? 'background-image: url('. $bg_image['image'] .');' : '';
  $layout_boxed .= ( ! empty( $bg_image['repeat'] ) ) ? 'background-repeat: '. $bg_image['repeat'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['position'] ) ) ? 'background-position: '. $bg_image['position'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['attachment'] ) ) ? 'background-attachment: '. $bg_image['attachment'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['size'] ) ) ? 'background-size: '. $bg_image['size'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['color'] ) ) ? 'background-color: '. $bg_image['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}
if ($bg_type === 'bg-pattern') {
$custom_bg_pattern = cs_get_option('custom_bg_pattern');
$layout_boxed = ( $bg_pattern === 'custom-pattern' ) ? 'background-image: url('. $custom_bg_pattern .');' : 'background-image: url('. KROTH_IMAGES . '/patterns/'. $bg_pattern .'.png);';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}

/* Top Bar - Customizer - Background */
$topbar_bg_color  = cs_get_customize_option( 'topbar_bg_color' );
if ($topbar_bg_color) {
echo <<<CSS
  .no-class {}
  .krth-topbar {
    background-color: {$topbar_bg_color};
  }
CSS;
}
if ($kroth_meta) {
  $topbar_border_color  = $kroth_meta['topbar_border'];
} else {
  $topbar_border_color  = cs_get_customize_option( 'topbar_border_color' );
}
$topbar_border_color = ( $topbar_border_color ) ? $kroth_meta['topbar_border'] : cs_get_customize_option( 'topbar_border_color' );
if ($topbar_border_color) {
echo <<<CSS
  .no-class {}
  .krth-topbar-right .krth-tr-element,
  .krth-topbar-left .krth-tr-element {
    border-color: {$topbar_border_color};
  }
CSS;
}
$topbar_text_color  = cs_get_customize_option( 'topbar_text_color' );
if ($topbar_text_color) {
echo <<<CSS
  .no-class {}
  .krth-topbar-left, .krth-top-active, .krth-top-active i {
    color: {$topbar_text_color};
  }
CSS;
}
$topbar_link_color  = cs_get_customize_option( 'topbar_link_color' );
if ($topbar_link_color) {
echo <<<CSS
  .no-class {}
  .krth-topbar a, .krth-top-active, .krth-top-active i {
    color: {$topbar_link_color};
  }
CSS;
}
$topbar_link_hover_color  = cs_get_customize_option( 'topbar_link_hover_color' );
if ($topbar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .krth-topbar a:hover, .krth-top-active:hover, .krth-top-active:focus, .krth-top-active:hover i, .krth-top-active:focus i {
    color: {$topbar_link_hover_color};
  }
CSS;
}
$topbar_social_color  = cs_get_customize_option( 'topbar_social_color' );
if ($topbar_social_color) {
echo <<<CSS
  .no-class {}
  .krth-tr-element .krth-social a {
    color: {$topbar_social_color};
  }
CSS;
}
$topbar_social_hover_color  = cs_get_customize_option( 'topbar_social_hover_color' );
if ($topbar_social_hover_color) {
echo <<<CSS
  .no-class {}
  .krth-tr-element .krth-social a:hover {
    color: {$topbar_social_hover_color};
  }
CSS;
}

/* Header - Customizer */
$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .krth-header-two .krth-brand,
  .krth-navigation,
  .mean-container .mean-bar,
  .mean-container .mean-nav {
    background-color: {$header_bg_color};
  }
CSS;
}
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  .krth-header-two .krth-navigation .navbar-nav > li > a,
  .krth-navigation .navbar-nav > li > a,
  .krth-header-two #search-trigger-two i,
  .krth-header-two #cart-trigger i,
  .mean-container .mean-nav ul li a,
  .mean-container #search-trigger i,
  .mean-container #search-trigger-two i,
  .krth-header-two .mean-container #search-trigger-two i,
  .krth-header-two .mean-container #cart-trigger i,
  .krth-header-two .is-sticky .krth-navigation .navbar-nav > li > a,
  .krth-navigation .is-sticky .navbar-nav > li > a,
  .krth-header-two .is-sticky #search-trigger-two i,
  .krth-header-two .is-sticky #cart-trigger i {
    color: {$header_link_color};
  }
  .mean-container a.meanmenu-reveal span {
    background-color: {$header_link_color};
  }
  .krth-header-two .krth-navigation .navbar-nav > li > a:hover,
  .krth-navigation .navbar-nav > li > a:hover,
  .krth-navigation .navbar-nav > li.current_page_item > a,
  .krth-navigation .navbar-nav > li.current-menu-parent > a,
  .mean-container .mean-nav ul li a:hover,
  .krth-header-two .is-sticky .krth-navigation .navbar-nav > li > a:hover,
  .is-sticky .krth-navigation .navbar-nav > li > a:hover,
  .is-sticky .krth-navigation .navbar-nav > li.current_page_item > a,
  .is-sticky .krth-navigation .navbar-nav > li.current-menu-parent > a {
    color: {$header_link_hover_color};
  }
CSS;
}
// Metabox - Header Transparent
if ($kroth_meta) {
  $transparent_header = $kroth_meta['transparency_header'];
  $transparent_menu_color = $kroth_meta['transparent_menu_color'];
  $transparent_menu_hover = $kroth_meta['transparent_menu_hover_color'];
} else {
  $transparent_header = '';
  $transparent_menu_color = '';
  $transparent_menu_hover = '';
}
if ($transparent_header) {
echo <<<CSS
  .no-class {}
  .krth-header-two .krth-navigation .navbar-nav > li > a,
  .krth-navigation .navbar-nav > li > a,
  .krth-header-two #search-trigger-two i,
  .krth-header-two #cart-trigger i{
    color: {$transparent_menu_color};
  }

  .krth-header-two .krth-navigation .navbar-nav > li > a:hover,
  .krth-navigation .navbar-nav > li > a:hover,
  .krth-navigation .navbar-nav > li.current_page_item > a,
  .krth-navigation .navbar-nav > li.current-menu-parent > a{
    color: {$transparent_menu_hover};
  }
CSS;
}

$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_bg_hover_color  = cs_get_customize_option( 'submenu_bg_hover_color' );
$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_bg_color || $submenu_bg_hover_color || $submenu_border_color || $submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .dropdown-menu > li > a {
    border-color: {$submenu_border_color};
    color: {$submenu_link_color};
  }
  .dropdown-menu > li > a:focus,
  .dropdown-menu > li > a:hover,
  .dropdown-menu > .active > a,
  .dropdown-menu > .active > a:focus,
  .dropdown-menu > .active > a:hover,
  .mean-container .mean-nav ul.sub-menu > li:hover,
  .mean-container .mean-nav ul.sub-menu > li.current-menu-item,
  .mean-container .mean-nav ul.sub-menu > li a:hover {
    background-color: {$submenu_bg_hover_color};
    color: {$submenu_link_hover_color};
  }
  .dropdown-menu,
  .mean-container .mean-nav ul.sub-menu li a {
    background-color: {$submenu_bg_color};
  }
  .mean-container .mean-nav ul.sub-menu li a {
    color: {$submenu_link_color};
  }
  .mean-container .mean-nav ul li li a,
  .mean-container .mean-nav ul li li li a,
  .mean-container .mean-nav ul li li li li a,
  .mean-container .mean-nav ul li li li li li a {
    border-top-color: {$submenu_border_color};
  }
CSS;
}

/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
if ($titlebar_bg) {

  $title_area = ( ! empty( $titlebar_bg['image'] ) ) ? 'background-image: url('. $titlebar_bg['image'] .');' : '';
  $title_area .= ( ! empty( $titlebar_bg['repeat'] ) ) ? 'background-repeat: '. $titlebar_bg['repeat'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['position'] ) ) ? 'background-position: '. $titlebar_bg['position'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['attachment'] ) ) ? 'background-attachment: '. $titlebar_bg['attachment'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['size'] ) ) ? 'background-size: '. $titlebar_bg['size'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['color'] ) ) ? 'background-color: '. $titlebar_bg['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .krth-title-area {
    {$title_area}
  }
CSS;
}
if ($title_heading_color) {
echo <<<CSS
  .no-class {}
  .krth-title-area .page-title {
    color: {$title_heading_color};
  }
CSS;
}

// Breadcrubms
$breadcrumbs_text_color  = cs_get_customize_option( 'breadcrumbs_text_color' );
$breadcrumbs_link_color  = cs_get_customize_option( 'breadcrumbs_link_color' );
$breadcrumbs_link_hover_color  = cs_get_customize_option( 'breadcrumbs_link_hover_color' );
$breadcrumbs_bg_color  = cs_get_customize_option( 'breadcrumbs_bg_color' );
if ($breadcrumbs_text_color) {
echo <<<CSS
  .no-class {}
  .krth-breadcrumbs ul {
    color: {$breadcrumbs_text_color};
  }
CSS;
}
if ($breadcrumbs_link_color) {
echo <<<CSS
  .no-class {}
  .krth-breadcrumbs a {
    color: {$breadcrumbs_link_color};
  }
CSS;
}
if ($breadcrumbs_link_hover_color) {
echo <<<CSS
  .no-class {}
  .krth-breadcrumbs a:hover {
    color: {$breadcrumbs_link_hover_color};
  }
CSS;
}
if ($breadcrumbs_bg_color) {
echo <<<CSS
  .no-class {}
  .krth-breadcrumbs {
    background-color: {$breadcrumbs_bg_color};
  }
CSS;
}

/* Footer */
if ($footer_bg_color) {
echo <<<CSS
  .no-class {}
  footer {background: {$footer_bg_color};}
CSS;
}
if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  footer .krth-widget .widget-title {color: {$footer_heading_color};}
CSS;
}
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  footer .footer-widget-area,
  footer .krth-widget p,
  footer .krth-recent-blog .widget-bdate {color: {$footer_text_color};}
CSS;
}
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  footer a,
  footer .widget_list_style ul a,
  footer .widget_categories ul a,
  footer .widget_archive ul a,
  footer .widget_archive ul li,
  footer .widget_recent_comments ul a,
  footer .widget_recent_entries ul a,
  footer .widget_meta ul a,
  footer .widget_pages ul a,
  footer .widget_rss ul a,
  footer .widget_nav_menu ul a,
  footer .krth-recent-blog .widget-btitle {color: {$footer_link_color};}
CSS;
}
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  footer a:hover,
  footer .widget_list_style ul a:hover,
  footer .widget_categories ul a:hover,
  footer .widget_archive ul a:hover,
  footer .widget_archive ul li,
  footer .widget_recent_comments ul a:hover,
  footer .widget_recent_entries ul a:hover,
  footer .widget_meta ul a:hover,
  footer .widget_pages ul a:hover,
  footer .widget_rss ul a:hover,
  footer .widget_nav_menu ul a:hover,
  footer .krth-recent-blog .widget-btitle:hover {color: {$footer_link_hover_color};}
CSS;
}

/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
$copyright_border_color  = cs_get_customize_option( 'copyright_border_color' );
if ($copyright_bg_color || $copyright_border_color) {
echo <<<CSS
  .no-class {}
  .krth-copyright {background: {$copyright_bg_color};border-color: {$copyright_border_color};}
CSS;
}
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .krth-copyright,
  .krth-copyright p {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .krth-copyright a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .krth-copyright a:hover {color: {$copyright_link_hover_color};}
CSS;
}

/* Primary Colors */
if ($all_element_color) {
echo <<<CSS
  .no-class {}
  .blockquote-two:before,
  input[type="submit"],
  .wpcf7 input[type="submit"],
  .krth-header-two #cart-trigger > span,
  .btn-secondary,
  .bpw-style-one .bpw-content .bpw-btn,
  .bpw-col-5.bpw-normal-size.bpw-style-one .bpw-content .bpw-btn,
  .bpw-style-two .krth-portfolio-item:hover .bpw-content,
  .bpw-filter li .btn-active:after,
  .krth-panel-one .panel-default > .panel-heading.accordion-active a:before,
  .nav-tabs > li.active > a:after,
  .krth-education li:before,
  .list-one li:before,
  .krth-blog-one .bp-top-meta > div:after,
  .wp-pagenavi span.current,
  .wp-pagenavi a:hover,
  .wp-link-pages span:hover,
  .wp-link-pages > span,
  .bcc-content .bcc-btn:after,
  .krth-sidenav li a:hover:before,
  .krth-sidenav li.current-menu-item a:before,
  .krth-sidenav li.current-menu-parent > a:before,
  .krth-sidenav > li.krth-active:before,
  .krth-download-btn,
  .widget_list_style ul li:before,
  .widget_categories ul li:before,
  .widget_archive ul li:before,
  .widget_recent_comments ul li:before,
  .widget_recent_entries ul li:before,
  .widget_meta ul li:before,
  .widget_pages ul li:before,
  .widget_rss ul li:before,
  .widget_nav_menu ul li:before,
  .widget_layered_nav ul li:before,
  .widget_product_categories ul li:before,
  footer .widget_list_style ul li:hover:before,
  footer .widget_categories ul li:hover:before,
  footer .widget_archive ul li:hover:before,
  footer .widget_recent_comments ul li:hover:before,
  footer .widget_recent_entries ul li:hover:before,
  footer .widget_meta ul li:hover:before,
  footer .widget_pages ul li:hover:before,
  footer .widget_rss ul li:hover:before,
  footer .widget_nav_menu ul li:hover:before,
  footer .widget_nav_menu ul li.krth-active:before,
  .krth-widget .mc4wp-form input[type="submit"],
  p.demo_store,
  .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:after,
  span.onsale,
  .woocommerce #respond input#submit.alt,
  .woocommerce a.button.alt,
  .woocommerce button.button.alt,
  .woocommerce input.button.alt,
  .woocommerce #respond input#submit.alt.disabled,
  .woocommerce #respond input#submit.alt.disabled:hover,
  .woocommerce #respond input#submit.alt:disabled,
  .woocommerce #respond input#submit.alt:disabled:hover,
  .woocommerce #respond input#submit.alt:disabled[disabled],
  .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
  .woocommerce a.button.alt.disabled,
  .woocommerce a.button.alt.disabled:hover,
  .woocommerce a.button.alt:disabled,
  .woocommerce a.button.alt:disabled:hover,
  .woocommerce a.button.alt:disabled[disabled],
  .woocommerce a.button.alt:disabled[disabled]:hover,
  .woocommerce button.button.alt.disabled,
  .woocommerce button.button.alt.disabled:hover,
  .woocommerce button.button.alt:disabled,
  .woocommerce button.button.alt:disabled:hover,
  .woocommerce button.button.alt:disabled[disabled],
  .woocommerce button.button.alt:disabled[disabled]:hover,
  .woocommerce input.button.alt.disabled,
  .woocommerce input.button.alt.disabled:hover,
  .woocommerce input.button.alt:disabled,
  .woocommerce input.button.alt:disabled:hover,
  .woocommerce input.button.alt:disabled[disabled],
  .woocommerce input.button.alt:disabled[disabled]:hover,
  .woocommerce-account .woocommerce form .form-row input.button,
  .woocommerce-checkout form > .form-row input.button,
  .woocommerce #respond input#submit.alt:hover,
  .woocommerce a.button.alt:hover,
  .woocommerce button.button.alt:hover,
  .woocommerce input.button.alt:hover,
  span.onsale,
  .woocommerce span.onsale,
  .krth-cta-fullwidth {background-color: {$all_element_color};}

  .krth-service-two .service-icon,
  .krth-service-three .service-icon,
  .krth-service-four .service-icon,
  .krth-service-five .service-icon,
  .krth-panel-two .panel-heading:after,
  .krth-panel-three .panel-title:hover strong,
  .krth-list-icon i,
  .comment-reply-title > a,
  .woocommerce .star-rating span,
  .woocommerce p.stars a,
  .woocommerce .woocommerce-message:before,
  .woocommerce div.product .stock,
  #add_payment_method .cart-collaterals .cart_totals .discount td,
  .woocommerce-cart .cart-collaterals .cart_totals .discount td,
  .woocommerce-checkout .cart-collaterals .cart_totals .discount td,
  .primary-color {color: {$all_element_color};}

  .bpw-style-two .krth-portfolio-item:hover .bpw-content,
  .history-first-section:after,
  .wp-pagenavi span.current,
  .wp-pagenavi a:hover,
  .wp-link-pages span:hover,
  .wp-link-pages > span {border-color: {$all_element_color};}

  .krth-panel-one .panel-default > .panel-heading.accordion-active a:after,
  .woocommerce .woocommerce-message {border-top-color: {$all_element_color};}
CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  body {color: {$body_color};}
CSS;
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  body a,
  .krth-blog-one .bp-top-meta > div a,
  .widget_list_style ul a,
  .widget_categories ul a,
  .widget_archive ul a,
  .widget_recent_comments ul a,
  .widget_recent_entries ul a,
  .widget_meta ul a,
  .widget_pages ul a,
  .widget_rss ul a,
  .widget_nav_menu ul a,
  .widget_layered_nav ul a,
  .widget_product_categories ul a,
  .woocommerce ul.product_list_widget a {color: {$body_links_color};}
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  body a:hover,
  .krth-blog-one .bp-top-meta > div a:hover,
  .widget_list_style ul a:hover,
  .widget_categories ul a:hover,
  .widget_archive ul a:hover,
  .widget_recent_comments ul a:hover,
  .widget_recent_entries ul a:hover,
  .widget_meta ul a:hover,
  .widget_pages ul a:hover,
  .widget_rss ul a:hover,
  .widget_nav_menu ul a:hover,
  .widget_layered_nav ul a:hover,
  .widget_product_categories ul a:hover,
  .woocommerce ul.product_list_widget a:hover {color: {$body_link_hover_color};}
CSS;
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .krth-widget p,
  .widget_rss .rssSummary {color: {$sidebar_content_color};}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  .vt-maintenance-mode {
    {$maintenance_css}
  }
CSS;
}

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '767';

echo <<<CSS
  .no-class {}
@media (max-width: {$breakpoint}px) {
  .krth-brand {background-color: #fff !important;}
  .navigation-bar,
  .top-nav-icons,
  .krth-nav-search {display: none;}
  .mean-container .top-nav-icons,
  .mean-container .krth-logo,
  .mean-container .krth-nav-search {display: block;}
  .hav-mobile-logo .transparent-logo,
  .hav-mobile-logo .sticky-logo,
  .header-transparent .krth-logo.hav-mobile-logo.hav-transparent-logo .transparent-retina-logo,
  .header-transparent .is-sticky .krth-logo.hav-mobile-logo.hav-transparent-logo .retina-logo.sticky-logo,
  .krth-logo.hav-mobile-logo img.retina-logo,
  .dont-transparent .krth-logo.hav-transparent-logo.hav-mobile-logo .retina-logo,
  .header-transparent .krth-logo.hav-transparent-logo .transparent-retina-logo,
  .header-transparent .hav-mobile-logo .retina-logo.sticky-logo {display: none;}
  .krth-logo.hav-mobile-logo img.mobile-logo,
  .header-transparent .krth-logo.hav-transparent-logo .retina-logo {display: block;}
  .mean-container .container {width: 100%;}
  .krth-header-two .mean-container .krth-logo {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99999;
    padding: 0 20px;
  }
  .krth-header-two .mean-container .krth-navigation {
    position: absolute;
    right: 73px;
    top: 0;
    z-index: 9999;
  }
  .mean-container .krth-nav-search {
    float: left;
    left: 0;right: auto;
    background-color: rgba(0,0,0,0.4);
  }
  .mean-container .krth-search-three {
    position: absolute;
    width: 100%;
    left: 0;top: 0;
    z-index: 9999;
  }
  .mean-container .krth-search-three input {
    position: absolute;
    left: 0;top: 0;
    background: rgba(0,0,0,0.4);
  }
  .krth-header-two .mean-container .top-nav-icons {
    position: absolute;
    left: 0;
    z-index: 999999;
  }
  .krth-header-two .krth-brand {padding-top: 20px;padding-bottom: 0;}
}
CSS;

  echo $kroth_vt_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'kroth_custom_font_load' ) ) {
  function kroth_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. $font['ttf'] .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. $font['eot'] .');' : '';
        echo ( ! empty( $font['svg']  ) ) ? 'src: url('. $font['svg'] .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. $font['woff'] .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. $font['otf'] .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'kroth_vt_custom_css' ) ) {
  function kroth_vt_custom_css() {
    wp_enqueue_style('kroth-default-style', get_template_directory_uri() . '/style.css');
    $output  = kroth_custom_font_load();
    $output .= kroth_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = kroth_compress_css_lines( $output );

    wp_add_inline_style( 'kroth-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'kroth_vt_custom_js' ) ) {
  function kroth_vt_custom_js() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
      wp_enqueue_script( 'jquery' );
    }
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'kroth_vt_custom_js' );
}