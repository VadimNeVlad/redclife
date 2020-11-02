<?php get_header(); ?>

	<section class="intro  wow fadeIn  intro--inner  intro--center-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<div class="container">

			<?php if (get_field('careers_single_subtitle')) { ?>
			    <span class="intro__panel"><?php the_field('careers_single_subtitle') ?></span>
			<?php } ?>

			<?php if (get_field('careers_single_title')) { ?>
			    <?php the_field('careers_single_title') ?>
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
					
				</div>

				<?php $args = array('post_type' => 'careers',
								'posts_per_page' => -1,
								'order' => 'DESC') ?>

				<?php $page_index = new WP_Query($args) ?>

				<div class="practice-content__sidebars">
					<div class="items-list  items-list--height-auto">

					<?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

						<a href="<?php echo esc_url( get_permalink() ); ?>" class="items-list__item wow fadeInUp"><?php echo esc_html( the_title() ); ?></a>
						
						<?php endwhile; ?>

					<?php endif; ?>	
					</div>
				</div>	
				<?php wp_reset_postdata(); ?>	

			</div>
		</div>
	</section>

	<?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>