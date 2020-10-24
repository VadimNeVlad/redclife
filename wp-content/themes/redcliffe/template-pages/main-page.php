<?php 
/**
 *	Template name: Home Page 
 */

get_header(); ?>
    
    <section class="intro  intro--bg-dark" style="background-image: url(<?php the_field('hp_bg') ?>);">
        <div class="container">

            <?php if (get_field('hp_intro_title')) { ?>
                <span class="intro__panel"><?php the_field('hp_intro_title') ?></span>
            <?php } ?>

            <?php if (get_field('hp_intro_text')) { ?>
                <?php the_field('hp_intro_text') ?>
            <?php } ?>

            <?php if (get_field('hp_intro_btn_text')) { ?>
                <a href="<?php echo esc_url( get_page_link( 143 ) ); ?>" class="intro__link"><?php the_field('hp_intro_btn_text') ?></a>
            <?php } ?>

        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="about__title-content">
                <?php if (get_field('hp_about_title')) { ?>
                    <strong><?php the_field('hp_about_title') ?></strong>
                <?php } ?>

                <?php if (get_field('about_main_title', 143)) { ?>
                    <h2><?php the_field('about_main_title', 143) ?></h2>
                <?php } ?>

            </div>

            <?php if( have_rows('about_benefits_list', 143) ): ?>   
                <div class="about__list">
                    <?php while( have_rows('about_benefits_list', 143) ): the_row(); 
                        $img = get_sub_field('about_benefits_list_img', 143);
                        $text = get_sub_field('about_benefits_list_text', 143);

                        ?>

                        <div class="about__list-item">
                            <div class="about__list-img">
                                <img src="<?php echo $img; ?>" alt="icon">
                            </div>
                            <?php echo $text; ?>
                            <a href="<?php echo esc_url( get_page_link( 143 ) ); ?>"><?php the_field('hp_about_btn_text') ?></a>
                        </div>

                    <?php endwhile; ?>  
                </div>
            <?php endif; ?> 
            
        </div>
    </section>

    <section class="deals">
        <h2>RECENT DEALS</h2>
        <div class="deals__list">
            <a href="#" class="deals__item" style="background-image: url(img/deal-1.jpg);">
                <p><strong>Redcliffe Partners</strong> advised GE Capital on obtaining merger  clearance for the sale of PK AirFinance and its <strong>USD 3.6bn</strong> aviation loan book</p>
                <span class="deals__item-btn">READ MORE</span>
            </a>
            <a href="#" class="deals__item" style="background-image: url(img/deal-2.jpg);">
                <p><strong>Redcliffe Partners</strong> advised the EBDR on risk-sharing arrangements with Piraeus Bank Ukrainee</p>
                <span class="deals__item-btn">READ MORE</span>
            </a>
            <a href="#" class="deals__item" style="background-image: url(img/deal-3.jpg);">
                <p><strong>Redcliffe Partners</strong> contributed to a global pro bono project on human right to a healthy environment</p>
                <span class="deals__item-btn">READ MORE</span>
            </a>
        </div>
    </section>

    <section class="news">
        <h2>LATEST NEWS</h2>
        <div class="news__list">
            <a href="#" class="news__item" style="background-image: url(img/news-1.jpg);">
                <div class="news__item-texts">
                    <h4>NEWSTITLE 01</h4>
                    <p>Redcliffe Partners recovers more than EUR 1.3 million for its client under a Vienna International Arbitral Centre (VIAC) award</p>
                </div>
                <span class="btn">Read more</span>
            </a>
            <a href="#" class="news__item" style="background-image: url(img/news-2.jpg);">
                <div class="news__item-texts">
                    <h4>NEWSTITLE 02</h4>
                    <p>Redcliffe Partners recovers more than EUR 1.3 million for its client under a Vienna International Arbitral Centre (VIAC) award</p>
                </div>
                <span class="btn">Read more</span>
            </a>
            <a href="#" class="news__item" style="background-image: url(img/news-3.jpg);">
                <div class="news__item-texts">
                    <h4>NEWSTITLE 03</h4>
                    <p>Redcliffe Partners recovers more than EUR 1.3 million for its client under a Vienna International Arbitral Centre (VIAC) award</p>
                </div>
                <span class="btn">Read more</span>
            </a>
        </div>
    </section>

<?php get_footer(); ?>