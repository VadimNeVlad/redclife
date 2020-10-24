<?php 
/**
 *	Template name: Contact Page 
 */

get_header(); ?>

    <section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('intro_c_bg') ?>);">
        <div class="container">

            <?php if (get_field('intro_c_subtitle')) { ?>
                <span class="intro__panel"><?php the_field('intro_c_subtitle') ?></span>
            <?php } ?>

            <?php if (get_field('intro_c_title')) { ?>
                <?php the_field('intro_c_title') ?>
            <?php } ?>

        </div>
    </section>

    <section class="contact-us">
        <div class="container-small">
            <div class="contact-us__form-content">
                
                <?php if (get_field('contact_form_text')) { ?>
                    <?php the_field('contact_form_text') ?>
                <?php } ?>

                <?php if (get_field('contact_form')) { ?>
                    <?php the_field('contact_form') ?>
                <?php } ?>
            </div>
            <div class="contact-us__info-content">

                <?php if (get_field('contact_info_text')) { ?>
                    <?php the_field('contact_info_text') ?>
                <?php } ?>

                <div class="contact-us__info-list">

                    <?php if (get_field('contact_info_address')) { ?>
                        <div class="contact-us__info-item  contact-us__info-item--address">
                            <?php the_field('contact_info_address') ?>
                        </div>
                    <?php } ?>

                    <?php if (get_field('contact_info_tel')) { ?>
                        <div class="contact-us__info-item  contact-us__info-item--tel">
                            <p><a href="tel:<?php the_field('contact_info_tel') ?>"><?php the_field('contact_info_tel') ?></a></p>
                        </div>
                    <?php } ?>

                    <?php if (get_field('contact_info_fax')) { ?>
                        <div class="contact-us__info-item  contact-us__info-item--fax">
                            <p><a href="fax:<?php the_field('contact_info_fax') ?>"><?php the_field('contact_info_fax') ?></a></p>
                        </div>
                    <?php } ?>

                    <?php if (get_field('contact_info_site')) { ?>
                        <div class="contact-us__info-item  contact-us__info-item--site">
                            <p><a href="https://redcliffe-partners.com" target="_blank"><?php the_field('contact_info_site') ?></a></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <div class="map-block">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2541.1158955391015!2d30.498681667811276!3d50.4389418960748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1603189710224!5m2!1sru!2sua" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    

<?php get_footer(); ?>