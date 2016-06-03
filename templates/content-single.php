<?php 

  $newsrollid = get_id_by_slug('news');

  $newsrollsrc = wp_get_attachment_image_src( get_post_thumbnail_id($newsrollid), array( 1248,834 ), false, ''  ); 

  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1248,834 ), false, ''  ); 

?>

<?php if ( $src != null ) { ?>

<div id="page-hero" style="background: url('<?php echo $src[0]; ?>') no-repeat top center; -webkit-font-smoothing: antialiased; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale')';">
  
</div>

<?php } else { ?>

<div id="page-hero" style="background: url('<?php echo $newsrollsrc[0]; ?>') no-repeat top center; -webkit-font-smoothing: antialiased; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $newsrollsrc[0]; ?>',sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $newsrollsrc[0]; ?>',sizingMethod='scale')';">
  
</div>

<?php } ?>

<?php wp_reset_query(); ?>

<div id="news-content-container">

  <div id="page-content-container">

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

      <div id="news-sidebar" class="col-ld-2 col-md-2 col-sm-2 col-xs-12 desktop">

          <ul>
            <li class="news-sidebar-header">Categories</li>
            <li><hr></li>
              <?php wp_list_categories( array(
                'title_li' => '',
                  'orderby' => 'name',
                  'exclude' => array( 1 )
              ) ); ?> 
          </ul>

          <ul>
            <li class="news-sidebar-header">Archives</li>
            <li><hr></li>
            <?php $args = array(
              'type'            => 'monthly',
              'limit'           => '',
              'format'          => 'html', 
              'before'          => '',
              'after'           => '',
              'show_post_count' => false,
              'echo'            => 1,
              'order'           => 'DESC',
                    'post_type'     => 'post'
            );
            wp_get_archives( $args ); ?>
          </ul>

      </div>

      <div id="news-roll" class="col-ld-10 col-md-10 col-sm-10 col-xs-12">

        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            
            <h1><?php the_field('page_title'); ?></h1>

            <span class="article-meta"><?php the_date( 'F j, Y' ); ?></span>

            <hr>

            <?php

            // check if the repeater field has rows of data
            if( have_rows('column_rows') ):

              // loop through the rows of data
              while ( have_rows('column_rows') ) : the_row();

            ?>    

              <div class="column-rows">

                <?php if ( get_sub_field('column_full_row') != NULL ) { ?>

                  <p><?php the_sub_field('column_full_row'); ?></p>

                <?php } ?>
                      
                <div class="<?php if ( get_sub_field('column_row_text_left') != NULL || have_rows('inset_button_left') ) { ?>column <?php } ?>col-lg-6 col-md-6 col-sm-6">

                  <div class="columned-text">
                    
                    <p><?php the_sub_field('column_row_text_left'); ?></p>

                  </div>

                  <?php

                  // check if the repeater field has rows of data
                  if( have_rows('inset_button_left') ):

                    // loop through the rows of data
                    while ( have_rows('inset_button_left') ) : the_row();

                  ?>    

                    <div class="<?php the_sub_field('inset_button_left_background_color'); ?> inset-box">

                      <h2><?php the_sub_field('inset_button_left_title'); ?></h2>

                      <p><?php the_sub_field('inset_button_left_content'); ?></p>

                      <?php if ( get_sub_field('inset_button_left_link') != NULL ) { ?>

                        <a href="<?php the_sub_field('inset_button_left_link'); ?>"><?php the_sub_field('inset_button_left_link_text'); ?> <?php if ( get_sub_field('inset_button_left_background_color') == 'black' ) { ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gold-arrow.png" alt="<?php the_sub_field('inset_button_left_link_text'); ?>"><?php  } else { ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_sub_field('inset_button_left_link_text'); ?>"><?php } ?></a>

                      <?php } ?>

                    </div>

                  <?php 

                    endwhile;

                  else :

                    // no rows found

                  endif;

                  ?>

                </div>

                <div class="<?php if ( get_sub_field('column_row_text_right') || have_rows('inset_button_right') != NULL ) { ?>column <?php } ?>col-lg-6 col-md-6 col-sm-6">

                  <div class="columned-text">
                    
                    <p><?php the_sub_field('column_row_text_right'); ?></p>

                  </div>

                  <?php

                  // check if the repeater field has rows of data
                  if( have_rows('inset_button_right') ):

                    // loop through the rows of data
                    while ( have_rows('inset_button_right') ) : the_row();

                  ?>    

                    <div class="<?php the_sub_field('inset_button_right_background_color'); ?> inset-box">

                      <h2><?php the_sub_field('inset_button_right_title'); ?></h2>

                      <p><?php the_sub_field('inset_button_right_content'); ?></p>

                      <?php if ( get_sub_field('inset_button_right_link') != NULL ) { ?>

                        <a href="<?php the_sub_field('inset_button_right_link'); ?>"><?php the_sub_field('inset_button_right_link_text'); ?> <?php if ( get_sub_field('inset_button_right_background_color') == 'black' ) { ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gold-arrow.png" alt="<?php the_sub_field('inset_button_right_link_text'); ?>"><?php  } else { ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_sub_field('inset_button_right_link_text'); ?>"><?php } ?></a>

                      <?php } ?>
            
                    </div>

                  <?php 

                    endwhile;

                  else :

                    // no rows found

                  endif;

                  ?>

                </div>

                <div class="clear"></div>

                <?php if ( get_sub_field('bottom_divider') == "yes" ) { ?>

                  <hr>

                <?php } ?>

              </div>

            <?php 

              endwhile;

            else :

              // no rows found

            endif;

            ?>



            <div class="clear"></div>

          </article>
        <?php endwhile; ?>

      </div>

      <div id="news-sidebar" class="col-ld-2 col-md-2 col-sm-2 col-xs-12 mobile">

          <ul>
            <li class="news-sidebar-header">Categories</li>
            <li><hr></li>
              <?php wp_list_categories( array(
                'title_li' => '',
                  'orderby' => 'name',
                  'exclude' => array( 1 )
              ) ); ?> 
          </ul>

          <ul>
            <li class="news-sidebar-header">Archives</li>
            <li><hr></li>
            <?php $args = array(
              'type'            => 'monthly',
              'limit'           => '',
              'format'          => 'html', 
              'before'          => '',
              'after'           => '',
              'show_post_count' => false,
              'echo'            => 1,
              'order'           => 'DESC',
                    'post_type'     => 'post'
            );
            wp_get_archives( $args ); ?>
          </ul>

      </div>

    </div>

  </div>

</div>