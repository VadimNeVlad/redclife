<?php get_header(); ?>
    
    <section class="intro  wow fadeIn  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('team_arch_bg', 347) ?>);">
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
                <h2 class="wow fadeInLeft"><?php the_field('team_arch_main_title') ?></h2>
            <?php } ?>

            <form class="team__search  wow zoomIn" data-wow-delay=".3s" role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform2">
                <?php $args = array('post_type' => 'practices',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                          'taxonomy' => 'taxonomy',
                                          'field'    => 'slug',
                                          'terms'    => 'practices'
                                        )
                                    ),
                                    'orderby' => 'title',
                                    'order' => 'ASC') ?>

                <?php $page_index = new WP_Query($args) ?>

                <div class="team__search-field">
                    <select class="team__search-select  select-practices">
                    <?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                            <option value="" selected hidden><?php the_field('practices_arch_cat_title_1', 355) ?></option>
                            <option value="<?php echo esc_html( the_title() ); ?>"><?php echo esc_html( the_title() ); ?></option>
                        
                        <?php endwhile; ?>

                    <?php endif; ?> 
                    </select>
                </div>  
                <?php wp_reset_postdata(); ?>   

                <?php $args = array('post_type' => 'practices',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                          'taxonomy' => 'taxonomy',
                                          'field'    => 'slug',
                                          'terms'    => 'industries'
                                        )
                                    ),
                                    'orderby' => 'title',
                                    'order' => 'ASC') ?>

                <?php $page_index = new WP_Query($args) ?>

                <div class="team__search-field">
                    <select class="team__search-select  select-industries">
                    <?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                            <option value="" selected hidden><?php the_field('practices_arch_cat_title_2', 355) ?></option>
                            <option value="<?php echo esc_html( the_title() ); ?>"><?php echo esc_html( the_title() ); ?></option>
                        
                        <?php endwhile; ?>

                    <?php endif; ?> 
                    </select>
                </div>  
                <?php wp_reset_postdata(); ?> 

                <input type="hidden" class="search-hiden-input" name="s" type="text">
                <input type="hidden" name="post_type" value="team" /> <!-- // hidden 'products' value -->

               <?php if (get_field('team_arch_btn_search', 347)) { ?>
                   <button class="btn  btn-red"><?php the_field('team_arch_btn_search', 347) ?></button>
               <?php } ?>
            </form>

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
                    <?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                    <div class="team__item-wrap">
                        <div class="team__item  wow fadeInUp" data-wow-delay=".3s">
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
                <?php wp_reset_postdata(); ?>   <!-- the loop -->

            <?php else : ?>

                <h2 class="search-title-nofound"><?php the_field('search_result_nofound_text', 'options') ?></h2>

            <?php endif; ?>

        </div>
    </section>

    <?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>