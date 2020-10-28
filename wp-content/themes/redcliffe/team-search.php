<?php get_header(); ?>
    
    <section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('team_arch_bg', 347) ?>);">
        <div class="container">
            <?php if (get_field('team_arch_title', 347)) { ?>
                <span class="intro__panel"><?php the_field('team_arch_title', 347) ?></span>
            <?php } ?>

            <?php if (get_field('team_arch_text', 347)) { ?>
                <?php the_field('team_arch_text', 347) ?>
            <?php } ?>
        </div>
    </section>  

    <section class="team">
        <div class="container">

            <?php if (get_field('team_arch_main_title')) { ?>
                <h2><?php the_field('team_arch_main_title') ?></h2>
            <?php } ?>

            <?php
                global $query_string;
                $query_args = explode("&", $query_string);
                $search_query = array('post_type' => 'team',
                                    'posts_per_page' => -1,
                                    'order' => 'DESC');

                foreach($query_args as $key => $string) {
                  $query_split = explode("=", $string);
                  $search_query[$query_split[0]] = urldecode($query_split[1]);
                } // foreach

                $page_index = new WP_Query($search_query);
                if ( $page_index->have_posts() && get_search_query() ) : 
                ?>

                <div class="team__list">
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
                    
                                
                            </div>
                        </div>
                    </div>
                </div>  
                <?php wp_reset_postdata(); ?>   <!-- the loop -->


            <?php else : ?>

                <h2 class="search-title-nofound"><?php the_field('search_result_nofound_text', 'options') ?></h2>

            <?php endif; ?>

        </div>
    </section>

    <?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>