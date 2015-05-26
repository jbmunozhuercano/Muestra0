<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package muestra0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function muestra0_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'muestra0_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function muestra0_jetpack_setup
add_action( 'after_setup_theme', 'muestra0_jetpack_setup' );

function muestra0_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function muestra0_infinite_scroll_render