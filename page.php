<?php get_header(); ?>

<?php if(has_post_thumbnail())  { ?>

<?php $ct_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'ct_big');?>
<!--Jumbotron hero-->
       <section class="jumbotron jumbotron-fluid  text-white call-to-action-box"style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url(<?php echo $ct_image_attributes [0];?>); background-size: cover; background-position: center center;">
          <div class="container">
            <h1 class="cta-title"><?php the_title(); ?></h1>
          </div>
      </section>
<?php } ?>

  <main class="container mt-5 main-content">
         
   <div class="row">
  <div class="col-sm-8 ml-sm-auto mr-sm-auto">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <article <?php post_class(); ?>>
        <?php if(has_post_thumbnail()) {} else { ?>
              <h1 class="display-4 mb-5 text-center"><?php the_title(); ?></h1>
          <?php } ?>

        <?php the_content(); ?>
              
      </article>

    <?php endwhile; else: ?>
    <p><?php esc_html__e('Sorry, no post matched your criteria.', 'ct'); ?></p>
    <?php endif; ?>

  </div>
</div>

</main>

<?php get_footer(); ?>
