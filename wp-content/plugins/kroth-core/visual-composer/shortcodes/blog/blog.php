<?php
/* ==========================================================
  Blog
=========================================================== */
if ( !function_exists('krth_blog_function')) {
  function krth_blog_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'blog_style'  => '',
      'blog_column'  => '',
      'blog_limit'  => '',
      // Enable & Disable
      'blog_category'  => '',
      'blog_date'  => '',
      'blog_author'  => '',
      'blog_comments'  => '',
      'blog_pagination'  => '',
      // Listing
      'blog_order'  => '',
      'blog_orderby'  => '',
      'blog_show_category'  => '',
      'short_content'  => '',
      'class'  => '',
      // Read More Text
      'read_more_txt'  => '',
      // Miss Align
      'miss_align_height'  => '',
    ), $atts));

    // Column
    if ($blog_style === 'krth-blog-two') {
      $blog_column_class = $blog_column ? $blog_column : 'krth-blog-col-2';
    } elseif ($blog_style === 'krth-blog-three') {
      $blog_column_class = $blog_column ? $blog_column : 'krth-blog-col-3';
    } else {
      $blog_column_class = 'krth-blog-col-1';
    }

    // Excerpt
    if (kroth_framework_active()) {
      $excerpt_length = cs_get_option('theme_blog_excerpt');
      $excerpt_length = $excerpt_length ? $excerpt_length : '55';
      if ($short_content) {
        $short_content = $short_content;
      } else {
        $short_content = $excerpt_length;
      }
    } else {
      $short_content = '55';
    }

    // Style
    if ($blog_style === 'krth-blog-two') {
      $blog_style_class = 'krth-blog-one';
    } elseif ($blog_style === 'krth-blog-three') {
      $blog_style_class = 'krth-blog-one krth-blog-two';
    } else {
      $blog_style_class = 'krth-blog-one krth-blog-list';
    }

    // Read More Text
    if (kroth_framework_active()) {
      $read_more_to = cs_get_option('read_more_text');
      if ($read_more_txt) {
        $read_more_txt = $read_more_txt;
      } elseif($read_more_to) {
        $read_more_txt = $read_more_to;
      } else {
        $read_more_txt = esc_html__( 'Read More', 'kroth-core' );
      }
    } else {
      $read_more_txt = $read_more_txt ? $read_more_txt : esc_html__( 'Read More', 'kroth-core' );
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Miss-Aligned
    if ( $miss_align_height ) {
      $inline_style .= '.krth-post-'. $e_uniqid .' .krth-blog-post {';
      $inline_style .= ( $miss_align_height ) ? 'min-height:'. kroth_core_check_px($miss_align_height) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-post-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order
    );

    $krth_post = new WP_Query( $args ); ?>

    <!-- Blog Start -->
    <div class="<?php echo esc_attr($blog_style_class .' '. $blog_column_class .' '. $styled_class .' '. $class); ?>">

      <?php
      if ($krth_post->have_posts()) : while ($krth_post->have_posts()) : $krth_post->the_post();

        $large_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'fullsize', false, '' );
        $large_image = $large_image[0];
        if ($blog_style === 'krth-blog-three' || $blog_column === 'krth-blog-col-3') {
          if(class_exists('Aq_Resize')) {
            if ($blog_style === 'krth-blog-three' && $blog_column === 'krth-blog-col-2') {
              $post_img = aq_resize( $large_image, '560', '320', true );
            } else {
              $post_img = aq_resize( $large_image, '370', '260', true );
            }
          } else {$post_img = $large_image;}
        } else {
          $post_img = $large_image;
        }
        $post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
      ?>

      <div id="post-<?php the_ID(); ?>" <?php post_class('krth-blog-post'); ?>>

        <?php
        if ( 'gallery' == get_post_format() && ! empty( $post_type['gallery_post_format'] ) ) { ?>
          <div class="featured-image rounded-three krth-theme-carousel"
          data-nav="true"
          data-autoplay="true"
          data-auto-height="true"
          data-dots="true">
            <?php
            $ids = explode( ',', $post_type['gallery_post_format'] );
            foreach ( $ids as $id ) {
              $attachment = wp_get_attachment_image_src( $id, 'full' );
              $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
              $g_img = $attachment[0];
              if ($blog_style === 'krth-blog-three' || $blog_column === 'krth-blog-col-3') {
                if(class_exists('Aq_Resize')) {
                  $post_img = aq_resize( $g_img, '370', '260', true );
                } else {$post_img = $g_img;}
              } else {
                $post_img = $g_img;
              }
              echo '<img src="'. $post_img .'" alt="'. esc_attr($alt) .'" />';
            }
            ?>
          </div>
        <?php
        } elseif ($large_image) { ?>
        <div class="featured-image rounded-three">
          <img src="<?php echo $post_img; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
        </div>
        <?php } // Featured Image ?>

        <!-- Content -->
        <div class="bp-content">

          <!-- Metas -->
          <div class="bp-top-meta">
            <?php
            if ( !$blog_category ) { // Category Hide
              if ( get_post_type() === 'post') {
                $category_list = get_the_category_list( ' ' );
                if ( $category_list ) {
            ?>
            <div class="bp-cat">
              <?php echo $category_list; ?>
            </div>
            <?php }
              }
            } // Category Hides
            if ( !$blog_date ) { // Date Hide
            ?>
            <div class="bp-date">
              <span><?php echo get_the_date(); ?></span>
            </div>
            <?php } // Date Hides
            if ( !$blog_author ) { // Author Hide
            ?>
            <div class="bp-author">
              <?php
              printf(
                '<span>'. __('by','kroth-core') .' <a href="%1$s" rel="author">%2$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                get_the_author()
              );
              ?>
            </div>
            <?php } ?>
          </div>
          <!-- Metas -->

          <a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-heading"><?php echo esc_attr(get_the_title()); ?></a>
          <?php if ($blog_style !== 'krth-blog-three') { ?>
          <p><?php
          if (kroth_framework_active()) {
            kroth_excerpt($short_content);
          } else {
            the_excerpt();
          }
          if ( function_exists( 'kroth_wp_link_pages' ) ) {
            echo kroth_wp_link_pages();
          }
          ?></p>
          <a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-read-more">
            <?php echo esc_attr($read_more_txt); ?>
          </a>
          <?php
          } //
          if (!$blog_comments && $blog_style !== 'krth-blog-three') { // Comments Hide ?>
          <div class="bp-bottom-comments">
            <?php
            if ($blog_style === 'krth-blog-two') {
              comments_popup_link( __( '<i class="icon-speech"></i><span>0</span>', 'kroth-core' ), __( '<i class="icon-speech"></i><span>1</span>', 'kroth-core' ), __( '<i class="icon-speech"></i><span>%</span>', 'kroth-core' ), '', '' );
            } else {
              comments_popup_link( __( '<i class="icon-speech"></i><span>No Comments</span>', 'kroth-core' ), __( '<i class="icon-speech"></i><span>One Comment</span>', 'kroth-core' ), __( '<i class="icon-speech"></i><span>% Comments</span>', 'kroth-core' ), '', '' );
            }
            ?>
          </div>
          <?php } // Comments Hide ?>
        </div>
        <!-- Content -->

        </div><!-- #post-## -->

      <?php
      endwhile;
      endif;
      wp_reset_postdata(); ?>

    </div>
    <!-- Blog End -->

    <?php
    if ($blog_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $krth_post ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'krth_blog', 'krth_blog_function' );