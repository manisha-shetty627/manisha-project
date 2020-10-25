<?php
/*
 * Kroth Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/**
 * Define - Folder Paths
 */
define( 'KROTH_THEMEROOT_PATH', get_template_directory() );
define( 'KROTH_THEMEROOT_URI', get_template_directory_uri() );
define( 'KROTH_CSS', KROTH_THEMEROOT_URI . '/assets/css' );
define( 'KROTH_IMAGES', KROTH_THEMEROOT_URI . '/assets/images' );
define( 'KROTH_SCRIPTS', KROTH_THEMEROOT_URI . '/assets/js' );
define( 'KROTH_FRAMEWORK', get_template_directory() . '/inc' );
define( 'KROTH_LAYOUT', get_template_directory() . '/layouts' );
define( 'KROTH_CS_IMAGES', KROTH_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'KROTH_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'KROTH_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$kroth_theme_child = wp_get_theme();
	$kroth_get_parent = $kroth_theme_child->Template;
	$kroth_theme = wp_get_theme($kroth_get_parent);
} else { // Parent Theme Active
	$kroth_theme = wp_get_theme();
}
define('KROTH_NAME', $kroth_theme->get( 'Name' ));
define('KROTH_VERSION', $kroth_theme->get( 'Version' ));
define('KROTH_BRAND_URL', $kroth_theme->get( 'AuthorURI' ));
define('KROTH_BRAND_NAME', $kroth_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( KROTH_FRAMEWORK . '/init.php' );
