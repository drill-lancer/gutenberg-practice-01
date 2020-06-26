<?php
/**
 * Plugin Name: Wyvern Blocks
 * Plugin URI: https://github.com/drill-lancer/wyvern-blocks
 * Description: Block Build Test
 * Version: 0.0.1
 * Author: DRILL LANCER
 *
 * @package Wyvern Block
 */

/**
 * Test05 Rendering Callback
 */
function wyvern_blocks_test_05_render_callback() {
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
		'<a class="wp-block-wyvern-blocks-test-05" href="%1$s">%2$s</a>',
		esc_url( get_permalink( $post_id ) ),
		esc_html( get_the_title( $post_id ) )
	);
}

/**
 * Register Block
 */
function wyvern_blocks_register_block() {

	// automaticclly load dependencies and version.
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	wp_register_script(
		'wyvern-blocks',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	wp_register_style(
		'wyvern-blocks-editor',
		plugins_url( 'editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		$asset_file['version'],
	);

	wp_register_style(
		'wyvern-blocks-style',
		plugins_url( 'style.css', __FILE__ ),
		array(),
		$asset_file['version'],
	);

	register_block_type(
		'wyvern-blocks/test-01',
		array(
			'editor_script' => 'wyvern-blocks',
		)
	);

	register_block_type(
		'wyvern-blocks/test-02',
		array(
			'style'         => 'wyvern-blocks-style',
			'editor_style'  => 'wyvern-blocks-editor',
			'editor_script' => 'wyvern-blocks',
		)
	);

	register_block_type(
		'wyvern-blocks/test-03',
		array(
			'style'         => 'wyvern-blocks-style',
			'editor_style'  => 'wyvern-blocks-editor',
			'editor_script' => 'wyvern-blocks',
		)
	);

	register_block_type(
		'wyvern-blocks/test-04',
		array(
			'style'         => 'wyvern-blocks-style',
			'editor_style'  => 'wyvern-blocks-editor',
			'editor_script' => 'wyvern-blocks',
		)
	);

	register_block_type(
		'wyvern-blocks/test-05',
		array(
			'style'           => 'wyvern-blocks-style',
			'editor_style'    => 'wyvern-blocks-editor',
			'editor_script'   => 'wyvern-blocks',
			'render_callback' => 'wyvern_blocks_test_05_render_callback',
		)
	);

	register_block_type(
		'wyvern-blocks/test-06',
		array(
			'style'           => 'wyvern-blocks-style',
			'editor_style'    => 'wyvern-blocks-editor',
			'editor_script'   => 'wyvern-blocks',
			'render_callback' => 'wyvern_blocks_test_05_render_callback',
		)
	);
	register_block_type(
		'wyvern-blocks/test-07',
		array(
			'style'         => 'wyvern-blocks-style',
			'editor_style'  => 'wyvern-blocks-editor',
			'editor_script' => 'wyvern-blocks',
		)
	);
}
add_action( 'init', 'wyvern_blocks_register_block' );
