<?php
/*
 * Plugin Name: NNS Recent Post
 * Plugin URI: #
 * Description: Plugin Recent Post Created By David Nguyen
 * Version: 1.0
 * Author: David Nguyen
 * Author URI:
 * License: GPLv2 or later
 */
?>
<?php
if (!class_exists('NNS_Recent_Post')) {
    class NNS_Recent_Post extends  WP_Widget {
        function __construct() {
            parent::__construct(
                'widget_recent_post_sb', // Base ID
                esc_html__( 'Widget Recent Post Sidebar', 'text_domain' ), // Name
                array( 'description' => esc_html__( 'Widget Recent Post Sidebar', 'text_domain' ), ) // Args
            );
        }

        public function form( $instance ) {

            $title = $instance['title'];
            $categories = $instance['categories'];
            $number_dp = $instance['number_dp'];
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>

            <p>
                <label ><?php esc_attr_e( 'Select Category:', 'text_domain' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'categories' ) ); ?>">
                    <?php
                    $categories_posts = get_terms( 'category');
                    foreach ($categories_posts as $categorie){
                        ?>
                        <option <?php selected( $instance['categories'], $categorie->term_id ); ?> value="<?php echo $categorie -> term_id ?>"><?php echo $categorie -> name ?></option>
                    <?php } ?>
                </select>

            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'number_dp' ) ); ?>"><?php esc_attr_e( 'Number Post:', 'text_domain' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_dp' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_dp' ) ); ?>" type="text" value="<?php echo esc_attr( $number_dp ); ?>">
            </p>
            <?php
        }


        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
            $instance['categories'] = ( ! empty( $new_instance['categories'] ) ) ? sanitize_text_field( $new_instance['categories'] ) : '';
            $instance['number_dp'] = ( ! empty( $new_instance['number_dp'] ) ) ? sanitize_text_field( $new_instance['number_dp'] ) : '';
            return $instance;
        }

        public function widget( $args, $instance ) {
            echo $args['before_widget'];
            ?>
            <div class="widget heading_space">
                <h3 class="bottom10"><?php echo $instance['title'] ?></h3>
                <?php
                global $post;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $instance['number_dp'],
                    'cat' => $instance['categories']
                );

                $the_query = new WP_Query($args);

                ?>
                <?php if($the_query->have_posts()):?>
                    <?php while($the_query->have_posts()): $the_query->the_post();?>
                        <div class="single_post bottom15">
                            <a href="<?php echo get_permalink($post->ID)?>" class="post"><img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php the_title()?>"></a>
                            <div class="text">
                                <a href="<?php echo get_permalink($post->ID)?>"><?php echo wp_trim_words(get_the_title(), 10)?></a>
                                <p><?php the_date()?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>

            <?php

            echo $args['after_widget'];
        }

    }


// register Foo_Widget widget
    function register_nns_recent_post() {
        register_widget( 'NNS_Recent_Post' );
    }
    add_action( 'widgets_init', 'register_nns_recent_post' );


}
?>
