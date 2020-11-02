
<?php get_header(); ?>

    <section class="intro  wow fadeIn  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('news_arch_bg', 277) ?>);">
        <div class="container">

            <?php if (get_field('news_arch_subtitle', 277)) { ?>
                <span class="intro__panel"><?php the_field('news_arch_subtitle', 277) ?></span>
            <?php } ?>

            <?php if (get_field('news_arch_title', 277)) { ?>
                <?php the_field('news_arch_title', 277) ?>
            <?php } ?>

        </div>
    </section>


    <?php
    $current_category_id = get_queried_object()->term_id;

    $posts_cats_args = array(
        'taxonomy' => 'category',
        'hide_empty' => true
    );
    $posts_cats = get_terms($posts_cats_args);
    ?>

    <section class="content-page  news-content">
        <div class="container">
            <div class="practice-content__content  tabs-info-js">
                <div class="practice-content__info">

                    <?php $paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1; ?>

                    <?php $args = array('post_type' => 'post',
                                        'posts_per_page' => 10,
                                        'cat' => $current_category_id,
                                        'paged' => $paged,
                                        'order' => 'DESC') ?>

                    <?php $page_index = new WP_Query($args) ?>

                    <div class="news-content__news-list">
                        
                        <?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="news-content__news-item  wow fadeInLeft">
                                <?php if ((get_the_post_thumbnail_url())) { ?>
                                    <div class="news-content__item-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
                                <?php } ?>
                                <div class="news-content__info-wrap">
                                    <span class="news-content__date"><?php esc_html( the_time('F j, Y') ) ?></span>
                                    <h3><?php esc_html( the_title() ) ?></h3>

                                    <?php if (get_field('news_single_author')) { ?>
                                        <p class="news-content__description"><?php the_field('news_single_author') ?></p>
                                    <?php } ?>

                                    <?php esc_html( the_excerpt() ) ?>

                                    <?php if (get_field('news_arch_btn_name', 277)) { ?>
                                        <span class="careers__item-read-more"><?php the_field('news_arch_btn_name', 277) ?></span>
                                    <?php } ?>
                                    
                                </div>
                            </a>
                            
                            <?php endwhile; ?>

                        <?php endif; ?> 

                    </div>

                    <div class="pagination  wow fadeInUp">
                        <div class="pagination__links">
                            <?php if ($page_index->max_num_pages > 1) : // custom pagination  ?>
                                <?php
                                  $orig_query = $wp_query; // fix for pagination to work
                                  $wp_query = $page_index;
                                  $big = 999999999;
                                  paginate_links(array(
                                      'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                                      'format' => '?paged=%#%',
                                      'current' => max(1, get_query_var('paged')),
                                      'total' => $wp_query->max_num_pages
                                  )); 

                                  echo paginate_links();   

                                  $wp_query = $orig_query; // fix for pagination to work
                                ?>

                            <?php endif; ?>
                        </div>
                    </div>

                    <?php wp_reset_postdata(); ?>

                </div>
                <div class="practice-content__sidebars  wow fadeInUp"  data-wow-delay=".3s">

                        <?php
                        $posts_cats_args = array(
                            'taxonomy' => 'category',
                            'hide_empty' => true
                        );
                        $posts_cats = get_terms($posts_cats_args);
                        ?>

                        <?php if ($posts_cats) { ?>
                            <div class="items-list">

                                <?php foreach ($posts_cats as $posts_cat) { ?>
                                    <a href="<?php echo esc_url( get_term_link( $posts_cat ) ) ?>" class="items-list__item"><?php echo $posts_cat->name; ?></a>
                                <? } ?>

                            </div>

                           
                        <?php } ?>

                    <div class="team-content__sidebar  news-content__recent">

                        <?php if (get_field('news_arch_recent')) { ?>
                            <h4><?php the_field('news_arch_recent') ?></h4>
                        <?php } ?>

                        <?php $args = array('post_type' => 'post',
                                            'posts_per_page' => 6,
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
        </div>
    </section>

<?php get_footer(); ?>