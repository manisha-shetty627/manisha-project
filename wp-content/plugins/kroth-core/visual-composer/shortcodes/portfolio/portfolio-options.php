<?php
/**
 * Portfolio - Shortcode Options
 */
add_action( 'init', 'krth_portfolio_vc_map' );
if ( ! function_exists( 'krth_portfolio_vc_map' ) ) {
  function krth_portfolio_vc_map() {
    vc_map( array(
      "name" => __( "Portfolio", 'kroth-core'),
      "base" => "krth_portfolio",
      "description" => __( "Portfolio Styles", 'kroth-core'),
      "icon" => "fa fa-briefcase color-green",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Portfolio Style', 'kroth-core' ),
          'value' => array(
            __( 'Style One', 'kroth-core' ) => 'bpw-style-one',
            __( 'Style Two', 'kroth-core' ) => 'bpw-style-two',
          ),
          'admin_label' => true,
          'param_name' => 'portfolio_style',
          'description' => __( 'Select your portfolio style.', 'kroth-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'kroth-core'),
          "param_name"  => "portfolio_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Columns', 'kroth-core' ),
          'value' => array(
            __( 'Select Portfolio Columns', 'kroth-core' ) => '',
            __( 'Column Two', 'kroth-core' ) => 'bpw-col-2',
            __( 'Column Three', 'kroth-core' ) => 'bpw-col-3',
            __( 'Column Four', 'kroth-core' ) => 'bpw-col-4',
            __( 'Column Five', 'kroth-core' ) => 'bpw-col-5',
          ),
          'admin_label' => true,
          'param_name' => 'portfolio_column',
          'description' => __( 'Select your portfolio column.', 'kroth-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Enable & Disable", 'kroth-core' ),
    			"param_name"  => 'ends_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Filter', 'kroth-core'),
          "param_name"  => "portfolio_filter",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'kroth-core'),
          "param_name"  => "portfolio_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('No Space', 'kroth-core'),
          "param_name"  => "portfolio_no_space",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        => 'switcher',
          "heading"     => __('Disable Featured Image Size Limit', 'kroth-core'),
          "param_name"  => "disable_size_limit",
          "value"       => "",
          "std"         => false,
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
            __( 'Select Portfolio Order', 'kroth-core' ) => '',
            __('Asending', 'kroth-core') => 'ASC',
            __('Desending', 'kroth-core') => 'DESC',
          ),
          'param_name' => 'portfolio_order',
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
            __('Date', 'kroth-core') => 'date',
            __('Menu Order', 'kroth-core') => 'menu_order',
          ),
          'param_name' => 'portfolio_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'kroth-core'),
          "param_name"  => "portfolio_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'kroth-core')
        ),
        KrothLib::vt_class_option(),

        // Stylings
        array(
    			"type"        => "notice",
    			"heading"     => __( "Filter", 'kroth-core' ),
    			"param_name"  => 'flst_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          "group"       => __('Style', 'kroth-core'),
    		),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Color', 'kroth-core'),
          "param_name"  => "filter_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_filter',
            'value' => 'true',
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Active Color', 'kroth-core'),
          "param_name"  => "filter_active_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_filter',
            'value' => 'true',
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Active Line Color', 'kroth-core'),
          "param_name"  => "filter_line_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_filter',
            'value' => 'true',
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Text Size', 'kroth-core'),
          "param_name"  => "filter_size",
          "value"       => "",
          "group"       => __('Style', 'kroth-core'),
          "description" => __( "Enter filter text size in px.", 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_filter',
            'value' => 'true',
          ),
        ),

        // Size
        array(
    			"type"        => "notice",
    			"heading"     => __( "Item Style", 'kroth-core' ),
    			"param_name"  => 'itm_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          "group"       => __('Style', 'kroth-core'),
    		),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Image Overlay Color', 'kroth-core'),
          "param_name"  => "image_overlay_color",
          "value"       => "rgba(0,41,82,0.9)",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'kroth-core'),
          "param_name"  => "portfolio_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'kroth-core'),
          "param_name"  => "portfolio_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Hover Color', 'kroth-core'),
          "param_name"  => "portfolio_title_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-two',
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Categroy Color', 'kroth-core'),
          "param_name"  => "portfolio_cat_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-two',
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Category Hover Color', 'kroth-core'),
          "param_name"  => "portfolio_cat_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-two',
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Category Size', 'kroth-core'),
          "param_name"  => "portfolio_cat_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-two',
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Button BG Color', 'kroth-core'),
          "param_name"  => "btn_bg_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-one',
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Button Text Color', 'kroth-core'),
          "param_name"  => "btn_text_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-one',
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Button Text', 'kroth-core'),
          "param_name"  => "btn_text",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-one',
          ),
        ),

      )
    ) );
  }
}
