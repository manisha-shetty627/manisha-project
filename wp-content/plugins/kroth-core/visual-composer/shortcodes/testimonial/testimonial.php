<?php
/* Testimonial */
if ( !function_exists('krth_testimonial_function')) {
  function krth_testimonial_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'testimonial_column'  => '',
      'class'  => '',

      // Listing
      'testimonial_limit'  => '',
      'testimonial_order'  => '',
      'testimonial_orderby'  => '',
      'testimonial_pagination'  => '',
      'testimonial_min_height'  => '',

      // Color & Style
      'title_color'  => '',
      'content_color'  => '',
      'name_color'  => '',
      'profession_color'  => '',
      'title_size'  => '',
      'content_size'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Minimum Height
    if ( $testimonial_min_height ) {
      $inline_style .= '.krth-testimonial-'. $e_uniqid .' .krth-testimonials-four {';
      $inline_style .= ( $testimonial_min_height ) ? 'min-height:'. $testimonial_min_height .';' : '';
      $inline_style .= '}';
    }
    // Title Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.krth-testimonial-'. $e_uniqid .' .krth-testimonials-four .testimonial-heading {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.krth-testimonial-'. $e_uniqid .' .krth-testimonials-four p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. $content_size .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.krth-testimonial-'. $e_uniqid .' .krth-testimonials-four .testi-client-info .testi-name {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. $name_size .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.krth-testimonial-'. $e_uniqid .' .krth-testimonials-four .testi-client-info .testi-pro {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. $profession_size .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-testimonial-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

    // Query Starts Here
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
      'paged' => $my_page,
      'post_type' => 'testimonial',
      'posts_per_page' => (int)$testimonial_limit,
      'orderby' => $testimonial_orderby,
      'order' => $testimonial_order
    );

    $krth_testi = new WP_Query( $args );

    if ($krth_testi->have_posts()) :
    ?>

    <div class="<?php echo $styled_class .' '. $class; ?>"> <!-- Testimonial Starts -->

    <?php
    while ($krth_testi->have_posts()) : $krth_testi->the_post();

    // Get Meta Box Options - kroth_framework_active()
    $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
    $client_name = $testimonial_options['testi_name'];
    $name_link = $testimonial_options['testi_name_link'];
    $client_pro = $testimonial_options['testi_pro'];
    $pro_link = $testimonial_options['testi_pro_link'];

    $name_tag = $name_link ? 'a' : 'span';
    $name_link = $name_link ? 'href="'. $name_link .'" target="_blank"' : '';
    $client_name = $client_name ? '<'. $name_tag .' '. $name_link .' class="testi-name">'. $client_name .'</'. $name_tag .'>' : '';

    $pro_tag = $pro_link ? 'a' : 'span';
    $pro_link = $pro_link ? 'href="'. $pro_link .'" target="_blank"' : '';
    $client_pro = $client_pro ? '<'. $pro_tag .' '. $pro_link .' class="testi-pro">'. $client_pro .'</'. $pro_tag .'>' : '';

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $image_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
    $large_image = $large_image[0];
    if(class_exists('Aq_Resize')) {
      $testi_img = aq_resize( $large_image, '170', '170', true );
    } else {$testi_img = $large_image;}
    $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt="'. $image_alt .'"></'. $name_tag .'>' : '';
    ?>
    <div class="<?php echo $testimonial_column; ?>">
      <div class="krth-testimonials-four rounded-three">
        <div class="testi-client">
          <?php echo $actual_image; ?>
        </div>
        <div class="testi-content">
          <span class="testimonial-heading"><?php echo the_title(); ?></span>
          <?php the_content(); ?>
          <div class="testi-client-info">
            <?php echo $client_name . $client_pro; ?>
          </div>
        </div>
      </div>
    </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>

    </div> <!-- Testimonial End -->

<?php
  endif;

  if ($testimonial_pagination) {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi(array( 'query' => $krth_testi ) );
      wp_reset_postdata();  // avoid errors further down the page
    }
  }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'krth_testimonial', 'krth_testimonial_function' );