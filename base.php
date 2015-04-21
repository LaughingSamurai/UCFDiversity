<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

  <?php
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div id="contact-modal-container">

    <a href="#" class="close-contact">Close <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gold-close.png" alt="Close" title="Close"></a>
    
    <div class="container">
      
      <div class="col-lg-6 col-md-6 col-sm-6">
        
        <?php dynamic_sidebar('contact-modal'); ?>

      </div>

      <div class="col-lg-6 col-md-6 col-sm-6">
        
        <?php echo do_shortcode( '[gravityform id=1 title=false description=false ajax=true tabindex=49]' ); ?>

      </div>

    </div>

  </div>

  <div id="wrap" role="document">
    <div id="content">
      <div id="main" role="main">
        <?php include roots_template_path(); ?>
      </div>
    </div><!-- /#content -->
  </div><!-- /#wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
