<?php 
/**
 *	Template name: Contact Page 
 */

get_header(); ?>

    <section class="intro  wow fadeIn  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('intro_c_bg') ?>);">
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
            <div class="contact-us__form-content  wow fadeInLeft">
                
                <?php if (get_field('contact_form_text')) { ?>
                    <?php the_field('contact_form_text') ?>
                <?php } ?>

                <?php if (get_field('contact_form')) { ?>
                    <?php the_field('contact_form') ?>
                <?php } ?>
            </div>
            <div class="contact-us__info-content wow fadeInUp" data-wow-delay=".3s">

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

                    <?php if( have_rows('contact_social_list') ): ?>   
                        <div class="contact-us__social-list">
                            <?php while( have_rows('contact_social_list') ): the_row(); 
                                $img = get_sub_field('contact_social_list_icon');
                                $link = get_sub_field('contact_social_list_link');

                                ?>

                                <a href="<?php echo $link; ?>" target="_blank" class="contact-us__social-item">
                                    <img src="<?php echo $img; ?>">
                                </a>

                            <?php endwhile; ?>  
                        </div>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <div class="map-block  wow fadeIn">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2541.113882343448!2d30.49642131510952!3d50.43897939607336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce5102781b5b:0x19d77aa879a12eb9!2sRedcliffe Partners!5e0!3m2!1sen!2sua!4v1603905414674!5m2!1sen!2sua" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    

<?php get_footer(); ?>