<?php
/***** ADD SESSION ******/
add_action('init', 'hr_start_session', 1);
function hr_start_session() {
	if(!session_id()) {
		session_start();
	}
}
/**** REMOVE EMOJI *****/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**** REMOVE CORE UPDATE *****/
add_action('after_setup_theme','hr_remove_core_updates');
function hr_remove_core_updates(){
	if(! current_user_can('update_core')){return;}
	add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
	add_filter('pre_option_update_core','__return_null');
	add_filter('pre_site_transient_update_core','__return_null');
}

/**** REMOVE ADMIN BAR *****/
add_action('after_setup_theme', 'hr_remove_admin_bar');
function hr_remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

/**** BLOCK USER ACESS ADMIN  *****/
add_action( 'init', 'hr_blockusers_init' );
function hr_blockusers_init() {
	if ( is_admin() && ! current_user_can( 'administrator' ) &&
		! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) && is_user_logged_in() ) {
		wp_redirect( home_url() );
		exit;
	}
}


/***** ADD SCRIPT FRONTEND ******/
add_action('wp_enqueue_scripts', 'hr_frontend_script');
function hr_frontend_script(){
	wp_enqueue_script('underscore');
	wp_enqueue_style('bootstrap-css', THEME_URI.'/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome-css', THEME_URI.'/css/font-awesome.min.css');
	wp_enqueue_style('envas-icons-css', THEME_URI.'/css/envas-icons.css');
	wp_enqueue_style('animate-css', THEME_URI.'/css/animate.min.css');
	wp_enqueue_style('cubeportfolio-css', THEME_URI.'/css/cubeportfolio.min.css');
	wp_enqueue_style('carousel-css', THEME_URI.'/css/owl.carousel.css');
	wp_enqueue_style('settings-css', THEME_URI.'/css/settings.css');
	wp_enqueue_style('bootsnav-css', THEME_URI.'/css/bootsnav.css');
	wp_enqueue_style('loader-css', THEME_URI.'/css/loader.css');
	wp_enqueue_style('style-css', THEME_URI.'/css/style.css');

	wp_enqueue_script('jquerys', THEME_URI.'/js/jquery-2.2.3.js','','', true);
	wp_enqueue_script('bootstrap', THEME_URI.'/js/bootstrap.min.js','','', true);
	wp_enqueue_script('parallax-js', THEME_URI.'/js/jquery.parallax-1.1.3.js','','', true);
	wp_enqueue_script('jquery-appear', THEME_URI.'/js/jquery.appear.js','','', true);
	wp_enqueue_script('jquery-countTo', THEME_URI.'/js/jquery-countTo.js','','', true);
	wp_enqueue_script('jquery-bootsnav', THEME_URI.'/js/bootsnav.js','','', true);
	wp_enqueue_script('jquery-cubeportfolio', THEME_URI.'/js/jquery.cubeportfolio.min.js','','', true);
	wp_enqueue_script('owl-carousel-js', THEME_URI.'/js/owl.carousel.min.js','','', true);
	wp_enqueue_script('viedobox_video-js', THEME_URI.'/js/viedobox_video.js','','', true);
	wp_enqueue_script('themepunch-tool', THEME_URI.'/js/jquery.themepunch.tools.min.js','','', true);
	wp_enqueue_script('themepunch-revolution', THEME_URI.'/js/jquery.themepunch.revolution.min.js','','', true);
	wp_enqueue_script('layeranimation', THEME_URI.'/js/revolution.extension.layeranimation.min.js','','', true);
	wp_enqueue_script('navigation-js', THEME_URI.'/js/revolution.extension.navigation.min.js','','', true);
	wp_enqueue_script('parallax-js', THEME_URI.'/js/revolution.extension.parallax.min.js','','', true);
	wp_enqueue_script('slideanims', THEME_URI.'/js/revolution.extension.slideanims.min.js','','', true);
	wp_enqueue_script('extension_video', THEME_URI.'/js/revolution.extension.video.min.js','','', true);
	wp_enqueue_script('wow', THEME_URI.'/js/wow.min.js','','', true);
	wp_enqueue_script('functions', THEME_URI.'/js/functions.js','','', true);
}

/***** ADD SCRIPT BACKEND ******/
add_action('admin_enqueue_scripts', 'hr_admin_script');
function hr_admin_script() {
	wp_enqueue_style('backendcss', THEME_URI.'/css/backend.css');
	wp_enqueue_script('backendjs', THEME_URI.'/js/backend.js',array(),'', true);
	wp_localize_script('backendjs', 'hr', array('p_url' => THEME_URI,'a_url'=>AJAX_URI));
}

/***** REGISTER MENUS ******/

if ( ! function_exists( 'theme_register_nav_menu' ) ) {

	function theme_register_nav_menu(){
		register_nav_menus( array(
			'main_menu' => __( 'Main Menu', 'root' ),
			'footer_menu'  => __( 'Footer Menu', 'root' ),
		) );
	}
	add_action( 'after_setup_theme', 'theme_register_nav_menu', 0 );
}

/***** THEME OPTION ******/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title'    => 'Theme options',
		'menu_title'    => 'Theme options',
		'menu_slug'     => 'theme-settings',
	));

}

function pp_create_post_type($args) {
	if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
	$post_type = $args['post_type'];
	$name = $args['name'];
	$single = $args['single'];
	$slug = $args['slug'];
	$rewrite = (isset($args['rewrite']))?$args['rewrite']:$args['slug'];
	$icon = $args['icon']?$args['icon']:"dashicons-star-filled";
	$supports = isset($args['supports'])?$args['supports']:array('title', 'editor', 'revisions', 'thumbnail', 'author');
	$public = isset($args['public'])?$args['public']:true;
	$capabilities = isset($args['capabilities'])?$args['capabilities']:array();
	register_post_type($post_type, array(
		'labels' => array(
			'name' => __($name,'pp'),
			'singular_name' => __($single,'pp'),
			'add_new' => __('Add New '.$single,'pp'),
			'add_new_item' => __('Add New '.$single,'pp'),
			'edit_item' => __('Edit '.$single,'pp'),
			'new_item' => __('New'. $single,'pp'),
			'all_items' => __('All '.$name,'pp'),
			'view_item' => __('View '.$single,'pp'),
			'search_items' => __('Filter By '.$name,'pp'),
			'not_found' => __('Not Found '.$single,'pp'),
			'not_found_in_trash' => __('Not Found '.$single.' In Trash','pp'),
			'parent_item_colon' => '',
			'menu_name' => __($name,'pp')
		),
		'public' => $public,
		'menu_icon' => $icon,
		'exclude_from_search' => false,
		'menu_position' => 6,
		'has_archive' => true,
		'taxonomies' => array($post_type),
		'rewrite' => array('slug' => $rewrite),
		'publicly_queryable' => $public,
		'supports' => $supports,
		'capabilities' => $capabilities,
	));
}

add_action('init', 'create_new_custom_post_type');
function create_new_custom_post_type(){
	$args = array(
		array(
			"post_type" => 'partner',
			"name" => "Partner",
			"single" => "partner",
			"slug" => "partner",
			"icon" => "dashicons-heart"
		),

		array(
			"post_type" => 'client',
			"name" => "Client Said",
			"single" => "client",
			"slug" => "client-said",
			"icon" => "dashicons-businessman"
		),

		array(
			"post_type" => 'project',
			"name" => "Project",
			"single" => "project",
			"slug" => "project",
			"icon" => "dashicons-calendar
"
		)
	);
	foreach($args as $arg) {
		if($arg['post_type']) {
			pp_create_post_type($arg);
		}
	}
}
function pp_create_taxonomy($args) {
	if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['taxonomy'] || !$args['slug']) return;
	$post_type = $args['post_type'];
	$name = $args['name'];
	$single = $args['single'];
	$slug = $args['slug'];
	$rewrite = (isset($args['rewrite']))?$args['rewrite']:$slug;
	$taxonomy = $args['taxonomy'];
	$labels = array(
		'name' => __($name,'pp'),
		'singular_name' => __($single,'pp'),
		'search_items' => __('Filter By '.$name,'pp'),
		'popular_items' => __('Popular '.$name,'pp'),
		'all_items' => __('All '.$name,'pp'),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __('Edit '.$single,'pp'),
		'update_item' => __('Update '.$single,'pp'),
		'add_new_item' => __('Add New '.$single,'pp'),
		'new_item_name' => __('Add New '.$single,'pp'),
		'menu_name' => __($name,'pp'),
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => $rewrite),
	);
	register_taxonomy($taxonomy, $post_type, $args);
}

function create_custom_taxonomies() {
	$args = array(
		array(
			"post_type" => array('project'),
			"name" => "Categories",
			"single" => "Categories",
			"slug" => "categories-project",
			"taxonomy" => "taxonomy-project",
		)
	);
	foreach($args as $arg) {
		if(!empty($arg['post_type'])) {
			pp_create_taxonomy($arg);
		}
	}
}
add_action('init', 'create_custom_taxonomies', 0);
function get_breadcrumb() {
	echo '<li><a href="'.home_url().'" rel="nofollow">'.'<i class="icon-home6"></i>'.'Home</a></li>';
	if (is_category()) {
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		$flg = get_queried_object();
		$link = get_category_link($flg->term_id);
		//var_dump($flg);
		echo '<a href="'.$link.'" rel="nofollow">'.$flg->name.'</a>';
	}
	if (is_single()) {
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		$post_type = get_post_type();
		if ($post_type == 'post'){
            $flg = get_the_category();
            $name_cat = get_object_vars ( $flg[0])['name'];
            $link_id = get_object_vars ( $flg[0])['cat_ID'];
            $link = get_category_link($link_id );
            echo '<a href="'.$link.'" rel="nofollow">'.$name_cat.'</a>';
        }
		 if ($post_type == 'project'){
             $flg = get_terms(array('taxonomy' => 'taxonomy-project') );
             $name_cat = get_object_vars ( $flg[0])['name'];
             $link_id = get_object_vars ( $flg[0])['cat_ID'];
             $link = get_category_link($link_id );
             echo '<a href="'.$link.'" rel="nofollow">'.$name_cat.'</a>';
         }


		if (is_single()) {
			echo " &nbsp;&nbsp;&nbsp;&nbsp; ";
			the_title();
		}
	} elseif (is_page()) {
		echo "<li class='active'>";
		echo get_the_title();
		echo "</li>";
	} elseif (is_search()) {
		echo "&nbsp;&nbsp;&nbsp;&nbsp;Search Results for... ";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}

function create_widgets_init() {

	register_sidebar( array(
		'name'          => 'Blog right sidebar',
		'id'            => 'blog_right_1',
		'before_widget' => '<div class="widget heading_space">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name'          => 'Footer 1',
        'id'            => 'footer_1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Footer 2',
        'id'            => 'footer_2',
        'before_widget' => '<div class="widget heading_space">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Footer 3',
        'id'            => 'footer_3',
        'before_widget' => '<div class="widget heading_space">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'create_widgets_init' );
?>