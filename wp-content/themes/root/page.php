<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
global $post;
get_header(); ?>
<section id = "<?php echo $post->post_name ?>" class="padding-top">

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 bottom40">
                        <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();

                            // Include the page content template.
                            the_content();
                            // End of the loop.
                        endwhile;
                        ?>
                    </div>
                    <aside class="col-sm-3">
                        <?php
                        get_sidebar();
                        ?>
                    </aside>
                </div>
            </div>
        </main><!-- .site-main -->

        <?php get_sidebar( ); ?>

    </div><!-- .content-area -->
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
