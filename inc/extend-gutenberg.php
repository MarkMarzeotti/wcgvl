<?php
/**
 * Extend Gutenberg
 *
 * Functions used to extend Gutenberg blocks or functionality. Kind of.
 *
 * @link              https://markmarzeotti.com
 * @since             1.0.0
 * @package           My_Acf_Blocks
 */

/**
 * Add a custom color pallete
 */
function mab_create_color_palette() {

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Black', 'my-acf-blocks' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => __( 'White', 'my-acf-blocks' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Gallery', 'my-acf-blocks' ),
				'slug'  => 'gallery',
				'color' => '#eeeeee',
			),
		)
	);

}
add_action( 'after_setup_theme', 'mab_create_color_palette', 90 );
