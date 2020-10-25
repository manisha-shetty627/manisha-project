<?php
/**
 * Partners - Shortcode Options
 */
add_action( 'init', 'krth_partners_vc_map' );
if ( ! function_exists( 'krth_partners_vc_map' ) ) {
  function krth_partners_vc_map() {
    vc_map( array(
      "name" => __( "Partners", 'kroth-core'),
      "base" => "krth_partners",
      "description" => __( "Our Partners", 'kroth-core'),
      "icon" => "fa fa-user-plus color-orange",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        KrothLib::vt_open_link_tab(),
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Upload Partner Logo', 'kroth-core'),
          "param_name"  => "partner_logo",
          "value"       => "",
          "description" => __( "Upload your partner logo.", 'kroth-core')
        ),
        array(
          "type"        =>'href',
          "heading"     =>__('Logo Link', 'kroth-core'),
          "param_name"  => "partner_logo_link",
          "value"       => "",
          "description" => __( "Enter your partner logo link, if you want.", 'kroth-core')
        ),
        array(
          "type"        =>'vc_link',
          "heading"     =>__('Title', 'kroth-core'),
          "param_name"  => "partner_title",
          "value"       => "",
          "description" => __( "Enter your partner name and link, if you want.", 'kroth-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Profession', 'kroth-core'),
          "param_name"  => "partner_profession",
          "value"       => "",
          "description" => __( "Enter your partner profession.", 'kroth-core')
        ),
        array(
          "type"        =>'textarea_html',
          "heading"     =>__('Content', 'kroth-core'),
          "param_name"  => "content",
          "value"       => "",
          "description" => __( "Enter your partner detailed information.", 'kroth-core')
        ),
        KrothLib::vt_class_option(),

      )
    ) );
  }
}
