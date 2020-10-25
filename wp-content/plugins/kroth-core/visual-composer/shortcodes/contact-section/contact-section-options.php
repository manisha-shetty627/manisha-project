<?php
/**
 * Contact Section - Shortcode Options
 */
add_action( 'init', 'contact_section_vc_map' );
if ( ! function_exists( 'contact_section_vc_map' ) ) {
  function contact_section_vc_map() {

    $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->post_title ] = $cform->ID;
      }
    } else {
      $contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
    }

    vc_map( array(
    "name" => __( "Contact Section", 'kroth-core'),
    "base" => "krth_contact_section",
    "description" => __( "Contact Section Style", 'kroth-core'),
    "icon" => "fa fa-paper-plane color-black",
    "category" => KrothLib::krth_cat_name(),
    "params" => array(

      array(
        'type' => 'dropdown',
        'value' => array(
          __( 'Select Contact Section Styles', 'kroth-core' ) => '',
          __( 'Style One', 'kroth-core' ) => 'contact-section-one',
          __( 'Style Two', 'kroth-core' ) => 'contact-section-two',
        ),
        'admin_label' => true,
        'heading' => __( 'Contact Section Form Box Style', 'kroth-core' ),
        'param_name' => 'section_style',
        'description' => __( 'Select from box style.', 'kroth-core' ),
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Title', 'kroth-core' ),
        'description' => __( 'Enter Form title for your contact section form.', 'kroth-core' ),
        'param_name' => 'section_title',
      ),
      array(
        'type' => 'dropdown',
        'value' => array(
          __( 'Select alignment', 'kroth-core' ) => '',
          __( 'Left Content - Right Contact Form', 'kroth-core' ) => 'section-content-left',
          __( 'Right Content - Left Contact Form', 'kroth-core' ) => 'section-content-right',
        ),
        'admin_label' => true,
        'heading' => __( 'Alignment', 'kroth-core' ),
        'param_name' => 'section_alignment',
        'description' => __( 'Select section alignment.', 'kroth-core' ),
      ),
      array(
        'type' => 'textarea_html',
        'value' => '',
        'heading' => __( 'Content', 'kroth-core' ),
        'param_name' => 'content',
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Contact form', 'js_composer' ),
        'param_name' => 'id',
        'value' => $contact_forms,
        'save_always' => true,
        'admin_label' => true,
        'description' => __( 'Select contact form. Note : This list is from <a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a> plugin. So, please be make sure you\'ve installed that plugin.', 'js_composer' ),
      ),
      KrothLib::vt_class_option(),

      // Style
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Title Color', 'kroth-core' ),
        'param_name' => 'title_color',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'group' => __( 'Title Area', 'kroth-core' ),
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Background/Overlay Color', 'kroth-core' ),
        'param_name' => 'title_bg_color',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'group' => __( 'Title Area', 'kroth-core' ),
      ),
      array(
        'type' => 'attach_image',
        'value' => '',
        'heading' => __( 'Background Image', 'kroth-core' ),
        'param_name' => 'title_bg_image',
        'description' => __( 'Select title alignment.', 'kroth-core' ),
        'group' => __( 'Title Area', 'kroth-core' ),
      ),
      array(
        'type' => 'dropdown',
        'value' => array(
          __( 'Select title alignment', 'kroth-core' ) => '',
          __( 'Center', 'kroth-core' ) => 'text-center',
          __( 'Left', 'kroth-core' ) => 'text-left',
          __( 'Right', 'kroth-core' ) => 'text-right',
        ),
        'admin_label' => true,
        'heading' => __( 'Title Alignment', 'kroth-core' ),
        'param_name' => 'title_alignment',
        'description' => __( 'Select title alignment.', 'kroth-core' ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'group' => __( 'Title Area', 'kroth-core' ),
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Title Size', 'kroth-core' ),
        'param_name' => 'title_size',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'group' => __( 'Title Area', 'kroth-core' ),
        'description' => __( 'Title font size in px.', 'kroth-core' ),
      ),

      ), // Params
    ) );
  }
}