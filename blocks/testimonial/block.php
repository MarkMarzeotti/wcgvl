<?php
/**
 * Testimonial Block.
 *
 * @link              https://markmarzeotti.com
 * @since             1.0.0
 * @package           My_Acf_Blocks
 */

/**
 * Register our ACF Blocks.
 */
function mab_register_testimonial() {

	acf_register_block_type(
		array(
			'name'            => 'testimonial',
			'title'           => __( 'Testimonial' ),
			'description'     => __( 'A custom testimonial block.' ),
			'render_callback' => 'mab_testimonial_render_callback',
			'category'        => 'formatting',
			'icon'            => 'admin-comments',
			'keywords'        => array( 'testimonial', 'quote' ),
			'post_types'      => array( 'page' ),
			'mode'            => 'auto', // auto switch between edit and preview.
			'enqueue_style'   => is_admin() ? plugin_dir_url( __FILE__ ) . 'editor.css' : plugin_dir_url( __FILE__ ) . 'style.css',
		)
	);

}

if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'mab_register_testimonial' );
}

/**
 * Render testimonial block.
 *
 * @param   array        $block      The block settings and attributes.
 * @param   string       $content    The block inner HTML (empty).
 * @param   bool         $is_preview True during AJAX preview.
 * @param   (int|string) $post_id    The post ID this block is saved to.
 */
function mab_testimonial_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {

	// Create id attribute allowing for custom "anchor" value.
	$block_id = 'testimonial-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$block_id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'testimonial';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	// Load values and assign defaults.
	$testimonial_text   = get_field( 'testimonial' ) ? get_field( 'testimonial' ) : 'Your testimonial here...';
	$testimonial_author = get_field( 'author' ) ? get_field( 'author' ) : 'Author name';
	$testimonial_role   = get_field( 'role' ) ? get_field( 'role' ) : 'Author role';
	$testimonial_image  = get_field( 'profile' ) ? wp_get_attachment_image_src( get_field( 'profile' ), 'profile' ) : plugin_dir_url( __FILE__ ) . 'blank-profile.png';
	?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
		<blockquote class="testimonial-blockquote">
			<p><?php echo esc_html( $testimonial_text ); ?></p>
		</blockquote>
		<div class="testimonial-by">
			<div class="testimonial-image">
				<img src="<?php echo esc_url( is_array( $testimonial_image ) ? $testimonial_image[0] : $testimonial_image ); ?>" alt="<?php echo esc_attr( $testimonial_author ); ?> profile" />
			</div>
			<div class="testimonial-cite">
				<span class="testimonial-author"><?php echo esc_html( $testimonial_author ); ?></span>
				<span class="testimonial-role"><?php echo esc_html( $testimonial_role ); ?></span>
			</div>
		</div>
	</div>
	<?php

}

/**
 * Add image size 'profile' used in Testimonial block.
 */
function mab_add_profile_image_size() {
	add_image_size( 'profile', 100, 100, true );
}
add_action( 'after_setup_theme', 'mab_add_profile_image_size' );
