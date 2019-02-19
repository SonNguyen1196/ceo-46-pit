<?php
/*
 * Plugin Name: NNS Search Post
 * Plugin URI: #
 * Description: Plugin Search Post Created By David Nguyen
 * Version: 1.0
 * Author: David Nguyen
 * Author URI:
 * License: GPLv2 or later
 */
?>
<?php
require 'widgets/widgets-form.php';
require 'function.php';
function nns_search_activate() {

    $info_page = [
					'post_type' => 'page',
					'post_title' => 'Result ',
					'post_name' => 'search-block',
					'post_status' => 'publish',
					'post_content' => '[result_post]'
				];

				wp_insert_post($info_page);
}
register_activation_hook( __FILE__, 'nns_search_activate' );

function nns_search_deactivate() {

    $page = get_page_by_path('search-block');
	wp_delete_post($page->ID);
}
register_deactivation_hook( __FILE__, 'nns_search_deactivate' );