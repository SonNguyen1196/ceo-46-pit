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
function admin_style() {
	wp_enqueue_style('admin-styles', plugins_url().'/gallary-instagram/css/style.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

if (!class_exists('InstaGram_Setting')) {
	
	class InstaGram_Setting {

		private $option = [];

		function __construct() {
	       add_action( 'admin_menu',array( $this, 'setting_instagram_menu_page' ) );
	       add_action( 'admin_init', array( $this, 'instagram_admin_setting' ) );
	    }

	    function setting_instagram_menu_page() {
		  	add_menu_page( 'Instagram Gallary', 'Instagram Gallary', 'manage_options', 'instagram-page', array($this,'add_admin_page_instagram'),'dashicons-images-alt2', 8);
		}

		function add_admin_page_instagram(){
			require_once ('views/admin-setting.php');
		}

		
		function instagram_admin_setting(){
			$fields_setting_values = ['name-instargram-field', 'title-page-gallary', 'access-token-field'];

			foreach ($fields_setting_values as $field) {
				register_setting( 'instagram_admin_setting', $field);
			}
		}

	}
}

$instagram_page = new InstaGram_Setting();
?>
