<?php
/*
 * Template Name: Blogs
 * */
get_header();

?>
<?php
$blog_header_title = (get_field('header_breabcumb_title')) ? get_field('header_breabcumb_title') : '' ;
$blog_header_caption = (get_field('caption_title_page')) ? get_field('caption_title_page') : '' ;
$blog_header_image = (get_field('header_breabcumb_image')) ? get_field('header_breabcumb_image') : '' ;
$blog_number_post_display = (get_field('blog_number_post_display')) ? get_field('blog_number_post_display') : '' ;
?>
<!-- Page Title -->
<section class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p><?php echo $blog_header_caption ?></p>
                <h1 class="text-uppercase"><?php echo $blog_header_title ?></h1>
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
                    'posts_per_page' => $blog_number_post_display
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
            </aside>
        </div>
    </div>
</section>


<?php get_footer();?>
