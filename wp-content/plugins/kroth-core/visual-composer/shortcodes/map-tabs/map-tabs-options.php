<?php
/**
 * Map Tabs - Shortcode Options
 */
add_action( 'init', 'map_tabs_vc_map' );
if ( ! function_exists( 'map_tabs_vc_map' ) ) {
 function map_tabs_vc_map() {
   vc_map( array(
     "name" => __( "Map Tabs", 'kroth-core'),
     "base" => "krth_map_tabs",
     "description" => __( "Map Tabs Group", 'kroth-core'),
     "as_parent" => array('only' => 'krth_gmap'),
     "content_element" => true,
     "show_settings_on_create" => true,
     "is_container" => true,
     "icon" => "fa fa-map color-blue",
     "category" => KrothLib::krth_cat_name(),
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __( "Tab Columns", 'kroth-core' ),
          "param_name" => "tab_columns",
          "value" => array(
            __('Select Tab Columns', 'kroth-core') =>'',
            __('Two Column', 'kroth-core') => 'map-tab-2-col',
            __('Three Column', 'kroth-core') => 'map-tab-3-col',
            __('Four Column', 'kroth-core') => 'map-tab-4-col',
            __('Five Column', 'kroth-core') => 'map-tab-5-col',
          ),
          "admin_label" => true,
          "description" => __( "Select map tab columns.", 'kroth-core'),
        ),

        // Param Group
        array(
          'type'       => 'param_group',
          'heading'    => __( 'Address Content', 'kroth-core' ),
          'param_name' => 'address_content',
          'value'      => urlencode( json_encode( array(
            array(
              'title' => __( 'Berlin', 'kroth-core' ),
              'tab_id' => 'map-id-1',
              'content_text' => '[vt_address_infos][vt_address_info address_style="style-two" info_icon="icon-directions" info_icon_color="#131d33" info_main_text="514 Sixth Avenue New York, NY 90210" info_main_text_color="#232323"][vt_address_info address_style="style-two" info_icon="icon-screen-smartphone" info_icon_color="#131d33" info_main_text="01 (800) 433 544" info_main_text_color="#232323"][vt_address_info address_style="style-two" info_icon="icon-envelope" info_icon_color="#131d33" info_main_text="berlin@victorthemes.com" info_main_text_color="#232323"][/vt_address_infos]',
              'title_color' => '#232323',
              'title_bg_color' => '#fa9928',
            ),
            array(
              'title' => __( 'Newyork', 'kroth-core' ),
              'tab_id' => 'map-id-2',
              'content_text' => '[vt_address_infos][vt_address_info address_style="style-two" info_icon="icon-directions" info_icon_color="#131d33" info_main_text="514 Sixth Avenue New York, NY 90210" info_main_text_color="#232323"][vt_address_info address_style="style-two" info_icon="icon-screen-smartphone" info_icon_color="#131d33" info_main_text="01 (800) 433 544" info_main_text_color="#232323"][vt_address_info address_style="style-two" info_icon="icon-envelope" info_icon_color="#131d33" info_main_text="berlin@victorthemes.com" info_main_text_color="#232323"][/vt_address_infos]',
              'title_color' => '#ffffff',
              'title_bg_color' => '#131d33',
            ),
            array(
              'title' => __( 'London', 'kroth-core' ),
              'tab_id' => 'map-id-3',
              'content_text' => '[vt_address_infos][vt_address_info address_style="style-two" info_icon="icon-directions" info_icon_color="#131d33" info_main_text="514 Sixth Avenue New York, NY 90210" info_main_text_color="#232323"][vt_address_info address_style="style-two" info_icon="icon-screen-smartphone" info_icon_color="#131d33" info_main_text="01 (800) 433 544" info_main_text_color="#232323"][vt_address_info address_style="style-two" info_icon="icon-envelope" info_icon_color="#131d33" info_main_text="berlin@victorthemes.com" info_main_text_color="#232323"][/vt_address_infos]',
              'title_color' => '#232323',
              'title_bg_color' => '#f7f8f9',
            )
          ) ) ),
          'params'     => array(
            array(
              'type'        => 'textfield',
              'heading'     => __( 'Title', 'kroth-core' ),
              'param_name'  => 'title',
              'description' => __( 'Enter title for chart dataset.', 'kroth-core' ),
              'admin_label' => true,
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type'        => 'textfield',
              'heading'     => __( 'Tab ID', 'kroth-core' ),
              'param_name'  => 'tab_id',
              'description' => __( 'Enter this tab id. Use this same id in google map shortcode to view in this tab control.', 'kroth-core' ),
              'admin_label' => true,
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type'        => 'textarea',
              'heading'     => __( 'Content', 'kroth-core' ),
              'param_name'  => 'content_text',
              'description' => __( 'Enter title for chart dataset.', 'kroth-core' ),
            ),

            array(
              'type'        => 'colorpicker',
              'heading'     => __('Title Color', 'kroth-core'),
              'param_name'  => 'title_color',
              'value'       => '',
              'group'       => __( 'Style', 'kroth-core' ),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => __('Title Background Color', 'kroth-core'),
              'param_name'  => 'title_bg_color',
              'value'       => '',
              'group'       => __( 'Style', 'kroth-core' ),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type'        => 'colorpicker',
              'heading'     => __('Content Background Color', 'kroth-core'),
              'param_name'  => 'content_bg_color',
              'value'       => '',
              'group'       => __( 'Style', 'kroth-core' ),
            ),
          )
        ),
        // Param Groups

        array(
          'type'        => 'textfield',
          'heading'     => __('Map Height', 'kroth-core'),
          'param_name'  => 'map_height',
          'value'       => '',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Next & Previous Links', 'kroth-core'),
          "param_name"  => "next_prev_links",
          "value"       => "",
          "std"         => true,
        ),
        KrothLib::vt_class_option(),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'kroth-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'kroth-core'),
        ),

     ),
     "js_view" => 'VcColumnView'
   ) );
 }
}