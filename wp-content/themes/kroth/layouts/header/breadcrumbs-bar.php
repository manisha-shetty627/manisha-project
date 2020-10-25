<?php
$kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );
if ($kroth_meta && is_page()) {
	$kroth_hide_breadcrumbs  = $kroth_meta['hide_breadcrumbs'];
} else { $kroth_hide_breadcrumbs = ''; }
if (!$kroth_hide_breadcrumbs) { // Hide Breadcrumbs
?>
<!-- Breadcrumbs -->
<div class="container-fluid krth-breadcrumbs">
  <div class="row">

    <div class="container">
    <div class="row">

      <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>

    </div>
    </div>

  </div>
</div>
<!-- Breadcrumbs -->
<?php } // Hide Breadcrumbs ?>