<?php
// Metabox
$kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $kroth_id : false;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );

// Header Style - ThemeOptions & Metabox
if ($kroth_meta) {
  $kroth_header_design  = $kroth_meta['select_header_design'];
  $kroth_sticky_header  = $kroth_meta['sticky_header'];
  $kroth_search_icon    = $kroth_meta['search_icon'];
  $kroth_cart_widget    = $kroth_meta['cart_widget'];
} else {
  $kroth_header_design  = cs_get_option('select_header_design');
  $kroth_sticky_header  = cs_get_option('sticky_header');
  $kroth_search_icon    = cs_get_option('search_icon');
  $kroth_cart_widget    = cs_get_option('cart_widget');
}
if ($kroth_header_design === 'default') {
  $kroth_header_design_actual  = cs_get_option('select_header_design');
} else {
  $kroth_header_design_actual = ( $kroth_header_design ) ? $kroth_header_design : cs_get_option('select_header_design');
}
if ($kroth_meta && $kroth_header_design !== 'default') {
  $kroth_sticky_header  = $kroth_meta['sticky_header'];
  $kroth_search_icon    = $kroth_meta['search_icon'];
  $kroth_cart_widget    = $kroth_meta['cart_widget'];
} else {
  $kroth_sticky_header  = cs_get_option('sticky_header');
  $kroth_search_icon    = cs_get_option('search_icon');
  $kroth_cart_widget    = cs_get_option('cart_widget');
}

$kroth_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$kroth_breakpoint = $kroth_mobile_breakpoint ? $kroth_mobile_breakpoint : '767';

if ($kroth_header_design_actual !== 'style_two') {
  $kroth_sticky_header_class = $kroth_sticky_header ? ' krth-sticky' : '';
} else {
  $kroth_sticky_header_class = '';
}
?>
<!-- Navigation & Search -->
<div class="krth-navigation <?php echo esc_attr($kroth_sticky_header_class); ?>">
<?php
if ($kroth_header_design_actual !== 'style_two') { ?>
  <div class="container">
  <div class="row">
<?php }

  if ($kroth_meta) {
    $kroth_choose_menu = $kroth_meta['choose_menu'];
  } else { $kroth_choose_menu = ''; }
  $kroth_choose_menu = $kroth_choose_menu ? $kroth_choose_menu : '';

  echo '<div class="krth-header-nav"><nav data-starts="'. $kroth_breakpoint .'">';
  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu'              => $kroth_choose_menu,
      'menu_class'        => '',
    )
  );
  echo '</nav></div>';

  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navigation-bar',
      'container_id'      => '',
      'menu'              => $kroth_choose_menu,
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'kroth_wp_bootstrap_navwalker::fallback',
      'walker'            => new kroth_wp_bootstrap_navwalker()
    )
  );

  if ($kroth_header_design_actual === 'style_two') {
    if ($kroth_search_icon || $kroth_cart_widget) { ?>
    <div class="top-nav-icons">
  <?php
    } // if two icons are active
    if ($kroth_search_icon) {
    ?>
    <div class="krth-nav-search">
      <a href="#0" id="search-trigger-two"><i class="icon-magnifier"></i></a>
    </div>
    <?php }
    if ($kroth_cart_widget) {
      if ( class_exists( 'WooCommerce' ) ) {
      global $woocommerce;
      $kroth_cart_url = wc_get_cart_url();
      $kroth_qty = $woocommerce->cart->get_cart_contents_count();
    ?>

    <div class="krth-nav-cart">
      <a href="<?php echo esc_url($kroth_cart_url); ?>" id="cart-trigger">
        <span><?php echo esc_attr($kroth_qty); ?></span>
        <i class="icon-basket"></i>
      </a>
    </div>

  <?php } // woocommerce plugin installed
    } // cart widget
    if ($kroth_search_icon || $kroth_cart_widget) { ?>
    </div> <!-- top-nav-icons -->
  <?php
    } // if two icons are active
  } else {
    if ($kroth_search_icon) { ?>
    <div class="krth-nav-search">
      <a href="#0" id="search-trigger"><i class="icon-magnifier"></i></a>
    </div>
    <?php } ?>

    <div class="krth-search-three">
      <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
        <input type="text" name="s" id="s" placeholder="<?php esc_html_e('Search Here...','kroth'); ?>" />
      </form>
      <span class="krth-search-close"></span>
    </div>
    <!-- Search Bar - Trigger -->

  <?php }
  if ($kroth_header_design_actual !== 'style_two') {
  ?>

  </div> <!-- Row -->
  </div> <!-- Container -->
<?php } ?>
</div> <!-- krth-navigation -->