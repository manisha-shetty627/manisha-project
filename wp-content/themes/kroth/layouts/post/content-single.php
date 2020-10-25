<?php
/**
 * Single Post.
 */
$kroth_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$kroth_large_image = $kroth_large_image[0];

$kroth_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$kroth_blog_style = cs_get_option('blog_listing_style');

// Single Theme Option
$kroth_single_featured_image = cs_get_option('single_featured_image');
$kroth_single_author_info = cs_get_option('single_author_info');
$kroth_single_share_option = cs_get_option('single_share_option');
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('krth-blog-post'); ?>>

	<?php
	if ($kroth_single_featured_image) {
		if ( 'gallery' == get_post_format() && ! empty( $kroth_post_type['gallery_post_format'] ) ) { ?>
			<div class="featured-image rounded-three krth-theme-carousel"
			data-nav="true"
			data-autoplay="true"
			data-auto-height="true"
			data-dots="true">
				<?php
			  $kroth_ids = explode( ',', $kroth_post_type['gallery_post_format'] );
			  foreach ( $kroth_ids as $id ) {
			    $kroth_attachment = wp_get_attachment_image_src( $id, 'full' );
			    $kroth_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
			    echo '<img src="'. $kroth_attachment[0] .'" alt="'. esc_attr($kroth_alt) .'" />';
			  }
				?>
			</div>
		<?php
		} elseif ($kroth_large_image) { ?>
		<div class="featured-image rounded-three">
			<img src="<?php echo esc_url($kroth_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
		</div>
	<?php } // Featured Image
	}
	?>

	<!-- Content -->
	<div class="bp-content">
		<?php echo kroth_post_metas(); ?>
		<h1 class="bp-heading"><?php echo esc_attr(get_the_title()); ?></h1>
		<?php
		the_content();
		echo kroth_wp_link_pages();
		?>
	</div>
	<!-- Content -->

	<!-- Tags and Share -->
	<div class="bp-bottom-meta">
		<div class="bp-share">
			<?php
			if($kroth_single_share_option) {
				echo kroth_wp_share_option();
			}
			?>
		</div>
		<?php
		$tag_list = get_the_tags();
	  if($tag_list) { ?>
		<div class="bp-tags">
			<?php echo the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
		</div>
		<?php } ?>
	</div>
	<!-- Tags and Share -->

	<!-- Author Info -->
	<?php
	if($kroth_single_author_info) {
		echo kroth_author_info();
	}
	?>
	<!-- Author Info -->

</div><!-- #post-## -->