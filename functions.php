<?php

/* Dependecies
-------------------------------------------------------- */

//nav walker bootstrap4
require_once('assets/bs4navwalker.php');

//content width
if ( ! isset( $content_width ) ) $content_width = 1400;

/* Setup Theme
-------------------------------------------------------- */

if(! function_exists('ct_setup_theme') ) {

  function ct_setup_theme(){

    // add support titles
    add_theme_support("title-tag");

    //add theme feed links
     add_theme_support( 'automatic-feed-links' );

    // enable featured image
    add_theme_support("post-thumbnails");

    // create custom size images
    add_image_size('ct_big', 1400, 800, true);
    add_image_size('ct_quad', 600, 600, true);
    add_image_size('ct_single', 800, 500, true);

    // create custom menus
    register_nav_menus(array(
      'header' => esc_html__('Header','ct'),
    ));

    //load theme languages
    load_theme_textdomain('ct', get_template_directory(). '/languages');

  }

}

add_action('after_setup_theme', 'ct_setup_theme');

/* Register Sidebars
-------------------------------------------------------- */
if(! function_exists('ct_sidebars') ) {

  function ct_sidebars() {
    register_sidebar(array(
      'name' => esc_html__('Primary', 'ct'),
      'id' =>'primary',
      'description' => esc_html__('Main Sidebar', 'ct'),
      'before_title' => '<h3>',
      'after_title' => '</h3>',
      'before_widget' => '<div class="widget my-5 %2$s clearfix">',
      'after_widget' => '</div>',

      )
    );
  }
}

add_action('widgets_init', 'ct_sidebars');


/* Include javascript files
-------------------------------------------------------- */

if(! function_exists('ct_scripts') ) {

  function ct_scripts(){

    wp_enqueue_script('ct-popper-js', get_template_directory_uri() .'/js/popper.min.js', array('jquery'),null ,true );
    wp_enqueue_script('ct-bootstrap-js', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'),null ,true );

    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

  }

}

add_action('wp_enqueue_scripts', 'ct_scripts');


/* Include css files
-------------------------------------------------------- */

if(! function_exists('ct_styles') ) {

  function ct_styles(){

    wp_enqueue_style('ct-bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css');
    wp_enqueue_style('ct-style-default-css', get_template_directory_uri() .'/style.css');

  }

}

add_action('wp_enqueue_scripts', 'ct_styles');

/* Add class to button summit
-------------------------------------------------------- */
function wpdocs_comment_form_defaults( $defaults ) {
  $defaults['class_submit'] = 'btn btn-primary btn-lg';
  return $defaults;
}
add_filter( 'comment_form_defaults', 'wpdocs_comment_form_defaults' );
















?>
