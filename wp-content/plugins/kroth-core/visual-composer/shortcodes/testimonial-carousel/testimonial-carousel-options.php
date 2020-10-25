<?php
/**
 * Testimonial Carousel - Shortcode Options
 */
add_action( 'init', 'testimonial_carousel_vc_map' );
if ( ! function_exists( 'testimonial_carousel_vc_map' ) ) {
  function testimonial_carousel_vc_map() {
    vc_map( array(
    "name" => __( "Testimonial Carousel", 'kroth-core'),
    "base" => "krth_testimonial_carousel",
    "description" => __( "Carousel Style Testimonial", 'kroth-core'),
    "icon" => "fa fa-comments color-green",
    "category" => KrothLib::krth_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Testimonial Style", 'kroth-core' ),
        "param_name" => "testimonial_style",
        "value" => array(
          __('Style One', 'kroth-core') => 'testimonial_one',
          __('Style Two', 'kroth-core') => 'testimonial_two',
          __('Style Three', 'kroth-core') => 'testimonial_three',
        ),
        "admin_label" => true,
        "description" => __( "Select testimonial carousel style.", 'kroth-core'),
      ),
      array(
        "type"        => 'switcher',
        "heading"     => __('Rounded Image?', 'kroth-core'),
        "param_name"  => "testimonial_rounded",
        "value"       => "",
        "std"         => true,
        "dependency"  => array(
          'element' => 'testimonial_style',
          'value'   => 'testimonial_two',
        ),
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
      KrothLib::vt_class_option(),

      // Carousel
      KrothLib::vt_notice_field(__( "Basic Options", 'kroth-core' ),'bsic_opt','cs-warning', 'Carousel'), // Notice
      KrothLib::vt_carousel_loop(), // Loop
      KrothLib::vt_carousel_items(), // Items
      KrothLib::vt_carousel_margin(), // Margin
      KrothLib::vt_carousel_dots(), // Dots
      KrothLib::vt_carousel_nav(), // Nav
      KrothLib::vt_notice_field(__( "Auto Play & Interaction", 'kroth-core' ),'apyi_opt','cs-warning', 'Carousel'), // Notice
      KrothLib::vt_carousel_autoplay_timeout(), // Autoplay Timeout
      KrothLib::vt_carousel_autoplay(), // Autoplay
      KrothLib::vt_carousel_animateout(), // Animate Out
      KrothLib::vt_carousel_mousedrag(), // Mouse Drag
      KrothLib::vt_notice_field(__( "Width & Height", 'kroth-core' ),'wah_opt','cs-warning', 'Carousel'), // Notice
      KrothLib::vt_carousel_autowidth(), // Auto Width
      KrothLib::vt_carousel_autoheight(), // Auto Height
      KrothLib::vt_notice_field('Responsive Options','res_opt','cs-warning', 'Carousel'), // Notice
      KrothLib::vt_carousel_tablet(), // Tablet
      KrothLib::vt_carousel_mobile(), // Mobile
      KrothLib::vt_carousel_small_mobile(), // Small Mobile

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