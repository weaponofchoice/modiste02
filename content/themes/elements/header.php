<?php
/*
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the main tag.
 */
?>

<!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <?php if( is_shop() ): ?>
    <title>Modiste Furniture – Furniture</title>
  <?php elseif( is_home() || is_archive() ): ?>
    <title>Modiste Furniture</title>
  <?php else: ?>
    <title>Modiste Furniture<?php echo ' – ' . get_the_title(); ?></title>
  <?php endif; ?>

  <link rel="canonical" href="<?php echo home_url(); ?>">

  <!-- META TAGS -->
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="description" content="">

  <meta property="og:title" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">

  <!-- WP_HEAD() -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Header -->
  <header>
    <a class="link-logo" href="<?php echo home_url(); ?>">
      <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/logo.svg">
    </a>

    <nav>
      <a class="nav-close">close <i></i></a>

      <ul>
        <?php
        $nav = array(
          'theme_location'  => 'menu_primary',
          'container'       => '',
          'items_wrap'      => '%3$s'
        );

        wp_nav_menu( $nav );
        ?>

        <?php
        global $woocommerce;
        $cart_url = $woocommerce->cart->get_cart_url();
        $cart_count = WC()->cart->get_cart_contents_count();
        ( (is_cart()) ? $cart_class = 'current-menu-item' : $cart_class = '' );

        echo '<li class="' . $cart_class . '"><a href="' . $cart_url . '">Cart (' . $cart_count . ')</a></li>';
        ?>
      </ul>
    </nav>

    <a class="nav-open">menu <i></i></a>
  </header>

  <!-- Main content -->
  <main role="main">
