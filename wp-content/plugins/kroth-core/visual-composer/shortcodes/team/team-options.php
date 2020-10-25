<?php
/**
 * Team - Shortcode Options
 */
add_action( 'init', 'team_vc_map' );
if ( ! function_exists( 'team_vc_map' ) ) {
  function team_vc_map() {
    vc_map( array(
    "name" => __( "Team", 'kroth-core'),
    "base" => "krth_team",
    "description" => __( "Team Style", 'kroth-core'),
    "icon" => "fa fa-user color-red",
    "category" => KrothLib::krth_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Team Style", 'kroth-core' ),
        "param_name" => "team_style",
        "value" => array(
          __('Select Style', 'kroth-core') => '',
          __('Style One', 'kroth-core') => 'style-one',
          __('Style Two', 'kroth-core') => 'style-two',
        ),
        "admin_label" => true,
        "description" => __( "Select team style.", 'kroth-core'),
      ),

      array(
        "type" => "dropdown",
        "heading" => __( "Team Column", 'kroth-core' ),
        "param_name" => "team_column",
        "value" => array(
          __('Select Column', 'kroth-core') => '',
          __('Column One', 'kroth-core') => 'col-md-12',
          __('Column Two', 'kroth-core') => 'col-md-6',
          __('Column Three', 'kroth-core') => 'col-md-4 col-sm-6',
          __('Column Four', 'kroth-core') => 'col-md-3 col-sm-6',
        ),
        "admin_label" => true,
        "description" => __( "Select team column.", 'kroth-core'),
      ),

      array(
        "type"        =>'textfield',
        "heading"     =>__('Link Text', 'kroth-core'),
        "param_name"  => "team_link_text",
        "value"       => "",
        "description" => __( "Enter link text, Default : View Profile", 'kroth-core'),
        'dependency' => array(
          'element' => 'team_style',
          'value' => 'style-one',
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
        "param_name"  => "team_limit",
        "value"       => "",
        'admin_label' => true,
        "description" => __( "Enter the number of items to show.", 'kroth-core'),
      ),
      array(
        "type"        => 'textfield',
        "heading"     => __('Specific ID', 'kroth-core'),
        "param_name"  => "team_id",
        "value"       => "",
        "description" => __( "Enter your team members ID, to show them only by your choice.", 'kroth-core'),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Order', 'kroth-core' ),
        'value' => array(
          __( 'Select Team Order', 'kroth-core' ) => '',
          __('Asending', 'kroth-core') => 'ASC',
          __('Desending', 'kroth-core') => 'DESC',
        ),
        'param_name' => 'team_order',
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
        'param_name' => 'team_orderby',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'switcher',
        "heading"     =>__('Pagination', 'kroth-core'),
        "param_name"  => "team_pagination",
        "value"       => "",
        "std"         => false,
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "If you need pagination, turn this to On.", 'kroth-core'),
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Miss-Aligned?', 'kroth-core'),
        "param_name"  => "team_min_height",
        "value"       => "",
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Enter minimum height value in px.", 'kroth-core'),
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
        "heading"     =>__('Link Color', 'kroth-core'),
        "param_name"  => "link_color",
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