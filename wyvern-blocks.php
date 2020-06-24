<?php
/**
 * Plugin Name: Wyvern Blocks
 *
 * @package Wyvern Block
 */

/**
 * Register Block
 */
function wyvern_block_register_block() {

	// automaticclly load dependencies and version.
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	wp_register_script(
		'wybern-block',
		plugins_url( 'build/block.js', __FILE__ ),
		$asset_file['deoendencies'],
		$asset_file['version'],
		true
	);

	register_block_type(
		'wybern-block',
		array(
			'editor-script' => 'wybern-blocks',
		)
	);

}
