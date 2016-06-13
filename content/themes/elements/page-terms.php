<?php
get_header();

/*
 * Check if we are on a WooCommerce page
 * If so, echo content to enable the shortcode
 */
if( have_posts() ):
  while( have_posts() ): the_post();
  ?>

  <section class="text">
    <div class="section-header">
      <a class="link-arrow" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">Return to furniture shop<img src="<?php echo get_template_directory_uri() . '/img/arrow.svg'; ?>"></a>
      <h2><?php the_title(); ?></h2>
    </div>

    <div class="section-body">
      <?php the_content(); ?>
    </div>
  </section>

  <?php
  endwhile;
endif;

get_footer();
?>
