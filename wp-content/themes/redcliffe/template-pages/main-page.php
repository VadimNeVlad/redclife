<?php 
/**
 *	Template name: Home Page 
 */

get_header(); ?>
    
    <section class="intro  intro--homepage  intro--inner wow fadeIn " style="background-image: url(<?php the_field('hp_bg') ?>);">
        <div class="container">

            <?php if (get_field('hp_intro_title')) { ?>
                <span class="intro__panel"><?php the_field('hp_intro_title') ?></span>
            <?php } ?>

            <?php if (get_field('hp_intro_text')) { ?>
                <?php the_field('hp_intro_text') ?>
            <?php } ?>

            <?php if (get_field('hp_intro_btn_text')) { ?>
                <a href="<?php the_field('hp_intro_btn_url') ?>" class="intro__link"><?php the_field('hp_intro_btn_text') ?></a>
            <?php } ?>

        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="about__title-content wow fadeInLeft">
                <?php if (get_field('hp_about_title')) { ?>
                    <strong><?php the_field('hp_about_title') ?></strong>
                <?php } ?>

                <?php if (get_field('about_main_title', 143)) { ?>
                    <h2><?php the_field('about_main_title', 143) ?></h2>
                <?php } ?>

            </div>

            <?php if( have_rows('about_benefits_list', 143) ): ?>   
                <div class="about__list  wow fadeInUp" data-wow-delay=".3s">
                    <?php while( have_rows('about_benefits_list', 143) ): the_row(); 
                        $img = get_sub_field('about_benefits_list_img', 143);
                        $text = get_sub_field('about_benefits_list_text', 143);
                        $link = get_sub_field('about_benefits_list_link', 143);

                        ?>

                        <div class="about__list-item">
                            <div class="about__list-img">
                                <img src="<?php echo $img; ?>" alt="icon">
                            </div>
                            <?php echo $text; ?>

                            <?php if ($link) { ?>
                                <a href="<?php echo $link; ?>"><?php the_field('hp_about_btn_text') ?></a>
                            <?php } ?>
                            
                        </div>

                    <?php endwhile; ?>  
                </div>
            <?php endif; ?> 
            
        </div>
    </section>

    <section class="deals">

        <?php if (get_field('deals_main_title')) { ?>
            <h2 class="wow fadeInLeft"><?php the_field('deals_main_title') ?></h2>
        <?php } ?>

        <?php $args = array('post_type' => 'post',
                            'posts_per_page' => 3,
                            'category_name' => 'projects',
                            'order' => 'DESC') ?>

        <?php $page_index = new WP_Query($args) ?>

        <div class="deals__list  wow fadeInUp" data-wow-delay=".3s">
            
            <?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                <a href="<?php echo esc_url( get_permalink() ); ?>" class="deals__item" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                    <p><?php esc_html( the_title() ) ?></p>
                    <span class="deals__item-btn"><?php the_field('deals_btn_text', 19) ?></span>
                </a>
                
                <?php endwhile; ?>

            <?php endif; ?> 

        </div>

        <?php wp_reset_postdata(); ?>

    </section>

    <section class="news">
        
        <?php if (get_field('news_main_title')) { ?>
            <h2 class="wow fadeInLeft"><?php the_field('news_main_title') ?></h2>
        <?php } ?>

        <?php $args = array('post_type' => 'post',
                            'posts_per_page' => 3,
                            'category_name' => 'news',
                            'order' => 'DESC') ?>

        <?php $page_index = new WP_Query($args) ?>

        <div class="news__list  wow fadeInUp" data-wow-delay=".3s">
            
            <?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                <a href="<?php echo esc_url( get_permalink() ); ?>" class="news__item" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                    <div class="news__item-texts">
                        <h4><?php esc_html( the_title() ) ?></h4>
                        <p><?php echo wp_trim_words( get_the_content(), 20); ?></p>
                    </div>
                    <span class="btn"><?php the_field('news_btn_text', 19) ?></span>
                </a>
                
                <?php endwhile; ?>

            <?php endif; ?> 

        </div>

        <?php wp_reset_postdata(); ?>

    </section>

<?php get_footer(); ?>