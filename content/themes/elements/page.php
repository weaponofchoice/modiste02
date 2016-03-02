<?php
get_header();

/*
 * Check if we are on a WooCommerce page
 * If so, echo content to enable the shortcode
 */
if( is_woocommerce() ){
  the_content();
}

/*
 * Start the ACF page elements loop
 *
 * Important: acf.json must be imported in order to use elements theme from this point forward.
 */
if( have_rows('elements') ):
  // Loop through ACF page elements
  while( have_rows('elements') ): the_row();

    if( get_row_layout() == 'text' ):
      get_template_part( 'elements/text' );
    elseif( get_row_layout() == 'image' ):
      get_template_part( 'elements/image' );
    elseif( get_row_layout() == 'grid_primary' ):
      get_template_part( 'elements/gridPri' );
    elseif( get_row_layout() == 'grid_secondary' ):
      get_template_part( 'elements/gridSec' );
    elseif( get_row_layout() == 'slider' ):
      get_template_part( 'elements/slider' );
    endif;

  endwhile;
endif;

get_footer();
?>
