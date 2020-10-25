<?php
/**
 * Chart - Shortcode Options
 */
add_action( 'init', 'chart_vc_map' );
if ( ! function_exists( 'chart_vc_map' ) ) {
  function chart_vc_map() {
    vc_map( array(
      "name" => __( "Chart", 'kroth-core'),
      "base" => "krth_chart",
      "description" => __( "Chart Styles", 'kroth-core'),
      "icon" => "fa fa-area-chart color-pink",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        // Chart Type
        array(
          'type' => 'dropdown',
          'heading' => __( 'Chart Type', 'kroth-core' ),
          'value' => array(
            __( 'Line', 'kroth-core' ) => 'line',
            __( 'Bar', 'kroth-core' ) => 'bar',
            __( 'Radar', 'kroth-core' ) => 'radar',
            __( 'Doughnut', 'kroth-core' ) => 'doughnut',
            __( 'PIE', 'kroth-core' ) => 'pie',
            __( 'Polar Area', 'kroth-core' ) => 'polarArea',
          ),
          'admin_label' => true,
          'param_name' => 'chart_type',
          'description' => __( 'Select your chart style type.', 'kroth-core' ),
        ),
        array(
          "type"        => 'switcher',
          "heading"     => __('Show Values in Horizontal Mode?', 'kroth-core'),
          "param_name"  => "horizontal_bar",
          "value"       => "",
          "on_text"     => __('Yes', 'kroth-core'),
          "off_text"    => __('No', 'kroth-core'),
          "std"         => false,
          'dependency' => array(
            'element' => 'chart_type',
            'value' => 'bar',
          ),
        ),

        // Height
        array(
          "type"        => "notice",
          "heading"     => __( "Height", 'kroth-core' ),
          "param_name"  => 'n_wi_he',
          'class'       => 'cs-success',
          'value'       => '',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Height', 'kroth-core'),
          "param_name"  => "canvas_height",
          "value"       => "",
          "description" => __( "Enter your chart height, without units. Eg: 200", 'kroth-core'),
        ),

        // Chart Values
        array(
          "type"        => "notice",
          "heading"     => __( "Chart Values", 'kroth-core' ),
          "param_name"  => 'n_ch_va',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        => 'textarea',
          "heading"     => __('Chart X-Axis/Label Values', 'kroth-core'),
          "param_name"  => "x_values",
          'value'      => 'January; February; March; April; May; June',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar', 'radar' )
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Maximum Value', 'kroth-core'),
          "param_name"  => "max_value",
          'value'      => '100',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Minimum Value', 'kroth-core'),
          "param_name"  => "min_value",
          'value'      => '20',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Each Step Gap', 'kroth-core'),
          "param_name"  => "step_value",
          'value'      => '20',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Hide X-Axis Grid Lines?', 'kroth-core'),
          "param_name"  => "hidex_gridlines",
          "value"       => "",
          "std"         => false,
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Hide Y-Axis Grid Lines?', 'kroth-core'),
          "param_name"  => "hidey_gridlines",
          "value"       => "",
          "std"         => false,
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar' )
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Param Group - Line, Bar, Radar
        array(
          'type' => 'param_group',
          'heading' => __( 'Each Values', 'kroth-core' ),
          'param_name' => 'line_values',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'line', 'bar', 'radar' )
          ),
          'value'      => urlencode( json_encode( array(
            array(
              'title' => __( 'Stocks', 'kroth-core' ),
              'y_values' => '20; 40; 30; 35; 25; 25',
              'color' => '#fe6c61',
              'point_color' => '#002952',
              'point_width' => '7',
              'point_radius' => '4',
              'point_hover_radius' => '6',
            ),
            array(
              'title' => __( 'Bonds', 'kroth-core' ),
              'y_values' => '20; 60; 40; 35; 45; 30',
              'color' => '#5aa1e3',
              'point_color' => '#002952',
              'point_width' => '7',
              'point_radius' => '4',
              'point_hover_radius' => '6',
            ),
            array(
              'title' => __( 'Mutual Funds', 'kroth-core' ),
              'y_values' => '20; 30; 75; 40; 60; 45',
              'color' => '#8d6dc4',
              'point_color' => '#002952',
              'point_width' => '7',
              'point_radius' => '4',
              'point_hover_radius' => '6',
            )
          ) ) ),
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Title', 'kroth-core' ),
              'param_name' => 'title',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Value', 'kroth-core' ),
              'param_name' => 'y_values',
            ),
            array(
              'type' => 'colorpicker',
              'value' => '',
              'heading' => __( 'Color', 'kroth-core' ),
              'param_name' => 'color',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'colorpicker',
              'value' => '',
              'heading' => __( 'Point Color', 'kroth-core' ),
              'param_name' => 'point_color',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),

            // Point Size
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Point Border Width', 'kroth-core' ),
              'param_name' => 'point_width',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Point Radius', 'kroth-core' ),
              'param_name' => 'point_radius',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Point Hover Radius', 'kroth-core' ),
              'param_name' => 'point_hover_radius',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
          ),
          'callbacks'  => array(
            'after_add' => 'vcChartParamAfterAddCallback',
          ),
        ),

        // Param Group - Doughnut, PIE, PolarArea
        array(
          'type'       => 'param_group',
          'heading'    => __( 'Values', 'kroth-core' ),
          'param_name' => 'circle_values',
          'dependency' => array(
            'element' => 'chart_type',
            'value'   => array( 'doughnut', 'pie', 'polarArea' )
          ),
          'value'      => urlencode( json_encode( array(
            array(
              'title' => __( 'Red', 'kroth-core' ),
              'values' => '300',
              'color' => '#FF6384',
            ),
            array(
              'title' => __( 'Blue', 'kroth-core' ),
              'values' => '50',
              'color' => '#36A2EB'
            ),
            array(
              'title' => __( 'Yellow', 'kroth-core' ),
              'values' => '100',
              'color' => '#FFCE56'
            )
          ) ) ),
          'params'     => array(
            array(
              'type'        => 'textfield',
              'heading'     => __( 'Title', 'kroth-core' ),
              'param_name'  => 'title',
              'description' => __( 'Enter title for chart dataset.', 'kroth-core' ),
              'admin_label' => true,
            ),
            array(
              'type'       => 'textfield',
              'heading'    => __( 'Value', 'kroth-core' ),
              'param_name' => 'values',
              'admin_label' => true,
            ),
            array(
              'type'       => 'colorpicker',
              'heading'    => __( 'Color', 'kroth-core' ),
              'param_name' => 'color'
            )
          ),
          'callbacks'  => array(
            'after_add' => 'vcChartParamAfterAddCallback',
          ),
        ),

        // Custom Class
        KrothLib::vt_class_option(),

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
