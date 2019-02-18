<?php
/*
 * Template Name: Member
 * */
get_header();
?>
<!--PAGE TITLE-->
<?php
$member_header_title = (get_field('header_breabcumb_title')) ? get_field('header_breabcumb_title') : '' ;
$member_header_caption = (get_field('caption_title_page')) ? get_field('caption_title_page') : '' ;
$member_header_image = (get_field('header_breabcumb_image')) ? get_field('header_breabcumb_image') : '' ;
?>
<section class="page_header" style="background: url(<?php echo $member_header_image['url']?>) no-repeat ;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p><?php echo $member_header_caption ?></p>
                <h1 class="text-uppercase"><?php echo $member_header_title ?></h1>
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
<!--PAGE TITLE ends-->


<!--Meet the Team-->
<?php
$member_page_title = (get_field('title_team_member')) ? get_field('title_team_member') : '' ;
$member_page_caption = (get_field('captions_team_member')) ? get_field('captions_team_member') : '' ;
$member_show_number = (get_field('member_number_display')) ? get_field('member_number_display') : -1 ;
?>
<section id="team" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="bottom10 text-capitalize"><?php echo $member_page_title ?></h2>
                <p class="heading_space"><?php echo $member_page_caption ?></p>
            </div>
        </div>


        <div class="row">
            <?php

            $args = array(
                'post_type' => 'partner',
                'paged' => $paged,
                'posts_per_page' => $member_show_number
            );

            $the_query = new WP_Query($args);

            ?>
            <?php if($the_query->have_posts()):?>
                <?php while($the_query->have_posts()): $the_query->the_post(); global $post; ?>
                    <div class="col-sm-4">
                        <div class="team_wrap heading_space">
                            <div class="image bottom30">
                                <img src="<?php echo get_the_post_thumbnail_url($post->ID)?>" alt="<?php the_title()?>">
                                <div class="list_content">
                                    <ul class="team_social">
                                        <?php
                                        $socialmember = get_field('social_partner', $post->ID);
                                        $number = count($socialmember);
                                        for ($i = 0 ; $i < $number; $i ++ ){
                                            if (strtolower($socialmember[$i]['key_social']) === 'facebook'){
                                                echo '<li><a href="'.$socialmember[$i]['link']['url'].'"> <i class="icon-euro"></i></a></li>';
                                            }
                                            if (strtolower($socialmember[$i]['key_social']) === 'twitter'){
                                                echo '<li><a href="'.$socialmember[$i]['link']['url'].'"> <i class="icon-twitter5"></i></a></li>';
                                            }
                                            if (strtolower($socialmember[$i]['key_social']) === 'instagram'){
                                                echo '<li><a href="'.$socialmember[$i]['link']['url'].'"> <i class="icon-instagram"></i></a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <h3><?php the_title()?></h3>
                            <span class="bottom10"><?php echo get_field('job_partner', $post->ID)?></span>
                            <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
    </div>

        <div class="row">
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
</section>
<!--Team ends-->

<?php get_footer(); ?>
