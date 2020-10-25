<?php
/**
 * Tab Links - Shortcode Options
 */
add_action( 'init', 'tab_links_vc_map' );
if ( ! function_exists( 'tab_links_vc_map' ) ) {
  function tab_links_vc_map() {
    vc_map( array(
      "name" => __( "Tab Links", 'kroth-core'),
      "base" => "krth_tab_links",
      "description" => __( "Tab type links list", 'kroth-core'),
      "icon" => "fa fa-link color-pink",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        // Client Logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Tab Links', 'kroth-core' ),
          'param_name' => 'tab_links',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'vc_link',
              'value' => '',
              'heading' => __( 'Title & Link', 'kroth-core' ),
              'param_name' => 'title_link',
            ),
            array(
              'type'  => 'switcher',
              'value' => '',
              'on_text'  => __( 'Yes', 'kroth-core' ),
              'off_text' => __( 'No', 'kroth-core' ),
              'std'   => false,
              'heading'    => __( 'Need right arrow icon?', 'kroth-core' ),
              'param_name' => 'right_icon',
              'admin_label' => true,
            )
          )
        ),
        KrothLib::vt_class_option(),

      )
    ) );
  }
}
