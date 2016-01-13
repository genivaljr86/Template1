<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_header();  ?>

	<article class="col-xs-12">
		<?php the_content(); ?>
	</article>
	
<?php endwhile; endif;?>
<?php get_footer(); ?>