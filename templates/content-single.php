<div id="news-content-container">

  <div id="page-content" class="container">

    <?php $actual_link = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}" ?>

    <ul id="social-container">
      <li class="rrssb-facebook">
              <!-- Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header:
                          https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" class="popup facebook-share-icon">
                  <span class="rrssb-icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.png" alt="Facebook">
                  </span>
                  <span class="rrssb-text">Share</span>
              </a>
          </li>
          <li class="rrssb-twitter">
              <!-- Replace href with your Meta and URL information  -->
              <a href="http://twitter.com/home?status=UCF%20Office%20of%20Diversity%20%26%20Inclusion%20<?php echo $actual_link; ?>" class="popup twitter-share-icon">
                  <span class="rrssb-icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.png" alt="Twitter">
                  </span>
                  <span class="rrssb-text">Tweet</span>
              </a>
          </li>
          <li class="rrssb-googleplus">
              <!-- Replace href with your meta and URL information.  -->
              <a href="https://plus.google.com/share?url=Check%20out%20how%20ridiculously%20responsive%20these%20social%20buttons%20are%20<?php echo $actual_link; ?>" class="popup google-share-icon">
                  <span class="rrssb-icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/google-plus.png" alt="Google +">
                  </span>
                  <span class="rrssb-text">Share</span>
              </a>
          </li>
    </ul>

    <div class="clear"></div>

    <div id="news-roll" class="col-ld-9 col-md-9 col-sm-9 col-xs-12">

      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <header>

          <div class="blog-single-title-container">

            <div class="blog-single-title-content">

              <h1 class="entry-title"><?php the_title(); ?></h1>

            </div>

          </div>

          </header>
          <div class="entry-content row">

            <div class="single-post-content">

              <?php the_post_thumbnail( 'full' ); ?>
              
              <?php the_content(); ?>

            </div>

          </div>

        </article>
      <?php endwhile; ?>

    </div>

    <div id="news-sidebar" class="col-ld-3 col-md-3 col-sm-3 col-xs-12">

      <ul>
          <?php wp_list_categories( array(
              'orderby' => 'name',
              'exclude' => array( 1 )
          ) ); ?> 
      </ul>

    </div>

  </div>

</div>