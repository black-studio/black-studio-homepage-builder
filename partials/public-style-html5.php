<?php

/**
 * Output inline styles for front page (HTML5 version - Genesis 2.x)
 *
 * @since      1.0.0
 *
 * @package    Black_Studio_Homepage_Builder
 * @subpackage Black_Studio_Homepage_Builder/partials
 */
?>

<style type="text/css">

<?php if ( ! empty( $settings['reset-overflow-hidden'] ) ) { ?>
.home .site-container,
.home .site-inner,
.home .site-inner .wrap,
.home .content-sidebar-wrap,
.home .content {
	overflow: visible;
}
<?php } ?>

<?php if ( ! empty( $settings['reset-content-padding'] ) ) { ?>	
.home .content {
	padding: 0;
}
<?php } ?>

</style>