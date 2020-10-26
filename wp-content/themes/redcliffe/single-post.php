<?php get_header(); ?>
	
	<section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('news_single_bg') ?>);">
		<div class="container">

			<?php if (get_field('news_single_subtitle')) { ?>
			    <span class="intro__panel"><?php the_field('news_single_subtitle') ?></span>
			<?php } ?>

			<?php if (get_field('news_single_title')) { ?>
			    <?php the_field('news_single_title') ?>
			<?php } ?>

		</div>
	</section>

	<section class="content-page  news-content--single  news-content">
		<div class="container">
			<div class="practice-content__content  tabs-info-js">
				<div class="practice-content__info">
					<div class="news-content__news-list">
						<div class="news-content__item-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
						<span class="news-content__date"><?php esc_html( the_time('F j, Y') ) ?></span>

						<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

						    <h2><?php esc_html( the_title() ) ?></h2>

						<?php endwhile; ?>
						<?php endif; ?> 

						<?php if (get_field('news_single_author')) { ?>
							<p class="news-content__description"><?php the_field('news_single_author') ?></p>
						<?php } ?>

						<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

						    <?php esc_html( the_content() ) ?>

						<?php endwhile; ?>
						<?php endif; ?> 

					</div>
				</div>
				<div class="practice-content__sidebars">

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