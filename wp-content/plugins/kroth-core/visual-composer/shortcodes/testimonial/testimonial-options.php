<?php
/**
 * Testimonial - Shortcode Options
 */
add_action( 'init', 'testimonial_vc_map' );
if ( ! function_exists( 'testimonial_vc_map' ) ) {
  function testimonial_vc_map() {
    vc_map( array(
    "name" => __( "Testimonial", 'kroth-core'),
    "base" => "krth_testimonial",
    "description" => __( "Testimonial Style", 'kroth-core'),
    "icon" => "fa fa-comment color-grey",
    "category" => KrothLib::krth_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Testimonial Column", 'kroth-core' ),
        "param_name" => "testimonial_column",
        "value" => array(
          __('Column One', 'kroth-core') => 'col-lg-12',
          __('Column Two', 'kroth-core') => 'col-lg-6',
        ),
        "admin_label" => true,
        "description" => __( "Select testimonial column.", 'kroth-core'),
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Listing", 'kroth-core' ),
        "param_name"  => 'lsng_opt',
        'class'       => 'cs-warning',
        'value'       => '',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Limit', 'kroth-core'),
        "param_name"  => "testimonial_limit",
        "value"       => "",
        'admin_label' => true,
        "description" => __( "Enter the number of items to show.", 'kroth-core'),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Order', 'kroth-core' ),
        'value' => array(
          __( 'Select Testimonial Order', 'kroth-core' ) => '',
          __('Asending', 'kroth-core') => 'ASC',
          __('Desending', 'kroth-core') => 'DESC',
        ),
        'param_name' => 'testimonial_order',
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
        ),
        'param_name' => 'testimonial_orderby',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'switcher',
        "heading"     =>__('Pagination', 'kroth-core'),
        "param_name"  => "testimonial_pagination",
        "value"       => "",
        "std"         => false,
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Miss-Aligned?', 'kroth-core'),
        "param_name"  => "testimonial_min_height",
        "value"       => "",
        "description" => __( "Enter minimum height value in px.", 'kroth-core'),
      ),
      KrothLib::vt_class_option(),

      // Style
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Color', 'kroth-core'),
        "param_name"  => "title_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Content Color', 'kroth-core'),
        "param_name"  => "content_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Name Color', 'kroth-core'),
        "param_name"  => "name_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Profession Color', 'kroth-core'),
        "param_name"  => "profession_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Size', 'kroth-core'),
        "param_name"  => "title_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Content Size', 'kroth-core'),
        "param_name"  => "content_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Name Size', 'kroth-core'),
        "param_name"  => "name_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Profession Size', 'kroth-core'),
        "param_name"  => "profession_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}