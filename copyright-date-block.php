<?php
/**
 * Plugin Name:       Cost Estimator
 * Description:       Estimate cost of services.
 * Version:           0.1.0
 * Requires at least: 6.2
 * Requires PHP:      7.0
 * Author:            mcarpdev
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cost-estimator
 *
 * @package           create-block
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function copyright_date_block_copyright_date_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'copyright_date_block_copyright_date_block_init' );
