<?php
/**
 * Product - Shortcode Options
 */
add_action( 'init', 'krth_product_vc_map' );
if ( ! function_exists( 'krth_product_vc_map' ) ) {
  function krth_product_vc_map() {
    vc_map( array(
      "name" => __( "Products", 'kroth-core'),
      "base" => "krth_product",
      "description" => __( "WooCommerce Products", 'kroth-core'),
      "icon" => "fa fa-shopping-cart color-slate-blue",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Product Column', 'kroth-core' ),
          'value' => array(
            __( 'Column Three', 'kroth-core' ) => 3,
            __( 'Column Four', 'kroth-core' ) => 4,
          ),
          'admin_label' => true,
          'param_name' => 'product_column',
          'description' => __( 'Select your product column.', 'kroth-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'kroth-core'),
          "param_name"  => "product_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'kroth-core'),
        ),

        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'kroth-core'),
          "param_name"  => "product_pagination",
          "value"       => "",
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Listing", 'kroth-core' ),
    			"param_name"  => 'lsng_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'kroth-core' ),
          'value' => array(
            __( 'Select Product Order', 'kroth-core' ) => '',
            __('Asending', 'kroth-core') => 'ASC',
            __('Desending', 'kroth-core') => 'DESC',
          ),
          'param_name' => 'product_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'kroth-core' ),
          'value' => array(
            __('None', 'kroth-core') => 'none',
            __('ID', 'kroth-core') => 'ID',
            __('Author', 'kroth-core') => 'author',
            __('Title', 'kroth-core') => 'title',
            __('Type', 'kroth-core') => 'type',
            __('Date', 'kroth-core') => 'date',
            __('Modified', 'kroth-core') => 'modified',
            __('Random', 'kroth-core') => 'rand',
          ),
          'param_name' => 'product_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'kroth-core'),
          "param_name"  => "product_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'kroth-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Miss-Aligned?', 'kroth-core'),
          "param_name"  => "product_min_height",
          "value"       => "",
          "description" => __( "Set minimum height of all products in pixel value. Default : 100px", 'kroth-core')
        ),
        KrothLib::vt_class_option(),

      )
    ) );
  }
}
