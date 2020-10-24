<?php get_header(); ?>
	
	<section class="page-zero">
		<div class="container">
			<h4>404</h4>

			<?php if (get_field('404_title', 'options')) { ?>
				<strong><?php the_field('404_title', 'options') ?></strong>
			<?php } ?> 

			<?php if (get_field('404_text', 'options')) { ?>
				<?php the_field('404_text', 'options') ?>
			<?php } ?>  

		</div>
	</section>
	
<?php get_footer(); ?>