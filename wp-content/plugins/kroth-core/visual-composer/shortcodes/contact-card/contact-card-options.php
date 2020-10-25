<?php
/**
 * Contact Card - Shortcode Options
 */
add_action( 'init', 'contact_card_vc_map' );
if ( ! function_exists( 'contact_card_vc_map' ) ) {
  function contact_card_vc_map() {
    vc_map( array(
    "name" => __( "Contact Card", 'kroth-core'),
    "base" => "krth_contact_card",
    "description" => __( "Contact Card Style", 'kroth-core'),
    "icon" => "fa fa-credit-card color-slate-blue",
    "category" => KrothLib::krth_cat_name(),
    "params" => array(

      array(
        "type"        =>'textfield',
        "heading"     =>__('Title', 'kroth-core'),
        "param_name"  => "contact_card_title",
        "value"       => "",
        "description" => __( "Enter your title here.", 'kroth-core'),
        'admin_label' => true,
      ),
      array(
        "type"        =>'textarea_html',
        "heading"     =>__('Text', 'kroth-core'),
        "param_name"  => "content",
        "value"       => "",
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Link Text', 'kroth-core'),
        "param_name"  => "link_text",
        "value"       => "",
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Link', 'kroth-core'),
        "param_name"  => "link",
        "value"       => "",
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'switcher',
        "heading"     =>__('Open new tab?', 'kroth-core'),
        "param_name"  => "open_link",
        "std"         => false,
        "value"       => "",
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Set Exact Height', 'kroth-core'),
        "param_name"  => "exact_height",
        "value"       => "",
        "description" => __( "Set contact card height. If you want top and bottom space between the contents.", 'kroth-core'),
      ),
      KrothLib::vt_class_option(),

      // Color
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
        "heading"     =>__('Text Color', 'kroth-core'),
        "param_name"  => "text_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Link Color', 'kroth-core'),
        "param_name"  => "link_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Link Line Color', 'kroth-core'),
        "param_name"  => "link_line_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Overlay Background Color', 'kroth-core'),
        "param_name"  => "overlay_bg",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'attach_image',
        "heading"     =>__('Background Image', 'kroth-core'),
        "param_name"  => "bg_img",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        => "notice",
        "heading"     => __( "Text Sizes", 'kroth-core' ),
        "param_name"  => 'txt_sizes',
        'class'       => 'cs-warning',
        'value'       => '',
        "group"       => __('Style', 'kroth-core'),
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Size', 'kroth-core'),
        "param_name"  => "title_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Text Size', 'kroth-core'),
        "param_name"  => "text_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Link Size', 'kroth-core'),
        "param_name"  => "link_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}