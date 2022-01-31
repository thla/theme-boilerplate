<?php
/**
 * LHTBP\Scripts\Component class
 *
 * @package ekihh
 */

namespace WpMunich\ekihh\Scripts;
use WpMunich\ekihh\Component_Interface;
use function add_action;

/**
 * A class to enqueue the needed scripts..
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() {
		return 'script';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue needed scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		$ekihh_script_assets = include( get_template_directory() . '/js/script.min.asset.php' ); //phpcs:ignore
		wp_enqueue_script( 'ekihh-script', get_template_directory_uri() . '/js/script.min.js', array_merge( array( 'jquery' ), $ekihh_script_assets['dependencies'] ), $ekihh_script_assets['version'], true );

		$translation_array = array(
			'themeUrl' => get_template_directory_uri(),
			'restUrl'  => get_rest_url(),
		);
		wp_localize_script( 'ekihh-script', 'ekihh', $translation_array );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
