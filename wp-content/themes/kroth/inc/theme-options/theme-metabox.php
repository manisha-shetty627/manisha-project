<?php
/*
 * All Metabox related options for Kroth theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

function kroth_vt_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => __('Post Options', 'kroth'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => __('There is no Extra Option for this Post Format!', 'kroth'),
            'wrap_class' => 'vt-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => __('Gallery Format', 'kroth')
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => __('Add Gallery', 'kroth'),
            'add_title'   => __('Add Image(s)', 'kroth'),
            'edit_title'  => __('Edit Image(s)', 'kroth'),
            'clear_title' => __('Clear Image(s)', 'kroth'),
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => __('Page Custom Options', 'kroth'),
    'post_type' => array('post', 'page', 'portfolio', 'product', 'team'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_topbar_section',
        'title' => __('Top Bar', 'kroth'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'           => 'topbar_options',
            'type'         => 'image_select',
            'title'        => __('Topbar', 'kroth'),
            'options'      => array(
              'default'     => KROTH_CS_IMAGES .'/topbar-default.png',
              'custom'      => KROTH_CS_IMAGES .'/topbar-custom.png',
              'hide_topbar' => KROTH_CS_IMAGES .'/topbar-hide.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'hide_topbar_select',
            ),
            'radio'     => true,
            'default'   => 'default',
          ),
          array(
            'id'          => 'top_left',
            'type'        => 'textarea',
            'title'       => __('Top Left', 'kroth'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'          => 'top_right',
            'type'        => 'textarea',
            'title'       => __('Top Right', 'kroth'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'         => 'topbar_left_width',
            'type'       => 'text',
            'title'      => __('Top Left Width in %', 'kroth'),
            'attributes' => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'         => 'topbar_right_width',
            'type'       => 'text',
            'title'      => __('Top Right Width in %', 'kroth'),
            'attributes' => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_bg',
            'type'  => 'color_picker',
            'title' => __('Topbar Background Color', 'kroth'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_border',
            'type'  => 'color_picker',
            'title' => __('Topbar Border Color', 'kroth'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => __('Header', 'kroth'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => __('Select Header Design', 'kroth'),
            'options'      => array(
              'default'     => KROTH_CS_IMAGES .'/hs-0.png',
              'style_one'   => KROTH_CS_IMAGES .'/hs-1.png',
              'style_two'   => KROTH_CS_IMAGES .'/hs-2.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => __('Select your header design, following options will may differ based on your selection of header design.', 'kroth'),
          ),
          array(
            'id'              => 'header_address_info',
            'title'           => __('Header Content', 'kroth'),
            'desc'            => __('Add your header content here. Example : Address Details', 'kroth'),
            'type'            => 'textarea',
            'shortcode'       => true,
            'dependency' => array('header_design', '==', 'style_one'),
          ),

          array(
            'id'    => 'transparency_header',
            'type'  => 'switcher',
            'title' => __('Transparent Header', 'kroth'),
            'info' => __('Use Transparent Method', 'kroth'),
          ),
          array(
            'id'    => 'transparent_menu_color',
            'type'  => 'color_picker',
            'title' => __('Menu Color', 'kroth'),
            'info' => __('Pick your menu color. This color will only apply for non-sticky header mode.', 'kroth'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'    => 'transparent_menu_hover_color',
            'type'  => 'color_picker',
            'title' => __('Menu Hover Color', 'kroth'),
            'info' => __('Pick your menu hover color. This color will only apply for non-sticky header mode.', 'kroth'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => __('Choose Menu', 'kroth'),
            'desc'          => __('Choose custom menus for this page.', 'kroth'),
            'options'        => 'menus',
            'default_option' => __('Select your menu', 'kroth'),
          ),

          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Enable & Disable', 'kroth'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => __('Sticky Header', 'kroth'),
            'info' => __('Turn On if you want your naviagtion bar on sticky.', 'kroth'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => __('Search Icon', 'kroth'),
            'info' => __('Turn On if you want to show search icon in navigation bar.', 'kroth'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'cart_widget',
            'type'  => 'switcher',
            'title' => __('Cart Widget', 'kroth'),
            'info' => __('Turn On if you want to show cart widget in header. Make sure about installation/activation of WooCommerce plugin.', 'kroth'),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_two'),
          ),

        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => __('Banner & Title Area', 'kroth'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => __('Choose Banner Type', 'kroth'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => __('Revolution Slider or Any Shortcodes', 'kroth'),
            'desc' => __('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'kroth'),
            'attributes' => array(
              'placeholder' => __('Enter your shortcode...', 'kroth'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => __('Custom Title', 'kroth'),
            'attributes' => array(
              'placeholder' => __('Enter your custom title...', 'kroth'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => __('Title Area Spacings', 'kroth'),
            'options'   => array(
              'padding-none' => __('Default Spacing', 'kroth'),
              'padding-xs' => __('Extra Small Padding', 'kroth'),
              'padding-sm' => __('Small Padding', 'kroth'),
              'padding-md' => __('Medium Padding', 'kroth'),
              'padding-lg' => __('Large Padding', 'kroth'),
              'padding-xl' => __('Extra Large Padding', 'kroth'),
              'padding-no' => __('No Padding', 'kroth'),
              'padding-custom' => __('Custom Padding', 'kroth'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => __('Top Spacing', 'kroth'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => __('Bottom Spacing', 'kroth'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => __('Background', 'kroth'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => __('Overlay Color', 'kroth'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => __('Content Options', 'kroth'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => __('Content Spacings', 'kroth'),
            'options'   => array(
              'padding-none' => __('Default Spacing', 'kroth'),
              'padding-xs' => __('Extra Small Padding', 'kroth'),
              'padding-sm' => __('Small Padding', 'kroth'),
              'padding-md' => __('Medium Padding', 'kroth'),
              'padding-lg' => __('Large Padding', 'kroth'),
              'padding-xl' => __('Extra Large Padding', 'kroth'),
              'padding-cnt-no' => __('No Padding', 'kroth'),
              'padding-custom' => __('Custom Padding', 'kroth'),
            ),
            'desc' => __('Content area top and bottom spacings.', 'kroth'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => __('Top Spacing', 'kroth'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => __('Bottom Spacing', 'kroth'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => __('Enable & Disable', 'kroth'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => __('Hide Header', 'kroth'),
            'label' => __('Yes, Please do it.', 'kroth'),
          ),
          array(
            'id'    => 'hide_breadcrumbs',
            'type'  => 'switcher',
            'title' => __('Hide Breadcrumbs', 'kroth'),
            'label' => __('Yes, Please do it.', 'kroth'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => __('Hide Footer', 'kroth'),
            'label' => __('Yes, Please do it.', 'kroth'),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => __('Page Layout', 'kroth'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => KROTH_CS_IMAGES . '/page-1.png',
              'extra-width'   => KROTH_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => KROTH_CS_IMAGES . '/page-3.png',
              'right-sidebar' => KROTH_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => __('Sidebar Widget', 'kroth'),
            'options'        => kroth_vt_registered_sidebars(),
            'default_option' => __('Select Widget', 'kroth'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => __('Testimonial Client', 'kroth'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => __('Name', 'kroth'),
            'info'    => __('Enter client name', 'kroth'),
          ),
          array(
            'id'      => 'testi_name_link',
            'type'    => 'text',
            'title'   => __('Name Link', 'kroth'),
            'info'    => __('Enter client name link, if you want', 'kroth'),
          ),
          array(
            'id'      => 'testi_pro',
            'type'    => 'text',
            'title'   => __('Profession', 'kroth'),
            'info'    => __('Enter client profession', 'kroth'),
          ),
          array(
            'id'      => 'testi_pro_link',
            'type'    => 'text',
            'title'   => __('Profession Link', 'kroth'),
            'info'    => __('Enter client profession link', 'kroth'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => __('Job Position', 'kroth'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_option_section',
        'fields' => array(

          array(
            'id'      => 'team_job_position',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => __('Eg : Financial Manager', 'kroth'),
            ),
            'info'    => __('Enter this employee job position, in your company.', 'kroth'),
          ),
          array(
            'id'      => 'team_custom_link',
            'type'    => 'text',
            'title'    => __('Custom Link', 'kroth'),
            'attributes' => array(
              'placeholder' => __('http://', 'kroth'),
            ),
            'info'    => __('Enter your custom link, if you don\'t want to show this page.', 'kroth'),
          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'kroth_vt_metabox_options' );