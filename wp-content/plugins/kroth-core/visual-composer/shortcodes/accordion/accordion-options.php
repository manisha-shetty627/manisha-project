<?php
/**
 * Accordion - Shortcode Options
 */

add_action( 'init', 'krth_accordion_vc_map' );
if ( ! function_exists( 'krth_accordion_vc_map' ) ) {
  function krth_accordion_vc_map() {

    vc_map( array(
      'name'            => __( 'Kroth Accordion', 'kroth-core'),
      'base'            => 'vc_accordion',
      'is_container'    => true,
      'description'     => __( 'Accordion Styles', 'kroth-core'),
      'icon'            => 'fa fa-bars color-pink',
      'category'        => KrothLib::krth_cat_name(),
      'params'          => array(

        array(
          'type'        => 'dropdown',
          'heading'     => __( "Accordion Style", 'kroth-core'),
          'param_name'  => 'accordion_style',
          'value'       => array(
            __( "Select Accordion Style", 'kroth-core') => '',
            __( "Style One", 'kroth-core')   => 'style-one',
            __( "Style Two", 'kroth-core')   => 'style-two',
            __( "Style Three", 'kroth-core') => 'style-three',
          ),
          'description' => __( "Select Accordion Style", 'kroth-core'),
        ),
        KrothLib::vt_id_option(),
        KrothLib::vt_class_option(),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Active tab', 'kroth-core'),
          'param_name'  => 'active_tab',
          'description' => __( "Which tab you want to be active on load. [Eg. 1 or 2 or 3]", 'kroth-core'),
        ),
        array(
          'type'        => 'switcher',
          'heading'     => __( 'Only One Tab Active Mode', 'kroth-core'),
          'param_name'  => 'one_active',
          'description' => __( 'This will enable only one tab active at a time. All other tabs will be in-active mode.', 'kroth-core'),
        ),

      ),

      'custom_markup'   => '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="Add section"><span class="vc_icon"></span> <span class="tab-label">Add section</span></a></div>',
      'default_content' => '
        [vc_accordion_tab title="Accordion Tab 1" sub_title="Sub Title 1"][/vc_accordion_tab]
        [vc_accordion_tab title="Accordion Tab 2" sub_title="Sub Title 2"][/vc_accordion_tab]
      ',
      'js_view'         => 'VcAccordionView'
    ) );

    // ==========================================================================================
    // VC ACCORDION TAB
    // ==========================================================================================
    vc_map( array(
      'name'                      => __( 'Accordion Section', 'kroth-core'),
      'base'                      => 'vc_accordion_tab',
      // 'allowed_container_element' => 'vc_row',
      'is_container'              => true,
      'content_element'           => false,
      'category'                  => KrothLib::krth_cat_name(),
      'params'                    => array(
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Title', 'kroth-core'),
          'param_name'  => 'title',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Sub Title', 'kroth-core'),
          'param_name'  => 'sub_title',
          'description' => __( "Enter your sub title here, this only shows at : <strong>Accordion Style Three</strong>", 'kroth-core'),
        ),
        array(
          'type'        => 'vt_icon',
          'heading'     => __( 'Icon', 'kroth-core'),
          'param_name'  => 'icon',
        )
      ),
      'js_view'         => 'VcAccordionTabView'
    ) );

  }
}