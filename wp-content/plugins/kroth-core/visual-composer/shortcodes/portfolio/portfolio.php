<?php
/* ==========================================================
  Portfolio
=========================================================== */
if ( !function_exists('krth_portfolio_function')) {
  function krth_portfolio_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'portfolio_style'  => '',
      'portfolio_limit'  => '',
      'portfolio_column'  => '',
      // Enable & Disable
      'portfolio_filter'  => '',
      'portfolio_pagination'  => '',
      'portfolio_no_space'  => '',
      'disable_size_limit'  => '',
      // Listing
      'portfolio_order'  => '',
      'portfolio_orderby'  => '',
      'portfolio_show_category'  => '',
      'class'  => '',
      // Style - Filter
      'filter_color'  => '',
      'filter_active_color'  => '',
      'filter_line_color'  => '',
      'filter_size'  => '',
      // Style - Colors And Sizes
      'image_overlay_color'  => '',
      'portfolio_title_size'  => '',
      'portfolio_title_color'  => '',
      'portfolio_title_hover_color'  => '',
      'portfolio_cat_color'  => '',
      'portfolio_cat_hover_color'  => '',
      'portfolio_cat_size'  => '',
      'btn_bg_color'  => '',
      'btn_text_color'  => '',
      'btn_text'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Image Overlay Color
    if ( $image_overlay_color ) {
      $inline_style .= '.bpw-style-one .krth-portfolio-item.krth-portfolio-'. $e_uniqid .' .bpw-content-overlay, .bpw-style-two .krth-portfolio-item.krth-portfolio-'. $e_uniqid .' .bpw-content-overlay {';
      $inline_style .= ( $image_overlay_color ) ? 'background-color:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }
    // Title Color
    if ( $portfolio_title_size || $portfolio_title_color  || $portfolio_title_hover_color ) {
      $inline_style .= '.bpw-style-one .krth-portfolio-'. $e_uniqid .' .bpw-content .bpw-heading, .bpw-col-5.bpw-normal-size.bpw-style-one .krth-portfolio-'. $e_uniqid .' .bpw-content .bpw-heading, .bpw-style-two .krth-portfolio-'. $e_uniqid .' .bpw-content .bpw-heading {';
      $inline_style .= ( $portfolio_title_color ) ? 'color:'. $portfolio_title_color .';' : '';
      $inline_style .= ( $portfolio_title_size ) ? 'font-size:'. $portfolio_title_size .';' : '';
      $inline_style .= '}';
      $inline_style .= '.bpw-style-two .krth-portfolio-item.krth-portfolio-'. $e_uniqid .':hover .bpw-content .bpw-heading {';
      $inline_style .= ( $portfolio_title_hover_color ) ? 'color:'. $portfolio_title_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Button
    if ( $btn_bg_color || $btn_text_color ) {
      $inline_style .= '.bpw-style-one .krth-portfolio-'. $e_uniqid .' .bpw-content .bpw-btn, .bpw-col-5.bpw-normal-size.bpw-style-one .krth-portfolio-'. $e_uniqid .' .bpw-content .bpw-btn {';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= '}';
    }
    // Category
    if ( $portfolio_cat_color || $portfolio_cat_size ) {
      $inline_style .= '.bpw-style-two .krth-portfolio-'. $e_uniqid .' .bpw-content .bpw-category {';
      $inline_style .= ( $portfolio_cat_color ) ? 'color:'. $portfolio_cat_color .';' : '';
      $inline_style .= ( $portfolio_cat_size ) ? 'font-size:'. $portfolio_cat_size .';' : '';
      $inline_style .= '}';
    }
    if ( $portfolio_cat_hover_color ) {
      $inline_style .= '.bpw-style-two .krth-portfolio-item.krth-portfolio-'. $e_uniqid .':hover .bpw-content .bpw-category {';
      $inline_style .= ( $portfolio_cat_hover_color ) ? 'color:'. $portfolio_cat_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Filter
    if ( $filter_color || $filter_size ) {
      $inline_style .= '.krth-portfolio-'. $e_uniqid .'.bpw-filter a {';
      $inline_style .= ( $filter_color ) ? 'color:'. $filter_color .';' : '';
      $inline_style .= ( $filter_size ) ? 'font-size:'. kroth_core_check_px($filter_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $filter_active_color ) {
      $inline_style .= '.krth-portfolio-'. $e_uniqid .'.bpw-filter .btn-active {';
      $inline_style .= ( $filter_active_color ) ? 'color:'. $filter_active_color .';' : '';
      $inline_style .= '}';
    }
    if ( $filter_line_color ) {
      $inline_style .= '.krth-portfolio-'. $e_uniqid .'.bpw-filter li .btn-active:after {';
      $inline_style .= ( $filter_line_color ) ? 'background-color:'. $filter_line_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-portfolio-'. $e_uniqid;

    // Style
    $portfolio_style = $portfolio_style === 'bpw-style-two' ? 'bpw-style-two' : 'bpw-style-one';
    $portfolio_column = $portfolio_column ? $portfolio_column : 'bpw-col-3';

    // View Details Button
    if (kroth_framework_active()) {
      $view_more_text = cs_get_option('view_more_text');
      if ($btn_text) {
        $btn_text = $btn_text;
      } elseif($view_more_text) {
        $btn_text = $view_more_text;
      } else {
        $btn_text = __('View Details', 'kroth-core');
      }
    } else {
      $btn_text = $btn_text ? $btn_text : __('View Details', 'kroth-core');
    }

    // Portfolio No Space
    $portfolio_no_space = $portfolio_no_space ? 'bpw-no-gutter' : '';

    // Turn output buffer on
    ob_start();

    // Portfolio Filter
    if ($portfolio_filter) {
    ?>
    <ul class="bpw-filter simple-fix <?php echo esc_html($styled_class); ?>">
			<li><a href="#0" class="btn-active" data-filter="*">All</a></li>
      <?php
        if ($portfolio_show_category) {
          $cat_name = explode(',', $portfolio_show_category);
          $terms = $cat_name;
          $count = count($terms);
          if ($count > 0) {
            foreach ($terms as $term) {
              echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="#0" class="filter cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" title="' . str_replace('-', " ", strtolower($term)) . '">' . str_replace('-', " ", strtolower($term)) . '</a></li>';
             }
          }
        } else {
          $terms = get_terms('portfolio_category');
          $count = count($terms);
          $i=0;
          $term_list = '';
          if ($count > 0) {
            foreach ($terms as $term) {
              $i++;
              $term_list .= '<li><a href="#0" class="filter cat-'. $term->slug .'" data-filter=".cat-'. $term->slug .'" title="' . esc_attr($term->name) . '">' . $term->name . '</a></li>';
              if ($count != $i) {
                $term_list .= '';
              } else {
                $term_list .= '';
              }
            }
            echo $term_list;
          }
        }
      ?>
		</ul>
    <?php
    }

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
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'portfolio_category' => esc_attr($portfolio_show_category),
      'orderby' => $portfolio_orderby,
      'order' => $portfolio_order
    );

    $krth_port = new WP_Query( $args ); ?>

    <!-- Portfolio Start -->
    <div class="krth-portfolios <?php echo esc_attr($portfolio_style); ?> <?php echo esc_attr($portfolio_column); ?> <?php echo esc_attr($portfolio_no_space); ?> <?php echo esc_attr($class); ?>">
      <div class="grid-sizer"></div>
      <div class="gutter-sizer"></div>

      <?php
      if ($krth_port->have_posts()) : while ($krth_port->have_posts()) : $krth_port->the_post();

        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'portfolio_category');
        foreach ($terms as $term) {
          $cat_class = 'cat-' . $term->slug;
        }
        $count = count($terms);
        $i=0;
        $cat_class = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $cat_class .= 'cat-'. $term->slug .' ';
            if ($count != $i) {
              $cat_class .= '';
            } else {
              $cat_class .= '';
            }
          }
        }

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        if (!$disable_size_limit) {
          if ($portfolio_column === 'bpw-col-2') {
            $portfolio_img = $large_image;
            $featured_img = ( $portfolio_img ) ? $portfolio_img : KROTH_PLUGIN_ASTS . '/images/1000x800.jpg';
          } elseif ($portfolio_column === 'bpw-col-4') {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '280', '190', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : KROTH_PLUGIN_ASTS . '/images/280x190.jpg';
          } elseif ($portfolio_column === 'bpw-col-5') {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '220', '150', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : KROTH_PLUGIN_ASTS . '/images/220x150.jpg';
          } else {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '420', '280', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : KROTH_PLUGIN_ASTS . '/images/420x280.jpg';
          }
        } else {
          $featured_img = ( $large_image ) ? $large_image : '';
        }

        if ($portfolio_style === 'bpw-style-two') { ?>
          <div class="krth-portfolio-item <?php echo esc_attr($styled_class); ?> <?php echo esc_attr($cat_class); ?>">
            <div class="bpw-featured-img">
              <img src="<?php echo $featured_img; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
              <div class="bpw-content-overlay">
  							<a href="<?php esc_url(the_permalink()); ?>" class="bpw-plus-icon"></a>
  						</div>
            </div>
            <div class="bpw-content">
              <a href="<?php esc_url(the_permalink()); ?>" class="bpw-heading"><?php esc_html(the_title()); ?></a>
              <?php
              $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
              $i=1;
              foreach ($category_list as $term) {
                $term_link = get_term_link( $term );
                echo '<a href="'. esc_url($term_link) .'" class="bpw-category">'. $term->name .'</a> ';
                if($i++==2) break;
              }
              ?>
            </div>
          </div>
        <?php
        } else {
      ?>

        <div class="krth-portfolio-item <?php echo esc_attr($styled_class); ?> <?php echo esc_attr($cat_class); ?>">
          <div class="bpw-featured-img">
            <img src="<?php echo $featured_img; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
          </div>
          <div class="bpw-content-overlay"></div>
          <div class="bpw-content">
            <div class="bpw-heading"><?php esc_html(the_title()); ?></div>
            <a href="<?php esc_url(the_permalink()); ?>" class="bpw-btn"><?php echo esc_attr($btn_text); ?></a>
          </div>
        </div>

      <?php
        }
      endwhile;
      endif;
      wp_reset_postdata(); ?>

    </div>
    <!-- Portfolio End -->

    <?php
    if ($portfolio_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $krth_port ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'krth_portfolio', 'krth_portfolio_function' );
