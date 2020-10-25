<?php

/**
 * Initialize Custom Post Type - Kroth Theme
 */

function kroth_custom_post_type() {

	$portfolio_cpt = (kroth_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	$portfolio_slug = (kroth_framework_active()) ? cs_get_option('theme_portfolio_slug') : '';
	$portfolio_cpt_slug = (kroth_framework_active()) ? cs_get_option('theme_portfolio_cat_slug') : '';

	$base = (isset($portfolio_cpt_slug) && $portfolio_cpt_slug !== '') ? sanitize_title_with_dashes($portfolio_cpt_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$base_slug = (isset($portfolio_slug) && $portfolio_slug !== '') ? sanitize_title_with_dashes($portfolio_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$label = ucfirst((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');

	// Register custom post type - Portfolio
	register_post_type('portfolio',
		array(
			'labels' => array(
				'name' => $label,
				'singular_name' => sprintf(esc_html__('%s Post', 'kroth-core' ), $label),
				'all_items' => sprintf(esc_html__('All %s', 'kroth-core' ), $label),
				'add_new' => esc_html__('Add New', 'kroth-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'kroth-core' ), $label),
				'edit' => esc_html__('Edit', 'kroth-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'kroth-core' ), $label),
				'new_item' => sprintf(esc_html__('New %s', 'kroth-core' ), $label),
				'view_item' => sprintf(esc_html__('View %s', 'kroth-core' ), $label),
				'search_items' => sprintf(esc_html__('Search %s', 'kroth-core' ), $label),
				'not_found' => esc_html__('Nothing found in the Database.', 'kroth-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'kroth-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-portfolio',
			'rewrite' => array(
				'slug' => $base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);
	// Registered

	// Add Category Taxonomy for our Custom Post Type - Portfolio
	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Categories', 'kroth-core' ), $label),
				'singular_name' => sprintf(esc_html__('%s Category', 'kroth-core'), $label),
				'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'kroth-core'), $label),
				'all_items' => sprintf(esc_html__( 'All %s Categories', 'kroth-core'), $label),
				'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'kroth-core'), $label),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'kroth-core'), $label),
				'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'kroth-core'), $label),
				'update_item' => sprintf(esc_html__( 'Update %s Category', 'kroth-core'), $label),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'kroth-core'), $label),
				'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'kroth-core'), $label)
			),
			'rewrite' => array( 'slug' => $base . '_cat' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);

	// Testimonials - Start
	$testimonial_slug = 'testimonial';
	$testimonials = __('Testimonials', 'kroth-core');

	// Register custom post type - Testimonials
	register_post_type('testimonial',
		array(
			'labels' => array(
				'name' => $testimonials,
				'singular_name' => sprintf(esc_html__('%s Post', 'kroth-core' ), $testimonials),
				'all_items' => sprintf(esc_html__('%s', 'kroth-core' ), $testimonials),
				'add_new' => esc_html__('Add New', 'kroth-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'kroth-core' ), $testimonials),
				'edit' => esc_html__('Edit', 'kroth-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'kroth-core' ), $testimonials),
				'new_item' => sprintf(esc_html__('New %s', 'kroth-core' ), $testimonials),
				'view_item' => sprintf(esc_html__('View %s', 'kroth-core' ), $testimonials),
				'search_items' => sprintf(esc_html__('Search %s', 'kroth-core' ), $testimonials),
				'not_found' => esc_html__('Nothing found in the Database.', 'kroth-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'kroth-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'kroth_post_type',
			'menu_icon' => 'dashicons-groups',
			'rewrite' => array(
				'slug' => $testimonial_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions',
				'sticky',
			)
		)
	);
	// Testimonials - End

	// Team - Start
	$team_slug = 'team';
	$teams = __('Teams', 'kroth-core');

	// Register custom post type - Team
	register_post_type('team',
		array(
			'labels' => array(
				'name' => $teams,
				'singular_name' => sprintf(esc_html__('%s Post', 'kroth-core' ), $teams),
				'all_items' => sprintf(esc_html__('%s', 'kroth-core' ), $teams),
				'add_new' => esc_html__('Add New', 'kroth-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'kroth-core' ), $teams),
				'edit' => esc_html__('Edit', 'kroth-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'kroth-core' ), $teams),
				'new_item' => sprintf(esc_html__('New %s', 'kroth-core' ), $teams),
				'view_item' => sprintf(esc_html__('View %s', 'kroth-core' ), $teams),
				'search_items' => sprintf(esc_html__('Search %s', 'kroth-core' ), $teams),
				'not_found' => esc_html__('Nothing found in the Database.', 'kroth-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'kroth-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'kroth_post_type',
			'menu_icon' => 'dashicons-businessman',
			'rewrite' => array(
				'slug' => $team_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
			)
		)
	);
	// Team - End

}

// Post Type - Menu
if( ! function_exists( 'kroth_post_type_menu' ) ) {
  function kroth_post_type_menu(){
    if ( current_user_can( 'edit_theme_options' ) ) {
			add_menu_page( __('Company', 'kroth-core'), __('Company', 'kroth-core'), 'edit_theme_options', 'kroth_post_type', 'vt_welcome_page', 'dashicons-groups', 10 );
    }
  }
}
add_action( 'admin_menu', 'kroth_post_type_menu' );

// Portfolio Slug
function kroth_custom_portfolio_slug() {
	$portfolio_cpt = (kroth_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
  $rules = get_option( 'rewrite_rules' );
  if ( ! isset( $rules['('.$portfolio_cpt.')/(\d*)$'] ) ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
  }
}
add_action( 'cs_validate_save_after','kroth_custom_portfolio_slug' );

// After Theme Setup
function kroth_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	kroth_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'kroth_custom_flush_rules');
add_action('init', 'kroth_custom_post_type');

// Avoid portfolio post type as 404 page while it change
function vt_cpt_avoid_error_portfolio() {
	$portfolio_cpt = (kroth_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
	$set = get_option('post_type_rules_flased_' . $portfolio_cpt);
	if ($set !== true){
		flush_rewrite_rules(false);
		update_option('post_type_rules_flased_' . $portfolio_cpt,true);
	}
}
add_action('init', 'vt_cpt_avoid_error_portfolio');

// Add Filter by Category in Portfolio Type
add_action('restrict_manage_posts', 'kroth_filter_portfolio_categories');
function kroth_filter_portfolio_categories() {
	global $typenow;
	$post_type = 'portfolio'; // Portfolio post type
	$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf(esc_html__("Show All %s", 'kroth-core'), $info_taxonomy->label),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

// Portfolio Search => ID to Term
add_filter('parse_query', 'kroth_portfolio_id_term_search');
function kroth_portfolio_id_term_search($query) {
	global $pagenow;
	$post_type = 'portfolio'; // Portfolio post type
	$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/* ---------------------------------------------------------------------------
 * Custom columns - Portfolio
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-portfolio_columns", "kroth_portfolio_edit_columns");
function kroth_portfolio_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'kroth-core' );
  $new_columns['thumbnail'] = __('Image', 'kroth-core' );
  $new_columns['portfolio_category'] = __('Categories', 'kroth-core' );
  $new_columns['portfolio_order'] = __('Order', 'kroth-core' );
  $new_columns['date'] = __('Date', 'kroth-core' );

  return $new_columns;
}
add_action('manage_portfolio_posts_custom_column', 'kroth_manage_portfolio_columns', 10, 2);
function kroth_manage_portfolio_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'Categories' column. */
    case 'portfolio_category' :

      $terms = get_the_terms( $post->ID, 'portfolio_category' );

      if ( !empty( $terms ) ) {

        $out = array();
        foreach ( $terms as $term ) {
            $out[] = sprintf( '<a href="%s">%s</a>',
            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'portfolio_category' => $term->slug ), 'edit.php' ) ),
            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'portfolio_category', 'display' ) )
            );
        }
        /* Join the terms, separating them with a comma. */
        echo join( ', ', $out );
      }

      /* If no terms were found, output a default message. */
      else {
        echo '&macr;';
      }

    break;

    case "portfolio_order":
      echo $post->menu_order;
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Testimonial
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-testimonial_columns", "kroth_testimonial_edit_columns");
function kroth_testimonial_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'kroth-core' );
  $new_columns['thumbnail'] = __('Image', 'kroth-core' );
  $new_columns['name'] = __('Client Name', 'kroth-core' );
  $new_columns['date'] = __('Date', 'kroth-core' );

  return $new_columns;
}

add_action('manage_testimonial_posts_custom_column', 'kroth_manage_testimonial_columns', 10, 2);
function kroth_manage_testimonial_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
      echo $testimonial_options['testi_name'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Team
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-team_columns", "kroth_team_edit_columns");
function kroth_team_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'kroth-core' );
  $new_columns['thumbnail'] = __('Image', 'kroth-core' );
  $new_columns['name'] = __('Job Position', 'kroth-core' );
  $new_columns['date'] = __('Date', 'kroth-core' );

  return $new_columns;
}

add_action('manage_team_posts_custom_column', 'kroth_manage_team_columns', 10, 2);
function kroth_manage_team_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$team_options = get_post_meta( get_the_ID(), 'team_options', true );
      echo $team_options['team_job_position'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}
