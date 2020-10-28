<?php get_header(); ?>

	<section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
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
				<div class="practice-content__info">
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
							<p>For the twelfth consecutive year he is named as an outstanding practitioner in Banking & Finance, Debt & Equity, Capital Markets and Project Finance and Development practices, according to Best Lawyers 2021, and received the “Lawyer of the Year” award for Ukraine in the Banking and Finance Law category. Olexiy is also recommended in Banking - Finance  and Project Finance categories in Who's Who Legal 2020 edition as "a very impressive lawyer" who is "well-known and praised for his experience in financing transactions".</p>
							<p>Olexiy was featured as a Leading Individual for Debt Restructuring and Banking & Finance by Ukrainian Law Firms. A Handbook for Foreign Clients 2019. He is also ranked amongst practice leaders in Banking & Finance, Debt Restructuring and ranked in the top 100 Ukrainian lawyers according to Client Choice. Top-100 Best Lawyers of Ukraine 2019.</p>
						</div>
						<div class="team-content__tabs-content  tabs-list-js">
							<div class="practice-content__reviews">
								<div class="practice-content__review-item">
									<p>Ranked in Competition. "Newly promoted partner Anastasia Usova leads the practice at Redcliffe Partners, which handles complex competition matters relating to abuse of dominance, cartels, commercial and pricing practices, and distribution agreements, as well as merger control filings in the CIS and the EU."</p>
									<span>The Legal 500 2020</span>
								</div>
								<div class="practice-content__review-item">
									<p>Top-3 law firm by both number and value of public deals in Antitrust</p>
									<span>Top-50 Law Firms in Ukraine</span>
								</div>
								<div class="practice-content__review-item">
									<p>Recommended among Top-3 in Competition</p>
									<span>The Market Leaders 2019</span>
								</div>
								<div class="practice-content__review-item">
									<p>Ranked as an Established Practice in Antitrust and Competition</p>
									<span>The Ukrainian Law Firms 2019</span>
								</div>
							</div>
						</div>
						<div class="team-content__tabs-content  tabs-list-js">
							<p>For the twelfth consecutive year he is named as an outstanding practitioner in Banking & Finance, Debt & Equity, Capital Markets and Project Finance and Development practices, according to Best Lawyers 2021, and received the “Lawyer of the Year” award for Ukraine in the Banking and Finance Law category. Olexiy is also recommended in Banking - Finance  and Project Finance categories in Who's Who Legal 2020 edition as "a very impressive lawyer" who is "well-known and praised for his experience in financing transactions".</p>
							<p>Olexiy was featured as a Leading Individual for Debt Restructuring and Banking & Finance by Ukrainian Law Firms. A Handbook for Foreign Clients 2019. He is also ranked amongst practice leaders in Banking & Finance, Debt Restructuring and ranked in the top 100 Ukrainian lawyers according to Client Choice. Top-100 Best Lawyers of Ukraine 2019.</p>
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

						<div class="items-list">
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