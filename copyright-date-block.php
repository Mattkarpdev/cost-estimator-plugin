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

register_activation_hook( __FILE__, 'mc_input_table' );
function mc_input_table() {
	
	global $wpdb;

	$table_name = $wpdb->prefix . 'mc_input_table';

	$sql = "CREATE TABLE $table_name ( 
		id mediumint (9) NOT NULL AUTO_INCREMENT,
		field_name varchar (100) NOT NULL,
		field_id mediumint (9) NOT NULL,
		meta_data longtext NULL,
		reg_date timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
		PRIMARY KEY  (id)
		)";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
}

add_action('rest_api_init', 'mc_register_routes');
function mc_register_routes(){
	register_rest_route(
		'mc/v1',
		'/input_fields',
		array(
			'methods' => 'POST',
			'callback' => 'mc_post_input',
			'permission_callback' => '__return_true'
		)
	);
}


function mc_post_input($request) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'mc_input_table';

	$rows = $wpdb->insert(
		$table_name,	
		array(
			'field_name' => $request['field_name'],
			1 => $request['field_id'],
			'meta_data' => $request['meta_data']
		)

	);
		
		
	




	$subbmission_is_set = isset($block['attrs']['submissionMethod']);
	if($subbmission_is_set = 'custom'){
		$url_action_set = isset($block['attrs']['action']);
		$url_action_route = 'wp-json/mc/v1/input_fields';
		$url_action_route_wc = '*wp-json/mc/v1/input_fields*';
		echo 'did not ggg';

		if ($url_action_set != $url_action_route_wc ){
			echo 'did not work';
		}

		if ($url_action_set = $url_action_route_wc )
		{
			$post_url_action = isset($block['attrs']['method']);
			echo 'did not ';
			
			if ($post_url_action = 'post'){

				return 'did not work';
		

			}

		
			else {
				return 'did not ggg';
				
				
			}
		}
	}
	else {
		return 'Hello ggg';
	}

	 return 'Hello world';
}




