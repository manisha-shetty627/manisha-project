<?php
/*
Plugin Name: Kroth Core
Plugin URI: https://victorthemes.com/themes/kroth
Description: Plugin to contain shortcodes and custom post types of the Kroth theme.
Author: VictorThemes
Author URI: https://victorthemes.com/
Version: 1.9.3
Text Domain: kroth-core
*/

if( ! function_exists( 'kroth_block_direct_access' ) ) {
	function kroth_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'KROTH_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'KROTH_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'KROTH_PLUGIN_ASTS', KROTH_PLUGIN_URL . 'assets' );
define( 'KROTH_PLUGIN_IMGS', KROTH_PLUGIN_ASTS . '/images' );
define( 'KROTH_PLUGIN_INC', KROTH_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Kroth Shortcode Path
define( 'KROTH_SHORTCODE_BASE_PATH', KROTH_PLUGIN_PATH . 'visual-composer/' );
define( 'KROTH_SHORTCODE_PATH', KROTH_SHORTCODE_BASE_PATH . 'shortcodes/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function kroth_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'Kroth');

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('kroth-core/kroth-core.php')) {

	// Custom Post Type
	require_once( KROTH_PLUGIN_INC . '/custom-post-type.php' );

  /* One Click Install */
  require_once( KROTH_PLUGIN_INC . '/import/init.php' );

  // Shortcodes
  require_once( KROTH_SHORTCODE_BASE_PATH . '/vc-setup.php' );
  if (is_plugin_active('js_composer/js_composer.php')) {
    require_once( KROTH_SHORTCODE_BASE_PATH . '/lib/lib.php' );
  }
  require_once( KROTH_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( KROTH_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Widgets
  require_once( KROTH_PLUGIN_INC . '/widgets/get-quote-widget.php' );
  require_once( KROTH_PLUGIN_INC . '/widgets/nav-widget.php' );
  require_once( KROTH_PLUGIN_INC . '/widgets/recent-posts.php' );
  require_once( KROTH_PLUGIN_INC . '/widgets/testimonial-widget.php' );
  require_once( KROTH_PLUGIN_INC . '/widgets/text-widget.php' );
  require_once( KROTH_PLUGIN_INC . '/widgets/widget-extra-fields.php' );

}

/**
 * Plugin language
 */
function kroth_plugin_language_setup() {
  load_plugin_textdomain( 'kroth-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'kroth_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'kroth_set_wpautop' ) ) {
  function kroth_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Add Extra Social Fields in Admin User Profile */
function kroth_add_twitter_facebook( $contactmethods ) {
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['linkedin']   = 'Linkedin';
  return $contactmethods;
}
add_filter('user_contactmethods','kroth_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/**
 * Get attachment ID by Image URL
 */
if ( ! function_exists( 'kroth_get_attachment_id' ) ) {
  function kroth_get_attachment_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    return $attachment[0];
  }
}