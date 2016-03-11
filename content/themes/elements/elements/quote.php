<?php
// Content (variables)
$b_caption = get_sub_field( 'quote_b_caption' );
$b_quote = get_sub_field( 'quote_b_quote' );

// Classes
$class_section = 'quote';
$class_body = 'section-body';

// Build section
section_start( $class_section );

  // Body
  section_body_start( $class_body );

    /*
     * Body content
     * This is the flexible part, that is different for each element
     */
    echo '<p>' . $b_caption . '</p>';
    echo '<h2>' . $b_quote . '</h2>';

  section_body_end();

section_end();
?>

