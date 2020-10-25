<?php
// Metabox
global $post;
$kroth_id    = ( isset( $post ) ) ? $post->ID : false;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $kroth_id : false;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );
if ($kroth_meta) {
  $kroth_topbar_options = $kroth_meta['topbar_options'];
} else {
  $kroth_topbar_options = '';
}
// Define Theme Options and Metabox varials in right way!
if ($kroth_meta) {
  if ($kroth_topbar_options === 'custom' && $kroth_topbar_options !== 'default') {
    $kroth_top_left           = $kroth_meta['top_left'];
    $kroth_top_right          = $kroth_meta['top_right'];
    $kroth_topbar_left_width  = $kroth_meta['topbar_left_width'];
    $kroth_topbar_right_width = $kroth_meta['topbar_right_width'];
    $kroth_left_width         = $kroth_topbar_left_width ? 'width:'. $kroth_topbar_left_width .';' : '';
    $kroth_right_width        = $kroth_topbar_right_width ? 'width:'. $kroth_topbar_right_width .';' : '';
    $kroth_hide_topbar        = $kroth_topbar_options;
    $kroth_topbar_bg          = $kroth_meta['topbar_bg'];
    if ($kroth_topbar_bg) {
      $kroth_topbar_bg = 'background-color: '. $kroth_topbar_bg .';';
    } else {$kroth_topbar_bg = '';}
  } else {
    $kroth_top_left           = cs_get_option('top_left');
    $kroth_top_right          = cs_get_option('top_right');
    $kroth_topbar_left_width  = cs_get_option('topbar_left_width');
    $kroth_topbar_right_width = cs_get_option('topbar_right_width');
    $kroth_left_width         = $kroth_topbar_left_width ? 'width:'. $kroth_topbar_left_width .';' : '';
    $kroth_right_width        = $kroth_topbar_right_width ? 'width:'. $kroth_topbar_right_width .';' : '';
    $kroth_hide_topbar        = cs_get_option('top_bar');
    $kroth_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $kroth_top_left           = cs_get_option('top_left');
  $kroth_top_right          = cs_get_option('top_right');
  $kroth_topbar_left_width  = cs_get_option('topbar_left_width');
  $kroth_topbar_right_width = cs_get_option('topbar_right_width');
  $kroth_left_width         = $kroth_topbar_left_width ? 'width:'. $kroth_topbar_left_width .';' : '';
  $kroth_right_width        = $kroth_topbar_right_width ? 'width:'. $kroth_topbar_right_width .';' : '';
  $kroth_hide_topbar        = cs_get_option('top_bar');
  $kroth_topbar_bg          = '';
}
// All options
if ($kroth_meta && $kroth_topbar_options === 'custom' && $kroth_topbar_options !== 'default') {
  $kroth_top_left = ( $kroth_top_left ) ? $kroth_meta['top_left'] : cs_get_option('top_left');
  $kroth_top_right = ( $kroth_top_right ) ? $kroth_meta['top_right'] : cs_get_option('top_right');
} else {
  $kroth_top_left = cs_get_option('top_left');
  $kroth_top_right = cs_get_option('top_right');
}
if ($kroth_meta && $kroth_topbar_options !== 'default') {
  if ($kroth_topbar_options === 'hide_topbar') {
    $kroth_hide_topbar = 'hide';
  } else {
    $kroth_hide_topbar = 'show';
  }
} else {
  $kroth_hide_topbar_check = cs_get_option('top_bar');
  if ($kroth_hide_topbar_check === true ) {
    $kroth_hide_topbar = 'hide';
  } else {
    $kroth_hide_topbar = 'show';
  }
}
if ($kroth_meta) {
  $kroth_topbar_bg = ( $kroth_topbar_bg ) ? $kroth_meta['topbar_bg'] : '';
} else {
  $kroth_topbar_bg = '';
}

if ($kroth_topbar_bg) {
  $kroth_topbar_bg = 'background-color: '. $kroth_topbar_bg .';';
} else {$kroth_topbar_bg = '';}

$kroth_topbar_left_width = ( $kroth_topbar_left_width ) ? $kroth_meta['topbar_left_width'] : cs_get_option('topbar_left_width');
$kroth_topbar_right_width = ( $kroth_topbar_right_width ) ? $kroth_meta['topbar_right_width'] : cs_get_option('topbar_right_width');
$kroth_left_width   = $kroth_topbar_left_width ? 'width:'. $kroth_topbar_left_width .';' : '';
$kroth_right_width  = $kroth_topbar_right_width ? 'width:'. $kroth_topbar_right_width .';' : '';

if($kroth_hide_topbar === 'show') {
?>
<div class="krth-topbar" style="<?php echo esc_attr($kroth_topbar_bg); ?>">
  <div class="container">
  <div class="row">

      <div class="krth-topbar-left" style="<?php echo esc_attr($kroth_left_width); ?>">
        <?php echo do_shortcode($kroth_top_left); ?>
      </div> <!-- krth-topbar-left -->

      <div class="krth-topbar-right" style="<?php echo esc_attr($kroth_right_width); ?>">
        <?php echo do_shortcode($kroth_top_right); ?>
      </div> <!-- krth-topbar-right -->

  </div> <!-- Row -->
  </div> <!-- Container -->
</div>
<?php } // Hide Topbar - From Metabox