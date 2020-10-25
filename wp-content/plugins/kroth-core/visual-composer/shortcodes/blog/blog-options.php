<?php
/**
 * Blog - Shortcode Options
 */
add_action( 'init', 'krth_blog_vc_map' );
if ( ! function_exists( 'krth_blog_vc_map' ) ) {
  function krth_blog_vc_map() {
    vc_map( array(
      "name" => __( "Blog", 'kroth-core'),
      "base" => "krth_blog",
      "description" => __( "Blog Styles", 'kroth-core'),
      "icon" => "fa fa-newspaper-o color-red",
      "category" => KrothLib::krth_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Blog Style', 'kroth-core' ),
          'value' => array(
            __( 'Style One', 'kroth-core' ) => 'krth-blog-one',
            __( 'Style Two', 'kroth-core' ) => 'krth-blog-two',
            __( 'Style Three', 'kroth-core' ) => 'krth-blog-three',
          ),
          'admin_label' => true,
          'param_name' => 'blog_style',
          'description' => __( 'Select your blog style.', 'kroth-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Columns', 'kroth-core' ),
          'value' => array(
            __( 'Select Blog Columns', 'kroth-core' ) => '',
            __( 'Column Two', 'kroth-core' ) => 'krth-blog-col-2',
            __( 'Column Three', 'kroth-core' ) => 'krth-blog-col-3',
            __( 'Column Four', 'kroth-core' ) => 'krth-blog-col-4',
          ),
          'admin_label' => true,
          'param_name' => 'blog_column',
          'description' => __( 'Select your blog column.', 'kroth-core' ),
          'dependency' => array(
            'element' => 'blog_style',
            'value' => array('krth-blog-two','krth-blog-three'),
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'kroth-core'),
          "param_name"  => "blog_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'kroth-core'),
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Meta's to Hide", 'kroth-core' ),
    			"param_name"  => 'mts_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"        => 'switcher',
          "heading"     => __('Category', 'kroth-core'),
          "param_name"  => "blog_category",
          "value"       => "",
          "std"         => false,
          'edit_field_class' => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Date', 'kroth-core'),
          "param_name"  => "blog_date",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Author', 'kroth-core'),
          "param_name"  => "blog_author",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Comments', 'kroth-core'),
          "param_name"  => "blog_comments",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Listing", 'kroth-core' ),
    			"param_name"  => 'lsng_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'kroth-core' ),
          'value' => array(
            __( 'Select Blog Order', 'kroth-core' ) => '',
            __('Asending', 'kroth-core') => 'ASC',
            __('Desending', 'kroth-core') => 'DESC',
          ),
          'param_name' => 'blog_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'kroth-core' ),
          'value' => array(
            __('None', 'kroth-core') => 'none',
            __('ID', 'kroth-core') => 'ID',
            __('Author', 'kroth-core') => 'author',
            __('Title', 'kroth-core') => 'title',
            __('Date', 'kroth-core') => 'date',
          ),
          'param_name' => 'blog_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'kroth-core'),
          "param_name"  => "blog_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'kroth-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Short Content (Excerpt Length)', 'kroth-core'),
          "param_name"  => "short_content",
          "value"       => "",
          "description" => __( "Enter the numeric value of, how many words you want in short content paragraph.", 'kroth-core')
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'kroth-core'),
          "param_name"  => "blog_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Read More Button Text', 'kroth-core'),
          "param_name"  => "read_more_txt",
          "value"       => "",
          "description" => __( "Enter read more button text.", 'kroth-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Miss-Aligned? Mention Minimum Height :', 'kroth-core'),
          "param_name"  => "miss_align_height",
          "value"       => "",
          "description" => __( "Enter the px value for minimum height. This will fix miss-aligned issue with your listing items.", 'kroth-core')
        ),
        KrothLib::vt_class_option(),

      )
    ) );
  }
}
