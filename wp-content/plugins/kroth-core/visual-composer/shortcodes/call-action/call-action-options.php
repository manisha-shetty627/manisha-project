<?php
/**
 * Call to Action - Shortcode Options
 */
add_action( 'init', 'ctas_vc_map' );
if ( ! function_exists( 'ctas_vc_map' ) ) {
 function ctas_vc_map() {
   vc_map( array(
     "name" => __( "Call to Action", 'kroth-core'),
     "base" => "krth_ctas",
     "description" => __( "Call to Action Group", 'kroth-core'),
     "as_parent" => array('only' => 'krth_cta,krth_button'),
     "content_element" => true,
     "show_settings_on_create" => false,
     "is_container" => true,
     "icon" => "fa fa-bullhorn color-grey",
     "category" => KrothLib::krth_cat_name(),
     "params" => array(

        array(
          "type" => "dropdown",
          "heading" => __( "Call to Action Style", 'kroth-core' ),
          "param_name" => "cta_style",
          "value" => array(
            __('Select Call to Action Style', 'kroth-core') => '',
            __('Style One', 'kroth-core') => 'style-one',
            __('Style Two', 'kroth-core') => 'style-two',
          ),
          "admin_label" => true,
          "description" => __( "Select Call to Action style.", 'kroth-core')
        ),
        array(
          "type" => "dropdown",
          "heading" => __( "Content Alignment", 'kroth-core' ),
          "param_name" => "cta_alignment",
          "value" => array(
            __('Select Content Alignment', 'kroth-core') => '',
            __('Content Left & Button Right', 'kroth-core') => 'cta-cnt-left',
            __('Content Right & Button Left', 'kroth-core') => 'cta-cnt-right',
          ),
          "admin_label" => true,
          "description" => __( "Select Call to Action style.", 'kroth-core')
        ),
        KrothLib::vt_class_option(),

     ),
     "js_view" => 'VcColumnView'
   ) );
 }
}

// Call to Action List
add_action( 'init', 'cta_vc_map' );
if ( ! function_exists( 'cta_vc_map' ) ) {
  function cta_vc_map() {
    vc_map( array(
      "name" => __( "Call to Action - Content", 'kroth-core'),
      "base" => "krth_cta",
      "description" => __( "Call to Action Content", 'kroth-core'),
      "icon" => "fa fa-font color-slate-blue",
      "as_child" => array('only' => 'krth_ctas'),
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          "type"        => 'textfield',
          "heading"     => __('Content Width', 'kroth-core'),
          "param_name"  => "content_width",
          "value"       => "",
          "admin_label" => true,
          "description" => __( "Enter your width in %. [Eg: 70%]. Rest of width will go for button.", 'kroth-core')
        ),
        array(
          "type"        => 'textarea_html',
          "heading"     => __('Content', 'kroth-core'),
          "param_name"  => "content",
          "value"       => "",
          "description" => __( "Explain about your company achievement. Less than two paragraph is recommended.", 'kroth-core')
        ),
        KrothLib::vt_class_option(),

      )
    ) );
  }
}