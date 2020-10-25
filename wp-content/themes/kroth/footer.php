<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

$kroth_id    = ( isset( $post ) ) ? $post->ID : 0;
$kroth_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $kroth_id;
$kroth_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $kroth_id;
$kroth_meta  = get_post_meta( $kroth_id, 'page_type_metabox', true );

if ($kroth_meta) {
	$kroth_hide_footer  = $kroth_meta['hide_footer'];
} else { $kroth_hide_footer = ''; }
if (!$kroth_hide_footer) { // Hide Footer Metabox
?>

	<!-- Footer -->
	<footer>

		<?php
			$footer_widget_block = cs_get_option('footer_widget_block');
			if (isset($footer_widget_block)) {
	      // Footer Widget Block
	      get_template_part( 'layouts/footer/footer', 'widgets' );
	    }

	    $need_copyright = cs_get_option('need_copyright');
			if (isset($need_copyright)) {
	      // Copyright Block
      	get_template_part( 'layouts/footer/footer', 'copyright' );
	    }
    ?>

	</footer>
	<!-- Footer -->

<?php } // Hide Footer Metabox ?>

</div><!-- #vtheme-wrapper -->
</div><!-- body under div -->

<?php wp_footer(); ?>

</body>
</html>
