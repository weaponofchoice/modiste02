<?php
function elements_posts_start(){
  $page_ID = get_option('page_for_posts');
  $page_title = get_the_title( $page_ID );

  echo '<ul class="posts is-fullwidth">';
}

function elements_posts_end(){
  echo '</ul>';
}
?>