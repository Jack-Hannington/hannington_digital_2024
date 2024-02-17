<!doctype html>
<html lang="en-GB">
<link 
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link 
    rel="stylesheet"
    href="https://unpkg.com/aos@next/dist/aos.css"
  />


  <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  <script defer src="https://kit.fontawesome.com/eab92a2496.js" crossorigin="anonymous"></script>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site-content">
    <header id="masthead" class="site-header">
    
<!-- Start of Navbar -->
<nav>
  <div class="navbar container">
    <div id="nav-logo" class="logo nav-item">
      <?php
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
        ?> 
    </div>

    <div id="nav-toggle" class="menu-toggle nav-item">
      <div id="showMenu" class="nav-toggle">
        
  <span></span>
  <span></span>
</div>

    </div>
    

    <div class="nav-item menu-container">
      <div class="menu-header">
        <div class="nav-item logo mobile-menu-logo">
        <?php
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
        ?> 
        <p style="color:#25343F;margin-bottom:0px;">Hannington</p>
        </div>
        <!-- <div class="nav-item menu-number">0161 401 1000</div> -->
        <div class="nav-item close-menu">
        <div id="closeMenu" class="nav-toggle">
  <span>&times;</span>
</div>
        </div>
      </div>
      <div class="menu-body">
      <?php wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'menu_class' => 'menu',
            'fallback_cb' => false
        )); ?>
      </div>
      <div class="menu-footer">
      <div class="wp-block-button">
        <a class="wp-block-button__link wp-element-button w-100" href="/about" title="consent form">Contact me</a>
      </div>

      </div>
    </div>
    <div id="nav-cta" class="nav-item menu-cta">
    <div class="wp-block-button">
        <a class="wp-block-button__link wp-element-button nav-cta-button" href="/about#contact" title="Contact Hannington Digital">Contact me</a>
      </div>
    </div>
  </div>
</nav>

<!-- End navbar -->

</header><!-- #masthead -->
   