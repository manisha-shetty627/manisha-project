<?php
	// Main Text
	$kroth_need_copyright = cs_get_option('need_copyright');
	$kroth_footer_copyright_layout = cs_get_option('footer_copyright_layout');

	if ($kroth_footer_copyright_layout === 'copyright-1') {
		$kroth_copyright_layout_class = 'col-sm-6';
		$kroth_copyright_seclayout_class = 'text-right';
	} elseif ($kroth_footer_copyright_layout === 'copyright-2') {
		$kroth_copyright_layout_class = 'col-sm-6 pull-right text-right';
		$kroth_copyright_seclayout_class = 'text-left';
	} elseif ($kroth_footer_copyright_layout === 'copyright-3') {
		$kroth_copyright_layout_class = 'col-sm-12 text-center';
	} else {
		$kroth_copyright_layout_class = '';
		$kroth_copyright_seclayout_class = '';
	}

	if (isset($kroth_need_copyright)) {
?>

<!-- Copyright Bar -->
<div class="container-fluid">
	<div class="row">

		<div class="krth-copyright">
		<div class="container">
		<div class="row">

			<div class="cprt-left <?php echo esc_attr($kroth_copyright_layout_class); ?>">
				<?php
					$kroth_copyright_text = cs_get_option('copyright_text');
					echo '<p>'. do_shortcode($kroth_copyright_text) .'</p>';
				?>
			</div>
			<?php if ($kroth_footer_copyright_layout != 'copyright-3') { ?>
			<div class="col-sm-6 cprt-right <?php echo esc_attr($kroth_copyright_seclayout_class); ?>">
				<?php
					$kroth_secondary_text = cs_get_option('secondary_text');
					echo do_shortcode($kroth_secondary_text);
				?>
			</div>
			<?php } ?>

		</div>
		</div>
		</div>

	</div>
</div>
<!-- Copyright Bar -->
<?php }