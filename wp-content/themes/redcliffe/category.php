
<?php get_header(); ?>

    <div class="intro  intro--inner  intro--inner-small">
        <div class="container">
            <h1><h1><?php _e('Blog', 'itcamp'); ?></h1></h1>
        </div>
    </div>
    </div>


    <?php
    $current_category_id = get_queried_object()->term_id;

    $posts_cats_args = array(
        'taxonomy' => 'category',
        'hide_empty' => true
    );
    $posts_cats = get_terms($posts_cats_args);
    ?>

    <?php if ($posts_cats) { ?>
        <div class="posts-categories">
            <div class="container">
                <div class="posts-inner__nav-panel">
                    <div class="posts-inner__nav-list">
                        <a href="<?php echo esc_url( get_page_link(621) ) ?>" class="posts-inner__navigation-item"><?php _e('All', 'itcamp'); ?></a>

                        <?php foreach ($posts_cats as $posts_cat) { ?>
                            <a href="<?php echo esc_url( get_term_link( $posts_cat ) ) ?>" class="posts-inner__navigation-item <?php if ($posts_cat->term_id == $current_category_id) echo ' active' ?>"><?php echo $posts_cat->name; ?></a>
	                    <? } ?>
                    </div>

                    <?php get_search_form(); ?>

                </div>
            </div>
        </div>
    <?php } ?>



<?php $args = array('post_type' => 'post',
                    'posts_per_page' => -1,
                    'cat' => $current_category_id,
                    'order' => 'DESC') ?>

<?php $page_index = new WP_Query($args) ?>

    <section class="posts-inner">
        <div class="container">
            <div class="posts__list">

				<?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

                    <div class="posts__item-wrap">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="posts__item">
                            <div class="posts__item-img" style="background-image: url(<?php the_field('blog_main_img') ?>);">

								<?php
								$cats = get_the_category();
								for ($i = 0; $i < count($cats); $i++) {
								    if ($i > 0) break;
									echo '<span class="posts__category">' . $cats[ $i ]->cat_name . '</span>';
								}?>

                            </div>
                            <div class="posts__item-info">
                                <h4><?php echo esc_html( the_title() ); ?></h4>
								<?php echo esc_html( the_excerpt() ); ?>
                            </div>
                            <div class="posts__item-arrow">
                                <span class="posts__item-arrow-text">read more</span>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/post-arr.svg">
                            </div>
                        </a>
                    </div>

				<?php endwhile; ?>

				<?php endif; ?>

            </div>
        </div>
    </section>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>