<?php
get_header();

if( have_posts() ):
  while( have_posts() ): the_post();
    ?>
    
    <article>
      <h1><?php the_title(); ?></h1>

      <?php get_elements(); ?>
    </article>

    <?php
  endwhile;
endif;

get_footer(); ?>