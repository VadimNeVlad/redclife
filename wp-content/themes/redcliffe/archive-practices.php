<?php get_header(); ?>

	<section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('practices_bg', 'options') ?>);">
		<div class="container">

			<?php if (get_field('practices_arch_title', 'options')) { ?>
			    <span class="intro__panel"><?php the_field('practices_arch_title', 'options') ?></span>
			<?php } ?>

			<?php if (get_field('practices_arch_text', 'options')) { ?>
			    <?php the_field('practices_arch_text', 'options') ?>
			<?php } ?>

		</div>
	</section>

	<section class="about  about--practices">
		<div class="container-small">

			<?php if (get_field('practices_arch_expertise_title', 'options')) { ?>
				<div class="about__title-content">
					<?php the_field('practices_arch_expertise_title', 'options') ?>
				</div>
			<?php } ?>

			<?php if (get_field('practices_arch_expertise_text', 'options')) { ?>
				<div class="about__info">
					<?php the_field('practices_arch_expertise_text', 'options') ?>
				</div>
			<?php } ?>
			
		</div>
	</section>

	<section class="practices">
		<div class="container">

			<?php if (get_field('practices_arch_cat_title_1', 'options')) { ?>
			    <h2><?php the_field('practices_arch_cat_title_1', 'options') ?></h2>
			<?php } ?>

			<?php $args = array('post_type' => 'practices',
								'posts_per_page' => -1,
								'tax_query' => array(
								    array(
								      'taxonomy' => 'taxonomy',
								      'field'    => 'slug',
								      'terms'    => 'practices'
								    )
								),
								'orderby' => 'title',
								'order' => 'ASC') ?>

			<?php $page_index = new WP_Query($args) ?>

			<div class="items-list">
				<div class="items-list__list">
				<?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

					<div class="items-list__item-wrap">
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="items-list__item"><?php echo esc_html( the_title() ); ?></a>
					</div>
					
					<?php endwhile; ?>
				</div>	

				<?php endif; ?>	
			</div>	
			<?php wp_reset_postdata(); ?>	
			
			<?php if (get_field('practices_arch_cat_title_2', 'options')) { ?>
			   	<h2><?php the_field('practices_arch_cat_title_2', 'options') ?></h2>
			<?php } ?>

			<?php $args = array('post_type' => 'practices',
								'posts_per_page' => -1,
								'tax_query' => array(
								    array(
								      'taxonomy' => 'taxonomy',
								      'field'    => 'slug',
								      'terms'    => 'industries'
								    )
								),
								'orderby' => 'title',
								'order' => 'ASC') ?>

			<?php $page_index = new WP_Query($args) ?>

			<div class="items-list">
				<div class="items-list__list">
				<?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

					<div class="items-list__item-wrap">
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="items-list__item"><?php echo esc_html( the_title() ); ?></a>
					</div>
					
					<?php endwhile; ?>

				<?php endif; ?>	
				</div>
			</div>	
			<?php wp_reset_postdata(); ?>	

		</div>
	</section>

	<?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>