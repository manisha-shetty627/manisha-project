<?php
/**
 * Job Details - Shortcode Options
 */
add_action( 'init', 'krth_job_details_vc_map' );
if ( ! function_exists( 'krth_job_details_vc_map' ) ) {
  function krth_job_details_vc_map() {
    vc_map( array(
      "name" => __( "Job Details", 'kroth-core'),
      "base" => "krth_job_details",
      "description" => __( "Job Details Styles", 'kroth-core'),
      "icon" => "fa fa-info-circle color-pink",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Job Details Column', 'kroth-core' ),
          'value' => array(
            __( 'Select Column', 'kroth-core' ) => '',
            __( 'Column One', 'kroth-core' ) => 'krth-jd-col-1',
            __( 'Column Two', 'kroth-core' ) => 'krth-jd-col-2',
            __( 'Column Three', 'kroth-core' ) => 'krth-jd-col-3',
            __( 'Column Four', 'kroth-core' ) => 'krth-jd-col-4',
            __( 'Column Five', 'kroth-core' ) => 'krth-jd-col-5',
          ),
          'admin_label' => true,
          'param_name' => 'job_details_column',
          'description' => __( 'Select your job details column.', 'kroth-core' ),
        ),

        // Job Details
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Job Details', 'kroth-core' ),
          'param_name' => 'job_details_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'vt_icon',
              'value' => '',
              'heading' => __( 'Select Icon', 'kroth-core' ),
              'param_name' => 'select_icon',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Category Title', 'kroth-core' ),
              'param_name' => 'job_details_title',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Category Text', 'kroth-core' ),
              'param_name' => 'job_details_text',
            ),

          )
        ),
        KrothLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Color', 'kroth-core' ),
          'param_name' => 'icon_color',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Category Title Color', 'kroth-core' ),
          'param_name' => 'title_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Category Text Color', 'kroth-core' ),
          'param_name' => 'text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Border Color', 'kroth-core' ),
          'param_name' => 'border_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Background Color', 'kroth-core' ),
          'param_name' => 'bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Text Sizes", 'kroth-core' ),
          "param_name"  => 'txt_sizes',
          'class'       => 'cs-warning',
          'value'       => '',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Icon Size', 'kroth-core' ),
          'param_name' => 'icon_size',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Category Title Size', 'kroth-core' ),
          'param_name' => 'title_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Category Text Size', 'kroth-core' ),
          'param_name' => 'text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),

      )
    ) );
  }
}
