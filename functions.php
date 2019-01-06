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
    wp_enqueue_script('ct-scripts-js', get_template_directory_uri() .'/js/scripts.js', array('jquery'),null ,true );
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
    wp_enqueue_style('ct-font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css');
    wp_enqueue_style('ct-font', '//fonts.googleapis.com/css?family=Montserrat:200,300,400,700');


  }

}

add_action('wp_enqueue_scripts', 'ct_styles');

/* Add class to button submit
-------------------------------------------------------- */

function wpdocs_comment_form_defaults( $defaults ) {
  $defaults['class_submit'] = 'btn btn-primary btn-lg';
  return $defaults;
}

add_filter( 'comment_form_defaults', 'wpdocs_comment_form_defaults' );


/* Add class to button submit
-------------------------------------------------------- */

add_action( 'body_class', 'add_class_bg_trasp_body');

function add_class_bg_trasp_body($classes){
  if(has_post_thumbnail() && is_page()){
    array_push($classes,'navbar-transparent');
  } else if(is_front_page()){
    array_push($classes,'navbar-transparent');
  }

  return $classes;

}



/* Add customizer settings
-------------------------------------------------------- */

function ct_customize_register($wp_customize){

  $wp_customize -> add_section('ct_logo',  array(
      'title' => __('Logo', 'ct'),
      'description' => __('All the info about logo', 'ct'),
      'priority' => 20
    )
  );

  /*Logo image*/
    $wp_customize -> add_setting('ct_logo_image',  array('default' => ''));
    $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'ct_logo_image',array(
      'section'=> 'ct_logo',
      'label'=> __('Logo_Image', 'ct'),
      'settings'=>'ct_logo_image'
    )));


/*Logo  alt text*/
  $wp_customize -> add_setting('ct_logo_alt_text',  array('default' => 'Logo of the site'));
  $wp_customize -> add_control('ct_logo_alt_text',array(
    'section'=> 'ct_logo',
    'label'=> __('Logo_alt_text', 'ct'),
    'type'=>'text'

  ));


}

add_action('customize_register', 'ct_customize_register');











?>
