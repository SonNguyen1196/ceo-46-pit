<?php
/*
 * Template Name: No Sidebar
 * */
get_header();
while ( have_posts() ) : the_post();

    // Include the page content template.
    the_content();
    // End of the loop.
endwhile;
get_footer();
?>