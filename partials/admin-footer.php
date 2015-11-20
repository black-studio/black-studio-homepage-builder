<?php

/**
 * Displays plugin settings container in the proper position
 *
 * Note: it was necessary to use a javascript trick to reposition the panel
 * because there were no hooks available for that.
 *
 * @since      1.0.0
 *
 * @package    Black_Studio_Homepage_Builder
 * @subpackage Black_Studio_Homepage_Builder/partials
 */
?>

<div id="poststuff" class="black-studio-homepage-builder-settings-container" style="display:none;">
<?php do_meta_boxes( 'appearance_page_so_panels_home_page', 'advanced', false ); ?>
</div>
<script type="text/javascript">
(function( $ ) {
	$( function(){
		$( '.black-studio-homepage-builder-settings-container' ).insertAfter( '.siteorigin-panels-builder' ).show();
	});
})(jQuery);
</script>
