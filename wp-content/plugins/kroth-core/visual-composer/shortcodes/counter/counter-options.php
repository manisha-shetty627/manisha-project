<?php
/**
 * Counter - Shortcode Options
 */
add_action( 'init', 'krth_counter_vc_map' );
if ( ! function_exists( 'krth_counter_vc_map' ) ) {
  function krth_counter_vc_map() {
    vc_map( array(
      "name" => __( "Counter", 'kroth-core'),
      "base" => "krth_counter",
      "description" => __( "Counter Styles", 'kroth-core'),
      "icon" => "fa fa-sort-numeric-asc color-blue",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Counter Style', 'kroth-core' ),
          'value' => array(
            __( 'Style One', 'kroth-core' ) => 'krth-counter-one',
            __( 'Style Two', 'kroth-core' ) => 'krth-counter-two',
          ),
          'admin_label' => true,
          'param_name' => 'counter_style',
          'description' => __( 'Select your counter style.', 'kroth-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Title', 'kroth-core'),
          "param_name"  => "counter_title",
          "value"       => "",
          "description" => __( "Enter your counter title.", 'kroth-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Counter Value', 'kroth-core'),
          "param_name"  => "counter_value",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter numeric value to count. Ex : 20", 'kroth-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Value In', 'kroth-core'),
          "param_name"  => "counter_value_in",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter value in symbol or text. Eg : +", 'kroth-core')
        ),
        KrothLib::vt_class_option(),

        // Stylings
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'kroth-core'),
          "param_name"  => "counter_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Counter Color', 'kroth-core'),
          "param_name"  => "counter_value_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Value In Color', 'kroth-core'),
          "param_name"  => "counter_value_in_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
        ),
        // Size
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'kroth-core'),
          "param_name"  => "counter_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          "description" => __( "Enter font size in px.", 'kroth-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Counter Size', 'kroth-core'),
          "param_name"  => "counter_value_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          "description" => __( "Enter font size in px.", 'kroth-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Value In Size', 'kroth-core'),
          "param_name"  => "counter_value_in_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'kroth-core'),
          "description" => __( "Enter font size in px.", 'kroth-core')
        ),

      )
    ) );
  }
}
