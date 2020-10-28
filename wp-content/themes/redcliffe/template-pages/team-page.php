<?php 
/**
 *	Template name: Team Page 
 */

get_header(); ?>
    
    <section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('team_arch_bg') ?>);">
        <div class="container">
            <?php if (get_field('team_arch_title')) { ?>
                <span class="intro__panel"><?php the_field('team_arch_title') ?></span>
            <?php } ?>

            <?php if (get_field('team_arch_text')) { ?>
                <?php the_field('team_arch_text') ?>
            <?php } ?>
        </div>
    </section>  

    <section class="team">
        <div class="container">

            <?php if (get_field('team_arch_main_title')) { ?>
                <h2><?php the_field('team_arch_main_title') ?></h2>
            <?php } ?>

            <form class="team__search" role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                <div class="team__search-field">
                    <input type="text" name="s" placeholder="PRACTICES" />
                </div>
               <input type="hidden" name="post_type" value="team" /> <!-- // hidden 'products' value -->

               <?php if (get_field('team_arch_btn_search')) { ?>
                   <button class="btn  btn-red"><?php the_field('team_arch_btn_search') ?></button>
               <?php } ?>
            </form>

            <?php $args = array('post_type' => 'team',
                                'posts_per_page' => -1,
                                'order' => 'DESC') ?>

            <?php $page_index = new WP_Query($args) ?>

            <div class="team__list">
                <?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                    <div class="team__item-wrap">
                        <div class="team__item">
                            <div class="team__item-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
                            <div class="team__item-content">
                                <strong class="team__item-name"><?php echo esc_html( the_title() ); ?></strong>

                                <?php if (get_field('team_single_position')) { ?>
                                    <span class="team__item-position"><?php the_field('team_single_position') ?></span>
                                <?php } ?>
                                
                                <?php if (get_field('team_single_contact_tel')) { ?>
                                    <a class="team__item-info" href="tel:<?php the_field('team_single_contact_tel') ?>"><strong>T:</strong> <?php the_field('team_single_contact_tel') ?></a>
                                <?php } ?>

                                <?php if (get_field('team_single_contact_email')) { ?>
                                    <a class="team__item-info" href="mailto:<?php the_field('team_single_contact_email') ?>"><strong>E:</strong> <?php the_field('team_single_contact_email') ?></a>
                                <?php } ?>

                                <?php if (get_field('team_arch_btn_profile', 347)) { ?>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="team__item-link"><?php the_field('team_arch_btn_profile', 347) ?></a>
                                <?php } ?>

                                <?php if (get_field('team_single_practice_text')) { ?>
                                    <span class="team__item-career-hiden"><?php the_field('team_single_practice_text') ?></span>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    
                    <?php endwhile; ?>

                <?php endif; ?> 
            </div>  
            <?php wp_reset_postdata(); ?>   

        </div>
    </section>

    <?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>