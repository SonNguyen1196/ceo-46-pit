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
if (!class_exists('NNS_Search_Post')) {
    class NNS_Search_Post extends  WP_Widget {
        function __construct() {
            parent::__construct(
                'widget_search_post_sb', // Base ID
                esc_html__( 'Widget Search Post Sidebar', 'text_domain' ), // Name
                array( 'description' => esc_html__( 'Widget Search Post Sidebar', 'text_domain' ), ) // Args
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
                <form method="post" action="search-post.php" class="widget_search border-radius">
                    <div class="input-group">
                        <input class="form-control" type="search" required placeholder="Search Here">
                        <button type="submit"><i class="input-group-addon icon-search5"></i></button>

                    </div>
                </form>
            </div>

            <?php

            echo $args['after_widget'];
        }

    }


// register Foo_Widget widget
function register_nns_search_post() {
    register_widget( 'NNS_Search_Post' );
}
add_action( 'widgets_init', 'register_nns_search_post' );


}
?>
