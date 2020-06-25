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
 * Load all translations for our plugin from the MO file.
 */
function wyvern_blocks_load_textdomain() {
	load_plugin_textdomain( 'wyvern_blocks', false, basename( __DIR__ ) . '/languages' );
}
add_action( 'init', 'wyvern_blocks_load_textdomain' );

/**
 * Register Block
 */
function wyvern_blocks_register_block() {

	// automaticclly load dependencies and version.
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	wp_register_script(
		'wyvern-blocks',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['deoendencies'],
		$asset_file['version'],
		true
	);

	wp_register_style(
		'wyvern-blocks-editor',
		plugins_url( 'editor.css', __FILE__ ),
		$asset_file['deoendencies'],
		$asset_file['version'],
	);

	wp_register_style(
		'wyvern-blocks-style',
		plugins_url( 'style.css', __FILE__ ),
		$asset_file['deoendencies'],
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
}
add_action( 'init', 'wyvern_blocks_register_block' );
