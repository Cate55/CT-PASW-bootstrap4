<?php get_header(); ?>

<!--Slider-->
    <section id="carouselExampleIndicators" class="carousel slide slider-big" data-ride="carousel">
        <div class="carousel-inner">

          <?php
          $ct_counter=0;

          $args = array(
          	'post_type' => 'page',
          	'tax_query' => array(
          		array(
          			'taxonomy' => 'home_visibility',
          			'field' => 'slug',
          			'terms' => 'slider'
          		)
          	)
          );

          // La Query
          $ct_the_query = new WP_Query( $args );
          // Il Loop
          while ( $ct_the_query->have_posts() ) :
            $ct_the_query->the_post();?>

            <?php $ct_counter++; ?>

        <?php $ct_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ct_big');?>

          <div class="carousel-item <?php if($ct_counter == 1) {echo 'active';}?>" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7)), url(<?php echo $ct_image_attributes [0];?>); background-size: cover; background-position: center center">
              <div class="carousel-caption text-left margin-bottom">
                 <div class="container">
                   <div class="trattino"></div>
                   <h3 ><?php the_title(); ?></h3>
                   <div class="carousel-text"><?php the_excerpt(); ?></div>
                   <a href="<?php the_permalink();?>"class="btn btn-outline-light btn-lg"><?php esc_html_e('Guarda il video','ct') ?></a>
                </div>
              </div>
          </div>

          <?php endwhile;

          // Ripristina Query & Post Data originali
          wp_reset_query();
          wp_reset_postdata();?>

        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </section>


        <section class="container focuses">
          <div class="row">
            <?php /* Focus Section */

        $args = array(
          'post_type' => 'page',
          'tax_query' => array(
            array(
              'taxonomy' => 'home_visibility',
              'field' => 'slug',
              'terms' => 'focus'
            )
          )
        );

            // La Query
            $ct_the_query = new WP_Query( $args );

            // Il Loop
            while ( $ct_the_query->have_posts() ) :
              $ct_the_query->the_post(); ?>

           <div class="col-sm-3 focus">
             <p class="text-intro"><?php the_field('intro_text'); ?></p>
             <h3> <a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
             <a href="<?php the_permalink();?>" class="text-link"> <?php esc_html_e( 'Scopri di più', 'ct' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
           </div>

       <?php endwhile;

       // Ripristina Query & Post Data originali
       wp_reset_query();
       wp_reset_postdata(); ?>

     </div>
    </section>

<!--Slider page-->

      <?php

/* 2 Column Section
    -------------------------------------------*/
    $args = array(
      'post_type' => 'page',
      'tax_query' => array(
        array(
          'taxonomy' => 'home_visibility',
          'field' => 'slug',
          'terms' => 'pre-evidenza'
        )
      )
    );

      // La Query
      $ct_the_query = new WP_Query( $args );
      // Il Loop
      while ( $ct_the_query->have_posts() ) :
        $ct_the_query->the_post();?>

        <!--2 column section-->
    <section class="container two-columns">
        <div class="trattino"></div>
          <div class="row mt-5">
            <div class="col-sm-6">
            <blockquote class="blockquote">
              <h3 class="two-columns-title"><?php the_title(); ?></h3>
            </blockquote>
            </div>
            <div class="col-sm-6">
             <?php the_excerpt(); ?>
            </div>
          </div>
    </section>





      <?php endwhile;

      // Ripristina Query & Post Data originali
      wp_reset_query();
      wp_reset_postdata();?>



      <!--Card-->

        <section class="card-group mt-5">
            <?php
    /* Card Section
    -------------------------------------------*/
    $args = array(
      'post_type' => 'page',
      'tax_query' => array(
        array(
          'taxonomy' => 'home_visibility',
          'field' => 'slug',
          'terms' => 'in-evidenza'
        )
      )
    );

            // La Query
            $ct_the_query = new WP_Query( $args );
            // Il Loop
            while ( $ct_the_query->have_posts() ) :
              $ct_the_query->the_post();?>
              <?php $ct_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ct_single');?>

              <div class="card card-cover" style="background: linear-gradient(rgba(0,0,0, 0.7), rgba(0,0,0, 0.3)), url(<?php echo $ct_image_attributes[0]; ?>); background-size: cover; background-position: center center">

                  <div class="card-body">
                    <a href="<?php  the_permalink()?>">
                  <h5 class="card-title"><?php the_title(); ?></h5>
                  <div class="card-text"><?php the_excerpt(); ?></div>
                  <p class="card-link"><?php esc_html_e( 'Scopri di più', 'ct' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i> </p>
                  </a>
                </div>
              </div>

            <?php endwhile;

            // Ripristina Query & Post Data originali
            wp_reset_query();
            wp_reset_postdata();?>


        </section>

        <?php

      /* 2 blockquote (Post Evidenza)
      -------------------------------------------*/
      $args = array(
        'post_type' => 'page',
        'tax_query' => array(
          array(
            'taxonomy' => 'home_visibility',
            'field' => 'slug',
            'terms' => 'post-evidenza'
          )
        )
      );

        // La Query
        $ct_the_query = new WP_Query( $args );
        // Il Loop
        while ( $ct_the_query->have_posts() ) :
          $ct_the_query->the_post();?>

          <!--2 column section-->
      <section class="container two-blockquote">
            <div class="row mt-5">
              <div class="col-sm-6">
              <?php the_content(); ?>
              </div>
              <div class="col-sm-6">
               <?php the_field('second_content') ?>
              </div>
            </div>
      </section>





        <?php endwhile;

        // Ripristina Query & Post Data originali
        wp_reset_query();
        wp_reset_postdata();?>


<section class="container testimonials">
  <div class="row">
    <?php

    /* Testimonilas
        -------------------------------------------*/
  $args = array(
    'post_type' => 'page',
    'tax_query' => array(
      array(
        'taxonomy' => 'home_visibility',
        'field' => 'slug',
        'terms' => 'testimonials'
      )
    )
  );

    // La Query
    $ct_the_query = new WP_Query( $args );
    // Il Loop
    while ( $ct_the_query->have_posts() ) :
      $ct_the_query->the_post();?>
      <div class="col-sm-3">
        <?php the_post_thumbnail('ct_quad', array( 'class' => 'img-fluid rounded-circle', 'alt' => get_the_title() ))?>
            </div>
      <div class="col-sm-9">
        <blockquote >
          <?php the_content(); ?>
        </blockquote>
        <?php the_field('second_content') ?>
      </div>
    </div>
    </section>

    <?php endwhile;

    // Ripristina Query & Post Data originali
    wp_reset_query();
    wp_reset_postdata();?>









<?php

/* Panel Jumbtron
 -------------------------------------------*/
 $args = array(
   'post_type' => 'page',
   'tax_query' => array(
     array(
       'taxonomy' => 'home_visibility',
       'field' => 'slug',
       'terms' => 'cta-box'
     )
   )
 );

// La Query
$ct_the_query = new WP_Query( $args );
// Il Loop
while ( $ct_the_query->have_posts() ) :
  $ct_the_query->the_post();?>
  <?php $ct_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ct_big');?>
  <!--Jumbotron hero-->
         <section class="jumbotron jumbotron-fluid mt-5 text-white call-to-action-box"style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url(<?php echo $ct_image_attributes [0];?>); background-size: cover; background-position: center center;">
            <div class="container">
              <h3 class="cta-title"><?php the_title(); ?></h3>
                <div class="cta-text"><?php the_excerpt(); ?></div>
                  <a class="btn btn-primary" href="<?php the_permalink();?>" role="button"><?php esc_html_e('Contact us','ct'); ?></a>
               </div>

        </section>



<?php endwhile;

// Ripristina Query & Post Data originali
wp_reset_query();
wp_reset_postdata();?>

<!--News-->

  <section class="container">
    <div class="card-deck mt-5">
      <?php
/* Card News
-------------------------------------------*/
$args = array(
'post_type' => 'post',
'posts_per_page' => 3
);

      // La Query
      $ct_the_query = new WP_Query( $args );
      // Il Loop
      while ( $ct_the_query->have_posts() ) :
        $ct_the_query->the_post();?>
        <?php $ct_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ct_single');?>

        <div class="card card-news" >

            <div class="card-body">
              <p class="card-meta"> <?php the_category(', ');?> | <?php the_time('j M Y'); ?> </p>

              <a href="<?php  the_permalink()?>">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <?php the_post_thumbnail('ct_single', array( 'class' => 'img-fluid mb-4', 'alt' => get_the_title() ))?>
              </a>

                <div class="card-text"><?php the_excerpt(); ?></div>
            <p class="card-info" ><?php esc_html_e('by  ', 'ct')?><?php the_author(); ?> </p>


          </div>
        </div>

      <?php endwhile;

      // Ripristina Query & Post Data originali
      wp_reset_query();
      wp_reset_postdata();?>

    </div>

  </section>


    </div>

<?php get_footer(); ?>
