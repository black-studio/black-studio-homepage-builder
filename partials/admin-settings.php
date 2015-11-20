<?php

/**
 * Displays plugin settings
 *
 * @since      1.0.0
 *
 * @package    Black_Studio_Homepage_Builder
 * @subpackage Black_Studio_Homepage_Builder/partials
 */
?>

<p>
    <input type="hidden" name="black-studio-homepage-builder-settings[reset-content-padding]" value="0" />
    <input type="checkbox" id="black-studio-homepage-builder-settings[reset-content-padding]" name="black-studio-homepage-builder-settings[reset-content-padding]" value="1"<?php if ( $settings['reset-content-padding'] ) { ?> checked="checked"<?php } ?> /> <label for="black-studio-homepage-builder-settings[reset-content-padding]"><?php _e( 'Reset main content padding', 'black-studio-homepage-builder' ); ?></label>
</p>

<p>
    <input type="hidden" name="black-studio-homepage-builder-settings[reset-overflow-hidden]" value="0" /> 
    <input type="checkbox" id="black-studio-homepage-builder-settings[reset-overflow-hidden]" name="black-studio-homepage-builder-settings[reset-overflow-hidden]" value="1"<?php if ( $settings['reset-overflow-hidden'] ) { ?> checked="checked"<?php } ?> /> <label for="black-studio-homepage-builder-settings[reset-overflow-hidden]"><?php _e( 'Reset overflow hidden in structural elements', 'black-studio-homepage-builder' ); ?></label>
</p>
