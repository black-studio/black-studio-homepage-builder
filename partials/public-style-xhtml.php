<?php

/**
 * Output inline styles for front page (XHTML version - Genesis 1.x)
 *
 * @since      1.0.0
 *
 * @package    Genesis_Home_Page_Builder
 * @subpackage Genesis_Home_Page_Builder/partials
 */
?>

<style type="text/css">

<?php if ( ! empty( $settings['reset-overflow-hidden'] ) ) { ?>
.home #wrap,
.home #inner,
.home #inner .wrap,
.home #content-sidebar-wrap,
.home #content {
	overflow: visible;
}
<?php } ?>

<?php if ( ! empty( $settings['reset-content-padding'] ) ) { ?>	
.home #content {
	padding: 0;
}
<?php } ?>

</style>