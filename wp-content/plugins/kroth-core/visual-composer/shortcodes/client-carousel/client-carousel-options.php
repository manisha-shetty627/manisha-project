<?php
/**
 * Client Carousel - Shortcode Options
 */
add_action( 'init', 'client_carousel_vc_map' );
if ( ! function_exists( 'client_carousel_vc_map' ) ) {
  function client_carousel_vc_map() {
    vc_map( array(
      "name" => __( "Client", 'kroth-core'),
      "base" => "krth_client_carousel",
      "description" => __( "Client Carousel", 'kroth-core'),
      "icon" => "fa fa-shield color-green",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        KrothLib::vt_open_link_tab(),

        // Client Logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Client Logos', 'kroth-core' ),
          'param_name' => 'client_logos',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'attach_image',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Upload Image', 'kroth-core' ),
              'param_name' => 'client_logo',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Client Link', 'kroth-core' ),
              'param_name' => 'client_link',
            )
          )
        ),
        KrothLib::vt_class_option(),

        // Carousel
        KrothLib::vt_notice_field(__( "Basic Options", 'kroth-core' ),'bsic_opt','cs-warning', 'Carousel'), // Notice
        KrothLib::vt_carousel_loop(), // Loop
        KrothLib::vt_carousel_items(), // Items
        KrothLib::vt_carousel_margin(), // Margin
        KrothLib::vt_notice_field(__( "Auto Play & Interaction", 'kroth-core' ),'apyi_opt','cs-warning', 'Carousel'), // Notice
        KrothLib::vt_carousel_autoplay_timeout(), // Autoplay Timeout
        KrothLib::vt_carousel_autoplay(), // Autoplay
        KrothLib::vt_carousel_animateout(), // Animate Out
        KrothLib::vt_carousel_mousedrag(), // Mouse Drag
        KrothLib::vt_notice_field(__( "Width & Height", 'kroth-core' ),'wah_opt','cs-warning', 'Carousel'), // Notice
        KrothLib::vt_carousel_autowidth(), // Auto Width
        KrothLib::vt_carousel_autoheight(), // Auto Height
        KrothLib::vt_notice_field('Responsive Options','res_opt','cs-warning', 'Carousel'), // Notice
        KrothLib::vt_carousel_tablet(), // Tablet
        KrothLib::vt_carousel_mobile(), // Mobile
        KrothLib::vt_carousel_small_mobile(), // Small Mobile

      )
    ) );
  }
}
