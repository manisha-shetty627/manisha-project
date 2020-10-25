<?php
/**
 * Project Info - Shortcode Options
 */
add_action( 'init', 'project_info_vc_map' );
if ( ! function_exists( 'project_info_vc_map' ) ) {
  function project_info_vc_map() {
    vc_map( array(
    "name" => __( "Project Info", 'kroth-core'),
    "base" => "krth_project_info",
    "description" => __( "Project Info Style", 'kroth-core'),
    "icon" => "fa fa-question-circle color-black",
    "category" => KrothLib::krth_cat_name(),
    "params" => array(

      array(
        "type"        =>'textfield',
        "heading"     =>__('Title', 'kroth-core'),
        "param_name"  => "project_info_title",
        "value"       => "",
        "description" => __( "Enter your title here.", 'kroth-core'),
        'admin_label' => true,
      ),
      // List
      array(
        'type' => 'param_group',
        'value' => '',
        'heading' => __( 'List of Project Details', 'kroth-core' ),
        'param_name' => 'list_details',
        // Note params is mapped inside param-group:
        'params' => array(
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Title', 'kroth-core' ),
            'param_name' => 'list_title',
            'admin_label' => true,
          ),
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Text', 'kroth-core' ),
            'param_name' => 'list_text',
            'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            'admin_label' => true,
          ),
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Link', 'kroth-core' ),
            'param_name' => 'list_link',
            'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          ),

        )
      ),
      array(
        "type"        =>'textarea_html',
        "heading"     =>__('Content', 'kroth-core'),
        "param_name"  => "content",
        "value"       => "",
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
        "heading"     =>__('List Title Color', 'kroth-core'),
        "param_name"  => "list_title_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('List Text Color', 'kroth-core'),
        "param_name"  => "list_text_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Area BG Color', 'kroth-core'),
        "param_name"  => "title_bg_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Border Color', 'kroth-core'),
        "param_name"  => "border_color",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
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
        "heading"     =>__('List Title Size', 'kroth-core'),
        "param_name"  => "list_title_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('List Text Size', 'kroth-core'),
        "param_name"  => "list_text_size",
        "value"       => "",
        "group"       => __('Style', 'kroth-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}