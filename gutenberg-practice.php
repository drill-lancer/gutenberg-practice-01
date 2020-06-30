<?php
/**
 * Plugin Name: Gutenberg Practice
 * Plugin URI: https://github.com/drill-lancer/gutengerg-practice
 * Description: Block Build Test
 * Version: 0.0.1
 * Author: DRILL LANCER
 *
 * @package Gutenberg Practice
 */

/**
 * Test05 Rendering Callback
 */
function gutengerg_practice_test_05_render_callback() {
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
		'<a class="wp-block-gutengerg-practice-test-05" href="%1$s">%2$s</a>',
		esc_url( get_permalink( $post_id ) ),
		esc_html( get_the_title( $post_id ) )
	);
}

/**
 * Register Block
 */
function gutengerg_practice_register_block() {

	// automaticclly load dependencies and version.
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	wp_register_script(
		'gutengerg-practice',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	wp_register_style(
		'gutengerg-practice-editor',
		plugins_url( 'editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		$asset_file['version'],
	);

	wp_register_style(
		'gutengerg-practice-style',
		plugins_url( 'style.css', __FILE__ ),
		array(),
		$asset_file['version'],
	);

	register_block_type(
		'gutengerg-practice/test-01',
		array(
			'editor_script' => 'gutengerg-practice',
		)
	);

	register_block_type(
		'gutengerg-practice/test-02',
		array(
			'style'         => 'gutengerg-practice-style',
			'editor_style'  => 'gutengerg-practice-editor',
			'editor_script' => 'gutengerg-practice',
		)
	);

	register_block_type(
		'gutengerg-practice/test-03',
		array(
			'style'         => 'gutengerg-practice-style',
			'editor_style'  => 'gutengerg-practice-editor',
			'editor_script' => 'gutengerg-practice',
		)
	);

	register_block_type(
		'gutengerg-practice/test-04',
		array(
			'style'         => 'gutengerg-practice-style',
			'editor_style'  => 'gutengerg-practice-editor',
			'editor_script' => 'gutengerg-practice',
		)
	);

	register_block_type(
		'gutengerg-practice/test-05',
		array(
			'style'           => 'gutengerg-practice-style',
			'editor_style'    => 'gutengerg-practice-editor',
			'editor_script'   => 'gutengerg-practice',
			'render_callback' => 'gutengerg_practice_test_05_render_callback',
		)
	);

	register_block_type(
		'gutengerg-practice/test-06',
		array(
			'style'           => 'gutengerg-practice-style',
			'editor_style'    => 'gutengerg-practice-editor',
			'editor_script'   => 'gutengerg-practice',
			'render_callback' => 'gutengerg_practice_test_05_render_callback',
		)
	);
	register_block_type(
		'gutengerg-practice/test-07',
		array(
			'style'         => 'gutengerg-practice-style',
			'editor_style'  => 'gutengerg-practice-editor',
			'editor_script' => 'gutengerg-practice',
		)
	);
}
add_action( 'init', 'gutengerg_practice_register_block' );
