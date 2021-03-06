<?php
/** PREVENT UPDATE CHECK **/
add_filter( 'http_request_args', 'dm_prevent_update_check', 10, 2 );
function dm_prevent_update_check( $r, $url ) {
	if ( 0 === strpos( $url, 'http://api.wordpress.org/plugins/update-check/' ) ) {
		$my_plugin = plugin_basename( __FILE__ );
		$plugins = unserialize( $r['body']['plugins'] );
		unset( $plugins->plugins[$my_plugin] );
		unset( $plugins->active[array_search( $my_plugin, $plugins->active )] );
		$r['body']['plugins'] = serialize( $plugins );
	}
	return $r;
}

/** REMOVE DEFAULT IMAGE SIZE **/
add_filter('intermediate_image_sizes_advanced', 'hero_remove_default_image_sizes');
function hero_remove_default_image_sizes( $sizes) {
	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);
	unset( $sizes['medium_large']);
	return $sizes;
}

/** REMOVE DEFAULT IMAGE SIZE **/
add_filter('nav_menu_css_class', 'fillter_class_submenu', 10, 4);
function fillter_class_submenu( $classes, $item, $args ) {
    $number = count($classes);
    for ($i = 1; $i< $number; $i++){
        if($classes[$i] == 'menu-item-has-children'){
            $classes[$i] = 'dropdown';
        }
    }
    return $classes;
}

add_filter( 'nav_menu_link_attributes', 'menu_link_attributes', 10, 3 );
function menu_link_attributes( $atts, $item, $args ) {
    if (in_array('menu-item-has-children', $item->classes)) {
        $atts['data-toggle'] = 'dropdown';
        $atts['class'] = "dropdown-toggle border";
    }
    return $atts;
}
?>