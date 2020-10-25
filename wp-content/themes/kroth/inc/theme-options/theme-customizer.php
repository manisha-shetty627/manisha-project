<?php
/*
 * All customizer related options for Kroth theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if( ! function_exists( 'kroth_vt_customizer' ) ) {
  function kroth_vt_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => __('Primary Color', 'kroth'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'default'   => '#fa9928',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Elements Color', 'kroth'),
					'description'    => __('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'kroth'),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// Topbar Color
	$options[]      = array(
	  'name'        => 'topbar_color_section',
	  'title'       => __('01. Topbar Colors', 'kroth'),
	  'settings'    => array(

	    // Fields Start
	    array(
				'name'          => 'topbar_bg_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('Bar Color', 'kroth'),
					),
				),
			),
			array(
				'name'      => 'topbar_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Background Color', 'kroth'),
				),
			),
			array(
				'name'      => 'topbar_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Border Color', 'kroth'),
				),
			),
			array(
				'name'          => 'topbar_text_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('Common Color', 'kroth'),
					),
				),
			),
			array(
				'name'      => 'topbar_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Text Color', 'kroth'),
				),
			),
			array(
				'name'      => 'topbar_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Link Color', 'kroth'),
				),
			),
			array(
				'name'      => 'topbar_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Link Hover Color', 'kroth'),
				),
			),
			array(
				'name'          => 'topbar_social_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('Social Icon Color', 'kroth'),
					),
				),
			),
			array(
				'name'      => 'topbar_social_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Social Icon Color', 'kroth'),
				),
			),
			array(
				'name'      => 'topbar_social_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Social Icons Hover Color', 'kroth'),
				),
			),
	    // Fields End

	  )
	);
	// Topbar Color

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => __('02. Header Colors', 'kroth'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'          => 'header_main_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('Main Menu Colors', 'kroth'),
					),
				),
			),
			array(
				'name'      => 'header_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Background Color', 'kroth'),
				),
			),
			array(
				'name'      => 'header_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Link Color', 'kroth'),
				),
			),
			array(
				'name'      => 'header_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Link Hover Color', 'kroth'),
				),
			),

			// Sub Menu Color
			array(
				'name'          => 'header_submenu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('Sub-Menu Colors', 'kroth'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Background Color', 'kroth'),
				),
			),
			array(
				'name'      => 'submenu_bg_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Background Hover Color', 'kroth'),
				),
			),
			array(
				'name'      => 'submenu_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Border Color', 'kroth'),
				),
			),
			array(
				'name'      => 'submenu_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Link Color', 'kroth'),
				),
			),
			array(
				'name'      => 'submenu_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Link Hover Color', 'kroth'),
				),
			),
	    // Fields End

	  )
	);
	// Header Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => __('03. Title Bar Colors', 'kroth'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'kroth'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Title Color', 'kroth'),
				),
			),

			array(
				'name'          => 'titlebar_breadcrumbs_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('Breadcrumbs Colors', 'kroth'),
					),
				),
			),
    	array(
				'name'      => 'breadcrumbs_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Text Color', 'kroth'),
				),
			),
			array(
				'name'      => 'breadcrumbs_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Link Color', 'kroth'),
				),
			),
			array(
				'name'      => 'breadcrumbs_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Link Hover Color', 'kroth'),
				),
			),
			array(
				'name'      => 'breadcrumbs_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => __('Background Color', 'kroth'),
				),
			),
	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => __('04. Content Colors', 'kroth'),
	  'description' => __('This is all about content area text and heading colors.', 'kroth'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => __('Content Text', 'kroth'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Body & Content Color', 'kroth'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Body Links Color', 'kroth'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Body Links Hover Color', 'kroth'),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Sidebar Content Color', 'kroth'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => __('Headings', 'kroth'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Content Heading Color', 'kroth'),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Sidebar Heading Color', 'kroth'),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => __('05. Footer Colors', 'kroth'),
	  'description' => __('This is all about footer settings. Make sure you\'ve enabled your needed section at : Kroth > Theme Options > Footer ', 'kroth'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => __('Widget Block', 'kroth'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => __('Content Colors', 'kroth'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Widget Heading Color', 'kroth'),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Widget Text Color', 'kroth'),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Widget Link Color', 'kroth'),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Widget Link Hover Color', 'kroth'),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#222327',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Background Color', 'kroth'),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => __('Copyright Block', 'kroth'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => __('Make sure you\'ve enabled copyright block in : <br /> <strong>Kroth > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'kroth'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Text Color', 'kroth'),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Link Color', 'kroth'),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Link Hover Color', 'kroth'),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Background Color', 'kroth'),
						),
					),
					array(
						'name'      => 'copyright_border_color',
						'default'   => 'rgba(0,0,0,0.2)',
						'control'   => array(
							'type'  => 'color',
							'label' => __('Border Color', 'kroth'),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'kroth_vt_customizer' );
}