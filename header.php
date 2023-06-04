<!doctype html>
<html <?php language_attributes(); ?>>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">

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
      <!-- <button id="showMenu">Menu</button> -->
      <!-- <button id="showMenu">&#9776;</button> -->
      <div id="showMenu" class="nav-toggle">
  <span></span>
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
      <?php wp_nav_menu(array(
            'theme_location' => 'clinic-menu',
            'menu_class' => 'menu',
            'fallback_cb' => false
        )); ?>
      </div>
    </div>
    <div id="nav-cta" class="nav-item menu-cta ">
      <button class="altius-btn__primary">
        Book
      </button>
    </div>
  </div>
</nav>

<!-- End navbar -->


  </div>
  </header><!-- #masthead -->
  <div class="container-fluid">
    <div id="content" class="site-content">