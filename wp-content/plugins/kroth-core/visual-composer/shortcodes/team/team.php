<?php
/* Team */
if ( !function_exists('krth_team_function')) {
  function krth_team_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'team_style'  => '',
      'team_column'  => '',
      'class'  => '',
      'team_link_text'  => '',
      // Listing
      'team_limit'  => '',
      'team_id'  => '',
      'team_order'  => '',
      'team_orderby'  => '',
      'team_pagination'  => '',
      'team_min_height'  => '',
      // Color & Style
      'name_color'  => '',
      'profession_color'  => '',
      'content_color'  => '',
      'link_color'  => '',
      'name_size'  => '',
      'profession_size'  => '',
      'content_size'  => '',
      'link_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Minimum Height
    if ( $team_min_height ) {
      $inline_style .= '.krth-team-'. $e_uniqid .' .krth-team-member-two, .krth-team-'. $e_uniqid .' .krth-team-member {';
      $inline_style .= ( $team_min_height ) ? 'min-height:'. kroth_core_check_px($team_min_height) .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.krth-team-'. $e_uniqid .' .krth-team-member-two .team-content .team-name, .krth-team-'. $e_uniqid .' .krth-team-member .team-content .team-name {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. $name_size .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.krth-team-'. $e_uniqid .' .krth-team-member-two .team-content .team-pro, .krth-team-'. $e_uniqid .' .krth-team-member .team-content .team-pro {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. $profession_size .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.krth-team-'. $e_uniqid .' .krth-team-member-two p, .krth-team-'. $e_uniqid .' .krth-team-member p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. $content_size .';' : '';
      $inline_style .= '}';
    }
    // Link Color
    if ( $link_color || $link_size ) {
      $inline_style .= '.krth-team-'. $e_uniqid .' .krth-team-member-two .team-content .view-profile {';
      $inline_style .= ( $link_color ) ? 'color:'. $link_color .';' : '';
      $inline_style .= ( $link_size ) ? 'font-size:'. kroth_core_check_px($link_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' krth-team-'. $e_uniqid;

    // Team Style
    $team_style_class = ($team_style === 'style-two') ? 'krth-team-member' : 'krth-team-member-two';
    $team_class = ($team_style === 'style-two') ? 'krth-team-members' : '';

    // Team Column
    $team_column = $team_column ? $team_column : 'col-lg-4';

    // Turn output buffer on
    ob_start();

    // Show ID
    if ($team_id) {
      $team_id = explode(',',$team_id);
    } else {
      $team_id = '';
    }

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
      'post_type' => 'team',
      'posts_per_page' => (int)$team_limit,
      'orderby' => $team_orderby,
      'order' => $team_order,
      'post__in' => $team_id,
    );

    $krth_team_qury = new WP_Query( $args );

    if ($krth_team_qury->have_posts()) :
    ?>

    <div class="<?php echo $team_class .' '. $styled_class .' '. $class; ?>"> <!-- Team Starts -->

    <?php
    while ($krth_team_qury->have_posts()) : $krth_team_qury->the_post();

    // Link
    $team_options = get_post_meta( get_the_ID(), 'team_options', true );
    $team_link_text = $team_link_text ? $team_link_text : 'View Profile';
    $actual_link = '<a href="'. get_permalink() .'" class="view-profile">'. $team_link_text .'</a>';

    $team_pro = $team_options['team_job_position'];
    $team_pro = $team_pro ? '<span class="team-pro">'. $team_pro .'</span>' : '';

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $image_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
    $large_image = $large_image[0];
    $team_img_class = ($team_style === 'style-two') ? '' : 'class="rounded-three"';
    $actual_image = $large_image ? '<div class="featured-image"><img src="'. $large_image .'" '. $team_img_class .' alt="'. $image_alt .'"></div>' : '';
    ?>
    <div class="<?php echo $team_column; ?>">

      <div class="<?php echo esc_attr($team_style_class); ?> krth-team-hover">
        <?php echo $actual_image; ?>
        <div class="team-content">
          <a href="<?php echo esc_url(get_permalink()); ?>" class="team-name"><?php echo the_title(); ?></a>
          <?php
            echo $team_pro;
            if ($team_style !== 'style-two') {
              echo '<p>';
              the_excerpt();
              echo '</p>';
              echo $actual_link;
            }
          ?>
        </div>
      </div>

    </div>
    <?php endwhile; ?>

    </div> <!-- Team End -->

<?php
  endif;

  if ($team_pagination) {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi(array( 'query' => $krth_team_qury ) );
      wp_reset_postdata();  // avoid errors further down the page
    }
  }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'krth_team', 'krth_team_function' );