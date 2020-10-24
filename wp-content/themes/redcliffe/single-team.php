<?php get_header(); ?>

    <section class="team-intro" style="background-image: url(<?php the_field('team_single_bg') ?>);">
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
                <div class="team-content__info">
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


                    <?php $tabs = get_field('team_single_tab-content'); ?>

                    <?php if ( $tabs ) : ?>
                        <div class="team-content__tabs-wrap-content">
                            <?php foreach ($tabs as $i => $tab) : ?>
                                <div class="team-content__tabs-content  tabs-list-js  <?php echo ($i == 0) ? 'active' : ''; ?>">

                                    <?php echo $tab['team_single_tab_text']; ?>

                                </div>

                            <?php endforeach ?>
                        </div>

                    <?php endif; ?>
    
                </div>
                <div class="team-content__sidebars">
                    <div class="team-content__sidebar  team-content__sidebar--contacts">

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
                        <div class="team-content__sidebar">

                            <?php if (get_field('team_single_career_title')) { ?>
                                <h4><?php the_field('team_single_career_title') ?></h4>
                            <?php } ?>

                            <?php the_field('team_single_career_text') ?>

                        </div>
                    <?php } ?>

                    <?php if (get_field('team_single_quality_text')) { ?>
                        <div class="team-content__sidebar  team-content__sidebar--reputation">

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