<?php get_header(); ?>

	<section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('careers_arch_bg', 'options') ?>);">
		<div class="container">

			<?php if (get_field('careers_arch_subtitle', 'options')) { ?>
			    <span class="intro__panel"><?php the_field('careers_arch_subtitle', 'options') ?></span>
			<?php } ?>

			<?php if (get_field('careers_arch_title', 'options')) { ?>
			    <?php the_field('careers_arch_title', 'options') ?>
			<?php } ?>

		</div>
	</section>

	<section class="about  about--careers">
		<div class="container-small">

			<?php if (get_field('careers_arch_about_title', 'options')) { ?>
				<div class="about__title-content">
					<?php the_field('careers_arch_about_title', 'options') ?>
				</div>
			<?php } ?>

			<?php if (get_field('careers_arch_about_text', 'options')) { ?>
				<div class="about__info">
					<?php the_field('careers_arch_about_text', 'options') ?>
				</div>
			<?php } ?>

		</div>
	</section>

	<section class="careers">
		<div class="container">

			<?php if (get_field('careers_arch_main_title', 'options')) { ?>
				<h2><?php the_field('careers_arch_main_title', 'options') ?></h2>
			<?php } ?>

			<?php $args = array('post_type' => 'careers',
								'posts_per_page' => -1,
								'order' => 'DESC') ?>

			<?php $page_index = new WP_Query($args) ?>

			<div class="careers__list">
				<?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

					<div class="careers__item-wrap">
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="careers__item">
							<h4><?php echo esc_html( the_title() ); ?></h4>

							<?php if (get_field('careers_arch_btn_title', 'options')) { ?>
								<span class="careers__item-read-more"><?php the_field('careers_arch_btn_title', 'options') ?></span>
							<?php } ?>
						</a>
					</div>
					
					<?php endwhile; ?>

				<?php endif; ?>	
			</div>	
			<?php wp_reset_postdata(); ?>	
	
		</div>
	</section>

	<?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>