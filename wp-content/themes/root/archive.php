<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$cate = get_queried_object();
get_header(); ?>

<!-- Page Title -->

		<?php if ( have_posts() ) : ?>
            <section class="page_header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1><?php echo $cate->cat_name ?></h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="page_linker">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <ul class="breadcrumb">
                                <?php get_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Blog/ News-->
            <section id="blog" class="padding-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9 bottom40">
                            <?php

                            $args = array(
                                'post_type' => 'post',
                                'paged' => $paged,
                                'posts_per_page' => 5,
                                'cat' => $cate->cat_ID
                            );

                            $the_query = new WP_Query($args);

                            ?>
                            <?php if($the_query->have_posts()):?>
                                <?php while($the_query->have_posts()): $the_query->the_post();?>
                                    <?php get_template_part('contents/content-blog'); ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                            <?php

                            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

                            $big = 999999999; // need an unlikely integer

                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $the_query->max_num_pages,
                                'prev_next'          => false,
                                'type' => 'list'
                            ) );
                            ?>
                        </div>
                        <aside class="col-sm-3">
                            <?php
                            get_sidebar();
                            ?>

                            <div class="widget heading_space">
                                <h4 class="bottom10">Blog Posts</h4>
                                <div class="single_post bottom15">
                                    <a href="#." class="post"><img src="<?php echo get_template_directory_uri()?>/images/post1.jpg" alt="post image"></a>
                                    <div class="text">
                                        <a href="#.">About Invesment Management</a>
                                        <p>September 22,2016</p>
                                    </div>
                                </div>
                                <div class="single_post bottom15">
                                    <a href="#." class="post"><img src="<?php echo get_template_directory_uri()?>/images/post2.jpg" alt="post image"></a>
                                    <div class="text">
                                        <a href="#.">We Conduct Share Holders Meet</a>
                                        <p>September 22,2016</p>
                                    </div>
                                </div>
                                <div class="single_post">
                                    <a href="#." class="post"><img src="<?php echo get_template_directory_uri()?>/images/post3.jpg" alt="post image"></a>
                                    <div class="text">
                                        <a href="#.">Get Our Experts Openion</a>
                                        <p>September 22,2016</p>
                                    </div>
                                </div>
                            </div>
                            <div class="widget heading_space">
                                <h4 class="bottom10">Categories</h4>
                                <ul class="category">
                                    <li><a href="#>">Investment</a></li>
                                    <li><a href="#>">Wealth Management</a></li>
                                    <li><a href="#>">Commodities</a></li>
                                    <li><a href="#>">Acoount Profile</a></li>
                                    <li><a href="#>">Private Banking</a></li>
                                </ul>
                            </div>
                            <div class="widget heading_space">
                                <h4 class="bottom10">Tags</h4>
                                <ul class="tags">
                                    <li><a href="#>">Audio</a></li>
                                    <li><a href="#>">Gallery</a></li>
                                    <li><a href="#>">Wordpress</a></li>
                                    <li><a href="#>"><?php echo get_template_directory_uri()?>/images</a></li>
                                    <li><a href="#>">Youtube</a></li>
                                    <li><a href="#>">Photos</a></li>
                                    <li><a href="#>">Text</a></li>
                                    <li><a href="#>">Music</a></li>
                                    <li><a href="#>">Themeforest</a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
			<?php


		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
<?php get_footer(); ?>
