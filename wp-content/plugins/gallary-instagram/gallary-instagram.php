<?php
/*
 * Plugin Name: NNS Instagram Gallary
 * Plugin URI: #
 * Description: Plugin Instagram Gallary Created By David Nguyen
 * Version: 1.0
 * Author: David Nguyen
 * Author URI:
 * License: GPLv2 or later
 */
?>
<!-- Include CSS -->
<?php
define('PLUGIN_DIR', plugin_dir_path( __FILE__ ));
require (PLUGIN_DIR.'/class/class-setting-admin.php');
require (PLUGIN_DIR.'/class/class-instagram-api.php');
function admin_style() {
	wp_enqueue_style('admin-styles', plugins_url().'/gallary-instagram/css/style.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

$instagram_page = new InstaGram_Setting();

?>
