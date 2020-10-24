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
						<span class="news-content__date"><?php esc_html( the_date('F j, Y') ) ?></span>

						<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

						    <h2><?php esc_html( the_title() ) ?></h2>

						<?php endwhile; ?>
						<?php endif; ?> 

						<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

						    <?php esc_html( the_content() ) ?>

						<?php endwhile; ?>
						<?php endif; ?> 

					</div>
				</div>
				<div class="practice-content__sidebars">
					<div class="items-list">
						<a href="#" class="items-list__item">NEWS</a>
						<a href="#" class="items-list__item">PROJECTS</a>
						<a href="#" class="items-list__item">PUBLICATIONS</a>
						<a href="#" class="items-list__item">EVENTS</a>
					</div>
					<div class="team-content__sidebar  news-content__recent">
						<h4>RECENT POSTS</h4>
						<div class="news-content__recent-list">
							<a href="#" class="news-content__recent-item">
								<div class="news-content__recent-img" style="background-image: url(img/nr-1.jpg);"></div>
								<div class="news-content__recent-info">
									<p>Feed-in tariff mechanism for renewables restructured in Ukraine</p>
									<span class="news-content__recent-date">22 July 2020</span>
								</div>
							</a>
							<a href="#" class="news-content__recent-item">
								<div class="news-content__recent-img" style="background-image: url(img/nr-1.jpg);"></div>
								<div class="news-content__recent-info">
									<p>New anti-raiding security mechanisms are now available</p>
									<span class="news-content__recent-date">27 July 2020</span>
								</div>
							</a>
							<a href="#" class="news-content__recent-item">
								<div class="news-content__recent-img" style="background-image: url(img/nr-1.jpg);"></div>
								<div class="news-content__recent-info">
									<p>The Memorandum on the reduction of the feed-in tariff signed by the Government and renewable energy industry associations</p>
									<span class="news-content__recent-date">22 July 2020</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>