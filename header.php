<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=utf8mb4_unicode_ci" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  
  <title><?php wp_title(" | ", true, "right"); bloginfo( 'name' ); ?></title>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link href="<?php bloginfo( 'template_directory' ); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="icon" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon.ico" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="content">
  <aside class="col-sm-3  hidden-xs">
    <?php set_query_var( "menu-tipo", "lateral" ); ?>
    <?php get_template_part("template", "menus"); ?>
  </aside>
  <section id="conteudo" class="col-sm-9">
    <?php set_query_var( "menu-tipo", "mobile" ); ?>
    <?php get_template_part("template", "menus"); ?>
  <?php if(!is_front_page()){ ?>
    <header>
      <div class="col-md-9">
        <h3><strong><?php the_title(); ?></strong></h3>
        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <?php if(function_exists('bcn_display')){bcn_display();}?>
        </div>  
      </div>
      <?php if (get_field("ebi_link_do_produto_check") == 1): ?>
      <div class="col-md-3 text-xs-center text-md-right ">
        <a href="<?php the_field("ebi_link_do_produto") ?>" class="compre btn btn-outline">FAÇA UM ORÇAMENTO</a>
      </div>
      <?php endif ?>
      <div class="clearfix"></div>
    </header>
  <?php } ?>