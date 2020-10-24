<?php get_header(); ?>

	<section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php the_field('team_arch_bg', 'options') ?>);">
		<div class="container">
			<?php if (get_field('team_arch_title', 'options')) { ?>
			    <span class="intro__panel"><?php the_field('team_arch_title', 'options') ?></span>
			<?php } ?>

			<?php if (get_field('team_arch_text', 'options')) { ?>
			    <?php the_field('team_arch_text', 'options') ?>
			<?php } ?>
		</div>
	</section>	

	<section class="team">
		<div class="container">

			<?php if (get_field('team_arch_main_title', 'options')) { ?>
				<h2><?php the_field('team_arch_main_title', 'options') ?></h2>
			<?php } ?>

			<div class="team__search">
				<div class="team__search-field">
					<input type="text" name="PRACTICE" placeholder="PRACTICE">
				</div>
				<div class="team__search-field">
					<input type="text" name="INDUSTRY" placeholder="INDUSTRY">
				</div>

				<?php if (get_field('team_arch_btn_search', 'options')) { ?>
					<button class="btn  btn-red"><?php the_field('team_arch_btn_search', 'options') ?></button>
				<?php } ?>

			</div>

			<?php $args = array('post_type' => 'team',
								'posts_per_page' => -1,
								'order' => 'DESC') ?>

			<?php $page_index = new WP_Query($args) ?>

			<div class="team__list">
				<?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

					<div class="team__item-wrap">
						<div class="team__item">
							<div class="team__item-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
							<div class="team__item-content">
								<strong class="team__item-name"><?php echo esc_html( the_title() ); ?></strong>

								<?php if (get_field('team_single_position')) { ?>
								    <span class="team__item-position"><?php the_field('team_single_position') ?></span>
								<?php } ?>
								
								<?php if (get_field('team_single_contact_tel')) { ?>
								    <a class="team__item-info" href="tel:<?php the_field('team_single_contact_tel') ?>"><strong>T:</strong> <?php the_field('team_single_contact_tel') ?></a>
								<?php } ?>

								<?php if (get_field('team_single_contact_email')) { ?>
								    <a class="team__item-info" href="mailto:<?php the_field('team_single_contact_email') ?>"><strong>E:</strong> <?php the_field('team_single_contact_email') ?></a>
								<?php } ?>

								<?php if (get_field('team_arch_btn_profile', 'options')) { ?>
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="team__item-link"><?php the_field('team_arch_btn_profile', 'options') ?></a>
								<?php } ?>
		
								
							</div>
						</div>
					</div>
					
					<?php endwhile; ?>

				<?php endif; ?>	
			</div>	
			<?php wp_reset_postdata(); ?>	

		</div>
	</section>

	<?php get_template_part( 'components/brochure' ); ?>

<?php get_footer(); ?>