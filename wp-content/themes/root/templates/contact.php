<?php
/*
 * Template Name: Contact
 * */
get_header();
?>

<!-- Page Title -->
<section class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>We'll love to hear from you</p>
                <h1>Contact Us</h1>
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

<!-- CONTACT -->
<section class="padding-bottom-half padding-top contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="contact_detail padding-bottom">
                    <h3 class="bottom20">Project Description</h3>
                    <p class="bottom30">Marum quidem rerum facilis est et expedita distinctio am libero lanbour tempore, cum soluta nobis este eligendi optio cumque nihil impedit quo It is a long established fact that a minus id quod maxime placeat facere possimus.</p>
                    <p class="bottom20">Ationally encounter se consequencess that are (+01) 333 444 4567 is there anyone 24/7 who oluta nobis loves info@envas.com</p>
                    <h3 class="bottom20">Our Address</h3>
                    <p>Marum quidem rerum facilis est et expedita distinctio am libero lanbour tempore, cum soluta nobis este eligendi optio cumque nihil.</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="address">
                                <span><i class="icon-phone4"></i></span>
                                <div class="text">
                                    <h4>Phone</h4>
                                    <p>(+01) 333 444 4567</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="address">
                                <span><i class="icon-mail"></i></span>
                                <div class="text">
                                    <h4>Email Address</h4>
                                    <p><a href="#.">info@envas.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h3 class="bottom20">Let’s Talk To Us</h3>
                <form class="callus padding-bottom"  id="contact-form" onSubmit="return false">

                    <div class="form-group"><div id="result"></div></div>


                    <div class="form-group">
                        <label>Your Name *</label>
                        <div class="input-group">
                            <input type="text" class ="form-control" required name="name" id="name">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Addres *</label>
                        <div class="input-group">
                            <input type="email" class ="form-control" required name="email" id="email">
                            <span class="input-group-addon"><i class="icon-envelope2"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message *</label>
                        <div class="input-group">
                            <textarea class="form-control" name="message" id="message"></textarea>
                            <span class="input-group-addon"><i class=" icon-comments"></i></span>
                        </div>
                    </div>
                    <button type="submit" class="btn-green border_radius" id="btn_submit" name="btn_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT ends -->

<?php get_footer() ?>
