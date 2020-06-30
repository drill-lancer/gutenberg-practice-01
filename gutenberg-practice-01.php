<?php
/**
 * Plugin Name: Gutenberg Practice
 * Plugin URI: https://github.com/drill-lancer/gutenberg-practice-01
 * Description: Block Build Test
 * Version: 0.0.1
 * Author: DRILL LANCER
 *
 * @package Gutenberg Practice
 */

/**
 * Test05 Rendering Callback
 */
function gutenberg_practice_01_test_05_render_callback() {
	$recent_posts = wp_get_recent_posts(
		array(
			'numberposts' => '1',
			'post_status' => 'publish',
		)
	);
	if ( count( $recent_posts ) === 0 ) {
		return 'No posts';
	}
	$post    = $recent_posts[0];
	$post_id = $post['ID'];
	return sprintf(
		'<a class="wp-block-gutenberg-practice-01-test-05" href="%1$s">%2$s</a>',
		esc_url( get_permalink( $post_id ) ),
		esc_html( get_the_title( $post_id ) )
	);
}

/**
 * Register Block
 */
function gutenberg_practice_01_register_block() {

	// automaticclly load dependencies and version.
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	wp_register_script(
		'gutenberg-practice-01',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	wp_register_style(
		'gutenberg-practice-01-editor',
		plugins_url( 'editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		$asset_file['version'],
	);

	wp_register_style(
		'gutenberg-practice-01-style',
		plugins_url( 'style.css', __FILE__ ),
		array(),
		$asset_file['version'],
	);

	register_block_type(
		'gutenberg-practice-01/test-01',
		array(
			'editor_script' => 'gutenberg-practice-01',
		)
	);

	register_block_type(
		'gutenberg-practice-01/test-02',
		array(
			'style'         => 'gutenberg-practice-01-style',
			'editor_style'  => 'gutenberg-practice-01-editor',
			'editor_script' => 'gutenberg-practice-01',
		)
	);

	register_block_type(
		'gutenberg-practice-01/test-03',
		array(
			'style'         => 'gutenberg-practice-01-style',
			'editor_style'  => 'gutenberg-practice-01-editor',
			'editor_script' => 'gutenberg-practice-01',
		)
	);

	register_block_type(
		'gutenberg-practice-01/test-04',
		array(
			'style'         => 'gutenberg-practice-01-style',
			'editor_style'  => 'gutenberg-practice-01-editor',
			'editor_script' => 'gutenberg-practice-01',
		)
	);

	register_block_type(
		'gutenberg-practice-01/test-05',
		array(
			'style'           => 'gutenberg-practice-01-style',
			'editor_style'    => 'gutenberg-practice-01-editor',
			'editor_script'   => 'gutenberg-practice-01',
			'render_callback' => 'gutenberg_practice_01_test_05_render_callback',
		)
	);

	register_block_type(
		'gutenberg-practice-01/test-06',
		array(
			'style'           => 'gutenberg-practice-01-style',
			'editor_style'    => 'gutenberg-practice-01-editor',
			'editor_script'   => 'gutenberg-practice-01',
			'render_callback' => 'gutenberg_practice_01_test_05_render_callback',
		)
	);
	register_block_type(
		'gutenberg-practice-01/test-07',
		array(
			'style'         => 'gutenberg-practice-01-style',
			'editor_style'  => 'gutenberg-practice-01-editor',
			'editor_script' => 'gutenberg-practice-01',
		)
	);
}
add_action( 'init', 'gutenberg_practice_01_register_block' );
