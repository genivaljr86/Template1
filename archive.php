<?php get_header(); ?>
<div id="content" class="container-fluid">
	<div class="row">
		<div class="col-sm-12>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if(!is_front_page()){ ?>
					<h2><?php the_title(); ?></h2>
				<?php } ?>
				<?php the_content(); ?>
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>