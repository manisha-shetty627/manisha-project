<?php
/**
 * Share - Shortcode Options
 */
add_action( 'init', 'share_vc_map' );
if ( ! function_exists( 'share_vc_map' ) ) {
  function share_vc_map() {
    vc_map( array(
    "name" => __( "Share", 'kroth-core'),
    "base" => "krth_share",
    "description" => __( "Share Style", 'kroth-core'),
    "icon" => "fa fa-share-alt color-blue",
    "category" => KrothLib::krth_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Share Alignment", 'kroth-core' ),
        "param_name" => "share_alignment",
        "value" => array(
          __('Left', 'kroth-core') => 'pull-left',
          __('Right', 'kroth-core') => 'pull-right',
        ),
        "admin_label" => true,
        "description" => __( "Select share alignment position.", 'kroth-core'),
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('"Share" Text', 'kroth-core'),
        "param_name"  => "share_text",
        "value"       => "",
        "description" => __( "Enter your share text here.", 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('"Share On" Text', 'kroth-core'),
        "param_name"  => "share_on_text",
        "value"       => "",
        "description" => __( "This will be a prefix for tooltip popup text.", 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Enable & Disable", 'kroth-core' ),
        "param_name"  => 'enb_dis',
        'class'       => 'cs-warning',
        'value'       => '',
      ),
      array(
        "type"        =>'switcher',
        "heading"     =>__('Twitter', 'kroth-core'),
        "param_name"  => "share_twitter",
        "value"       => "",
        "std"         => true,
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'switcher',
        "heading"     =>__('Facebook', 'kroth-core'),
        "param_name"  => "share_facebook",
        "value"       => "",
        "std"         => true,
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'switcher',
        "heading"     =>__('LinkedIn', 'kroth-core'),
        "param_name"  => "share_linkedin",
        "value"       => "",
        "std"         => true,
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      KrothLib::vt_class_option(),

      // Style
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Share Text Color', 'kroth-core'),
        "param_name"  => "share_text_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Share On Text Color', 'kroth-core'),
        "param_name"  => "share_on_text_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Icon Color', 'kroth-core'),
        "param_name"  => "icon_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Icon BG Color', 'kroth-core'),
        "param_name"  => "icon_bg_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Icon Border Color', 'kroth-core'),
        "param_name"  => "icon_border_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        =>'textfield',
        "heading"     =>__('Share Text Size', 'kroth-core'),
        "param_name"  => "share_text_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Share On Text Size', 'kroth-core'),
        "param_name"  => "share_on_text_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}