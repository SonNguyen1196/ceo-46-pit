<?php
	if (!class_exists('Search_Post_Plugin')) {
		class Search_Post_Plugin {
			static function search_result(){
				if ($_POST['result-post']) {
					$query = new WP_Query( array( 
						's' => $_POST['result-post'],
						'post_type' => 'post', 
						'posts_per_page' => -1,
					));

					if ( $query->have_posts() ) {
						echo '<ul>';
						while ( $query->have_posts() ) {
							$query->the_post();
							get_template_part('contents/content-blog');
						}
						echo '</ul>';
						wp_reset_postdata();
					} else {
						echo "No post";
					}

				};
			}
		}
	}
	add_shortcode( 'result_post', array( 'Search_Post_Plugin', 'search_result' ) );
	$search = new Search_Post_Plugin();
?>