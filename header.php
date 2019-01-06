<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo('description');?>">

  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>


<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary animate">
  <div class="container">
    <a class="navbar-brand animate" href="<?php echo esc_url_raw(home_url()); ?>">


      <?php if(get_theme_mod('ct_logo_image', '')!= ''){?>

        <img class="animate" src="<?php echo get_theme_mod('ct_logo_image', ''); ?>" alt="<?php echo get_theme_mod('ct_logo_alt_text', ''); ?>">

      <?php  } else {?>

        <img class="animate"src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo sito">

      <?php } ?>
      </a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="bs4navbar">

         <?php
         wp_nav_menu([
           'menu'            => 'header',
           'theme_location'  => 'header',
           'container'       => '',
           'container_id'    => '',
           'container_class' => '',
           'menu_id'         => false,
           'menu_class'      => 'navbar-nav mr-auto',
           'depth'           => 2,
           'fallback_cb'     => 'bs4navwalker::fallback',
           'walker'          => new bs4navwalker()
         ]);
         ?>

         <form class="form-inline my-2 my-lg-0" action="<? echo esc_url_raw(home_url()); ?>" method="get">
           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="s">
           <button class="icon-search" type="submit"> <i class="fa fa-search" aria-hidden="true"></i></button>
         </form>

        <ul class="navbar-nav navbar-social push-right">
          <li><a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          <li><a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i></a></li>

        </ul>
   </div>
 </nav>
