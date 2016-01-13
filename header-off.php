<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php bloginfo( 'name' ); ?></title>
  <link href="<?php bloginfo( 'template_directory' ); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/assets/animate.css">
  <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php //wp_enqueue_script("jquery"); ?>
  <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

</head>
<body <?php body_class(); ?>>