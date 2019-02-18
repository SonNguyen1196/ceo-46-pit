<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
global $post;
get_header(); ?>
<!-- PAGE TITLE -->
<section class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="text-uppercase"><?php the_title()?></h1>
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
<!-- PAGE TITLE ends -->


<!--BLOG DETAILS-->
<section id="blog" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 bottom40">
                <div class="blog_item">
                    <?php if(have_posts()):?>
                        <?php while(have_posts()): the_post();?>
                            <div class="blog_image bottom20">
                                <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($post->ID)?>" alt="<?php the_title()?>">
                            </div>
                            <h3><?php the_title()?></h3>
                            <ul class="blog_date bottom15">
                                <li><a href="javascript:void(0)"><?php the_author()?></a></li>
                                <li><a href="javascript:void(0)"><?php the_date()?></a></li>
                            </ul>
                            <?php the_content()?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </div>
            <aside class="col-sm-3">
                <?php
                get_sidebar();
                ?>
            </aside>
        </div>
    </div>
</section>
<!--BLOG DETAILS ends-->

<?php get_footer(); ?>
