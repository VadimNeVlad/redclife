<?php get_header(); ?>

	<section class="intro  wow fadeIn  intro--inner  intro--center-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<div class="container">

			<?php if (get_field('practice_single_title')) { ?>
			    <span class="intro__panel"><?php the_field('practice_single_title') ?></span>
			<?php } ?>

			<?php if (get_field('practice_single_text')) { ?>
			    <?php the_field('practice_single_text') ?>
			<?php } ?>

		</div>
	</section>

	<section class="content-page  practice-content">
		<div class="container">
			<div class="practice-content__content  tabs-info-js">
				<div class="practice-content__info  wow fadeInLeft">
					<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

					    <h2><?php esc_html( the_title() ) ?></h2>

					<?php endwhile; ?>
					<?php endif; ?> 

					<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

					    <?php esc_html( the_content() ) ?>

					<?php endwhile; ?>
					<?php endif; ?> 

					<?php $tabs = get_field('practice_single_tab'); ?>

					<?php if ( $tabs ) : ?>
					    <div class="team-content__tabs-nav  tabs-js">
					        <?php foreach ($tabs as $i => $tab) : ?>
					            <div class="team-content__tabs-item  <?php echo ($i == 0) ? 'active' : ''; ?>">

					                <?php echo $tab['practice_single_tab_title']; ?>

					            </div>

					        <?php endforeach ?>
					    </div>

					<?php endif; ?>

					<div class="team-content__tabs-wrap-content">
						<div class="team-content__tabs-content  tabs-list-js active">

							<?php if( have_rows('practice_single_tab_rep') ): ?>   
							    <div class="practice-content__reviews">
							        <?php while( have_rows('practice_single_tab_rep') ): the_row(); 
							            $text = get_sub_field('practice_single_tab_rep_title');

							            ?>

							            <div class="practice-content__review-item">
							            	<?php echo $text; ?>
							            </div>

							        <?php endwhile; ?>  
							    </div>
							<?php endif; ?> 

						</div>
						<div class="team-content__tabs-content  tabs-list-js">
							<?php
							    $tag = get_queried_object();
							?>


							<?php $args = array('post_type' => 'post',
							                    'posts_per_page' => 15,
							                    'category_name' => 'projects',
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
						<div class="team-content__tabs-content  tabs-list-js">

							<?php
							    $tag = get_queried_object();
							?>

							<?php $args = array('post_type' => 'post',
							                    'posts_per_page' => 15,
							                    'category_name' => 'publications',
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
						<div class="team-content__tabs-content  tabs-list-js">

							<?php if( have_rows('brochure_list') ): ?>   
							    <div class="team-content__tab-brochure-list">
							        <?php while( have_rows('brochure_list') ): the_row(); 
							            $img = get_sub_field('brochure_list_img');
							            $text = get_sub_field('brochure_list_title');
							            $file = get_sub_field('brochure_list_file');

							            ?>

							            <div class="team-content__tab-brochure-wrap">
							            	<a href="<?php echo $file; ?>" class="team-content__tab-brochure-item" download>
							            		<div class="team-content__tab-brochure-img" style="background-image: url(<?php echo $img; ?>);"></div>
							            		<p><?php echo $text; ?></p>
							            	</a>
							            </div>

							        <?php endwhile; ?>  
							    </div>
							<?php endif; ?> 
							
						</div>
					</div>
				</div>

				<?php
					$term = wp_get_post_terms( $post->ID, 'taxonomy' );
				?>


				<?php $args = array('post_type' => 'practices',
									'posts_per_page' => -1,
									'orderby' => 'title',
									'tax_query' => array(
									    array(
									      'taxonomy' => 'taxonomy',
									      'field'    => 'slug',
									      'terms'    => $term[0]->slug
									    )
									),
									'order' => 'ASC') ?>

				<?php $page_index = new WP_Query($args) ?>

				<div class="practice-content__sidebars">
					<?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

						<div class="items-list  wow fadeInUp" data-wow-delay=".3s">
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="items-list__item"><?php echo esc_html( the_title() ); ?></a>
						</div>
						
						<?php endwhile; ?>

					<?php endif; ?>	
				</div>	
				<?php wp_reset_postdata(); ?>	
			</div>
		</div>
	</section>

	<?php get_template_part( 'components/brochure' ); ?>
	


<?php get_footer(); ?>