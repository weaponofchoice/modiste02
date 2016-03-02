  </main>

  <!-- Footer -->
  <footer>
    <div>
      <a href="mailto:info@modistefurniture.com">info@modistefurniture.com</a>
      <p>+31 6 5353 9191</p>
      <br>
      <a href="<?php echo get_permalink( 'terms' ); ?>">Terms & Conditions</a>
    </div>

    <div>
      <p>Want to receive updates?</p>
      <a>Join our Mailinglist</a>
      <ul>
        <li><a><img src="<?php echo get_template_directory_uri() . '/img/icon-instagram.svg'; ?>"></a></li>
        <li><a><img src="<?php echo get_template_directory_uri() . '/img/icon-facebook.svg'; ?>"></a></li>
        <li><a><img src="<?php echo get_template_directory_uri() . '/img/icon-tumblr.svg'; ?>"></a></li>
        <li><a><img src="<?php echo get_template_directory_uri() . '/img/icon-linkedin.svg'; ?>"></a></li>
      </ul>
    </div>

    <div>
      <p>Hoornbrekersstraat 4</p>
      <p>3011 CL Rotterdam</p>
      <br>
      <a href="<?php echo get_permalink( 'shipping' ); ?>">Shipping, Customs & Returns</a>
    </div>
  </footer>

  <!-- Scripts -->
  <?php wp_footer(); ?>
</body>
</html>