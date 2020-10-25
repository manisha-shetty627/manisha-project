<?php
/**
 * Button - Shortcode Options
 */
add_action( 'init', 'krth_button_vc_map' );
if ( ! function_exists( 'krth_button_vc_map' ) ) {
  function krth_button_vc_map() {
    vc_map( array(
      "name" => __( "Button", 'kroth-core'),
      "base" => "krth_button",
      "description" => __( "Button Styles", 'kroth-core'),
      "icon" => "fa fa-mouse-pointer color-orange",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Button Size', 'kroth-core' ),
          'value' => array(
            __( 'Select Button Size', 'kroth-core' ) => '',
            __( 'Small', 'kroth-core' ) => 'btn-small',
            __( 'Medium', 'kroth-core' ) => 'btn-medium',
            __( 'Large', 'kroth-core' ) => 'btn-large',
          ),
          'admin_label' => true,
          'param_name' => 'button_size',
          'description' => __( 'Select button size', 'kroth-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'kroth-core' ),
          "param_name" => "button_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "href",
          "heading" => __( "Button Link", 'kroth-core' ),
          "param_name" => "button_link",
          'value' => '',
          "description" => __( "Enter your button link.", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Open New Tab?", 'kroth-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'kroth-core' ),
          "off_text" => __( "No", 'kroth-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Disable Simple Dark Hover", 'kroth-core' ),
          "param_name" => "simple_hover",
          "std" => false,
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        KrothLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'kroth-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'kroth-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'kroth-core' ),
          "param_name" => "bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'simple_hover',
            'value' => 'true',
          ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'kroth-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'simple_hover',
            'value' => 'true',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'kroth-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'kroth-core'),
          "group" => __( "Styling", 'kroth-core'),
        ),

        // Icon
        array(
          'type' => 'dropdown',
          'heading' => __( 'Icon Alignment', 'kroth-core' ),
          'value' => array(
            __( 'Select Icon Alignment', 'kroth-core' ) => '',
            __( 'Left', 'kroth-core' ) => 'btn-icon-left',
            __( 'Right', 'kroth-core' ) => 'btn-icon-right',
          ),
          'param_name' => 'icon_alignment',
          'description' => __( 'Select icon alignment in this button.', 'kroth-core' ),
          "group" => __( "Icon", 'kroth-core'),
        ),
        array(
          "type" => "vt_icon",
          "heading" => __( "Select Icon", 'kroth-core' ),
          "param_name" => "select_icon",
          'value' => '',
          "description" => __( "Select icon if you want.", 'kroth-core'),
          "group" => __( "Icon", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Icon Size", 'kroth-core' ),
          "param_name" => "icon_size",
          'value' => '',
          "description" => __( "Enter icon size in px.", 'kroth-core'),
          "group" => __( "Icon", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Color", 'kroth-core' ),
          "param_name" => "icon_color",
          'value' => '',
          "description" => __( "Pick your icon color.", 'kroth-core'),
          "group" => __( "Icon", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Hover Color", 'kroth-core' ),
          "param_name" => "icon_hover_color",
          'value' => '',
          "description" => __( "Pick your icon hover color.", 'kroth-core'),
          "group" => __( "Icon", 'kroth-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'kroth-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'kroth-core'),
        ),

      )
    ) );
  }
}
