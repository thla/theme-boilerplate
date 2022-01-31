<?php
/**
 * WP_Rig\WP_Rig\Editor\Component class
 *
 * @package ekihh
 */

namespace WpMunich\ekihh\Editor;

use WpMunich\ekihh\Component_Interface;
use function add_action;
use function add_theme_support;

/**
 * Class for integrating with the block editor.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'editor';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_editor_support' ) );
	}

	/**
	 * Adds support for various editor features.
	 */
	public function action_add_editor_support() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for wide-aligned images.
		add_theme_support( 'align-wide' );

		/**
		 * Add support for color palettes.
		 *
		 * To preserve color behavior across themes, use these naming conventions:
		 * - Use primary and secondary color for main variations.
		 * - Use `theme-[color-name]` naming standard for standard colors (red, blue, etc).
		 * - Use `custom-[color-name]` for non-standard colors.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-colors' );
		 */
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'ekihh' ),
					'slug'  => 'theme-primary',
					'color' => '#e36d60',
				),
				array(
					'name'  => __( 'Secondary', 'ekihh' ),
					'slug'  => 'theme-secondary',
					'color' => '#41848f',
				),
				array(
					'name'  => __( 'Red', 'ekihh' ),
					'slug'  => 'theme-red',
					'color' => '#C0392B',
				),
				array(
					'name'  => __( 'Green', 'ekihh' ),
					'slug'  => 'theme-green',
					'color' => '#27AE60',
				),
				array(
					'name'  => __( 'Blue', 'ekihh' ),
					'slug'  => 'theme-blue',
					'color' => '#2980B9',
				),
				array(
					'name'  => __( 'Yellow', 'ekihh' ),
					'slug'  => 'theme-yellow',
					'color' => '#F1C40F',
				),
				array(
					'name'  => __( 'Black', 'ekihh' ),
					'slug'  => 'theme-black',
					'color' => '#1C2833',
				),
				array(
					'name'  => __( 'Grey', 'ekihh' ),
					'slug'  => 'theme-grey',
					'color' => '#95A5A6',
				),
				array(
					'name'  => __( 'White', 'ekihh' ),
					'slug'  => 'theme-white',
					'color' => '#ECF0F1',
				),
				array(
					'name'  => __( 'Dusty daylight', 'ekihh' ),
					'slug'  => 'custom-daylight',
					'color' => '#97c0b7',
				),
				array(
					'name'  => __( 'Dusty sun', 'ekihh' ),
					'slug'  => 'custom-sun',
					'color' => '#eee9d1',
				),
			)
		);

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'ekihh' ),
					'shortName' => __( 'S', 'ekihh' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'ekihh' ),
					'shortName' => __( 'M', 'ekihh' ),
					'size'      => 25,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'ekihh' ),
					'shortName' => __( 'L', 'ekihh' ),
					'size'      => 31,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'ekihh' ),
					'shortName' => __( 'XL', 'ekihh' ),
					'size'      => 39,
					'slug'      => 'larger',
				),
			)
		);
	}
}
