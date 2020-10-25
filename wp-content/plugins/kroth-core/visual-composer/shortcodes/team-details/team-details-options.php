<?php
/**
 * Team Details - Shortcode Options
 */
add_action( 'init', 'team_details_vc_map' );
if ( ! function_exists( 'team_details_vc_map' ) ) {
  function team_details_vc_map() {
    vc_map( array(
    "name" => __( "Team Details", 'kroth-core'),
    "base" => "krth_team_details",
    "description" => __( "Team Details Style", 'kroth-core'),
    "icon" => "fa fa-male color-orange",
    "category" => KrothLib::krth_cat_name(),
    "params" => array(

      array(
        'type'        => 'textfield',
        'heading'     => __('Name', 'kroth-core'),
        'param_name'  => 'team_details_name',
        'value'       => '',
        'admin_label' => true,
        'description' => __( 'Enter your team member name.', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => __('Profession', 'kroth-core'),
        'param_name'  => 'team_details_profession',
        'value'       => '',
        'admin_label' => true,
        'description' => __( 'Enter your team member profession.', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        => 'textarea_html',
        "heading"     => __('Content', 'kroth-core'),
        "param_name"  => "content",
        "value"       => "",
      ),
      KrothLib::vt_class_option(),

      // Style
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