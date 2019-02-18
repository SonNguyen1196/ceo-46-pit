<?php
global $post;
?>
<div class="blog_item media  heading_space">
    <div class="media-left">
        <a href="<?php the_permalink($post->ID) ?>">
            <img class="media-object" src="<?php echo get_the_post_thumbnail_url($post->ID)?>" alt="<?php the_title()?>">
        </a>
    </div>
    <div class="media-body">
        <h3><a href="<?php the_permalink($post->ID) ?>"><?php the_title()?></a></h3>
        <ul class="blog_date bottom30">
            <li><a href="javascript:void(0)">Financial, Marketing</a></li>
            <li><a href="javascript:void(0)">September 22,2016</a></li>
        </ul>
        <p><?php echo wp_trim_words(get_the_content(), 50); ?></p>
        <a href="<?php the_permalink($post->ID) ?>" class="text-uppercase continue">Continue Reading</a>
    </div>
</div>
