<?php

/**
 * Displays plugin settings
 *
 * @since      1.0.0
 *
 * @package    Genesis_Home_Page_Builder
 * @subpackage Genesis_Home_Page_Builder/partials
 */
?>

<p>
    <input type="hidden" name="genesis-home-page-builder-settings[reset-content-padding]" value="0" />
    <input type="checkbox" id="genesis-home-page-builder-settings[reset-content-padding]" name="genesis-home-page-builder-settings[reset-content-padding]" value="1"<?php if ( $settings['reset-content-padding'] ) { ?> checked="checked"<?php } ?> /> <label for="genesis-home-page-builder-settings[reset-content-padding]"><?php _e( 'Reset main content padding', 'genesis-home-page-builder' ); ?></label>
</p>

<p>
    <input type="hidden" name="genesis-home-page-builder-settings[reset-overflow-hidden]" value="0" /> 
    <input type="checkbox" id="genesis-home-page-builder-settings[reset-overflow-hidden]" name="genesis-home-page-builder-settings[reset-overflow-hidden]" value="1"<?php if ( $settings['reset-overflow-hidden'] ) { ?> checked="checked"<?php } ?> /> <label for="genesis-home-page-builder-settings[reset-overflow-hidden]"><?php _e( 'Reset overflow hidden in structural elements', 'genesis-home-page-builder' ); ?></label>
</p>
