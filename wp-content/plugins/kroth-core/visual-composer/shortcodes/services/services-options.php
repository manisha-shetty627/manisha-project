<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'krth_services_vc_map' );
if ( ! function_exists( 'krth_services_vc_map' ) ) {
  function krth_services_vc_map() {
    vc_map( array(
      "name" => __( "Service", 'kroth-core'),
      "base" => "krth_services",
      "description" => __( "Service Shortcodes", 'kroth-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Services Style', 'kroth-core' ),
          'value' => array(
            __( 'Style One', 'kroth-core' ) => 'krth-service-one',
            __( 'Style Two', 'kroth-core' ) => 'krth-service-two',
            __( 'Style Three', 'kroth-core' ) => 'krth-service-three',
            __( 'Style Four', 'kroth-core' ) => 'krth-service-four',
            __( 'Style Five', 'kroth-core' ) => 'krth-service-five',
          ),
          'admin_label' => true,
          'param_name' => 'service_style',
          'description' => __( 'Select your service style.', 'kroth-core' ),
        ),
        KrothLib::vt_open_link_tab(),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Service Image', 'kroth-core'),
          "param_name" => "service_image",
          "value"      => "",
          "description" => __( "Set your service image.", 'kroth-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'krth-service-one',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Icon', 'kroth-core'),
          "param_name" => "service_icon_image",
          "value"      => "",
          "description" => __( "Set your service icon image.", 'kroth-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'krth-service-five',
          ),
        ),
        array(
          "type"      => 'href',
          "heading"   => __('Image Link', 'kroth-core'),
          "param_name" => "service_image_link",
          "value"      => "",
          "description" => __( "Enter your service image link.", 'kroth-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'krth-service-one',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'kroth-core'),
          "param_name" => "service_icon",
          "value"      => "",
          "description" => __( "Set your service icon.", 'kroth-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => array('krth-service-two','krth-service-three','krth-service-four'),
          ),
        ),
        KrothLib::vt_notice_field(__( "Content Area", 'kroth-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'vc_link',
          "heading"   => __('Service Title', 'kroth-core'),
          "param_name" => "service_title",
          "value"      => "",
          "description" => __( "Enter your service title and link.", 'kroth-core')
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'kroth-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your service content here.", 'kroth-core')
        ),

        // Read More
        array(
    			"type"        => "notice",
    			"heading"     => __( "Read More Link", 'kroth-core' ),
    			"param_name"  => 'rml_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'krth-service-one',
          ),
    		),
        array(
          "type"      => 'href',
          "heading"   => __('Link', 'kroth-core'),
          "param_name" => "read_more_link",
          "value"      => "",
          "description" => __( "Set your link for read more.", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'krth-service-one',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title', 'kroth-core'),
          "param_name" => "read_more_title",
          "value"      => "",
          "description" => __( "Enter your read more title.", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'krth-service-one',
          ),
        ),
        KrothLib::vt_class_option(),

        // Style
        KrothLib::vt_notice_field(__( "Title Styling", 'kroth-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'kroth-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'kroth-core'),
          "group" => __( "Style", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'kroth-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'kroth-core'),
          "group" => __( "Style", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Top Space', 'kroth-core'),
          "param_name" => "title_top_space",
          "value"      => "",
          "description" => __( "Enter the value for title top space in px.", 'kroth-core'),
          "group" => __( "Style", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Bottom Space', 'kroth-core'),
          "param_name" => "title_bottom_space",
          "value"      => "",
          "description" => __( "Enter the value for title bottom space in px.", 'kroth-core'),
          "group" => __( "Style", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
