<?php
/* ==========================================================
  Product
=========================================================== */
if ( !function_exists('krth_product_function')) {
  function krth_product_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'product_column'  => '',
      'product_limit'  => '',
      // Enable & Disable
      'product_pagination'  => '',
      // Listing
      'product_order'  => '',
      'product_orderby'  => '',
      'product_show_category'  => '',
      'product_min_height'  => '',
      'class'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Image Overlay Color
    if ( $product_min_height ) {
      $inline_style .= '.woocommerce.krth-product-'. $e_uniqid .' ul.products li.product a .vt-product-cnt {';
      $inline_style .= ( $product_min_height ) ? 'min-height:'. kroth_core_check_px($product_min_height) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-product-'. $e_uniqid;

    // Style
    $product_column = $product_column ? $product_column : '3';

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
      'post_type' => 'product',
      'posts_per_page' => (int)$product_limit,
      'product_cat' => esc_attr($product_show_category),
      'orderby' => $product_orderby,
      'order' => $product_order
    );

    $krth_product = new WP_Query( $args );
  ?>

  <!-- Product Start -->
  <div class="woocommerce <?php echo esc_attr($styled_class); ?>">
    <div class="krth-products woo-col-<?php echo esc_attr($product_column) .' '. esc_attr($class); ?>">
      <ul class="products">

      <?php
      if ($krth_product->have_posts()) : while ($krth_product->have_posts()) : $krth_product->the_post();

        wc_get_template_part('content', 'product');

      endwhile;
      endif;
      wp_reset_postdata();
      ?>

      </ul>
    </div>
    <!-- Product End -->
  </div>

    <?php
    if ($product_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $krth_product ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'krth_product', 'krth_product_function' );
