<?php
/**
 * History - Shortcode Options
 */
add_action( 'init', 'histories_vc_map' );
if ( ! function_exists( 'histories_vc_map' ) ) {
 function histories_vc_map() {
   vc_map( array(
     "name" => __( "History", 'kroth-core'),
     "base" => "krth_histories",
     "description" => __( "History Group", 'kroth-core'),
     "as_parent" => array('only' => 'krth_history'),
     "content_element" => true,
     "show_settings_on_create" => false,
     "is_container" => true,
     "icon" => "fa fa-history color-blue",
     "category" => KrothLib::krth_cat_name(),
     "params" => array(
        KrothLib::vt_class_option(),
     ),
     "js_view" => 'VcColumnView'
   ) );
 }
}

// History List
add_action( 'init', 'history_vc_map' );
if ( ! function_exists( 'history_vc_map' ) ) {
  function history_vc_map() {
    vc_map( array(
      "name" => __( "Single History", 'kroth-core'),
      "base" => "krth_history",
      "description" => __( "Each History Details", 'kroth-core'),
      "icon" => "fa fa-calendar-o color-cadetblue",
      "as_child" => array('only' => 'krth_histories'),
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          "type" => "dropdown",
          "heading" => __( "Content Alignment", 'kroth-core' ),
          "param_name" => "content_alignment",
          "value" => array(
            __('Select Content Alignment', 'kroth-core') =>'',
            __('Left', 'kroth-core') => 'bh-align-left',
            __('Right', 'kroth-core') => 'bh-align-right',
          ),
          "admin_label" => true,
          "description" => __( "Select this history alignment, based on image. <br />Note : Each history items should follow odd method. Odd items left & Even items right, and so on...", 'kroth-core'),
        ),

        KrothLib::vt_notice_field(__( "Achievement Image", 'kroth-core' ),'achivmt_img_opt','cs-warning', ''), // Notice
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Upload Image', 'kroth-core'),
          "param_name"  => "achievement_image",
          "value"       => "",
          "description" => __( "Set your achievement image. Like : Celebration, Company Photo or Title Related Stock Photo.", 'kroth-core')
        ),
        array(
          "type"        =>'href',
          "heading"     =>__('Image Link', 'kroth-core'),
          "param_name"  => "achievement_image_link",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Set your achievement image link, if you want.", 'kroth-core')
        ),
        array(
    			"type" => "switcher",
    			"heading" => __( "Open New Tab? (Links)", 'kroth-core' ),
    			"param_name" => "open_link",
    			"std" => false,
    			'value' => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
    			"on_text" => __( "Yes", 'kroth-core' ),
    			"off_text" => __( "No", 'kroth-core' ),
    		),

        KrothLib::vt_notice_field(__( "Contents", 'kroth-core' ),'cnts_opt','cs-warning', ''), // Notice
        array(
          "type"        =>'vc_link',
          "heading"     =>__('Title', 'kroth-core'),
          "param_name"  => "history_title",
          "value"       => "",
          "admin_label" => true,
          "description" => __( "Set your company achievement title and that link.", 'kroth-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Year', 'kroth-core'),
          "param_name"  => "history_year",
          "value"       => "",
          "description" => __( "Enter your achieved year.", 'kroth-core')
        ),
        array(
          "type"        =>'textarea_html',
          "heading"     =>__('Content', 'kroth-core'),
          "param_name"  => "content",
          "value"       => "",
          "description" => __( "Explain about your company achievement. Less than two paragraph is recommended.", 'kroth-core')
        ),
        KrothLib::vt_class_option(),

      )
    ) );
  }
}
