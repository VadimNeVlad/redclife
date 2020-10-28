	<footer class="footer">
		<div class="container">
			<nav class="footer__menu wow fadeIn">

				<?php wp_nav_menu(array(
				    'theme_location'  => 'footer_menu',
				    'container'       => null,
				    'menu_class'      => 'footer__menu-list',
				)); ?>

			</nav>

			<?php if (get_field('footer_copy', 'options')) { ?>
				<span class="footer__copyright wow fadeInUp" data-wow-delay=".3s"><?php the_field('footer_copy', 'options') ?></span>
			<?php } ?>

		</div>
	</footer>
	
	<?php wp_footer(); ?>

</body>
</html>