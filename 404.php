<?php get_header("off");  ?>
<div id="content">
	<aside class="col-sm-3  hidden-xs">
		<?php set_query_var( "menu-tipo", "lateral" ); ?>
		<?php get_template_part("template", "menus"); ?>
	</aside>
	<section id="conteudo" class="col-sm-9">
		<?php set_query_var( "menu-tipo", "mobile" ); ?>
		<?php get_template_part("template", "menus"); ?>
		<article id="erro" class="text-center col-xs-12">
			<img src="<?php bloginfo( 'template_directory' ); ?>/images/404.png" alt="" class="erro img-responsive">
			<h3>Desculpe, a página que você está procurando não está aqui.</h3>
			<p>Experimente buscar outro termo ou volte para a <a href="<?php bloginfo('url') ?>">página inicial</a>.</p>
			<div id="pesquisa404">
				<form role="search" action="<?php echo site_url('/'); ?>" method="get">
					<input type="search" name="s" placeholder="Ex: HallEvent"/>
					<button type="submit" alt="Search"><i class="fa fa-search"></i></button>
					<div class="clear"></div>
				</form>
			</div>

		</article>
		<?php get_template_part("template", "footer"); ?>
</div>
<?php get_footer("off"); ?>