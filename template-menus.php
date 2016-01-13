<?php $tipo = get_query_var("menu-tipo"); ?>

<a href="#" class="btn-toggle toggle-<?php echo $tipo; ?> visible-xs"><i class="fa fa-bars"></i></a>

<?php if ($tipo == "mobile") { $tipo .=" visible-xs"; } ?>

<header class="<?php echo $tipo; ?>">
	<div class="animated fadeIn">
		<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/logo_orange.png" alt="EBI Automação"></a><br>
		<h4>
			<strong><em><a href="<?php bloginfo( 'url' ); ?>">EBI</em></a></strong><br>
		</h4>
		<h6>
			<strong><a href="<?php bloginfo( 'url' ); ?>"><span class="h5">[</span> SOLUÇÕES EM TECNOLOGIA <span class="h5">]</span></a></strong>

		</h6>
	</div> 
</header>
<?php if ($tipo == "lateral"){ ?>
<nav class="animated fadeInLeft">
	<?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
</nav>
<div id="pesquisa" class="animated fadeInUp">
	<p><em>O que você procura?</em></p>
	<form role="search" action="<?php echo site_url('/'); ?>" method="get">
		<input type="search" name="s" placeholder="Ex: HallEvent"/>
		<button type="submit" alt="Search"><i class="fa fa-search"></i></button>
		<div class="clear"></div>
	</form>
</div>
<footer class="animated fadeInUp">
	<div id="redes">
		<a href="http://fb.com/ebiinformatica"><img src="<?php bloginfo( 'template_directory' ); ?>/images/face.png" alt=""></a>
		<a href="http://instagram.com/ebi.oficial"><img src="<?php bloginfo( 'template_directory' ); ?>/images/insta.png" alt=""></a>
		<a href="https://www.youtube.com/channel/UCfdKaWmnq5uyk_ZBM-7Klrw"><img src="<?php bloginfo( 'template_directory' ); ?>/images/youtube.png" alt=""></a>
		<a href="#" class="blog-icon"><img src="<?php bloginfo( 'template_directory' ); ?>/images/blog.png" alt="" data-toggle="tooltip" data-placement="top" title="EM BREVE"></a>
	</div>
	<div class="segunda-linha">
		<a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/blog.png" alt="" data-toggle="tooltip" data-placement="top" title="EM BREVE"></a>
		<a href="#" class="loja"><img src="<?php bloginfo( 'template_directory' ); ?>/images/loja-bg.png" alt="" data-toggle="tooltip" data-placement="top" title="EM BREVE"></a>
	</div>
	<div id="loja">
		<a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/loja.png" alt="" data-toggle="tooltip" data-placement="top" title="EM BREVE"></a>
	</div>
</footer>
<?php if(get_field("ebi_capa_do_menu")!=""){?>
<style type="text/css">
	#content > aside{
		background: url("<?php the_field("ebi_capa_do_menu"); ?>") center center no-repeat;
		background-color: #000;
		background-size: cover;
	}
</style>
<?php 	} ?>
<?php } ?>