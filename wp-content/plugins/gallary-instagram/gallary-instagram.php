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
if (!class_exists('InstaGram_Setting')) {
	
	class InstaGram_Setting {

		private $option = ['title_field','token_field'];

		function __construct() {
	       add_action( 'admin_menu',array( $this, 'setting_instagram_menu_page' ) );
	    }

	    function setting_instagram_menu_page() {
		  	add_menu_page( 'Instagram Gallary', 'Instagram Gallary', 'manage_options', 'instagram-page', array($this,'add_admin_page_instagram'),'dashicons-images-alt2', 8);
		}

		function add_admin_page_instagram(){
			require_once ('views/admin-setting.php');
		}
	}
}

$instagram_page = new InstaGram_Setting();
?>
