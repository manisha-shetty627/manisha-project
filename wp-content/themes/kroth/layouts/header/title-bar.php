<?php
// Metabox
global $post;
$kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );
if (($kroth_meta && is_page()) || ($kroth_meta && is_single($post->ID))) {
	$kroth_title_bar_padding = $kroth_meta['title_area_spacings'];
} else { $kroth_title_bar_padding = ''; }
// Padding - Theme Options
if ($kroth_title_bar_padding && $kroth_title_bar_padding !== 'padding-none') {
	$kroth_title_top_spacings = $kroth_meta['title_top_spacings'];
	$kroth_title_bottom_spacings = $kroth_meta['title_bottom_spacings'];
	if ($kroth_title_bar_padding === 'padding-custom') {
		$kroth_title_top_spacings = $kroth_title_top_spacings ? 'padding-top:'. kroth_check_px($kroth_title_top_spacings) .';' : '';
		$kroth_title_bottom_spacings = $kroth_title_bottom_spacings ? 'padding-bottom:'. kroth_check_px($kroth_title_bottom_spacings) .';' : '';
		$kroth_custom_padding = $kroth_title_top_spacings . $kroth_title_bottom_spacings;
	} else {
		$kroth_custom_padding = '';
	}
} else {
	$kroth_title_bar_padding = cs_get_option('title_bar_padding');
	$kroth_titlebar_top_padding = cs_get_option('titlebar_top_padding');
	$kroth_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
	if ($kroth_title_bar_padding === 'padding-custom') {
		$kroth_titlebar_top_padding = $kroth_titlebar_top_padding ? 'padding-top:'. kroth_check_px($kroth_titlebar_top_padding) .';' : '';
		$kroth_titlebar_bottom_padding = $kroth_titlebar_bottom_padding ? 'padding-bottom:'. kroth_check_px($kroth_titlebar_bottom_padding) .';' : '';
		$kroth_custom_padding = $kroth_titlebar_top_padding . $kroth_titlebar_bottom_padding;
	} else {
		$kroth_custom_padding = '';
	}
}

// Banner Type - Meta Box
if (($kroth_meta && is_page()) || ($kroth_meta && is_single($post->ID))) {
	$kroth_banner_type = $kroth_meta['banner_type'];
} else { $kroth_banner_type = ''; }

// Overlay Color - Theme Options
if (($kroth_meta && is_page()) || ($kroth_meta && is_single($post->ID))) {
	$kroth_bg_overlay_color = $kroth_meta['titlebar_bg_overlay_color'];
} else { $kroth_bg_overlay_color = ''; }
if ($kroth_bg_overlay_color) {
	if ($kroth_bg_overlay_color) {
		$kroth_overlay_color = 'style="background-color: '. $kroth_bg_overlay_color .'"';
	} else {
		$kroth_overlay_color = '';
	}
} else {
	$kroth_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
	if ($kroth_bg_overlay_color) {
		$kroth_overlay_color = 'style="background-color: '. $kroth_bg_overlay_color .'"';
	} else {
		$kroth_overlay_color = '';
	}
}

// Background - Type
if( $kroth_meta && isset( $kroth_meta['title_area_bg'] ) ) {

  extract( $kroth_meta['title_area_bg'] );

  $kroth_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
  $kroth_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
  $kroth_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
  $kroth_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
  $kroth_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
  $kroth_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
  $kroth_background_style       = ( ! empty( $image ) ) ? $kroth_background_image . $kroth_background_repeat . $kroth_background_position . $kroth_background_size . $kroth_background_attachment : '';

  $kroth_title_bg = ( ! empty( $kroth_background_style ) || ! empty( $kroth_background_color ) ) ? $kroth_background_style . $kroth_background_color : '';

} else { $kroth_title_bg = ''; }

if($kroth_banner_type === 'hide-title-area') { // Hide Title Area
} elseif($kroth_meta && $kroth_banner_type === 'revolution-slider') { // Hide Title Area
	echo do_shortcode($kroth_meta['page_revslider']);
} else { ?>
	<!-- Banner & Title Area -->
<div class="krth-title-area <?php echo esc_attr($kroth_title_bar_padding .' '. $kroth_banner_type); ?>" style="<?php echo esc_attr($kroth_custom_padding . $kroth_title_bg); ?>">
<?php if($kroth_bg_overlay_color) { ?>
	<div class="krth-title-overlay" <?php echo $kroth_overlay_color; ?>></div>
<?php } ?>
  <span class="page-title"><?php echo kroth_title_area(); ?></span>
</div>
<?php } ?>