<?php
/*
 * Template Name: Project
 * */
get_header();
?>

<!--Page Titles-->
<section class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>Our Successfull Work</p>
                <h1 class="text-uppercase">Projects</h1>
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
<!-- Page Title ends -->

<?php
    $cates = get_categories( array('taxonomy' => 'taxonomy-project') );
?>
<!--Gallery Here-->
<section id="project" class="padding-bottom-half padding-top">
    <div class="container">
        <div id="project-filter" class="cbp-l-filters-alignCenter">
            <?php
            if(is_array($cates)) {
                ?>
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">Show All</div>
                <?php
                foreach ($cates as $cate){
                    ?>
                    <div data-filter=".<?php echo $cate->category_nicename ?>" class="cbp-filter-item"><?php echo $cate->cat_name ?> </div>
                    <?php
                }
                ?>
                <?php
            }
            ?>
        </div>
        <div id="projects" class="cbp">
            <?php

            $args = array(
                'post_type' => 'project',
                'posts_per_page' => -1
            );

            $the_query = new WP_Query($args);
            global $post;
            ?>
            <?php if($the_query->have_posts()):?>
                <?php while($the_query->have_posts()): $the_query->the_post();?>
                    <div class="cbp-item <?php if (get_the_terms($post->ID,'taxonomy-project' ))
                        foreach (get_the_terms($post->ID,'taxonomy-project' ) as $term){
                            echo strtolower($term->name) . ' ';
                        }
                    ?>">
                        <a href="<?php echo get_the_post_thumbnail_url($post->ID) ?>" class="cbp-lightbox">
                            <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php the_title()?>">
                        </a>
                        <div class="project_cap top15">
                            <h3><a href="<?php the_permalink($post->ID)?>"><?php the_title()?></a></h3>
                            <p><?php the_terms($post->ID, 'taxonomy-project' ); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Gallery ends -->

<?php get_footer(); ?>
