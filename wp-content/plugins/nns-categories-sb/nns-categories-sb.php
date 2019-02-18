<?php
/*
 * Plugin Name: NNS Categories Sidebar
 * Plugin URI: #
 * Description: Plugin NNS Categories Sidebar Created By David Nguyen
 * Version: 1.0
 * Author: David Nguyen
 * Author URI:
 * License: GPLv2 or later
 */
?>
<?php
if (!class_exists('NNS Categories Sidebar')) {
    class NNS_Categories_Sb extends  WP_Widget {
        function __construct() {
            parent::__construct(
                'widget_categories_sb', // Base ID
                esc_html__( 'Widget Categories Sidebar', 'text_domain' ), // Name
                array( 'description' => esc_html__( 'Widget Categories Sidebar', 'text_domain' ), ) // Args
            );
        }

        public function form( $instance ) {

            $title = $instance['title'];
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>

            <?php
        }


        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
            return $instance;
        }

        public function widget( $args, $instance ) {
            echo $args['before_widget'];
            ?>
            <div class="widget heading_space">
                <h4 class="bottom10"><?php echo $instance['title'] ?></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'category-sb', 'menu_class' => 'category') ); ?>
            </div>

            <?php

            echo $args['after_widget'];
        }

    }


// register Foo_Widget widget
    function register_nns_cate_sb() {
        register_widget( 'NNS_Categories_Sb' );
    }
    add_action( 'widgets_init', 'register_nns_cate_sb' );


}

/***** REGISTER MENUS ******/

if ( ! function_exists( 'register_nav_sidebar_menu' ) ) {

    function register_nav_sidebar_menu(){
        register_nav_menus( array(
            'category-sb' => __( 'Categories Sidebar', 'root' ),
        ) );
    }
    add_action( 'plugins_loaded', 'register_nav_sidebar_menu');
}
?>
