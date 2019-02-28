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
<?php
define('PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define('PLUGIN_URL', plugin_dir_url( __FILE__ ));
require (PLUGIN_DIR.'/class/class-setting-admin.php');
require (PLUGIN_DIR.'/class/class-actions-plugins.php');
function admin_style() {
	wp_enqueue_style('admin-styles', plugins_url().'/gallary-instagram/public/css/style-admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');
function frontend_style() {
	wp_register_style('style-frontend', plugins_url().'/gallary-instagram/public/css/style.css');
	wp_enqueue_style('style-frontend');
	wp_enqueue_script('js-frontend', plugins_url().'/gallary-instagram/public/js/js-gallary.js','', false, true);
}
add_action('wp_enqueue_scripts', 'frontend_style');
$instagram_page = new InstaGram_Setting();  
?>
