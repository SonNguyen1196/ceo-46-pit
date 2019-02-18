<?php
/*
 * Template Name: Home
 * */
get_header();
?>
<!--Slider Main-->
<section class="rev_slider_wrapper">
    <div id="rev_slider_second" class="rev_slider" data-version="5.0">
        <?php
            $silders = (get_field('slider_home')) ? get_field('slider_home') : '';
        ?>
        ?>
        <ul>
            <?php
                foreach ($silders as $key => $slider){
                    ?>
                    <li data-transition="fade">
                        <img src="<?php echo $slider['banner']['url'] ?>" alt="<?php echo $slider['banner']['alt'] ?>" data-bgposition="center center" data-bgfit="cover" class="rev-slidebg">
                        <h3 class="tp-caption tp-resizeme text-uppercase"
                            data-x="['left','left','left','center']" data-hoffset="['0','15','15','15']"
                            data-y="['194','120','80','80']" data-voffset="['0','0','0','0']"
                            data-responsive_offset="on"
                            data-transform_idle="o:1;" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="1000"><?php echo $slider['small_title'] ?></h3>

                        <?php
                        if ($key === 0){
                            ?>
                            <h1 class="tp-caption tp-resizeme text-uppercase"
                                data-x="['left','left','left','center']" data-hoffset="['0','15','15','15']"
                                data-y="['228','150','110','110']" data-voffset="['0','0','0','0']"
                                data-responsive_offset="on"
                                data-transform_idle="o:1;" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="1300"><?php echo $slider['big_title'] ?> </h1>
                            <?php
                        } else {
                            ?>
                            <h2 class="tp-caption tp-resizeme text-uppercase"
                                data-x="['left','left','left','center']" data-hoffset="['0','15','15','15']"
                                data-y="['228','150','110','110']" data-voffset="['0','0','0','0']"
                                data-responsive_offset="on"
                                data-transform_idle="o:1;" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="1300"><?php echo $slider['big_title'] ?> </h2>
                            <?php
                        }
                        ?>

                        <div class="tp-caption tp-resizeme"
                             data-x="['left','left','left','center']" data-hoffset="['0','15','15','15']"
                             data-y="['294','220','180','180']" data-voffset="['0','0','0','0']"
                             data-responsive_offset="on"
                             data-transform_idle="o:1;" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="1600">
                            <p><?php echo $slider['caption'] ?></p>
                        </div>
                        <div class="tp-caption tp-resizeme layout_second"
                             data-x="['left','left','left','center']" data-hoffset="['0','15','15','15']"
                             data-y="['368','290','260','180']" data-voffset="['0','0','0','0']"
                             data-responsive_offset="on"
                             data-transform_idle="o:1;" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="2000">
                            <?php
                            foreach ($slider['button_link'] as $link)?>
                            <a href="#." class="text-uppercase border_radius btn-yellow"><?php echo $link['text']?></a>
                                <?php
                            ?>
                        </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div><!-- END REVOLUTION SLIDER -->
</section>



<!--Three columns text Info-->
<?php
    $title_buss = (get_field('title_info_home')) ? get_field('title_info_home') : '';
    $caption_buss = (get_field('description_info_home')) ? get_field('description_info_home') : '';
    $buttonlink_buss = (get_field('button_link_info_home')) ? get_field('button_link_info_home') : '';
    $blockinfo = (get_field('block_info_home')) ? get_field('block_info_home') : '';
?>
<section id="info" class="padding-top padding-bottom-half">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="desc_box heading_space wow fadeInLeft" data-wow-delay="500ms">
                    <h2 class="bottom20"><?php echo $title_buss?> </h2>
                    <?php echo $caption_buss ?>
                    <a href="<?php echo $buttonlink_buss['url']; ?>" class="btn-yellow border_radius text-uppercase"><?php echo $buttonlink_buss['title']; ?></a>
                </div>
            </div>
            <?php
                foreach ($blockinfo as $block){
                    ?>
                    <div class="col-sm-3">
                        <div class="desc_box heading_space wow fadeIn" data-wow-delay="1100ms">
                            <h3 class="bottom10"><?php echo $block['title']?></h3>
                            <div class="image bottom10"><img src="<?php echo get_template_directory_uri()?>/images/box1.jpg" alt="Box"></div>
                            <p><?php echo $block['description']?></p>
                            <a href="<?php echo $block['button_link']['url']?>" class="text-uppercase readmore"><i class="fa fa-caret-right"></i><?php echo $block['button_link']['title']?></a>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>


<!--Good Plan-->
<?php
    $plan_buss = (get_field('images_plan_bussiness')) ? get_field('images_plan_bussiness') : '' ;
    $plan_content_buss = (get_field('block_content_plans')) ? get_field('block_content_plans') : '' ;
 ?>
<section id="plans" class="padding light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 content_left">
                <figure><img src="<?php echo $plan_buss['url'] ?>" alt="<?php echo $plan_buss['alt'] ?>" class="img-responsive"></figure>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 content_right layout_second shadow  margin-bottom">
                <div id="plan_slider" class="owl-carousel">
                    <?php
                        foreach ($plan_content_buss as $key => $content){
                            ?>
                            <div class="item">
                                <span class="count bottom20 red_bg"><?php echo $key+1 ?></span>
                                <h2 class="bottom10"><?php echo $content['title'] ?></h2>
                                <p class="bottom20"><?php echo $content['description'] ?></p>
                                <a href="<?php echo $content['button_link']['url'] ?>" class="btn-border text-uppercase border_radius"><?php echo $content['button_link']['title'] ?></a>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Good Plans ends-->


<!--Facts Counter & Grid-->
<?php
    $grow_buss_title = (get_field('tittle_grow_bussiness')) ? get_field('tittle_grow_bussiness') : '' ;
    $grow_buss_desc = (get_field('captions_grow_bussiness')) ? get_field('captions_grow_bussiness') : '' ;
    $grow_buss_counts = (get_field('count_to_exp')) ? get_field('count_to_exp') : '' ;
    $grow_buss_services = (get_field('service_bussiness')) ? get_field('service_bussiness') : '' ;
?>
<section id="facts" class="padding layout_second">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="wow fadeInDown">
                    <h2 class="bottom10 text-capitalize"><?php echo $grow_buss_title?></h2>
                    <p class="tagline heading_space"><?php echo $grow_buss_desc ?></p>
                </div>
                <div class="number-counters">
                    <?php
                    foreach ($grow_buss_counts as $grow_buss_count){
                        ?>
                        <div class="counters-item heading_space">
                            <p class="data"><strong data-to="<?php echo $grow_buss_count['number'] ?>">0 </strong><sub><?php echo $grow_buss_count['show_number'] ?> </sub></p>
                            <p><?php echo $grow_buss_count['text'] ?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="grid_layout" class="cbp cbp-l-grid-mosaic-flat">
            <?php
            foreach ($grow_buss_services as $grow_buss_service){
                ?>
                <div class="cbp-item">
                    <a href="<?php echo $grow_buss_service['link']['url']?>" class="cbp-lightbox">
                        <img src="<?php echo $grow_buss_service['image']['url']?>" alt="<?php echo $grow_buss_service['image']['alt']?>">
                        <div class="overlay">
                            <div class="overlay_inner">
                                <h4><?php echo $grow_buss_service['title'] ?></h4>
                                <p><?php echo $grow_buss_service['caption'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!--Facts  & Counters-->


<!--Video-->
<?php
$video_buss_title = (get_field('title_videos_business_home')) ? get_field('title_videos_business_home') : '' ;
$video_buss_desc = (get_field('desc_videos_business_home')) ? get_field('desc_videos_business_home') : '' ;
$video_buss_img = (get_field('image_videos_business_home')) ? get_field('image_videos_business_home') : '' ;
$video_buss_link = (get_field('link_videos_business_home')) ? get_field('link_videos_business_home') : '' ;
$video_buss_embed = (get_field('video_embed_buss')) ? get_field('video_embed_buss') : '' ;
?>
<section id="bg-video" class="padding  layout_second">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 video wow fadeInLeft" data-wow-delay="500ms">
                <img src="<?php echo $video_buss_img['url']?>" alt="video">
                <a href="<?php echo $video_buss_embed?>" class="html5lightbox video-btn" data-width="900" data-height="420" title="title here">
                    <i class="icon-play2"></i>
                </a>
            </div>
            <div class="col-sm-6 right_content top40 bottom40 wow fadeInRight" data-wow-delay="500ms">
                <h2 class="bottom10"><?php echo $video_buss_title?></h2>
                <p class="bottom20"><?php echo $video_buss_desc?></p>
                <a href="<?php echo $video_buss_link['url']?>" class="btn-white text-uppercase border_radius"><?php echo $video_buss_link['title']?></a>
            </div>
        </div>
    </div>
</section>


<!--Meet the Team-->
<?php
$member_buss_title = (get_field('title_team_member')) ? get_field('title_team_member') : '' ;
$member_buss_caption = (get_field('captions_team_member')) ? get_field('captions_team_member') : '' ;
$member_buss_objs = (get_field('member_team_member')) ? get_field('member_team_member') : '' ;
?>
<section id="team" class="padding-top padding-bottom-half layout_second">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center wwo fadeInDown">
                <h2 class="bottom10 text-capitalize"><?php echo $member_buss_title ?></h2>
                <p class="heading_space"><?php echo $member_buss_caption ?></p>
            </div>
            <?php
            foreach ($member_buss_objs as $member_buss_obj){
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


<!--Call Back Form-->
<?php
$title_contact = (get_field('title_contact_home')) ? get_field('title_contact_home') : '';
$desc_contact = (get_field('caption_title_contact_home')) ? get_field('caption_title_contact_home') : '';
$form_contact = (get_field('form_contact_home')) ? get_field('form_contact_home') : '';
$images_contact = (get_field('banner_contact_home')) ? get_field('banner_contact_home') : '';
?>
<section class="parallax_one padding" style="background: url(<?php echo $images_contact['url']?>) no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <div class="bg_call border_radius layout_second wow fadeInRight" id="callform">
                    <h2 class="bottom10 text-center"><?php echo $title_contact ?></h2>
                    <p class="text-center bottom20"><?php echo $desc_contact ?></p>
                    <?php echo do_shortcode($form_contact); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!--People Saying-->
<?php
$title_client = (get_field('title_client_said')) ? get_field('title_client_said') : '';
$desc_client = (get_field('caption_client_said')) ? get_field('caption_client_said') : '';
$objs_client = (get_field('client_content_home_objs')) ? get_field('client_content_home_objs') : '';
?>
<section id="people" class="padding layout_second">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center wow fadeInDown" data-wow-delay="500ms">
                <h2 class="bottom10 text-capitalize"><?php echo $title_client ?></h2>
                <p class="heading_space"><?php echo $desc_client ?></p>
            </div>
        </div>
        <div id="people_slider" class="owl-carousel">
            <?php
            foreach ($objs_client as $item) {
                ?>
                <div class="item">
                    <div class="people_wrap border_radius left">
                        <i class="icon-quotes-right"></i>
                        <p><?php echo $item->post_content ?></p>
                    </div>
                    <div class="testinomial_pic">
                        <div class="pic"><img alt="testinomial" src="<?php echo get_the_post_thumbnail_url($item->ID) ?>"></div>
                        <div class="testinomial_body">
                            <span class="name"><?php echo $item->post_title ?> </span>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!--People Saying ends-->


<!--News & Thoughts-->
<?php
$title_blog_home = (get_field('title_blog_home')) ? get_field('title_blog_home') : '' ;
$desc_blog_home = (get_field('caption_blog_home')) ? get_field('caption_blog_home') : '' ;
$news_blog_homes = (get_field('blog_home_page')) ? get_field('blog_home_page') : '' ;
?>
<section id="news" class="padding light layout_second">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center wow fadeInDown" data-wow-delay="500ms">
                <h2 class="bottom10 text-capitalize"><?php echo $title_blog_home ?></h2>
                <p class="heading_space"><?php echo $desc_blog_home ?></p>
            </div>
        </div>
        <div class="row">
            <div id="news_slider" class="owl-carousel">
                <?php
                foreach ($news_blog_homes as  $item){
                    ?>
                    <div class="item">
                        <div class="news">
                            <div class="image"><img src="<?php echo get_the_post_thumbnail_url($item->ID) ?>" alt="<?php echo $item->post_title ?>"></div>
                            <div class="news_text">
                                <h4 class="bottom10"><a href="<?php echo get_permalink($item->ID) ?>" title="<?php echo $item->post_title?>">
                                    <?php echo substr($item->post_title, 0, 50)  ?></a></h4>
                                <p class="bottom30"><?php echo substr($item->post_content, 0, 120).'...' ?></p><ul class="news_crumb">
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!--News & Thoughts ends-->


<!--Partners-->
<?php
$title_partner_home = (get_field('title_partner_home')) ? get_field('title_partner_home') : '' ;
$desc_partner_home = (get_field('caption_partner_home')) ? get_field('caption_partner_home') : '' ;
$images_logo_partner_homes = (get_field('image_partnet_home')) ? get_field('image_partnet_home') : '' ;
?>
<section id="partner" class="padding-bottom-half padding-top layout_second">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center wow fadeInDown" data-wow-delay="500ms">
                <h2 class="text-capitalize bottom10"> <?php echo $title_partner_home ?></h2>
                <p class="heading_space"><?php echo $desc_partner_home ?></p>
            </div>
        </div>
        <div class="row">
            <div id="logo_slider" class="owl-carousel">
                <?php
                foreach ($images_logo_partner_homes as $item){
                    ?>
                    <div class="item"><img src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['image']['alt'] ?>"></div>
                    <?php
                }
                ?>
        </div>
    </div>
</section>
<!--Partners ends-->



<?php get_footer()?>