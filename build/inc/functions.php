<?php
/**
 * The `wp_ekihh()` function.
 *
 * @package ekihh
 */

namespace WpMunich\ekihh;

/**
 * Provides access to all available template tags of the theme.
 *
 * When called for the first time, the function will initialize the theme.
 *
 * @return Template_Tags Template tags instance exposing template tag methods.
 */
function wp_ekihh() {
	static $theme = null;
	if ( null === $theme ) {
		$theme = new Theme();
		$theme->initialize();
	}
	return $theme->template_tags();
}
