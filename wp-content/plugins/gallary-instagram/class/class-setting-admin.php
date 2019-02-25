<?php

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
			require_once (PLUGIN_DIR.'/views/admin-setting.php');
		}

		
		function instagram_admin_setting(){
			$fields_setting_values = ['name-instargram-field', 'title-page-gallary', 'access-token-field'];

			foreach ($fields_setting_values as $field) {
				register_setting( 'instagram_admin_setting', $field);
			}
		}

	}
}

?>