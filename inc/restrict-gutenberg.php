<?php
/**
 * Restrict Gutenberg
 *
 * Functions used to limit Gutenberg blocks or functionality.
 *
 * @link              https://markmarzeotti.com
 * @since             1.0.0
 * @package           My_Acf_Blocks
 */

/**
 * Only allow certain Gutenberg blocks.
 *
 * @since 1.0.0
 * @param array $allowed_blocks The list of all allowed Gutenberg blocks.
 */
function mab_allowed_block_types( $allowed_blocks ) {

	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/gallery',
		'core/quote',
		'core/table',
		'core/button',
		'core/columns',
		'core/separator',
		'core/video',
		'core-embed/youtube',
		'core-embed/twitter',
		'core-embed/instagram',
		'core-embed/vimeo',
	);

}
add_filter( 'allowed_block_types', 'mab_allowed_block_types' );

/**
 * Allow these blocks if a filter has been created anywhere else.
 *
 * @since 1.0.0
 * @param array $allowed_blocks The list of all allowed Gutenberg blocks.
 */
function mab_additional_allowed_block_types( $allowed_blocks ) {

	if ( ! is_array( $allowed_blocks ) ) {
		return $allowed_blocks;
	}

	$new_blocks = array(
		'acf/testimonial',
	);

	return array_merge( $allowed_blocks, $new_blocks );

}
add_filter( 'allowed_block_types', 'mab_additional_allowed_block_types', 100 );

/**
 * Do not allow user to change font size.
 */
function mab_disable_font_sizes() {
    add_theme_support( 'disable-custom-font-sizes' );
    add_theme_support( 'editor-font-sizes', array() );
}
add_action( 'after_setup_theme', 'mab_disable_font_sizes', 90, 0 );
