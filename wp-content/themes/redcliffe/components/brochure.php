<section class="brochure" style="background-image: url(<?php the_field('brochure_bg', 'options') ?>);">
    <div class="container-small">

    	<?php if (get_field('brochure_title', 'options')) { ?>
    		<h3><?php the_field('brochure_title', 'options') ?></h3>
    	<?php } ?> 

    	<?php if (get_field('brochure_file', 'options')) { ?>
    		<a href="<?php the_field('brochure_file', 'options') ?>" download class="btn"><?php the_field('brochure_btn_text', 'options') ?></a>
    	<?php } ?> 

    </div>
</section>