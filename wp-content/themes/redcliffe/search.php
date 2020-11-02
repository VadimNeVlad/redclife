<?php get_header(); ?>

	<section class="intro  wow fadeIn  intro--inner  intro--search  intro--center-bg" style="background-image: url(<?php the_field('search_bg', 'options') ?>);">
		<div class="container">

			<?php if (get_field('search_title_text', 'options')) { ?>
			    <?php the_field('search_title_text', 'options') ?>
			<?php } ?>

		</div>
	</section>

	<section class="search-result">
		<div class="container">
			<div class="search-result__title-content  wow fadeInLeft">

				<?php if (get_field('search_resukt_text', 'options')) { ?>
					<h2><?php the_field('search_resukt_text', 'options') ?> <span><?php echo get_query_var('s') ?></span></h2>
				<?php } ?>

				<?php if (get_field('search_result_subtext', 'options')) { ?>
				    <?php the_field('search_result_subtext', 'options') ?>
				<?php } ?>

			</div>
			<?php $paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1; ?>

			<?php
			    global $query_string;
			    $query_args = explode("&", $query_string);
			    $search_query = array('post_type' => 'post',
			    					'posts_per_page' => 10,
			    					'paged' => $paged,
			    					'order' => 'DESC');

			    foreach($query_args as $key => $string) {
			      $query_split = explode("=", $string);
			      $search_query[$query_split[0]] = urldecode($query_split[1]);
			    } // foreach

			    $page_index = new WP_Query($search_query);
			    if ( $page_index->have_posts() && get_search_query() ) : 
			    ?>

			    <!-- the loop -->

			    <div class="search-result__list">

			    	<?php while ( $page_index->have_posts() ) : $page_index->the_post(); ?>

			    		<a href="<?php echo esc_url( get_permalink() ); ?>" class="search-result__item  wow fadeInUp" data-wow-delay=".3s">
			    			<h4><?php echo esc_html( the_title() ); ?></h4>
			    			<?php echo esc_html( the_excerpt() ); ?>
			    		</a>

			    	<?php endwhile; ?>
			    		
			    </div>

			    <div class="pagination  wow fadeInUp">
			        <div class="pagination__links">
			            <?php if ($page_index->max_num_pages > 1) : // custom pagination  ?>
			                <?php
			                  $orig_query = $wp_query; // fix for pagination to work
			                  $wp_query = $page_index;
			                  $big = 999999999;
			                  paginate_links(array(
			                      'base' => str_replace($big, '%#%', get_pagenum_link($big)),
			                      'format' => '?paged=%#%',
			                      'current' => max(1, get_query_var('paged')),
			                      'total' => $wp_query->max_num_pages
			                  )); 

			                  echo paginate_links();   

			                  $wp_query = $orig_query; // fix for pagination to work
			                ?>

			            <?php endif; ?>
			        </div>
			    </div>

			    <!-- end of the loop -->

			    <?php wp_reset_postdata(); ?>


			<?php else : ?>

				<h2 class="search-title-nofound"><?php the_field('search_result_nofound_text', 'options') ?></h2>

			<?php endif; ?>

		</div>
	</section>

	
<?php get_footer(); ?>