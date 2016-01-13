<?php get_header("off"); ?>
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<div id="content">
  <aside class="col-sm-3  hidden-xs">
    <?php set_query_var( "menu-tipo", "lateral" ); ?>
    <?php get_template_part("template", "menus"); ?>
  </aside>
  <section id="conteudo" class="search col-sm-9">
    <?php set_query_var( "menu-tipo", "mobile" ); ?>
    <?php get_template_part("template", "menus"); ?>
    <header>
		<h5><em>Exibindo resultados para <span>"<?php echo $_GET['s']; ?>"</em></span></h5>
		<p>
		<?php 
			if($total_results == 0){ 
		?>
			Sem Resultados
		<?php }else{ ?>
			<?php echo $total_results; ?> resultados
		<?php } ?>
		</p>
    </header>

	<section class="resultados">
		
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article>
			<h4><a href="<?php the_permalink(); ?>"> <?php the_title( ); ?></a></h4>
			<div class="row">
				<div class="col-sm-3 col-md-2">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail("full", array("class"=>"img-responsive")); ?>
				</a>
				</div>
				<div class="col-sm-9 col-md-10">
					<?php if (function_exists('relevanssi_the_excerpt')) { relevanssi_the_excerpt(); }; ?>
				</div>
			</div>
		</article>
		<?php endwhile; else: ?>
		<p><?php //_e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
		<div id="pesquisa404">
		<p>Não encontrou o que você queria? <strong><em>Tente buscar outro termo:</em></strong></p>
			<form role="search" action="<?php echo site_url('/'); ?>" method="get">
				<input type="search" name="s" placeholder="Ex: Pinpad"/>
				<button type="submit" alt="Search"><i class="fa fa-search"></i></button>
				<div class="clear"></div>
			</form>
		</div>
	</section>
	<?php get_template_part("template", "footer"); ?>        
</div>
<?php get_footer(); ?>