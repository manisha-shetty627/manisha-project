<?php
/**
 * Gmap - Shortcode Options
 */
add_action( 'init', 'krth_gmap_vc_map' );
if ( ! function_exists( 'krth_gmap_vc_map' ) ) {
  function krth_gmap_vc_map() {
    vc_map( array(
      "name" => __( "Google Map", 'kroth-core'),
      "base" => "krth_gmap",
      "description" => __( "Google Map Styles", 'kroth-core'),
      "icon" => "fa fa-map color-cadetblue",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          "type"        => "notice",
          "heading"     => __( "API KEY", 'kroth-core' ),
          "param_name"  => 'api_key',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter Map ID', 'kroth-core'),
          "param_name"  => "gmap_id",
          "value"       => "",
          "description" => __( 'Enter google map ID. If you\'re using this in <strong>Map Tab</strong> shortcode, enter unique ID for each map tabs. Else leave it as blank. <strong>Note : This should same as Tab ID in Map Tabs shortcode.</strong>', 'kroth-core'),
          'admin_label' => true,
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter your Google Map API Key', 'kroth-core'),
          "param_name"  => "gmap_api",
          "value"       => "",
          "description" => __( 'New Google Maps usage policy dictates that everyone using the maps should register for a free API key. <br />Please create a key for "Google Static Maps API" and "Google Maps Embed API" using the <a href="https://console.developers.google.com/project" target="_blank">Google Developers Console</a>.<br /> Or follow this step links : <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">1. Step One</a> <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=static_maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">2. Step Two</a><br /> If you still receive errors, please check following link : <a href="https://churchthemes.com/2016/07/15/page-didnt-load-google-maps-correctly/" target="_blank">How to Fix?</a>', 'kroth-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Map Settings", 'kroth-core' ),
          "param_name"  => 'map_settings',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Type', 'kroth-core' ),
          'value' => array(
            __( 'Select Type', 'kroth-core' ) => '',
            __( 'ROADMAP', 'kroth-core' ) => 'ROADMAP',
            __( 'SATELLITE', 'kroth-core' ) => 'SATELLITE',
            __( 'HYBRID', 'kroth-core' ) => 'HYBRID',
            __( 'TERRAIN', 'kroth-core' ) => 'TERRAIN',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_type',
          'description' => __( 'Select your google map type.', 'kroth-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Style', 'kroth-core' ),
          'value' => array(
            __( 'Select Style', 'kroth-core' ) => '',
            __( 'Gray Scale', 'kroth-core' ) => "gray-scale",
            __( 'Mid Night', 'kroth-core' ) => "mid-night",
            __( 'Blue Water', 'kroth-core' ) => 'blue-water',
            __( 'Light Dream', 'kroth-core' ) => 'light-dream',
            __( 'Pale Dawn', 'kroth-core' ) => 'pale-dawn',
            __( 'Apple Maps-esque', 'kroth-core' ) => 'apple-maps',
            __( 'Blue Essence', 'kroth-core' ) => 'blue-essence',
            __( 'Unsaturated Browns', 'kroth-core' ) => 'unsaturated-browns',
            __( 'Paper', 'kroth-core' ) => 'paper',
            __( 'Midnight Commander', 'kroth-core' ) => 'midnight-commander',
            __( 'Light Monochrome', 'kroth-core' ) => 'light-monochrome',
            __( 'Flat Map', 'kroth-core' ) => 'flat-map',
            __( 'Retro', 'kroth-core' ) => 'retro',
            __( 'becomeadinosaur', 'kroth-core' ) => 'becomeadinosaur',
            __( 'Neutral Blue', 'kroth-core' ) => 'neutral-blue',
            __( 'Subtle Grayscale', 'kroth-core' ) => 'subtle-grayscale',
            __( 'Ultra Light with Labels', 'kroth-core' ) => 'ultra-light-labels',
            __( 'Shades of Grey', 'kroth-core' ) => 'shades-grey',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_style',
          'description' => __( 'Select your google map style.', 'kroth-core' ),
          'dependency' => array(
            'element' => 'gmap_type',
            'value' => 'ROADMAP',
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Height', 'kroth-core'),
          "param_name"  => "gmap_height",
          "value"       => "",
          "description" => __( "Enter the px value for map height. This will not work if you add this shortcode into the Map Tab shortcode.", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Common Marker', 'kroth-core'),
          "param_name"  => "gmap_common_marker",
          "value"       => "",
          "description" => __( "Upload your custom marker.", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Zoom', 'kroth-core'),
          "param_name"  => "gmap_zoom",
          "value"       => "",
          "description" => __( "Enter zoom as numeric value. [Eg : 18]", 'kroth-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Enable & Disable", 'kroth-core' ),
          "param_name"  => 'enb_disb',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Scroll Wheel', 'kroth-core'),
          "param_name"  => "gmap_scroll_wheel",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Street View Control', 'kroth-core'),
          "param_name"  => "gmap_street_view",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Map Type Control', 'kroth-core'),
          "param_name"  => "gmap_maptype_control",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        // Map Markers
        array(
          "type"        => "notice",
          "heading"     => __( "Map Pins", 'kroth-core' ),
          "param_name"  => 'map_pins',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Map Locations', 'kroth-core' ),
          'param_name' => 'locations',
          'params' => array(

            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Latitude', 'kroth-core' ),
              'param_name' => 'latitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Latitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'kroth-core' ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Longitude', 'kroth-core' ),
              'param_name' => 'longitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Longitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'kroth-core' ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Custom Marker', 'kroth-core' ),
              'param_name' => 'custom_marker',
              "description" => __( "Upload your unique map marker if your want to differentiate from others.", 'kroth-core'),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Heading', 'kroth-core' ),
              'param_name' => 'location_heading',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Content', 'kroth-core' ),
              'param_name' => 'location_text',
            ),

          )
        ),

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
