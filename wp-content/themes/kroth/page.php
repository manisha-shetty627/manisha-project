<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

// Metabox
$kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );

if ($kroth_meta) {
	$kroth_content_padding = $kroth_meta['content_spacings'];
} else { $kroth_content_padding = ''; }
// Padding - Metabox
if ($kroth_content_padding && $kroth_content_padding !== 'padding-none') {
	$kroth_content_top_spacings = $kroth_meta['content_top_spacings'];
	$kroth_content_bottom_spacings = $kroth_meta['content_bottom_spacings'];
	if ($kroth_content_padding === 'padding-custom') {
		$kroth_content_top_spacings = $kroth_content_top_spacings ? 'padding-top:'. kroth_check_px($kroth_content_top_spacings) .';' : '';
		$kroth_content_bottom_spacings = $kroth_content_bottom_spacings ? 'padding-bottom:'. kroth_check_px($kroth_content_bottom_spacings) .';' : '';
		$kroth_custom_padding = $kroth_content_top_spacings . $kroth_content_bottom_spacings;
	} else {
		$kroth_custom_padding = '';
	}
} else {
	$kroth_custom_padding = '';
}

// Page Layout Options
$kroth_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ($kroth_page_layout) {

	$kroth_page_layout = $kroth_page_layout['page_layout'];

	if ($kroth_page_layout === 'extra-width') {
		$kroth_column_class = 'extra-width';
		$kroth_layout_class = 'container-fluid';
	} elseif($kroth_page_layout === 'left-sidebar' || $kroth_page_layout === 'right-sidebar') {
		$kroth_column_class = 'col-md-9';
		$kroth_layout_class = 'container';
	} else {
		$kroth_column_class = 'col-md-12';
		$kroth_layout_class = 'container';
	}

	// Page Layout Class
	if ($kroth_page_layout === 'left-sidebar') {
		$kroth_sidebar_class = 'krth-left-sidebar';
	} elseif ($kroth_page_layout === 'right-sidebar') {
		$kroth_sidebar_class = 'krth-right-sidebar';
	} elseif ($kroth_page_layout === 'extra-width') {
		$kroth_sidebar_class = 'krth-extra-width';
	} else {
		$kroth_sidebar_class = 'krth-full-width';
	}
} else {
	$kroth_column_class = 'col-md-12';
	$kroth_layout_class = 'container';
	$kroth_sidebar_class = 'krth-full-width';
}

get_header(); ?>

<div class="<?php echo esc_attr($kroth_layout_class .' '. $kroth_content_padding .' '. $kroth_sidebar_class); ?> krth-content-area" style="<?php echo esc_attr($kroth_custom_padding); ?>">
	<div class="row">

		<?php
		// Left Sidebar
		if($kroth_page_layout === 'left-sidebar') {
   		get_sidebar();
		}
		?>

		<div class="krth-content-side <?php echo esc_attr($kroth_column_class); ?>">

			<?php
			while ( have_posts() ) : the_post();

				the_content();

				// If comments are open or we have at least one comment, load up the comment template.
				$kroth_theme_page_comments = cs_get_option('theme_page_comments');
				if ( isset($kroth_theme_page_comments) && (comments_open() || get_comments_number()) ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div><!-- Content Area -->

		<?php
		// Right Sidebar
		if($kroth_page_layout === 'right-sidebar') {
			get_sidebar();
		}
		?>

	</div>
</div>

<?php
get_footer();