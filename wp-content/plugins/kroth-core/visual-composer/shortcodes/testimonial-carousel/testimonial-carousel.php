<?php
/* Testimonial Carousel */
if ( !function_exists('krth_testimonial_carousel_function')) {
  function krth_testimonial_carousel_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'testimonial_style'  => '',
      'class'  => '',
      'testimonial_rounded'  => '',

      // Listing
      'testimonial_limit'  => '',
      'testimonial_order'  => '',
      'testimonial_orderby'  => '',

      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_mousedrag'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',

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

    // Title Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.krth-testi-carousel-'. $e_uniqid .' .testimonial-heading, .krth-testi-carousel-'. $e_uniqid .'.krth-testimonials-two .testimonial-heading {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.krth-testi-carousel-'. $e_uniqid .' .krth-testimonial .testi-content p, .krth-testi-carousel-'. $e_uniqid .'.krth-testimonials-three .testi-content p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. $content_size .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.krth-testi-carousel-'. $e_uniqid .'.krth-testimonials-two .testi-client-info .testi-name, .krth-testi-carousel-'. $e_uniqid .' .testi-client-info .testi-name {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. $name_size .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.krth-testi-carousel-'. $e_uniqid .'.krth-testimonials-two .testi-client-info .testi-pro, .krth-testi-carousel-'. $e_uniqid .' .testi-client-info .testi-pro {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. $profession_size .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-testi-carousel-'. $e_uniqid;

    // Carousel Data's
    $carousel_loop = $carousel_loop !== 'true' ? 'data-loop="true"' : 'data-loop="false"';
    $carousel_items = $carousel_items ? 'data-items="'. $carousel_items .'"' : 'data-items="1"';
    $carousel_margin = $carousel_margin ? 'data-margin="'. $carousel_margin .'"' : 'data-margin="0"';
    $carousel_dots = $carousel_dots ? 'data-dots="'. $carousel_dots .'"' : 'data-dots="true"';
    $carousel_nav = $carousel_nav ? 'data-nav="'. $carousel_nav .'"' : 'data-nav="true"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? 'data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? 'data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? 'data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag !== 'true' ? 'data-mouse-drag="true"' : 'data-mouse-drag="false"';
    $carousel_autowidth = $carousel_autowidth ? 'data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? 'data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? 'data-items-tablet="'. $carousel_tablet .'"' : '';
    $carousel_mobile = $carousel_mobile ? 'data-items-mobile-landscape="'. $carousel_mobile .'"' : '';
    $carousel_small_mobile = $carousel_small_mobile ? 'data-items-mobile-portrait="'. $carousel_small_mobile .'"' : '';

    // Testimonial Style
    if ($testimonial_style === 'testimonial_two') {
      $testimonial_style_class = ' krth-testimonials-two krth-tn-two ';
      $testimonial_rounded_class = $testimonial_rounded ? ' krth-testimonials-round ' : ' ';
    } elseif ($testimonial_style === 'testimonial_three') {
      $testimonial_style_class = ' krth-testimonials-three krth-tn-two ';
      $testimonial_rounded_class = ' ';
    } else {
      $testimonial_style_class = ' ';
      $testimonial_rounded_class = ' ';
    }

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

    <div class="krth-testimonials krth-theme-carousel <?php echo $testimonial_style_class .' '. $testimonial_rounded_class .' '. $styled_class; ?>" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_mousedrag .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>> <!-- Testimonial Starts -->

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
    if ($testimonial_style === 'testimonial_two') {
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '200', '200', true );
      } else {$testi_img = $large_image;}
    } else {
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '55', '55', true );
      } else {$testi_img = $large_image;}
    }
    $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt="'. $image_alt .'"></'. $name_tag .'>' : '';

    if ($testimonial_style === 'testimonial_two') { // Style Two
    ?>
      <div class="krth-testimonial">
        <div class="testi-client">
          <?php echo $actual_image; ?>
        </div>
        <div class="testi-content">
          <span class="testimonial-heading"><?php echo the_title(); ?></span>
          <?php the_content(); ?>
          <div class="testi-client-info"><?php echo $client_name . $client_pro; ?></div>
        </div>
      </div>
    <?php
    } elseif ($testimonial_style === 'testimonial_three') { ?>
      <div class="krth-testimonial">
        <div class="testi-content">
          <?php the_content(); ?>
          <div class="testi-client-info"><?php echo $client_name . $client_pro; ?></div>
        </div>
      </div>
    <?php
    } else { ?>
      <div class="krth-testimonial">
        <div class="testi-content">
          <span class="testimonial-heading"><?php echo the_title(); ?></span>
          <?php the_content(); ?>
        </div>
        <div class="testi-client">
          <?php echo $actual_image; ?>
          <div class="testi-client-info"><?php echo $client_name . $client_pro; ?></div>
        </div>
      </div>
    <?php
    } // Style One
    endwhile;
    wp_reset_postdata();
    ?>

    </div> <!-- Testimonial End -->

<?php
  endif;

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'krth_testimonial_carousel', 'krth_testimonial_carousel_function' );