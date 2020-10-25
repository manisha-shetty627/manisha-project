<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* Exclude category from blog */
function kroth_vt_excludeCat($query) {
	if ( $query->is_home ) {
		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
		if($exclude_cat_ids) {
			foreach( $exclude_cat_ids as $exclude_cat_id ) {
				$exclude_from_blog[] = '-'. $exclude_cat_id;
			}
			$query->set('cat', implode(',', $exclude_from_blog));
		}
	}
	return $query;
}
add_filter('pre_get_posts', 'kroth_vt_excludeCat');

/* Excerpt Length */
class KrothExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: kroth_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    KrothExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'KrothExcerpt::new_length');
    KrothExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(KrothExcerpt::$types[KrothExcerpt::$length]) )
      return KrothExcerpt::$types[KrothExcerpt::$length];
    else
      return KrothExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
function kroth_excerpt($length = 55) {
  KrothExcerpt::length($length);
}

if ( ! function_exists( 'kroth_new_excerpt_more' ) ) {
  function kroth_new_excerpt_more( $more ) {
    return '[...]';
  }
  add_filter('excerpt_more', 'kroth_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
function kroth_vt_tag_cloud($tag_string){
  return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}
add_filter('wp_generate_tag_cloud', 'kroth_vt_tag_cloud', 10, 3);

/* Password Form */
if( ! function_exists( 'kroth_vt_password_form' ) ) {
  function kroth_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'kroth_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'kroth_vt_maintenance_mode' ) ) {
  function kroth_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'kroth_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'kroth_vt_footer_widgets' ) ) {
  function kroth_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

if( ! function_exists( 'kroth_vt_top_bar' ) ) {
  function kroth_vt_top_bar() {

    $out     = '';

    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="krth-topbar"><div class="container"><div class="row">';
      $out .= kroth_vt_top_bar_modules( 'left' );
      $out .= kroth_vt_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }

    return $out;
  }
}

/* WP Link Pages */
if ( ! function_exists( 'kroth_wp_link_pages' ) ) {
  function kroth_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . __( 'Pages:', 'kroth' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'kroth_post_metas' ) ) {
  function kroth_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <div class="bp-top-meta">
    <?php
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ' ' );
        if ( $category_list ) {
          echo '<div class="bp-cat">'. $category_list .' </div>';
        }
      }
    } // Category Hides
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
    <div class="bp-date">
      <span><?php echo get_the_date(); ?></span>
    </div>
    <?php } // Date Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
    <div class="bp-author">
      <?php
      printf(
        '<span>'. __('by','kroth') .' <a href="%1$s" rel="author">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    </div>
    <?php } ?>
  </div>
  <?php
  }
}

/* Share Options */
if ( ! function_exists( 'kroth_wp_share_option' ) ) {
  function kroth_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    $share_text = cs_get_option('share_text');
    $share_text = $share_text ? $share_text : __( 'Share', 'kroth' );
    $share_on_text = cs_get_option('share_on_text');
    $share_on_text = $share_on_text ? $share_on_text : __( 'Share On', 'kroth' );
    ?>
    <p><?php echo esc_attr($share_text); ?>:</p>
    <ul>
      <li>
        <a href="//twitter.com/intent/tweet?text=<?php print(urlencode($title)); ?>&url=<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'kroth'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
      </li>
      <li>
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'kroth'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
      </li>
      <li>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'kroth'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
      </li>
    </ul>
<?php
  }
}

/* Author Info */
if ( ! function_exists( 'kroth_author_info' ) ) {
  function kroth_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_text = cs_get_option('author_text');
    $author_text = $author_text ? $author_text : __( 'Author', 'kroth' );
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="bp-author-info rounded-three">
    <div class="author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
      </a>
    </div>
    <div class="author-content">
      <div class="author-pro"><?php echo esc_attr($author_text); ?></div>
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?></a>
      <p><?php echo get_the_author_meta( 'description' ); ?></p>
    </div>
  </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'kroth_comment_modification' ) ) {
  function kroth_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="krth-comments-meta">
        <h4><?php printf( '%s', get_comment_author() ); ?></h4>
        <span class="comments-date">
          <?php echo get_comment_date('d M Y'); echo ' - '; ?>
          <span class="caps"><?php echo get_comment_time(); ?></span>
        </span>
        <div class="comments-reply">
        <?php
          comment_reply_link( array_merge( $args, array(
          'reply_text' => '<span class="comment-reply-link">'. __('Reply','kroth') .'</span>',
          'before' => '',
          'class'  => '',
          'depth' => $depth,
          'max_depth' => $args['max_depth']
          ) ) );
        ?>
        </div>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php echo __( 'Your comment is awaiting moderation.', 'kroth' ); ?></em>
      <?php endif; ?>
      <div class="comment-area">
        <?php comment_text(); ?>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Comments Form - Textarea next to Normal Fields */
add_filter( 'comment_form_fields', 'kroth_move_comment_field' );
function kroth_move_comment_field( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}

/* Title Area */
if ( ! function_exists( 'kroth_title_area' ) ) {
  function kroth_title_area() {

    global $post, $wp_query;

    // Get post meta in all type of WP pages
    $kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
    $kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
    $kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
    $kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );
    if ($kroth_meta && (!is_archive() || is_woocommerce_shop())) {
      $custom_title = $kroth_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    if ( is_home() ) {
      bloginfo('');
    } elseif ( is_search() ) {
      printf( __( 'Search Results for %s', 'kroth' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(__('Posts Tagged: ', 'kroth'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( __( 'Archive for <span>%s</span>', 'kroth' ), get_the_date());
      } elseif ( is_month() ) {
        printf( __( 'Archive for <span>%s</span>', 'kroth' ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( __( 'Archive for <span>%s</span>', 'kroth' ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( __( 'Posts by: <span>%s</span>', 'kroth' ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( is_shop() ) {
        _e( 'Shop', 'kroth' );
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        _e( 'Archives', 'kroth' );
      }
    } elseif( is_404() ) {
      _e('404 Error', 'kroth');
    } elseif( $custom_title ) {
      echo esc_attr($custom_title);
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'kroth_paging_nav' ) ) {
  function kroth_paging_nav() {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : __( 'OLDER POSTS', 'kroth' );
      $newer_post = $newer_post ? $newer_post : __( 'NEWER POSTS', 'kroth' );
      global $wp_query;
      $big = 999999999;
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => $older_post,
        'next_text' => $newer_post,
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type' => 'list'
      ));
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}