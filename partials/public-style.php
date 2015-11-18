<?php

/**
 * Output inline styles for front page when needed
 *
 * @since      1.0.0
 *
 * @package    Genesis_Home_Page_Builder
 * @subpackage Genesis_Home_Page_Builder/partials
 */
?>

<style type="text/css">

<?php 
if ( ! current_theme_supports( 'html5' ) ) {
	
	if( ! empty( $settings['reset-overflow-hidden'] ) ) {
?>

/* Genesis 1.x */

.home #wrap,
.home #inner,
.home #inner .wrap,
.home #content-sidebar-wrap,
.home #content {
	overflow: visible;
}

<?php
	}
	if( ! empty( $settings['reset-content-padding'] ) ) {
?>	

.home #content {
	padding: 0;
}

<?php
	}
}
else {
	if( ! empty( $settings['reset-overflow-hidden'] ) ) {
?>

/* Genesis 2.x */

.home .site-container,
.home .site-inner,
.home .site-inner .wrap,
.home .content-sidebar-wrap,
.home .content {
	overflow: visible;
}

<?php
	}
	if( ! empty( $settings['reset-content-padding'] ) ) {
?>	

.home .content {
	padding: 0;
}

<?php
	}
}
?>

</style>