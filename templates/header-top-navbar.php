<script src="//universityheader.ucf.edu/bar/js/university-header.js?use-bootstrap-overrides=1"></script>

<header id="banner" class="navbar" role="banner">
  <div class="container">

      <nav id="nav-main" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a href="#" class="push-menu-right-toggle">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo home_url(); ?>"><?php dynamic_sidebar('header-brand-text'); ?></a>
            <div class="mask"></div>
          </div>

        <div class="collapse navbar-collapse">

          <div id="social-navigation">
            <?php wp_nav_menu(array('menu' => 'social-navigation', 'menu_class' => 'nav navbar-nav' )); ?> 
          </div>

          <p class="contact">Contact</p>

          <?php wp_nav_menu(array('menu' => 'primary-navigation', 'menu_class' => 'nav navbar-nav' )); ?> 

        </div>
            
      </nav>

    <div class="clear"></div>

  </div>
</header>

<nav class="menu push-menu-right">

  <?php wp_nav_menu(array('menu' => 'primary-navigation', 'menu_class' => 'nav navbar-nav' )); ?> 
  
  <p class="contact">Contact</p>

</nav>
