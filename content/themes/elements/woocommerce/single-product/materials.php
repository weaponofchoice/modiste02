<?php
$materials = get_field( 'product_materials' );
$description = wpautop( get_field('product_materials_description') );

if( $materials ):

  echo '<ul class="s-grid-1 m-grid-3">';

    foreach( $materials as $material ):
      $image = $material['material_image'];
      $text = wpautop( $material['material_description'] );
      ?>

      <li>
        <div><img src="<?php echo $image['sizes']['medium']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>"></div>
        <?php echo $text; ?>
      </li>

      <?php
    endforeach;

  echo '</ul>';

  echo $description;

endif;
?>