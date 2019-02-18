<?php
/*
 * Template Name: About
 * */
get_header();
?>
<?php
$about_header_title = (get_field('header_breabcumb_title')) ? get_field('header_breabcumb_title') : '' ;
$about_header_caption = (get_field('caption_title_page')) ? get_field('caption_title_page') : '' ;
$about_header_image = (get_field('header_breabcumb_image')) ? get_field('header_breabcumb_image') : '' ;
?>
<section class="page_header" style="background: url(<?php echo $about_header_image['url']?>) no-repeat ;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p><?php echo $about_header_caption ?></p>
                <h1 class="text-uppercase"><?php echo $about_header_title?></h1>
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

<!--About Us-->
<?php
$about_info_title = (get_field('title_info_home')) ? get_field('title_info_home') : '' ;
$about_info_desc = (get_field('description_info_home')) ? get_field('description_info_home') : '' ;
$about_info_image = (get_field('images_about_page_about')) ? get_field('images_about_page_about') : '' ;
$about_info_count_exps = (get_field('count_to_exp')) ? get_field('count_to_exp') : '' ;
?>
<section id="about" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 padding-bottom"> <img src="<?php echo $about_info_image['url']?>" alt="<?php echo $about_info_image['alt']?>" class="img-responsive"> </div>
            <div class="col-sm-6 about_right padding-bottom">
                <h2 class="bottom10"><?php echo $about_info_title?></h2>
                <p class="bottom30"><?php echo $about_info_desc?></p>
                <div class="number-counters text-center">
                    <?php
                    foreach ($about_info_count_exps as $about_info_count_exp){
                        ?>
                        <div class="counters-item heading_space">
                            <p class="data"><strong data-to="<?php echo $about_info_count_exp['number'] ?>">0 </strong><sub><?php echo $about_info_count_exp['show_number'] ?> </sub></p>
                            <p><?php echo $about_info_count_exp['text'] ?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Meet the Team-->
<?php
$member_about_title = (get_field('title_team_member')) ? get_field('title_team_member') : '' ;
$member_about_caption = (get_field('captions_team_member')) ? get_field('captions_team_member') : '' ;
$member_about_objs = (get_field('member_team_member')) ? get_field('member_team_member') : '' ;
?>
<section id="team" class="padding grey_light">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="bottom10 text-capitalize"><?php echo $member_about_title ?></h2>
                <p><?php echo $member_about_caption ?></p>
            </div>
            <?php
            foreach ($member_about_objs as $member_buss_obj){
                ?>
                <div class="col-sm-4">
                    <div class="team_wrap heading_space wow fadeIn" data-wow-delay="500ms">
                        <div class="image heading_space">
                            <img src="<?php echo get_the_post_thumbnail_url($member_buss_obj->ID)?>" alt="our Team">
                            <div class="list_content">
                                <ul class="team_social">
                                    <?php
                                    $socialmember = get_field('social_partner', $member_buss_obj->ID);
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
                        <h3><?php echo $member_buss_obj->post_title ?></h3>
                        <span class="bottom20"><?php echo get_field('job_partner', $member_buss_obj->ID)?></span>
                        <p><?php echo $member_buss_obj->post_content ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!--Team ends-->


<!--Quality Fine-->
<?php
$plan_title_about = (get_field('title_plan_bussiness_about')) ? get_field('title_plan_bussiness_about') : '' ;
$plan_desc_about = (get_field('caption_plan_bussiness_about')) ? get_field('caption_plan_bussiness_about') : '' ;
$plan_image_about = (get_field('images_plan_bussiness')) ? get_field('images_plan_bussiness') : '' ;
$plan_content_about = (get_field('block_content_plans')) ? get_field('block_content_plans') : '' ;
?>
<section id="quality" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2><?php echo $plan_title_about ?></h2>
                <p class="heading_space"><?php echo $plan_desc_about?></p>
            </div>
            <div class="clearfix"></div>
            <div class="quality_wrap clearfix">
                <div class="col-md-6">
                    <div class="left"> <img src="<?php echo $plan_image_about['url']?>" alt="<?php echo $plan_image_about['alt']?>"> </div>
                </div>
                <div class="col-md-6">
                    <div class="right">
                        <?php
                        foreach ($plan_content_about as $key => $content){
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <div class="media-object"><span><?php echo $key+1 ?></span></div>
                                </div>
                                <div class="media-body">
                                    <h4 class="bottom10"><?php echo $content['title'] ?></h4>
                                    <p class="bottom15"><?php echo $content['description'] ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Quality fine ends-->


<!--What We DO-->
<?php
$grow_about_title = (get_field('tittle_grow_bussiness')) ? get_field('tittle_grow_bussiness') : '' ;
$grow_about_desc = (get_field('captions_grow_bussiness')) ? get_field('captions_grow_bussiness') : '' ;
$grow_about_image = (get_field('image_grow_bussiness_about')) ? get_field('image_grow_bussiness_about') : '' ;
$grow_about_services = (get_field('service_bussiness')) ? get_field('service_bussiness') : '' ;
$grow_about_whycus = (get_field('why_choose_us_about')) ? get_field('why_choose_us_about') : '' ;
?>
<section id="wedo" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2><?php echo$grow_about_title?></h2>
                <p class="heading_space"><?php echo $grow_about_desc ?></p>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="accordion-container bottom40">
                    <?php
                    foreach ($grow_about_whycus as $key => $item){
                        ?>
                        <div class="accordion_title">
                            <a href="javascript:void(0)" class="active"><?php echo $item['title'] ?><i class="fa fa-plus"></i></a>
                            <div class="content" <?php echo ($key === 0) ? 'style="display:block;"' : ''; ?>>
                                <?php echo $item['caption'] ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="do_media media bottom40">
                    <div class="media-left"><img class="media-object" src="<?php echo $grow_about_image['url']?>" alt="<?php echo $grow_about_image['alt']?>"> </div>
                    <div class="media-body">
                        <?php
                        foreach ($grow_about_services as $grow_buss_service){
                            ?>
                            <h4 class="bottom10"><?php echo $grow_buss_service['title'] ?></h4>
                            <p class="heading_space"><?php echo $grow_buss_service['caption'] ?></p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--We Do ends-->
<?php get_footer()?>
