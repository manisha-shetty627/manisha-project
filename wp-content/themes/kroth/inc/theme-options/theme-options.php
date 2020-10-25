<?php
/*
 * All Theme Options for Kroth theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

function kroth_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => KROTH_NAME . __(' Options', 'kroth'),
    'menu_slug'       => sanitize_title(KROTH_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => KROTH_NAME .' <small>V-'. KROTH_VERSION .' by <a href="'. KROTH_BRAND_URL .'" target="_blank">'. KROTH_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'kroth_vt_settings' );

// Theme Framework Options
function kroth_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => __('Brand', 'kroth'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => __('Logo', 'kroth'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Site Logo', 'kroth')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => __('Default Logo', 'kroth'),
            'info'  => __('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'kroth'),
            'add_title' => __('Add Logo', 'kroth'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => __('Retina Logo', 'kroth'),
            'info'  => __('Upload your retina logo here. Recommended size is 2x from default logo.', 'kroth'),
            'add_title' => __('Add Retina Logo', 'kroth'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => __('Retina & Normal Logo Width', 'kroth'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => __('Retina & Normal Logo Height', 'kroth'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => __('Logo Top Space', 'kroth'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => __('Logo Bottom Space', 'kroth'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Transparent Header', 'kroth')
          ),
          array(
            'id'    => 'transparent_logo_default',
            'type'  => 'image',
            'title' => __('Transparent Logo', 'kroth'),
            'info'  => __('Upload your transparent header logo here. This logo is used in transparent header by enabled in each pages.', 'kroth'),
            'add_title' => __('Add Transparent Logo', 'kroth'),
          ),
          array(
            'id'    => 'transparent_logo_retina',
            'type'  => 'image',
            'title' => __('Transparent Retina Logo', 'kroth'),
            'info'  => __('Upload your transparent header retina logo here. This logo is used in transparent header by enabled in each pages.', 'kroth'),
            'add_title' => __('Add Transparent Retina Logo', 'kroth'),
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('WordPress Admin Logo', 'kroth')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => __('Login logo', 'kroth'),
            'info'  => __('Upload your WordPress login page logo here.', 'kroth'),
            'add_title' => __('Add Login Logo', 'kroth'),
          ),
        ) // end: fields
      ), // end: section

      // brand logo tab
      array(
        'name'     => 'mobile_logo_title',
        'title'    => __('Mobile Logo', 'kroth'),
        'icon'     => 'fa fa-mobile',
        'fields'   => array(

          // Mobile Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Mobile Logo - If you not upload mobile logo as separatly here, then normal logo will place in that position.', 'kroth')
          ),
          array(
            'id'    => 'mobile_logo_retina',
            'type'  => 'image',
            'title' => __('Mobile Logo', 'kroth'),
            'info'  => __('Upload your mobile logo as retina size.', 'kroth'),
            'add_title' => __('Add Mobile Logo', 'kroth'),
          ),
          array(
            'id'          => 'mobile_logo_width',
            'type'        => 'text',
            'title'       => __('Mobile Logo Width', 'kroth'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_height',
            'type'        => 'text',
            'title'       => __('Mobile Logo Height', 'kroth'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_top',
            'type'        => 'number',
            'title'       => __('Logo Top Space', 'kroth'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_bottom',
            'type'        => 'number',
            'title'       => __('Logo Bottom Space', 'kroth'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => __('Fav Icon', 'kroth'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => __('Fav Icon', 'kroth'),
              'info'  => __('Upload your site fav icon, size should be 16x16.', 'kroth'),
              'add_title' => __('Add Fav Icon', 'kroth'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => __('Apple iPhone icon', 'kroth'),
              'info'  => __('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'kroth'),
              'add_title' => __('Add iPhone Icon', 'kroth'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => __('Apple iPhone retina icon', 'kroth'),
              'info'  => __('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'kroth'),
              'add_title' => __('Add iPhone Retina Icon', 'kroth'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => __('Apple iPad icon', 'kroth'),
              'info'  => __('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'kroth'),
              'add_title' => __('Add iPad Icon', 'kroth'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => __('Apple iPad retina icon', 'kroth'),
              'info'  => __('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'kroth'),
              'add_title' => __('Add iPad Retina Icon', 'kroth'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => __('Layout', 'kroth'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => __('General', 'kroth'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_responsive',
        'type'  => 'switcher',
        'title' => __('Responsive', 'kroth'),
        'info' => __('Turn off if you don\'t want your site to be responsive.', 'kroth'),
        'default' => true,
      ),
      array(
        'id'    => 'theme_layout_width',
        'type'  => 'image_select',
        'title' => __('Full Width & Extra Width', 'kroth'),
        'info' => __('Boxed or Fullwidth? Choose your site layout width. Default : Full Width', 'kroth'),
        'options'      => array(
          'container'    => KROTH_CS_IMAGES .'/boxed-width.jpg',
          'container-fluid'    => KROTH_CS_IMAGES .'/full-width.jpg',
        ),
        'default'      => 'container-fluid',
        'radio'      => true,
      ),
      array(
        'id'    => 'theme_page_comments',
        'type'  => 'switcher',
        'title' => __('Page Comments', 'kroth'),
        'info' => __('Turn On if you want to show comments in your pages.', 'kroth'),
        'default' => true,
      ),
      array(
        'id'    => 'theme_img_resizer',
        'type'  => 'switcher',
        'title' => __('Disable Image Resizer?', 'kroth'),
        'info' => __('Turn on if you don\'t want image resizer.', 'kroth'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Background Options', 'kroth'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => __('Background Type', 'kroth'),
        'options'        => array(
          'bg-image' => __('Image', 'kroth'),
          'bg-pattern' => __('Pattern', 'kroth'),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => __('Background Pattern', 'kroth'),
        'info' => __('Select background pattern', 'kroth'),
        'options'      => array(
          'pattern-1'    => KROTH_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => KROTH_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => KROTH_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => KROTH_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => KROTH_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => __('Custom Pattern', 'kroth'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => __('Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'kroth'),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => __('Background', 'kroth'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),
      array(
        'id'      => 'theme_bg_parallax',
        'type'    => 'switcher',
        'title'   => __('Parallax', 'kroth'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_parallax_speed',
        'type'    => 'text',
        'title'   => __('Parallax Speed', 'kroth'),
        'attributes' => array(
          'placeholder'     => '0.4',
        ),
        'dependency' => array( 'theme_layout_width_container|theme_bg_parallax', '==|!=', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_overlay_color',
        'type'    => 'color_picker',
        'title'   => __('Overlay Color', 'kroth'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => __('Header', 'kroth'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => __('Design', 'kroth'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Header Select
          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => __('Select Header Design', 'kroth'),
            'options'      => array(
              'style_one'    => KROTH_CS_IMAGES .'/hs-1.png',
              'style_two'    => KROTH_CS_IMAGES .'/hs-2.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'        => true,
            'default'   => 'style_one',
            'info' => __('Select your header design, following options will may differ based on your selection of header design.', 'kroth'),
          ),
          array(
            'id'              => 'header_address_info',
            'title'           => __('Header Content', 'kroth'),
            'desc'            => __('Add your header content here. Example : Address Details', 'kroth'),
            'type'            => 'textarea',
            'shortcode'       => true,
            'dependency' => array('header_design', '==', 'style_one'),
          ),
          // Header Select

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Extra\'s', 'kroth'),
          ),
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => __('Mobile Menu Starts from?', 'kroth'),
            'attributes'  => array( 'placeholder' => '767' ),
            'info' => __('Just put numeric value only. Like : 767. Don\'t use px or any other units.', 'kroth'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => __('Sticky Header', 'kroth'),
            'info' => __('Turn On if you want your naviagtion bar on sticky.', 'kroth'),
            'default' => true,
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => __('Search Icon', 'kroth'),
            'info' => __('Turn On if you want to show search icon in navigation bar.', 'kroth'),
            'default' => true,
          ),
          array(
            'id'    => 'cart_widget',
            'type'  => 'switcher',
            'title' => __('Cart Widget', 'kroth'),
            'info' => __('Turn On if you want to show cart widget in header. Make sure about installation/activation of WooCommerce plugin.', 'kroth'),
            'default' => false,
            'dependency' => array('header_design', 'any', 'style_two,style_four'),
          ),

        )
      ),

      // header top bar
      array(
        'name'     => 'header_top_bar_tab',
        'title'    => __('Top Bar', 'kroth'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'          => 'top_bar',
            'type'        => 'switcher',
            'title'       => __('Hide Top Bar', 'kroth'),
            'on_text'     => __('Yes', 'kroth'),
            'off_text'    => __('No', 'kroth'),
            'default'     => false,
          ),
          array(
            'id'          => 'top_left',
            'title'       => __('Top Left Block', 'kroth'),
            'desc'        => __('Top bar left block.', 'kroth'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'top_right',
            'title'       => __('Top Right Block', 'kroth'),
            'desc'        => __('Top bar right block.', 'kroth'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),

          array(
            'id'          => 'topbar_left_width',
            'type'        => 'text',
            'title'       => __('Top Left Width in %', 'kroth'),
            'attributes'  => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'topbar_right_width',
            'type'        => 'text',
            'title'       => __('Top Right Width in %', 'kroth'),
            'attributes'  => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('top_bar', '==', false),
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => __('Title Bar (or) Banner', 'kroth'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Title Area', 'kroth')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => __('Title Bar', 'kroth'),
            'label'   => __('If you want title bar in your sub-pages, please turn this ON.', 'kroth'),
            'default'    => true,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => __('Padding Spaces Top & Bottom', 'kroth'),
            'options'        => array(
              'padding-none' => __('Default Spacing', 'kroth'),
              'padding-xs' => __('Extra Small Padding', 'kroth'),
              'padding-sm' => __('Small Padding', 'kroth'),
              'padding-md' => __('Medium Padding', 'kroth'),
              'padding-lg' => __('Large Padding', 'kroth'),
              'padding-xl' => __('Extra Large Padding', 'kroth'),
              'padding-no' => __('No Padding', 'kroth'),
              'padding-custom' => __('Custom Padding', 'kroth'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => __('Padding Top', 'kroth'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => __('Padding Bottom', 'kroth'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Background Options', 'kroth'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg',
            'type'    => 'background',
            'title'   => __('Background', 'kroth'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => __('Overlay Color', 'kroth'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Breadcrumbs', 'kroth'),
          ),
          array(
            'id'      => 'need_breadcrumbs',
            'type'    => 'switcher',
            'title'   => __('Breadcrumbs', 'kroth'),
            'label'   => __('If you want Breadcrumbs in your banner, please turn this ON.', 'kroth'),
            'default'    => true,
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => __('Footer', 'kroth'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => __('Widget Area', 'kroth'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Footer Widget Block', 'kroth')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => __('Enable Widget Block', 'kroth'),
            'info' => __('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'kroth'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => __('Widget Layouts', 'kroth'),
            'info' => __('Choose your footer widget layouts.', 'kroth'),
            'default' => 4,
            'options' => array(
              1   => KROTH_CS_IMAGES . '/footer/footer-1.png',
              2   => KROTH_CS_IMAGES . '/footer/footer-2.png',
              3   => KROTH_CS_IMAGES . '/footer/footer-3.png',
              4   => KROTH_CS_IMAGES . '/footer/footer-4.png',
              5   => KROTH_CS_IMAGES . '/footer/footer-5.png',
              6   => KROTH_CS_IMAGES . '/footer/footer-6.png',
              7   => KROTH_CS_IMAGES . '/footer/footer-7.png',
              8   => KROTH_CS_IMAGES . '/footer/footer-8.png',
              9   => KROTH_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => __('Copyright Bar', 'kroth'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Copyright Layout', 'kroth'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => __('Enable Copyright Section', 'kroth'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => __('Select Copyright Layout', 'kroth'),
            'info' => __('In above image, blue box is copyright text and yellow box is secondary text.', 'kroth'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => KROTH_CS_IMAGES .'/footer/copyright-1.png',
              'copyright-2'    => KROTH_CS_IMAGES .'/footer/copyright-2.png',
              'copyright-3'    => KROTH_CS_IMAGES .'/footer/copyright-3.png',
              ),
            'radio'        => true,
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => __('Copyright Text', 'kroth'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => __('Copyright Secondary Text', 'kroth'),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => __('Secondary Text', 'kroth'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => __('Design', 'kroth'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => __('Colors', 'kroth'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => __('Color Options', 'kroth'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => __('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'kroth'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => __('Typography', 'kroth'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => __('Title', 'kroth'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => __('Selector', 'kroth'),
            'info'           => __('Enter css selectors like : <strong>body, .custom-class</strong>', 'kroth'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => __('Font Family', 'kroth'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => __('Font Size', 'kroth'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => __('Line-Height', 'kroth'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => __('Custom CSS', 'kroth'),
          ),
        ),
        'button_title'        => __('Add New Typography', 'kroth'),
        'accordion_title'     => __('New Typography', 'kroth'),
        'default'             => array(
          array(
            'title'           => __('Body Typography', 'kroth'),
            'selector'        => 'body, .krth-widget .mc4wp-form input[type="email"], .krth-widget .mc4wp-form input[type="text"]',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => __('Menu Typography', 'kroth'),
            'selector'        => '.krth-navigation .navbar-nav > li > a, .mean-container .mean-nav ul li a, .krth-header-two .krth-navigation .navbar-nav > li > a',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
            'size'            => '15px',
          ),
          array(
            'title'           => __('Sub Menu Typography', 'kroth'),
            'selector'        => '.dropdown-menu, .mean-container .mean-nav ul.sub-menu li a',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => __('Headings Typography', 'kroth'),
            'selector'        => 'h1, h2, h3, h4, h5, h6, .krth-location-name, .text-logo',
            'font'            => array(
              'family'        => 'Roboto Slab',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => __('Shortcode Elements Primary Font', 'kroth'),
            'selector'        => '.krth-search-two input, .krth-search-three input, .btn-fourth, .krth-counter-two .counter-label, .krth-list-icon h5, .krth-testimonials-two .testi-client-info .testi-name, .krth-testimonials-two .testi-client-info .testi-pro, .krth-testimonials-three .testi-client-info .testi-name, .krth-testimonials-three .testi-client-info .testi-pro, .krth-testimonials-four .testi-client-info .testi-name, .krth-testimonials-four .testi-client-info .testi-pro, .krth-testimonials-five .testi-name, .krth-list-icon h5, .krth-comments-area .krth-comments-meta .comments-reply, .footer-nav-links, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #review_form #respond .form-submit input, .woocommerce .products li.product a.button, .woocommerce #review_form #respond input, .woocommerce #review_form #respond select, .woocommerce #review_form #respond textarea, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .tooltip',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => __('Shortcode Elements Secondary Font', 'kroth'),
            'selector'        => '.nice-select, blockquote, .krth-link-arrow, input, select, textarea, .wpcf7 p, .krth-title-area .page-title, .krth-breadcrumbs ul, .krth-topbar-left, .krth-top-active, .krth-recent-blog .widget-bdate, .krth-topdd-content li a, .krth-list-three li, .krth-address-info, .krth-btn, .krth-cta-one, .krth-cta-two, .krth-service-one .service-heading, .krth-service-one .services-read-more, .service-heading, .krth-service-five .service-heading, .krth-tab-links li a, .krth-counter-one, .krth-counter-two, .krth-panel-one .panel-default > .panel-heading, .krth-panel-two .panel-heading, .nav-tabs-two .nav-tabs > li > a, .testimonial-heading, .testi-client-info .testi-name, .krth-testimonials-three .testi-content p, .krth-team-member .team-content .team-name, .krth-team-member-two .team-content .team-name, .krth-team-member-two .team-content .view-profile, .krth-team-details .tm-name, .krth-history .bh-year, .krth-blog-one .bp-top-meta > div, .krth-blog-one .bp-heading, .krth-blog-one .bp-read-more, .krth-blog-one .bp-bottom-comments a, .featured-image.krth-theme-carousel .owl-controls, .bp-share > p, .bp-author-info .author-content .author-pro, .bp-author-info .author-content .author-name, .krth-comments-area .comments-title, .krth-comments-area .krth-comments-meta, .wp-pagenavi, .wp-link-pages, .krth-list-four li, .krth-map-address, .krth-get-quote .bgq-btn, .krth-widget .widget-title, .krth-blog-widget, .krth-sidebar .krth-widget.krth-recent-blog .widget-bdate, .krth-widget .mc4wp-form input[type="submit"], .krth-copyright, .woocommerce ul.products li.product .price, .woocommerce a.added_to_cart, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta, .woocommerce table.shop_table .cart_item td .amount, .woocommerce table.woocommerce-checkout-review-order-table tfoot td, .woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a, .woocommerce ul.product_list_widget li .amount, .woocommerce .widget_price_filter .price_slider_amount, .woocommerce .woocommerce-result-count, .woocommerce-review-link, .woocommerce-cart .cart-collaterals .cart_totals table td, .woocommerce .widget_shopping_cart ul.product_list_widget li .amount, .woocommerce .widget_shopping_cart ul.product_list_widget li .quantity',
            'font'            => array(
              'family'        => 'Roboto Slab',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => __('Example Usage', 'kroth'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Roboto Slab',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => __('Subsets', 'kroth'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => __('Font Weights', 'kroth'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'svg',
            'type'           => 'upload',
            'title'          => 'Upload .svg <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.svg</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => __('Pages', 'kroth'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Portfolio Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'portfolio_section',
    'title'    => __('Portfolio', 'kroth'),
    'icon'     => 'fa fa-briefcase',
    'fields' => array(

      // portfolio name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Name Change', 'kroth')
      ),
      array(
        'id'      => 'theme_portfolio_name',
        'type'    => 'text',
        'title'   => __('Portfolio Name', 'kroth'),
        'attributes'     => array(
          'placeholder'  => 'Portfolio'
        ),
      ),
      array(
        'id'      => 'theme_portfolio_slug',
        'type'    => 'text',
        'title'   => __('Portfolio Slug', 'kroth'),
        'attributes'     => array(
          'placeholder'  => 'portfolio-item'
        ),
      ),
      array(
        'id'      => 'theme_portfolio_cat_slug',
        'type'    => 'text',
        'title'   => __('Portfolio Category Slug', 'kroth'),
        'attributes'     => array(
          'placeholder'  => 'portfolio-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => __('<strong>Important</strong>: Please do not set portfolio slug and page slug as same. It\'ll not work.', 'kroth')
      ),
      // Portfolio Name

      // portfolio listing
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Portfolio Style', 'kroth')
      ),
      array(
        'id'             => 'portfolio_style',
        'type'           => 'select',
        'title'          => __('Portfolio Style', 'kroth'),
        'options'        => array(
          'one' => __('Style One', 'kroth'),
          'two' => __('Style Two', 'kroth'),
        ),
        'default_option'     => __('Select Portfolio Style', 'kroth'),
      ),
      array(
        'id'             => 'portfolio_column',
        'type'           => 'select',
        'title'          => __('Portfolio Column', 'kroth'),
        'options'        => array(
          'bpw-col-2' => __('Two Columns', 'kroth'),
          'bpw-col-3' => __('Three Columns', 'kroth'),
          'bpw-col-4' => __('Four Columns', 'kroth'),
          'bpw-col-5' => __('Five Columns', 'kroth'),
        ),
        'default_option'     => __('Select Portfolio Column', 'kroth'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Enable/Disable Options', 'kroth')
      ),
      array(
        'id'      => 'portfolio_pagination',
        'type'    => 'switcher',
        'title'   => __('Pagination', 'kroth'),
        'label'   => __('If you need pagination in portfolio pages, please turn this ON.', 'kroth'),
        'default'   => true,
      ),
      array(
        'id'      => 'portfolio_no_space',
        'type'    => 'switcher',
        'title'   => __('Gutter Space', 'kroth'),
        'label'   => __('If you don\'t want gutter spaces between portfolio items, please turn this ON.', 'kroth'),
        'default'   => false,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Single Portfolio', 'kroth')
      ),
      array(
        'id'      => 'portfolio_single_pagination',
        'type'    => 'switcher',
        'title'   => __('Next & Prev Navigation', 'kroth'),
        'label'   => __('If you don\'t want next and previous navigation in portfolio single pages, please turn this OFF.', 'kroth'),
        'default'   => true,
      ),
      // Portfolio Listing

    ),
  );

  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => __('Team', 'kroth'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Team Single', 'kroth')
      ),
      array(
        'id'      => 'team_top_spacing',
        'type'    => 'text',
        'title'   => __('Top Spacing', 'kroth'),
        'info'   => __('Enter value in px, for team single pages top value.', 'kroth'),
        'default' => '60px',
      ),
      array(
        'id'      => 'team_bottom_spacing',
        'type'    => 'text',
        'title'   => __('Bottom Spacing', 'kroth'),
        'info'   => __('Enter value in px, for team single pages bottom value.', 'kroth'),
        'default' => '0px',
      ),
      // Team End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => __('Blog', 'kroth'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => __('General', 'kroth'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Layout', 'kroth')
          ),
          array(
            'id'             => 'blog_listing_style',
            'type'           => 'select',
            'title'          => __('Blog Listing Style', 'kroth'),
            'options'        => array(
              'style-one' => __('List (Default)', 'kroth'),
              'style-two' => __('Grid', 'kroth'),
              'style-three' => __('Grid Simple', 'kroth'),
            ),
            'default_option' => 'Select blog style',
            'help'          => __('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'kroth'),
          ),
          array(
            'id'             => 'blog_listing_columns',
            'type'           => 'select',
            'title'          => __('Blog Listing Columns', 'kroth'),
            'options'        => array(
              'krth-blog-col-1' => __('Column One', 'kroth'),
              'krth-blog-col-2' => __('Column Two', 'kroth'),
              'krth-blog-col-3' => __('Column Three', 'kroth'),
              'krth-blog-col-4' => __('Column Four', 'kroth'),
            ),
            'default_option' => 'Select blog column',
            'dependency'     => array('blog_listing_style', 'any', 'style-two,style-three'),
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => __('Sidebar Position', 'kroth'),
            'options'        => array(
              'sidebar-right' => __('Right', 'kroth'),
              'sidebar-left' => __('Left', 'kroth'),
              'sidebar-hide' => __('Hide', 'kroth'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => __('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'kroth'),
            'info'          => __('Default option : Right', 'kroth'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => __('Sidebar Widget', 'kroth'),
            'options'        => kroth_vt_registered_sidebars(),
            'default_option' => __('Select Widget', 'kroth'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => __('Default option : Main Widget Area', 'kroth'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Global Options', 'kroth')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => __('Exclude Categories', 'kroth'),
            'info'      => __('Select categories you want to exclude from blog page.', 'kroth'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => __('Excerpt Length', 'kroth'),
            'info'   => __('Blog short content length, in blog listing pages.', 'kroth'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => __('Meta\'s to hide', 'kroth'),
            'info'    => __('Check items you want to hide from blog/post meta field.', 'kroth'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => __('Category', 'kroth'),
              'date'    => __('Date', 'kroth'),
              'author'     => __('Author', 'kroth'),
              'comments'      => __('Comments', 'kroth'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => __('Single', 'kroth'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Enable / Disable', 'kroth')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => __('Featured Image', 'kroth'),
            'info' => __('If need to hide featured image from single blog post page, please turn this OFF.', 'kroth'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => __('Author Info', 'kroth'),
            'info' => __('If need to hide author info on single blog page, please turn this OFF.', 'kroth'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => __('Share Option', 'kroth'),
            'info' => __('If need to hide share option on single blog page, please turn this OFF.', 'kroth'),
            'default' => true,
          ),
          array(
            'id'    => 'single_comment_form',
            'type'  => 'switcher',
            'title' => __('Comment Area/Form', 'kroth'),
            'info' => __('If need to hide comment area and that form on single blog page, please turn this OFF.', 'kroth'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Sidebar', 'kroth')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => __('Sidebar Position', 'kroth'),
            'options'        => array(
              'sidebar-right' => __('Right', 'kroth'),
              'sidebar-left' => __('Left', 'kroth'),
              'sidebar-hide' => __('Hide', 'kroth'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => __('Default option : Right', 'kroth'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => __('Sidebar Widget', 'kroth'),
            'options'        => kroth_vt_registered_sidebars(),
            'default_option' => __('Select Widget', 'kroth'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => __('Default option : Main Widget Area', 'kroth'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => __('WooCommerce', 'kroth'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Layout', 'kroth')
      ),
      array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => __('Product Column', 'kroth'),
        'options'        => array(
          3 => __('Three Column', 'kroth'),
          4 => __('Four Column', 'kroth'),
        ),
        'default_option' => __('Select Product Columns', 'kroth'),
        'help'          => __('This style will apply, default woocommerce listings pages. Like, shop and archive pages.', 'kroth'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => __('Sidebar Position', 'kroth'),
        'options'        => array(
          'right-sidebar' => __('Right', 'kroth'),
          'left-sidebar' => __('Left', 'kroth'),
          'sidebar-hide' => __('Hide', 'kroth'),
        ),
        'default_option' => __('Select sidebar position', 'kroth'),
        'info'          => __('Default option : Right', 'kroth'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => __('Sidebar Widget', 'kroth'),
        'options'        => kroth_vt_registered_sidebars(),
        'default_option' => __('Select Widget', 'kroth'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => __('Default option : Shop Page', 'kroth'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Listing', 'kroth')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => __('Product Limit', 'kroth'),
        'info'   => __('Enter the number value for per page products limit.', 'kroth'),
      ),
      array(
        'id'      => 'theme_align_height',
        'type'    => 'text',
        'title'   => __('Have Alignment Space?', 'kroth'),
        'info'   => __('Set minimun height of each products here. Current minimum height is 100px', 'kroth'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => __('Single Product', 'kroth')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => __('Related Products Limit', 'kroth'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => __('You May Also Like', 'kroth'),
        'info' => __('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'kroth'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => __('Related Products', 'kroth'),
        'info' => __('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'kroth'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => __('Extra Pages', 'kroth'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => __('404 Page', 'kroth'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => __('404 Page Heading', 'kroth'),
            'info'  => __('Enter 404 page heading.', 'kroth'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => __('404 Page Content', 'kroth'),
            'info'  => __('Enter 404 page content.', 'kroth'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => __('404 Page Background', 'kroth'),
            'info'  => __('Choose 404 page background styles.', 'kroth'),
            'add_title' => __('Add 404 Image', 'kroth'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => __('Button Text', 'kroth'),
            'info'  => __('Enter BACK TO HOME button text. If you want to change it.', 'kroth'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => __('Maintenance Mode', 'kroth'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'kroth')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => __('Maintenance Mode', 'kroth'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => __('Maintenance Mode Page', 'kroth'),
            'options'        => 'pages',
            'default_option' => __('Select a page', 'kroth'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => __('Page Background', 'kroth'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => __('Advanced', 'kroth'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => __('Misc', 'kroth'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => __('Custom Sidebar', 'kroth'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => __('Sidebars', 'kroth'),
            'desc'            => __('Go to Appearance -> Widgets after create sidebars', 'kroth'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => __('Sidebar Name', 'kroth'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => __('Custom Description', 'kroth'),
              )
            ),
            'accordion'       => true,
            'button_title'    => __('Add New Sidebar', 'kroth'),
            'accordion_title' => __('New Sidebar', 'kroth'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => __('Custom Codes', 'kroth'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Custom CSS', 'kroth')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => __('Enter your CSS code here...', 'kroth'),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Custom JS', 'kroth')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => __('Enter your JS code here...', 'kroth'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => __('Translation', 'kroth'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Common Texts', 'kroth')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => __('Read More Text', 'kroth'),
          ),
          array(
            'id'          => 'view_more_text',
            'type'        => 'text',
            'title'       => __('View More Text', 'kroth'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => __('Share Text', 'kroth'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => __('Share On Tooltip Text', 'kroth'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => __('Author Text', 'kroth'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => __('Post Comment Text [Submit Button]', 'kroth'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('WooCommerce', 'kroth')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => __('Add to Cart Text', 'kroth'),
          ),
          array(
            'id'          => 'details_text',
            'type'        => 'text',
            'title'       => __('Details Text', 'kroth'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Pagination', 'kroth')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => __('Older Posts Text', 'kroth'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => __('Newer Posts Text', 'kroth'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Single Portfolio Pagination', 'kroth')
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => __('Prev Project Text', 'kroth'),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => __('Next Project Text', 'kroth'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'kroth_vt_options' );