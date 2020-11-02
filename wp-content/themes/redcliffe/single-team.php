<?php get_header(); ?>

    <section class="team-intro  wow fadeIn" style="background-image: url(<?php the_field('team_single_bg') ?>);">
        <div class="container">

            <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

                <h1><?php esc_html( the_title() ) ?></h1>

            <?php endwhile; ?>
            <?php endif; ?> 

            <?php if (get_field('team_single_position')) { ?>
                <p class="team-intro__position"><?php the_field('team_single_position') ?></p>
            <?php } ?>

        </div>
    </section>

    <section class="content-page  team-content">
        <div class="container">
            <div class="team-content__content  tabs-info-js">
                <div class="team-content__info  wow fadeInLeft">
                    <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

                        <?php esc_html( the_content() ) ?>

                    <?php endwhile; ?>
                    <?php endif; ?> 

                    <?php $tabs = get_field('team_single_tab_list'); ?>

                    <?php if ( $tabs ) : ?>
                        <div class="team-content__tabs-nav  tabs-js">
                            <?php foreach ($tabs as $i => $tab) : ?>
                                <div class="team-content__tabs-item  <?php echo ($i == 0) ? 'active' : ''; ?>">

                                    <?php echo $tab['team_single_tab_list_title']; ?>

                                </div>

                            <?php endforeach ?>
                        </div>

                    <?php endif; ?>

                    <div class="team-content__tabs-wrap-content">
                        <div class="team-content__tabs-content  tabs-list-js active">

                            <?php if( have_rows('team_single_tab-content') ): ?>   
                                <?php while( have_rows('team_single_tab-content') ): the_row(); 
                                    $text = get_sub_field('team_single_tab_text');

                                    ?>

                                    <?php echo $text; ?>

                                <?php endwhile; ?>  
                            <?php endif; ?> 

                        </div>
                        <div class="team-content__tabs-content  tabs-list-js">
                            <?php
                                $tag = get_queried_object();
                            ?>


                            <?php $args = array('post_type' => 'post',
                                                'posts_per_page' => 15,
                                                'tag' => $tag->post_name,
                                                'order' => 'DESC') ?>

                            <?php $page_index = new WP_Query($args) ?>

                            <div class="news-content__recent-list">
                            
                            <?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="news-content__recent-item">
                                    <div class="news-content__recent-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
                                    <div class="news-content__recent-info">
                                        <p><?php esc_html( the_title() ) ?></p>
                                        <span class="news-content__recent-date"><?php esc_html( the_date('F j Y') ) ?></span>
                                    </div>
                                </a>
                                
                                <?php endwhile; ?>

                            <?php endif; ?> 

                            </div>

                            <?php wp_reset_postdata(); ?>   
                        </div>
                    </div>
                </div>
                <div class="team-content__sidebars">
                    <div class="team-content__sidebar  team-content__sidebar--contacts  wow fadeInUp">

                        <?php if (get_field('team_single_contact_title')) { ?>
                            <h4><?php the_field('team_single_contact_title') ?></h4>
                        <?php } ?>

                        <?php if (get_field('team_single_contact_tel')) { ?>
                            <p><a class="s-tel" href="tel:<?php the_field('team_single_contact_tel') ?>"><?php the_field('team_single_contact_tel') ?></a></p>
                        <?php } ?>

                        <?php if (get_field('team_single_contact_email')) { ?>
                            <p><a class="s-mail" href="mailto:<?php the_field('team_single_contact_email') ?>"><?php the_field('team_single_contact_email') ?></a></p>
                        <?php } ?>

                        <?php if (get_field('team_single_contact_linkedin')) { ?>
                            <p><a class="s-linkedin" href="<?php the_field('team_single_contact_linkedin') ?>" target="_blank"><?php the_field('team_single_contact_linkedin') ?></a></p>
                        <?php } ?>

                    </div>

                    <?php if (get_field('team_single_career_text')) { ?>
                        <div class="team-content__sidebar  wow fadeInUp">

                            <?php if (get_field('team_single_career_title')) { ?>
                                <h4><?php the_field('team_single_career_title') ?></h4>
                            <?php } ?>

                            <?php the_field('team_single_career_text') ?>

                        </div>
                    <?php } ?>

                    <?php if (get_field('team_single_quality_text')) { ?>
                        <div class="team-content__sidebar  team-content__sidebar--reputation  wow fadeInUp">

                            <?php if (get_field('team_single_quality_titile')) { ?>
                                <h4><?php the_field('team_single_quality_titile') ?></h4>
                            <?php } ?>

                            <?php the_field('team_single_quality_text') ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>