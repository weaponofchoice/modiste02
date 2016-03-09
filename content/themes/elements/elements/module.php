<?php
// Content
$b_image = get_sub_field( 'module_b_image' );
$b_image_url = $b_image['sizes']['medium'];
$b_image_width = $b_image['sizes']['medium-width'];
$b_image_height = $b_image['sizes']['medium-height'];
$b_text = wpautop( get_sub_field( 'module_b_text' ) );

// Options
$o_orientation = get_sub_field( 'module_o_orientation' );

// Classes
$class_section = 'module orientated-' . $o_orientation;
$class_body = 'section-body';

// Build section
section_start( $class_section );

  // Body
  section_body_start( $class_body );

    /*
     * Body content
     * This is the flexible part, that is different for each element
     */
    echo '<img src="' . $b_image_url . '" width="' . $b_image_width . '" height="' . $b_image_height . '">';
    echo '<div>' . $b_text . '</div>';

  section_body_end();

section_end();
?>

