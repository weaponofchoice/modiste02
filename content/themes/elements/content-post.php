<?php
// Content (variables)
$title = get_the_title();
$category = get_the_category( $post->ID );
$category_link = get_category_link( $category[0]->term_id );
$content = wpautop( get_the_content() );
$permalink = get_the_permalink();
$date = get_the_date();
$thumb = get_the_post_thumbnail( $post->ID, 'medium' );
$image = get_the_post_thumbnail( $post->ID, 'large' );
?>

<li>
  <figure>
    <?php echo $image; ?>
  </figure>

  <div>
    <h2><?php echo $title; ?></h2>

    <a class="button button-white" href="<?php echo $permalink; ?>">view project</a>
  </div>
</li>