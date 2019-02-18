<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<!--Footer-->
<?php
$logo = (get_field('logo_header_home', 'option'))? get_field('logo_header_home', 'option'): '';
$contact = (get_field('contatct_header', 'option'))? get_field('contatct_header', 'option'): '';
//$logo = (get_field('logo_header_home', 'option'))? get_field('logo_header_home', 'option'): '';
?>
<footer class="footer_top layout_second padding-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 footer_panel heading_space">
                <?php if ( is_active_sidebar( 'footer_1' )  ) : ?>
                    <?php dynamic_sidebar( 'footer_1' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-4 footer_panel heading_space">
                <h3 class="heading bottom30">Useful <span class="yellow_t">Links </span></h3>
                <?php wp_nav_menu( array( 'theme_location' => 'category-sb', 'menu_class' => 'links') ); ?>
            </div>
            <div class="col-sm-4 footer_panel heading_space">
                <?php if ( is_active_sidebar( 'footer_3' )  ) : ?>
                    <?php dynamic_sidebar( 'footer_3' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<div class="copyright layout_second">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; 2016 <a href="#.">Envas </a>. all rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>

