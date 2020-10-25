<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
get_header();

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

// Theme Options
$kroth_blog_style = cs_get_option('blog_listing_style');
$kroth_blog_columns = cs_get_option('blog_listing_columns');
$kroth_sidebar_position = cs_get_option('blog_sidebar_position');

// Columns
if ($kroth_blog_style === 'style-two') {
	$kroth_blog_columns = $kroth_blog_columns ? $kroth_blog_columns : 'krth-blog-col-2';
} elseif ($kroth_blog_style === 'style-three') {
	$kroth_blog_columns = $kroth_blog_columns ? $kroth_blog_columns : 'krth-blog-col-2';
} else {
	$kroth_blog_columns = 'krth-blog-col-1';
}

// Style
if ($kroth_blog_style === 'style-two') {
	$kroth_blog_style = ' krth-blog-one ';
} elseif ($kroth_blog_style === 'style-three') {
	$kroth_blog_style = ' krth-blog-one krth-blog-two ';
} else {
	$kroth_blog_style = ' krth-blog-one krth-blog-list ';
}

// Sidebar Position
if ($kroth_sidebar_position === 'sidebar-hide') {
	$layout_class = 'col-md-12';
	$kroth_sidebar_class = 'krth-hide-sidebar';
} elseif ($kroth_sidebar_position === 'sidebar-left') {
	$layout_class = 'col-md-9';
	$kroth_sidebar_class = 'krth-left-sidebar';
} else {
	$layout_class = 'col-md-9';
	$kroth_sidebar_class = 'krth-right-sidebar';
}
?>

<div class="container krth-content-area <?php echo esc_attr($kroth_content_padding .' '. $kroth_sidebar_class); ?>" style="<?php echo esc_attr($kroth_custom_padding); ?>">
<div class="row">

	<?php
	if ($kroth_sidebar_position === 'sidebar-left' && $kroth_sidebar_position !== 'sidebar-hide') {
		get_sidebar(); // Sidebar
	}
	?>

	<div class="krth-content-side <?php echo esc_attr($layout_class); ?>">
		<div class="<?php echo esc_attr($kroth_blog_style) .' '. esc_attr($kroth_blog_columns); ?>">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'layouts/post/content' );
			endwhile;
		else :
			get_template_part( 'layouts/post/content', 'none' );
		endif; ?>

		</div><!-- Blog Div -->
		<?php
		kroth_paging_nav();
    wp_reset_postdata();  // avoid errors further down the page
		?>
	</div><!-- Content Area -->

	<?php
	if ($kroth_sidebar_position !== 'sidebar-hide') {
		get_sidebar(); // Sidebar
	}
	?>

</div>
</div>

<?php
get_footer();