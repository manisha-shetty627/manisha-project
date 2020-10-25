<?php
/*
 * Kroth Theme Widgets
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if ( ! function_exists( 'kroth_vt_widget_init' ) ) {
	function kroth_vt_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// Main Widget Area
			register_sidebar(
				array(
					'name' => __( 'Main Widget Area', 'kroth' ),
					'id' => 'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'kroth' ),
					'before_widget' => '<div id="%1$s" class="krth-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);
			// Main Widget Area

			// Shop Widget
			register_sidebar(
				array(
					'name' => __( 'Shop Widget', 'kroth' ),
					'id' => 'sidebar-shop',
					'description' => __( 'Appears on WooCommerce Pages.', 'kroth' ),
					'before_widget' => '<div id="%1$s" class="krth-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);
			// Shop Widget

			// Footer Widgets
			$footer_widgets = cs_get_option( 'footer_widget_layout' );
	    if( $footer_widgets ) {

	      switch ( $footer_widgets ) {
	        case 5:
	        case 6:
	        case 7:
	          $length = 3;
	        break;

	        case 8:
	        case 9:
	          $length = 4;
	        break;

	        default:
	          $length = $footer_widgets;
	        break;
	      }

	      for( $i = 0; $i < $length; $i++ ) {

	        $num = ( $i+1 );

	        register_sidebar( array(
	          'id'            => 'footer-' . $num,
	          'name'          => __( 'Footer Widget ', 'kroth' ). $num,
	          'description'   => __( 'Appears on footer section.', 'kroth' ),
	          'before_widget' => '<div class="krth-widget %2$s">',
	          'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
	          'before_title'  => '<h4 class="widget-title">',
	          'after_title'   => '</h4>'
	        ) );

	      }

	    }
	    // Footer Widgets

			/* Custom Sidebar */
			$custom_sidebars = cs_get_option('custom_sidebar');
			if ($custom_sidebars) {
				foreach($custom_sidebars as $custom_sidebar) :
				$heading = $custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_attr($heading),
					'id' => $own_id,
					'description' => esc_attr($desc),
					'before_widget' => '<div id="%1$s" class="krth-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				) );
				endforeach;
			}
			/* Custom Sidebar */

		}
	}
	add_action( 'widgets_init', 'kroth_vt_widget_init' );
}