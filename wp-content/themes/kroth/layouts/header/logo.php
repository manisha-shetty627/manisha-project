<?php
// Logo Image
$kroth_brand_logo_default = cs_get_option('brand_logo_default');
$kroth_brand_logo_retina = cs_get_option('brand_logo_retina');

// Mobile Logo
$kroth_mobile_logo = cs_get_option('mobile_logo_retina');
$kroth_mobile_width = cs_get_option('mobile_logo_width');
$kroth_mobile_height = cs_get_option('mobile_logo_height');
$kroth_mobile_logo_top = cs_get_option('mobile_logo_top');
$kroth_mobile_logo_bottom = cs_get_option('mobile_logo_bottom');
$kroth_mobile_class = $kroth_mobile_logo ? ' hav-mobile-logo' : ' dhve-mobile-logo';

// Transparent Header Logos
$kroth_transparent_logo = cs_get_option('transparent_logo_default');
$kroth_transparent_retina = cs_get_option('transparent_logo_retina');
$transparent_default_class = $kroth_transparent_logo ? ' hav-transparent-logo' : ' dhav-transparent-logo';

// Metabox - Header Transparent
$kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox'. true );
if ($kroth_meta) {
  $kroth_transparent_header = $kroth_meta['transparency_header'];
} else { $kroth_transparent_header = ''; }

// Retina Size
$kroth_retina_width = cs_get_option('retina_width');
$kroth_retina_height = cs_get_option('retina_height');

// Logo Spacings
$kroth_brand_logo_top = cs_get_option('brand_logo_top');
$kroth_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($kroth_mobile_logo_top) {
	$kroth_brand_logo_top = 'padding-top:'. kroth_check_px($kroth_mobile_logo_top) .';';
} elseif ($kroth_brand_logo_top !== '') {
	$kroth_brand_logo_top = 'padding-top:'. kroth_check_px($kroth_brand_logo_top) .';';
} else { $kroth_brand_logo_top = ''; }
if ($kroth_mobile_logo_bottom) {
	$kroth_brand_logo_bottom = 'padding-bottom:'. kroth_check_px($kroth_mobile_logo_bottom) .';';
} elseif ($kroth_brand_logo_bottom !== '') {
	$kroth_brand_logo_bottom = 'padding-bottom:'. kroth_check_px($kroth_brand_logo_bottom) .';';
} else { $kroth_brand_logo_bottom = ''; }
?>
<div class="krth-logo<?php echo esc_attr($kroth_mobile_class); ?><?php echo esc_attr($transparent_default_class); ?>" style="<?php echo esc_attr($kroth_brand_logo_top); echo esc_attr($kroth_brand_logo_bottom); ?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
	if (isset($kroth_transparent_header) && isset($kroth_transparent_logo)) {
		if (isset($kroth_transparent_logo)){
			if (isset($kroth_transparent_retina)){
				$kroth_transparent_retina_alt = get_post_meta($kroth_transparent_retina, '_wp_attachment_image_alt', true);
				echo '<img src="'. esc_url(wp_get_attachment_url($kroth_transparent_retina)) .'" width="'. esc_attr($kroth_retina_width) .'" height="'. esc_attr($kroth_retina_height) .'" alt="'. $kroth_transparent_retina_alt .'" class="transparent-retina-logo transparent-logo">';
			}
			$kroth_transparent_logo_alt = get_post_meta($kroth_transparent_logo, '_wp_attachment_image_alt', true);
			echo '<img src="'. esc_url(wp_get_attachment_url($kroth_transparent_logo)) .'" alt="'. $kroth_transparent_logo_alt .'" class="transparent-default-logo transparent-logo" width="'. esc_attr($kroth_retina_width) .'" height="'. esc_attr($kroth_retina_height) .'">';
		} elseif (isset($kroth_brand_logo_default)){
			if ($kroth_brand_logo_retina){
				$kroth_brand_logo_retina_alt = get_post_meta($kroth_brand_logo_retina, '_wp_attachment_image_alt', true);
				echo '<img src="'. esc_url(wp_get_attachment_url($kroth_brand_logo_retina)) .'" width="'. esc_attr($kroth_retina_width) .'" height="'. esc_attr($kroth_retina_height) .'" alt="'. $kroth_brand_logo_retina_alt .'" class="retina-logo">
					';
			}
			$kroth_brand_logo_default_alt = get_post_meta($kroth_brand_logo_default, '_wp_attachment_image_alt', true);
			echo '<img src="'. esc_url(wp_get_attachment_url($kroth_brand_logo_default)) .'" alt="'. $kroth_brand_logo_default_alt .'" class="default-logo" width="'. esc_attr($kroth_retina_width) .'" height="'. esc_attr($kroth_retina_height) .'">';
		} else {
			echo '<div class="text-logo">'. esc_attr(get_bloginfo( 'name' )) . '</div>';
		}
		if (isset($kroth_brand_logo_default)){
			if ($kroth_brand_logo_retina){
				$kroth_brand_logo_retina_alt = get_post_meta($kroth_brand_logo_retina, '_wp_attachment_image_alt', true);
				echo '<img src="'. esc_url(wp_get_attachment_url($kroth_brand_logo_retina)) .'" width="'. esc_attr($kroth_retina_width) .'" height="'. esc_attr($kroth_retina_height) .'" alt="'. $kroth_brand_logo_retina_alt .'" class="retina-logo sticky-logo">
					';
			}
			$kroth_brand_logo_default_alt = get_post_meta($kroth_brand_logo_default, '_wp_attachment_image_alt', true);
			echo '<img src="'. esc_url(wp_get_attachment_url($kroth_brand_logo_default)) .'" alt="'. $kroth_brand_logo_default_alt .'" class="default-logo sticky-logo" width="'. esc_attr($kroth_retina_width) .'" height="'. esc_attr($kroth_retina_height) .'">';
		}
	} elseif (isset($kroth_brand_logo_default)){
		if ($kroth_brand_logo_retina){
			$kroth_brand_logo_retina_alt = get_post_meta($kroth_brand_logo_retina, '_wp_attachment_image_alt', true);
			echo '<img src="'. esc_url(wp_get_attachment_url($kroth_brand_logo_retina)) .'" width="'. esc_attr($kroth_retina_width) .'" height="'. esc_attr($kroth_retina_height) .'" alt="'. $kroth_brand_logo_retina_alt .'" class="retina-logo">
				';
		}
		$kroth_brand_logo_default_alt = get_post_meta($kroth_brand_logo_default, '_wp_attachment_image_alt', true);
		echo '<img src="'. esc_url(wp_get_attachment_url($kroth_brand_logo_default)) .'" alt="'. $kroth_brand_logo_default_alt .'" class="default-logo" width="'. esc_attr($kroth_retina_width) .'" height="'. esc_attr($kroth_retina_height) .'">';
	} else {
		echo '<div class="text-logo">'. esc_attr(get_bloginfo( 'name' )) . '</div>';
	}
	if ($kroth_mobile_logo) {
		$kroth_mobile_logo_alt = get_post_meta($kroth_mobile_logo, '_wp_attachment_image_alt', true);
		echo '<img src="'. esc_url(wp_get_attachment_url($kroth_mobile_logo)) .'" width="'. esc_attr($kroth_mobile_width) .'" height="'. esc_attr($kroth_mobile_height) .'" alt="'. $kroth_mobile_logo_alt .'" class="mobile-logo">';
	}
	echo '</a>';
	?>
</div>