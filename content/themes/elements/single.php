<?php
get_header();

if( have_posts() ):
  while( have_posts() ): the_post();
    ?>

    <article>
      <?php get_elements(); ?>
    </article>

    <?php
  endwhile;
endif;

get_footer(); ?>