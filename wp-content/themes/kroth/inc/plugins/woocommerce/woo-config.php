<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if ( class_exists( 'WooCommerce' ) ) {

	/**
	 * Remove each style one by one
	 * https://docs.woothemes.com/document/disable-the-default-stylesheet/
	 */
	add_filter( 'woocommerce_enqueue_styles', 'kroth_dequeue_styles' );
	function kroth_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] ); // Remove the layout
		return $enqueue_styles;
	}

	// Change Rating Position of Product Listing Pages. Under Price.
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );

	// Add image within this wrap. Product Listing Pages
	add_action( 'woocommerce_before_shop_loop_item_title', 'kroth_product_thumb_open_wrap', 9, 2);
	add_action( 'woocommerce_before_shop_loop_item_title', 'kroth_product_thumb_open_close', 14, 2);
	if (!function_exists('kroth_product_thumb_open_wrap')) {
		function kroth_product_thumb_open_wrap() {
			echo '<div class="vt-product-img">';
		}
	}
	if (!function_exists('kroth_product_thumb_open_close')) {
		function kroth_product_thumb_open_close() {
			echo '</div>';
		}
	}

	// Single Product Single/Gallery Script
	add_action( 'after_setup_theme', 'kroth_single_product_gallery_image' );
	function kroth_single_product_gallery_image() {
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	// Add product title, price and ratings within this wrap. Product Listing Pages
	add_action( 'woocommerce_before_shop_loop_item_title', 'kroth_meta_wrap_open', 14, 2);
	add_action( 'woocommerce_after_shop_loop_item_title', 'kroth_meta_wrap_close', 12, 2);
	function kroth_meta_wrap_open() {
		echo '<div class="vt-product-cnt">';
	}
	function kroth_meta_wrap_close() {
		echo '</div>';
	}

	// Add Details Button next to Add to Cart button
	add_action('woocommerce_after_shop_loop_item','kroth_add_to_cart');
	function kroth_add_to_cart() {
		global $product;
		$link = $product->get_permalink();
		$details_text = cs_get_option('details_text');
		$details_text = $details_text ? $details_text : __('Details', 'kroth');
		echo do_shortcode('<a href="'.$link.'" class="button addtocartbutton">'. esc_attr($details_text) .'</a>');
	}

	// Remove WooCommerce Default Pagination & Add our Own Pagination
	remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
	function woocommerce_pagination() {
		kroth_paging_nav();
	}
	add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'kroth_product_limit', 20 );
	if ( ! function_exists('kroth_product_limit') ) {
		function kroth_product_limit() {
			$woo_limit = cs_get_option('theme_woo_limit');
			$woo_limit = $woo_limit ? $woo_limit : '9';
			return $woo_limit;
		}
	}

	// Remove Shop Page Title
	add_filter( 'woocommerce_show_page_title' , 'kroth_hide_page_title' );
	function kroth_hide_page_title() {
		return false;
	}

	// Remove Breadcrumbs
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

	// Product Column
	add_filter('loop_shop_columns', 'kroth_loop_columns');
	if ( ! function_exists('kroth_loop_columns') ) {
		function kroth_loop_columns() {
			return cs_get_option('woo_product_columns', '3');
		}
	}

	// Remove Cross Sells => "You may be interested in" from Cart Page
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

	// Single Product Page - Related Products Limit
	add_filter( 'woocommerce_output_related_products_args', 'kroth_related_products_args' );
  function kroth_related_products_args( $args ) {
  	$woo_related_limit = cs_get_option('woo_related_limit');
		$args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
		return $args;
	}

	// Remove Related Products - Single Page
  $woo_single_related = cs_get_option('woo_single_related');
  if ($woo_single_related) {
		function kroth_remove_related_products( $args ) {
			return array();
		}
		add_filter('woocommerce_related_products_args','kroth_remove_related_products', 10);
	}

	// Remove "You May Also Like..." Products - Single Page
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if ($woo_single_upsell) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	}

	// Define image sizes
	add_theme_support( 'woocommerce', array(
	  'thumbnail_image_width' => 280,
	  'single_image_width' => 440,
	) );
	update_option( 'woocommerce_thumbnail_cropping', 'custom' );
	update_option( 'woocommerce_thumbnail_cropping_custom_width', '14' );
	update_option( 'woocommerce_thumbnail_cropping_custom_height', '15' );

	// Change the gravator image size in review authors - Single Product Page - Use Same function name of : woocommerce_review_display_gravatar
	if ( ! function_exists( 'woocommerce_review_display_gravatar' ) ) {
		function woocommerce_review_display_gravatar( $comment ) {
			echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '80' ), '' );
		}
	}

	// Add to cart text
	function add_to_cart_text_change() {

		// Add To Cart Change Text
		add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_add_cart_button' );    // 2.1 +
		function woo_add_cart_button() {
			$woo_cart_text = cs_get_option('add_to_cart_text');
			if ($woo_cart_text) {
				$woo_cart = $woo_cart_text;
			} else {
				$woo_cart = esc_html__('Add To Cart', 'kroth');
			}
			return $woo_cart;
		}

		add_filter( 'woocommerce_product_add_to_cart_text' , 'kroth_product_add_to_cart' );
		function kroth_product_add_to_cart() {
			$woo_cart_text = cs_get_option('add_to_cart_text');
			if ($woo_cart_text) {
				$woo_cart = $woo_cart_text;
			} else {
				$woo_cart = esc_html__('Add To Cart', 'kroth');
			}
			global $product;
			$grouped = $product->is_type( 'grouped' );
			$variable = $product->is_type( 'variable' );
			if ($grouped) {
				$button_text = esc_html__( 'View', 'kroth' );
			} elseif($variable) {
				$button_text = esc_html__( 'Select Option', 'kroth' );
			} else {
				$button_text = $woo_cart;
			}
			return $button_text;
		}

	} // Function OT
	add_action( 'after_setup_theme', 'add_to_cart_text_change' );

} // class_exists => WooCommerce