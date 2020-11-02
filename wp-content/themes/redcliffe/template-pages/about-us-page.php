<?php 
/**
 *	Template name: About Page 
 */

get_header(); ?>
    
    <section class="intro  wow fadeIn  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('about_bg') ?>);">
        <div class="container">

            <?php if (get_field('about_subtitle')) { ?>
                <span class="intro__panel"><?php the_field('about_subtitle') ?></span>
            <?php } ?>

            <?php if (get_field('about_title')) { ?>
                <?php the_field('about_title') ?>
            <?php } ?>

        </div>
    </section>

    <section class="about  about--inner">
        <div class="container">

            <?php if (get_field('about_main_title')) { ?>
                <h2 class="wow fadeInLeft"><?php the_field('about_main_title') ?></h2>
            <?php } ?>

            <?php if( have_rows('about_benefits_list') ): ?>   
                <div class="about__list  wow fadeInUp"  data-wow-delay=".3s">
                    <?php while( have_rows('about_benefits_list') ): the_row(); 
                        $img = get_sub_field('about_benefits_list_img');
                        $text = get_sub_field('about_benefits_list_text');

                        ?>

                        <div class="about__list-item">
                            <div class="about__list-img">
                                <img src="<?php echo $img; ?>" alt="icon">
                            </div>
                            <?php echo $text; ?>
                        </div>

                    <?php endwhile; ?>  
                </div>
            <?php endif; ?> 
        </div>
    </section>

    <section class="reputation">
        <div class="container">
            
            <?php if (get_field('about_rep_title')) { ?>
                <h2 class="wow fadeInLeft"><?php the_field('about_rep_title') ?></h2>
            <?php } ?>

            <?php if( have_rows('about_rep_list') ): ?>   
                <div class="reputation__list">
                    <?php while( have_rows('about_rep_list') ): the_row(); 
                        $img = get_sub_field('about_rep_item_img');
                        $quote = get_sub_field('about_rep_quote');
                        $text = get_sub_field('about_rep_item_text');

                        ?>

                        <div class="reputation__item-wrap  wow fadeInUp"  data-wow-delay=".3s">
                            <div class="reputation__item" style="background-image: url(<?php echo $img; ?>);">
                                <em><?php echo $quote; ?></em>
                                <div class="reputation__item-titles">
                                    <?php echo $text; ?>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>  

                </div>
            <?php endif; ?> 
        </div>
    </section>

    <?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>