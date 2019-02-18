<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php wp_title() ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <?php endif; ?>
    <?php wp_head(); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="<?php echo get_template_directory_uri()?>/images/favicon2.png">
</head>
<body <?php body_class("layout_second"); ?>>
<!--Loader-->
<div class="loader">
    <div class="cssload-loader">
        <div class="cssload-inner cssload-one">
        </div>
        <div class="cssload-inner cssload-two">
        </div>
        <div class="cssload-inner cssload-three">
        </div>
    </div>
</div><!--Loader Ends -->

<?php
$logo = (get_field('logo_header_home', 'option'))? get_field('logo_header_home', 'option'): '';
$contacts = (get_field('contatct_header', 'option'))? get_field('contatct_header', 'option'): '';
$working_day = (get_field('work_day', 'option'))? get_field('work_day', 'option'): '';
$socials = (get_field('social_global', 'option'))? get_field('social_global', 'option'): '';
foreach ($contacts as $contact);
?>
<!--Header -->
<header class="layout_second">
    <div class="topbar red_bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <span class="call"><?php echo $contact['phone_number']?></span>
                </div>
                <div class="col-sm-3">
                    <span class="call"><?php echo 'Email: '.'<a href="mailto:'.$contact['email'].'">'.$contact['email'].'</a>'?> </span>
                </div>
                <div class="col-sm-3">
                    <span class="call"><?php echo $working_day?></span>
                </div>
                <div class="col-sm-3 text-right">
                    <ul class="top_social">
                        <?php
                        foreach ($socials as $social){
                            if ($social['key_social'] === 'facebook'){
                                ?>
                                <li><a href="<?php echo $social['link'] ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <?php
                            }

                            if ($social['key_social'] === 'twitter'){
                                ?>
                                <li><a href="<?php echo $social['link'] ?>" class="twitter"><i class="icon-twitter4"></i></a></li>
                                <?php
                            }

                            if ($social['key_social'] === 'google-plus'){
                                ?>
                                <li><a href="<?php echo $social['link'] ?>" class="google"><i class="icon-google-plus"></i></a></li>
                                <?php
                            }
                        };
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-sticky bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars">
                    </i>
                </button>
                <a class="navbar-brand" href="<?php echo home_url()?>">
                    <img src="<?php echo $logo['url'];?>" class="logo" alt="<?php echo $logo['alt'];?>">
                </a>
            </div><!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'main_menu',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'container' => '',
                        'depth' => 3,
                        'items_wrap' => '<ul data-in="slideInUp" data-out="fadeOut" id="%1$s" class="%2$s">%3$s</ul>',
                        'walker'  => new Boot_nav_Walker(),
                    ) );
                    ?>
            </div>
        </div>
    </nav>
</header>
<!--Header ends-->