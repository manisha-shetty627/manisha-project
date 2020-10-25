<?php
/*
 * All Kroth Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* Theme All Basic Setup */
require_once( KROTH_FRAMEWORK . '/theme-support.php' );
require_once( KROTH_FRAMEWORK . '/backend-functions.php' );
require_once( KROTH_FRAMEWORK . '/frontend-functions.php' );
require_once( KROTH_FRAMEWORK . '/enqueue-files.php' );
require_once( KROTH_CS_FRAMEWORK . '/custom-style.php' );
require_once( KROTH_CS_FRAMEWORK . '/config.php' );

/* WooCommerce Integration */
if (class_exists( 'WooCommerce' )){
	require_once( KROTH_FRAMEWORK . '/plugins/woocommerce/woo-config.php' );
}

/* Bootstrap Menu Walker */
require_once( KROTH_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( KROTH_FRAMEWORK . '/plugins/notify/activation.php' );

/* Breadcrumbs */
require_once( KROTH_FRAMEWORK . '/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
$img_resizer = cs_get_option('theme_img_resizer');
if(!$img_resizer) {
	require_once( KROTH_FRAMEWORK . '/plugins/aq_resizer.php' );
}

/* Sidebars */
require_once( KROTH_FRAMEWORK . '/core/sidebars.php' );