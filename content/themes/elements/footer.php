  </main>

  <!-- Footer -->
  <footer>
    <?php
    $footer_left = get_field( 'footer_left', 'option' );
    $footer_right = get_field( 'footer_right', 'option' );
    $socials = get_field( 'social', 'option' );
    ?>

    <div>
      <?php echo wpautop( $footer_left ); ?>
    </div>

    <div>
      <p>Want to receive updates?</p>
      <a>Join our Mailinglist</a>
      <ul>
        <?php foreach( $socials as $social ): ?>
          <li>
            <a href="<?php echo $social['social_link']; ?>" target="_blank">
              <img src="<?php echo get_template_directory_uri() . '/img/icon-' . $social['social_platform'] . '.svg'; ?>">
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div>
      <?php echo wpautop( $footer_right ); ?>
    </div>
  </footer>

  <!-- Scripts -->
  <?php wp_footer(); ?>
</body>
</html>