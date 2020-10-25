<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
get_header();

if (is_post_type('portfolio')) {
	$kroth_portfolio_style = cs_get_option('portfolio_style');
	$kroth_portfolio_column = cs_get_option('portfolio_column');
	$kroth_portfolio_no_space = cs_get_option('portfolio_no_space');
	$kroth_portfolio_pagination = cs_get_option('portfolio_pagination');

	$kroth_portfolio_style = $kroth_portfolio_style ? $kroth_portfolio_style : 'one';
	$kroth_portfolio_column = $kroth_portfolio_column ? $kroth_portfolio_column : 'bpw-col-3';
	$kroth_portfolio_no_space = $kroth_portfolio_no_space ? 'bpw-no-gutter' : '';
?>

<div class="container krth-content-area">
	<div class="row">

	<?php if (is_post_type('portfolio')) { ?>
	<!-- Portfolio Start -->
  <div class="krth-portfolios bpw-style-<?php echo esc_attr($kroth_portfolio_style); ?> <?php echo esc_attr($kroth_portfolio_column); ?> <?php echo esc_attr($kroth_portfolio_no_space); ?>">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>

		<?php
		/* Start the Loop */
		if (have_posts()) : while (have_posts()) : the_post();
				/* Template */
				get_template_part( 'layouts/portfolio/portfolio', $kroth_portfolio_style );
			endwhile;
		else :
			get_template_part( 'layouts/post/content', 'none' );
		endif;
		wp_reset_postdata(); ?>

	</div><!-- Portfolios End -->
	<?php
		if ($kroth_portfolio_pagination) {
		  kroth_paging_nav();
		}
	wp_reset_postdata();
	} // Post Type Portfolio
	?>

	</div> <!-- Row -->
</div> <!-- Container -->

<?php } else { // is_portfolio

// Theme Options
$kroth_blog_style = cs_get_option('blog_listing_style');
$kroth_blog_columns = cs_get_option('blog_listing_columns');
$kroth_sidebar_position = cs_get_option('blog_sidebar_position');

// Columns
if ($kroth_blog_style === 'style-two') {
	$kroth_blog_columns = $kroth_blog_columns ? $kroth_blog_columns : 'krth-blog-col-2';
} else {
	$kroth_blog_columns = 'krth-blog-col-1';
}

// Style
if ($kroth_blog_style === 'style-two') {
	$kroth_blog_style = 'krth-blog-one ';
} else {
	$kroth_blog_style = 'krth-blog-one krth-blog-list';
}

// Sidebar Position
if ($kroth_sidebar_position === 'sidebar-hide') {
	$kroth_layout_class = 'col-md-12';
	$kroth_sidebar_class = 'krth-hide-sidebar';
} elseif ($kroth_sidebar_position === 'sidebar-left') {
	$kroth_layout_class = 'col-md-9';
	$kroth_sidebar_class = 'krth-left-sidebar';
} else {
	$kroth_layout_class = 'col-md-9';
	$kroth_sidebar_class = 'krth-right-sidebar';
}
?>

<div class="container krth-content-area <?php echo esc_attr($kroth_sidebar_class); ?>">
<div class="row">

	<?php
	if ($kroth_sidebar_position === 'sidebar-left' && $kroth_sidebar_position !== 'sidebar-hide') {
		get_sidebar(); // Sidebar
	}
	?>

	<div class="krth-content-side <?php echo esc_attr($kroth_layout_class); ?>">
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
} // is_portfolio

get_footer();