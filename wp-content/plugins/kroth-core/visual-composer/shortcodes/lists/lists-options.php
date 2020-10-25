<?php
/**
 * List - Shortcode Options
 */
add_action( 'init', 'krth_list_vc_map' );
if ( ! function_exists( 'krth_list_vc_map' ) ) {
  function krth_list_vc_map() {
    vc_map( array(
      "name" => __( "List", 'kroth-core'),
      "base" => "krth_list",
      "description" => __( "List Styles", 'kroth-core'),
      "icon" => "fa fa-list color-red",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'List Style', 'kroth-core' ),
          'value' => array(
            __( 'Style One (Image or Icon)', 'kroth-core' ) => 'krth-list-one',
            __( 'Style Two (Simple Circle)', 'kroth-core' ) => 'krth-list-two',
            __( 'Style Three (Contact Section)', 'kroth-core' ) => 'krth-list-three',
            __( 'Style Four (Person Details)', 'kroth-core' ) => 'krth-list-four',
          ),
          'admin_label' => true,
          'param_name' => 'list_style',
          'description' => __( 'Select your list style.', 'kroth-core' ),
        ),

        // List
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Lists', 'kroth-core' ),
          'param_name' => 'list_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'dropdown',
              'value' => array(
                __( 'Icon', 'kroth-core' ) => 'list_icon',
                __( 'Image', 'kroth-core' ) => 'list_image',
              ),
              'heading' => __( 'Icon or Image', 'kroth-core' ),
              'param_name' => 'icon_image',
            ),
            array(
              'type' => 'vt_icon',
              'value' => '',
              'heading' => __( 'Select Icon', 'kroth-core' ),
              'param_name' => 'select_icon',
              'dependency' => array(
                'element' => 'icon_image',
                'value' => 'list_icon',
              ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Upload Icon Image', 'kroth-core' ),
              'param_name' => 'select_image',
              'dependency' => array(
                'element' => 'icon_image',
                'value' => 'list_image',
              ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Title', 'kroth-core' ),
              'param_name' => 'list_title',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'kroth-core' ),
              'param_name' => 'list_text',
            ),

          )
        ),
        KrothLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Text Color', 'kroth-core' ),
          'param_name' => 'text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Bullet/Icon Color', 'kroth-core' ),
          'param_name' => 'icon_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Text Size', 'kroth-core' ),
          'param_name' => 'text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Bullet/Icon Size', 'kroth-core' ),
          'param_name' => 'icon_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'kroth-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'kroth-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Style', 'kroth-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your title color.', 'kroth-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'kroth-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Style', 'kroth-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the px value if you used title area in list style type one.', 'kroth-core' ),
        ),

      )
    ) );
  }
}
