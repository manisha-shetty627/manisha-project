<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'kroth_vt_scripts_styles' ) ) {
  function kroth_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'kroth-font-awesome', KROTH_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'kroth-bootstrap-css', KROTH_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'kroth-simple-line-icons', KROTH_CSS .'/simple-line-icons.css', array(), '2.3.2', 'all' );
    wp_enqueue_style( 'kroth-own-carousel', KROTH_CSS .'/owl.carousel.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'kroth-meanmenu-styles', KROTH_CSS . '/meanmenu.min.css', array(), KROTH_VERSION, 'all' );
    wp_enqueue_style( 'kroth-style', KROTH_CSS .'/styles.css', array(), KROTH_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'kroth-bootstrap-js', KROTH_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
    wp_enqueue_script( 'kroth-plugins', KROTH_SCRIPTS . '/plugins.js', array( 'jquery' ), KROTH_VERSION, true );
    wp_enqueue_script( 'kroth-scripts', KROTH_SCRIPTS . '/scripts.js', array( 'jquery' ), KROTH_VERSION, true );

    // Comments
    wp_enqueue_script( 'kroth-validate-js', KROTH_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'kroth-validate-js', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // WooCommerce
    if (class_exists( 'WooCommerce' )){
      wp_enqueue_style( 'kroth-woocommerce-layout', KROTH_THEMEROOT_URI . '/inc/plugins/woocommerce/woocommerce-layout.css', null, 1.0, 'all' );
      wp_enqueue_style( 'kroth-woocommerce', KROTH_THEMEROOT_URI . '/inc/plugins/woocommerce/woocommerce.css', null, 1.0, 'all' );
    }

    // Responsive Active
    $kroth_viewport = cs_get_option('theme_responsive');
    if($kroth_viewport == 'on') {
      wp_enqueue_style( 'kroth-responsive', KROTH_CSS .'/responsive.css', array(), KROTH_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'kroth_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'kroth_vt_admin_scripts_styles' ) ) {
  function kroth_vt_admin_scripts_styles() {

    wp_enqueue_style( 'kroth-admin-main', KROTH_CSS . '/admin-styles.css', true );
    wp_enqueue_style( 'kroth-simple-line-icons', KROTH_CSS . '/simple-line-icons.css', true );
    wp_enqueue_script( 'kroth-admin-scripts', KROTH_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'kroth_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'kroth_vt_wp_enqueue_styles' ) ) {
  function kroth_vt_wp_enqueue_styles() {
    kroth_vt_google_fonts();
    add_action( 'wp_head', 'kroth_vt_custom_css', 99 );
  }
  add_action( 'wp_enqueue_scripts', 'kroth_vt_wp_enqueue_styles' );
}
