<?php
/**
 * Template part for displaying posts.
 */
$kroth_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$kroth_large_image = $kroth_large_image[0];

$kroth_read_more_text = cs_get_option('read_more_text');
$kroth_read_text = $kroth_read_more_text ? $kroth_read_more_text : __( 'Read More', 'kroth' );
$kroth_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$kroth_blog_style = cs_get_option('blog_listing_style');
$kroth_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('krth-blog-post'); ?>>

	<?php
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
	<?php } // Featured Image ?>

	<!-- Content -->
	<div class="bp-content">
		<?php echo kroth_post_metas(); ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-heading"><?php echo esc_attr(get_the_title()); ?></a>
		<?php if ($kroth_blog_style !== 'style-three') { ?>
			<p><?php
			$blog_excerpt = cs_get_option('theme_blog_excerpt');
			if ($blog_excerpt) {
				$blog_excerpt = $blog_excerpt;
			} else {
				$blog_excerpt = '55';
			}
			kroth_excerpt($blog_excerpt);
			echo kroth_wp_link_pages();
			?></p>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-read-more">
				<?php echo esc_attr($kroth_read_text); ?>
			</a>
		<?php
		} // if not blog style three
		if ( !in_array( 'comments', $kroth_metas_hide ) && $kroth_blog_style !== 'style-three') { // Comments Hide ?>
		<div class="bp-bottom-comments">
			<?php
			if ($kroth_blog_style === 'style-two') {
				comments_popup_link( __( '<i class="icon-speech"></i><span>0</span>', 'kroth' ), __( '<i class="icon-speech"></i><span>1</span>', 'kroth' ), __( '<i class="icon-speech"></i><span>%</span>', 'kroth' ), '', '' );
			} else {
				comments_popup_link( __( '<i class="icon-speech"></i><span>No Comments</span>', 'kroth' ), __( '<i class="icon-speech"></i><span>One Comment</span>', 'kroth' ), __( '<i class="icon-speech"></i><span>% Comments</span>', 'kroth' ), '', '' );
			}
			?>
		</div>
		<?php } // Comments Hide ?>
	</div>
	<!-- Content -->

</div><!-- #post-## -->
