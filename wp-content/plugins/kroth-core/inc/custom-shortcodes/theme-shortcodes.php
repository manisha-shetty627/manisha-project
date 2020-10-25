<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if( ! function_exists( 'kroth_vt_shortcodes' ) ) {
  function kroth_vt_shortcodes( $options ) {

    $options       = array();

    /* Topbar Shortcodes */
    $options[]     = array(
      'title'      => __('Topbar Shortcodes', 'kroth'),
      'shortcodes' => array(

        // WPML
        array(
          'name'          => 'vt_topbar_wpml',
          'title'         => __('WPML Language Dropdown', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

          ),

        ),
        // WPML

      ),
    );

    /* Header Shortcodes */
    $options[]     = array(
      'title'      => __('Header Shortcodes', 'kroth'),
      'shortcodes' => array(

        // Address Info
        array(
          'name'          => 'vt_address_infos',
          'title'         => __('Address Info', 'kroth'),
          'view'          => 'clone',
          'clone_id'      => 'vt_address_info',
          'clone_title'   => __('Add New', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'address_style',
              'type'      => 'select',
              'options'   => array(
                'style-one' => __('Style One', 'kroth'),
                'style-two' => __('Style Two', 'kroth'),
              ),
              'title'     => __('Address Style', 'kroth'),
            ),
            array(
              'id'        => 'info_icon',
              'type'      => 'icon',
              'title'     => __('Info Icon', 'kroth')
            ),
            array(
              'id'        => 'info_icon_color',
              'type'      => 'color_picker',
              'title'     => __('Info Icon Color', 'kroth'),
            ),
            array(
              'id'        => 'info_main_text',
              'type'      => 'text',
              'title'     => __('Main Text', 'kroth')
            ),
            array(
              'id'        => 'info_main_text_link',
              'type'      => 'text',
              'title'     => __('Main Text Link', 'kroth')
            ),
            array(
              'id'        => 'info_main_text_color',
              'type'      => 'color_picker',
              'title'     => __('Main Text Color', 'kroth'),
            ),
            array(
              'id'        => 'info_sec_text',
              'type'      => 'text',
              'title'     => __('Secondary Text', 'kroth'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'info_sec_text_link',
              'type'      => 'text',
              'title'     => __('Secondary Text Link', 'kroth'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'info_sec_text_color',
              'type'      => 'color_picker',
              'title'     => __('Secondary Text Color', 'kroth'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'kroth'),
              'on_text'     => __('Yes', 'kroth'),
              'off_text'     => __('No', 'kroth'),
            ),

          ),

        ),
        // Address Info

      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => __('Content Shortcodes', 'kroth'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => __('Spacer', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => __('Height', 'kroth'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Social Icons
        array(
          'name'          => 'vt_socials',
          'title'         => __('Social Icons', 'kroth'),
          'view'          => 'clone',
          'clone_id'      => 'vt_social',
          'clone_title'   => __('Add New', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'social_select',
              'type'      => 'select',
              'options'   => array(
                'style-one' => __('Style One (Topbar)', 'kroth'),
                'style-two' => __('Style Two', 'kroth'),
                'style-three' => __('Style Three', 'kroth'),
              ),
              'title'     => __('Social Icons Style', 'kroth'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'kroth')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'kroth'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'kroth'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-three'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Backrgound Color', 'kroth'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-one'),
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Backrgound Hover Color', 'kroth'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-two'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'kroth'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-three'),
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'kroth'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'kroth')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => __('Social Icon', 'kroth')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'kroth'),
              'on_text'     => __('Yes', 'kroth'),
              'off_text'     => __('No', 'kroth'),
            ),

          ),

        ),
        // Social Icons

        // Useful Links
        array(
          'name'          => 'vt_useful_links',
          'title'         => __('Useful Links', 'kroth'),
          'view'          => 'clone',
          'clone_id'      => 'vt_useful_link',
          'clone_title'   => __('Add New', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'column_width',
              'type'      => 'select',
              'title'     => __('Column Width', 'kroth'),
              'options'        => array(
                'full-width' => __('One Column', 'kroth'),
                'half-width' => __('Two Column', 'kroth'),
                'third-width' => __('Three Column', 'kroth'),
              ),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => __('Link', 'kroth')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'kroth'),
              'on_text'     => __('Yes', 'kroth'),
              'off_text'     => __('No', 'kroth'),
            ),
            array(
              'id'        => 'link_title',
              'type'      => 'text',
              'title'     => __('Title', 'kroth')
            ),

          ),

        ),
        // Useful Links

        // Education List
        array(
          'name'          => 'vt_education_lists',
          'title'         => __('Education List', 'kroth'),
          'view'          => 'clone',
          'clone_id'      => 'vt_education_list',
          'clone_title'   => __('Add New', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'kroth')
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bullet_color',
              'type'      => 'color_picker',
              'title'     => __('Bullet Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),

            // Size
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'kroth'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'bullet_top_space',
              'type'      => 'text',
              'title'     => __('Bullet Top Space', 'kroth'),
              'attributes' => array(
                'placeholder'     => 'Eg: 12px',
              ),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => __('Title', 'kroth')
            ),
            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => __('Text', 'kroth')
            ),
            array(
              'id'        => 'text_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Text Link', 'kroth')
            ),

          ),

        ),
        // Education List

        // Simple Image List
        array(
          'name'          => 'vt_image_lists',
          'title'         => __('Simple Image List', 'kroth'),
          'view'          => 'clone',
          'clone_id'      => 'vt_image_list',
          'clone_title'   => __('Add New', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'kroth')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'kroth')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Open link to new tab?', 'kroth')
            ),

          ),

        ),
        // Simple Image List

        // Download Button
        array(
          'name'          => 'vt_download_btn',
          'title'         => __('Download Button', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'kroth'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'kroth'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'kroth'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'kroth'),
              'on_text'     => __('Yes', 'kroth'),
              'off_text'     => __('No', 'kroth'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'kroth')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'kroth')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Background Hover Color', 'kroth'),
              'wrap_class' => 'column_third el-hav-border',
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'kroth')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'kroth'),
              'attributes' => array(
                'placeholder'     => 'Eg: 18px',
              ),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
        ),
        // Download Button

        // Simple Link
        array(
          'name'          => 'vt_simple_link',
          'title'         => __('Simple Link', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'link_style',
              'type'      => 'select',
              'title'     => __('Link Style', 'kroth'),
              'options'        => array(
                'link-underline' => __('Link Underline', 'kroth'),
                'link-arrow-right' => __('Link Arrow (Right)', 'kroth'),
                'link-arrow-left' => __('Link Arrow (Left)', 'kroth'),
              ),
            ),
            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'kroth'),
              'value'      => 'fa fa-caret-right',
              'dependency'  => array('link_style', '!=', 'link-underline'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'kroth'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'kroth'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'kroth'),
              'on_text'     => __('Yes', 'kroth'),
              'off_text'     => __('No', 'kroth'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'kroth')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'kroth')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Border Hover Color', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'kroth')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'kroth'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'vt_blockquote',
          'title'         => __('Blockquote', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'blockquote_style',
              'type'      => 'select',
              'title'     => __('Blockquote Style', 'kroth'),
              'options'        => array(
                '' => __('Select Blockquote Style', 'kroth'),
                'style-one' => __('Style One', 'kroth'),
                'style-two' => __('Style Two', 'kroth'),
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'kroth'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => __('Content Color', 'kroth'),
            ),
            array(
              'id'        => 'left_color',
              'type'      => 'color_picker',
              'title'     => __('Left Border Color', 'kroth'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'kroth'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'kroth'),
            ),
            // Content
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => __('Content', 'kroth'),
            ),

          ),

        ),
        // Blockquotes

        // List Styles
        array(
          'name'          => 'vt_address_lists',
          'title'         => __('Address Lists', 'kroth'),
          'view'          => 'clone',
          'clone_id'      => 'vt_address_list',
          'clone_title'   => __('Add New', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'kroth')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'kroth'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'list_title',
              'type'      => 'text',
              'title'     => __('Title', 'kroth')
            ),
            array(
              'id'        => 'list_text',
              'type'      => 'textarea',
              'title'     => __('Text', 'kroth')
            ),

          ),

        ),
        // List Styles

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => __('Footer Shortcodes', 'kroth'),
      'shortcodes' => array(

        // Footer Menus
        array(
          'name'          => 'vt_footer_menus',
          'title'         => __('Footer Menu Links', 'kroth'),
          'view'          => 'clone',
          'clone_id'      => 'vt_footer_menu',
          'clone_title'   => __('Add New', 'kroth'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'kroth'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'menu_title',
              'type'      => 'text',
              'title'     => __('Menu Title', 'kroth')
            ),
            array(
              'id'        => 'menu_link',
              'type'      => 'text',
              'title'     => __('Menu Link', 'kroth')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'kroth'),
              'on_text'     => __('Yes', 'kroth'),
              'off_text'     => __('No', 'kroth'),
            ),

          ),

        ),
        // Footer Menus

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'kroth_vt_shortcodes' );
}