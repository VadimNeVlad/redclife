<?php 
/**
 *	Template name: News Page 
 */

get_header(); ?>
    
    <section class="intro  intro--inner  intro--center-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
    	<div class="container">

    		<?php if (get_field('news_arch_subtitle')) { ?>
    		    <span class="intro__panel"><?php the_field('news_arch_subtitle') ?></span>
    		<?php } ?>

    		<?php if (get_field('news_arch_title')) { ?>
    		    <?php the_field('news_arch_title') ?>
    		<?php } ?>

    	</div>
    </section>

    <section class="content-page  news-content">
    	<div class="container">
    		<div class="practice-content__content  tabs-info-js">
    			<div class="practice-content__info">

    				<?php $args = array('post_type' => 'post',
    									'posts_per_page' => 8,
    									'order' => 'DESC') ?>

    				<?php $page_index = new WP_Query($args) ?>

    				<div class="news-content__news-list">
    					
    					<?php if ($page_index->have_posts() ) :  while ( $page_index->have_posts() ) : $page_index->the_post();?>

    						<a href="<?php echo esc_url( get_permalink() ); ?>" class="news-content__news-item">
    							<div class="news-content__item-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
    							<div class="news-content__info-wrap">
    								<span class="news-content__date"><?php esc_html( the_date('F j, Y') ) ?></span>
    								<h3><?php esc_html( the_title() ) ?></h3>
    								<?php esc_html( the_excerpt() ) ?>
    								<span class="careers__item-read-more">Read More</span>
    							</div>
    						</a>
    						
    						<?php endwhile; ?>

    					<?php endif; ?>	

    				</div>

    				<?php wp_reset_postdata(); ?>

    				<div class="pagination">
    					<div class="pagination__links">
    						<span class="pagination__btn  current">1</span>
    						<a class="pagination__btn" href="#">2</a>
    						<a class="pagination__btn" href="#">3</a>
    						<span class="pagination__more">...</span>
    						<a class="pagination__btn" href="#">19</a>
    						<a href="#" class="pagination__next">>></a>
    					</div>
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