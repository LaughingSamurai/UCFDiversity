<?php
/*
Template Name: Respect UCF
*/

?>

<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1248,834 ), false, ''  ); ?>

<div id="page-hero" style="background: url('<?php echo $src[0]; ?>') no-repeat top center; -webkit-font-smoothing: antialiased; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale')';">
	
</div>

<?php wp_reset_query(); ?>

<div id="page-content-container">

<?php $templatebaseurl = get_template_directory_uri(); ?>

<?php if($post->post_parent)
	$children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0&link_after=<img src="'.$templatebaseurl.'/assets/img/nav-arrow-after.png" alt="Active" title="Active" class="after-arrow">'); else
	$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&link_after=<img src="'.$templatebaseurl.'/assets/img/nav-arrow-after.png" alt="Active" title="Active" class="after-arrow">');
?>

<?php if ($children) { ?>

	<div id="page-tabs" class="container">

		<?php $depthcheck = get_depth(); ?>

		<?php if ( $depthcheck > "1" ) { ?>

			<div class="sibling-nav">

			<p class="filter-dropdown-button">See More &#9662;</p>

				<ul>

					<?php 

					$args = array(
						'authors'      => '',
						'child_of'     => $ancestors[1],
						'exclude'      => '',
						'include'      => '',
						'link_after'   => '<img src="'.$templatebaseurl.'/assets/img/nav-arrow-after.png" alt="Active" title="Active" class="after-arrow">',
						'link_before'  => '',
						'post_type'    => 'page',
						'post_status'  => 'publish',
						'show_date'    => '',
						'sort_column'  => 'menu_order, post_title',
					        'sort_order'   => '',
						'title_li'     => __(''), 
						'walker'       => ''
					); ?>

					<!-- <img src="http://63.247.81.138/~diversi1/wp-content/themes/ucfdiversity/assets/img/nav-arrow-after.png" alt="Active" title="Active" class="after-arrow"> -->

					<?php wp_list_pages( $args ); ?>

				</ul>

			</div>

		<?php } else { ?>

		<div class="sibling-nav">

			<p class="filter-dropdown-button">See More &#9662;</p>

			<ul>
	<!--
				<?php $ancestors = get_post_ancestors( $post ); ?>
				<?php $ancestor = $ancestors[0]; ?>
				<li><a href="<?php echo get_permalink( $ancestor ); ?>"><?php echo get_the_title( $ancestor ); ?></a></li>
	-->
				<?php echo $children; ?>
			</ul>

		</div>

		<?php } ?>

	</div>

<?php } ?>

<?php wp_reset_query(); ?>

<div id="page-content" class="container">

	<?php $actual_link = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}" ?>

	<?php if ( get_field('social_buttons') == 'like' ) { ?>

		<div id="social-container" class="social-likes" data-url="<?php echo $actual_link; ?>">
			<div class="fb-like" data-href="<?php echo $actual_link; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
			<!--[if !IE]><!-->
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="ucfodi">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			<!--<![endif]-->
			<!--[if gt IE 9]>
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="ucfodi">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			<![endif]-->
			<!-- Place this tag in your head or just before your close body tag. -->
			<script src="https://apis.google.com/js/platform.js" async defer></script>

			<!-- Place this tag where you want the +1 button to render. -->
			<div class="g-plusone" data-size="standard" data-href="<?php echo $actual_link; ?>"></div>
		</div>

	<?php } else { ?>

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

	<?php } ?>

	<h1><?php the_field('page_title'); ?></h1>

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

				<div class="clear"></div>

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

	<br/>

	<h1 class="h2-emulator"><?php the_field('respect_stories_header'); ?></h1>

	<hr>

	<div class="respect-stories-description">
		<p><?php the_field('respect_stories_intro'); ?></p>
	</div>

	<div id="respect-stories">

		<?php wp_reset_query(); ?>

		<?php

		// check if the repeater field has rows of data
		if( have_rows('respect_stories') ):

			$storytilecounter = 1;

			// loop through the rows of data
			while ( have_rows('respect_stories') ) : the_row();

		?>		

			<div id="<?php echo $storytilecounter; ?>" class="respect-story-tile respect-story-tile-<?php echo $storytilecounter; ?> col-lg-3 col-md-3 col-sm-6 col-xs-12">
				
				<img src="<?php the_sub_field('respect_stories_image'); ?>" alt="<?php the_sub_field('respect_stories_title'); ?>" />

				<h2><?php the_sub_field('respect_stories_title'); ?></h2>

			</div>

		<?php	

				$storytilecounter++;

			endwhile;

		else :

			// no rows found

		endif;

		?>

		<?php wp_reset_query(); ?>

		<?php

		// check if the repeater field has rows of data
		if( have_rows('respect_stories') ):

			$storycounter = 1;

			// loop through the rows of data
			while ( have_rows('respect_stories') ) : the_row();

		?>		

			<div id="respect-story-<?php echo $storycounter; ?>" class="respect-story">

				<a href="#" class="close-respect-story">Close <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gold-close.png" alt="Close" title="Close"></a>

				<div class="respect-story-content">

					<img src="<?php the_sub_field('respect_stories_image'); ?>" alt="<?php the_sub_field('respect_stories_title'); ?>" class="col-lg-3 col-md-3 col-sm-3 col-xs-12" />

					<div class="respect-story-content-inner col-lg-9 col-md-9 col-sm-9 col-xs-12">

						<h2><?php the_sub_field('respect_stories_title'); ?></h2>

						<hr>

						<?php the_sub_field('respect_stories_story'); ?>

					</div>

				</div>

			</div>

		<?php	

				$storycounter++;

			endwhile;

		else :

			// no rows found

		endif;

		?>

		<?php wp_reset_query(); ?>

	</div>

	<?php

	// check if the repeater field has rows of data
	if( have_rows('column_rows_after_stories') ):

		// loop through the rows of data
		while ( have_rows('column_rows_after_stories') ) : the_row();

	?>		

		<div class="column-rows">

			<hr>

			<?php if ( get_sub_field('column_full_row_after_stories') != NULL ) { ?>

				<p><?php the_sub_field('column_full_row_after_stories'); ?></p>

			<?php } ?>
						
			<div class="<?php if ( get_sub_field('column_row_text_left_after_stories') != NULL || have_rows('inset_button_left_after_stories') ) { ?>column <?php } ?>col-lg-6 col-md-6 col-sm-6">

				<div class="columned-text">
					
					<p><?php the_sub_field('column_row_text_left_after_stories'); ?></p>

				</div>

				<?php

				// check if the repeater field has rows of data
				if( have_rows('inset_button_left_after_stories') ):

					// loop through the rows of data
					while ( have_rows('inset_button_left_after_stories') ) : the_row();

				?>		

					<div class="<?php the_sub_field('inset_button_left_background_color_after_stories'); ?> inset-box">

						<h2><?php the_sub_field('inset_button_left_title_after_stories'); ?></h2>

						<p><?php the_sub_field('inset_button_left_content_after_stories'); ?></p>

						<?php if ( get_sub_field('inset_button_left_link_after_stories') != NULL ) { ?>

							<a href="<?php the_sub_field('inset_button_left_link_after_stories'); ?>"><?php the_sub_field('inset_button_left_link_text_after_stories'); ?> <?php if ( get_sub_field('inset_button_left_background_color_after_stories') == 'black' ) { ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gold-arrow.png" alt="<?php the_sub_field('inset_button_left_link_text_after_stories'); ?>"><?php  } else { ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_sub_field('inset_button_left_link_text_after_stories'); ?>"><?php } ?></a>

						<?php } ?>

					</div>

				<?php	

					endwhile;

				else :

					// no rows found

				endif;

				?>

			</div>

			<div class="<?php if ( get_sub_field('column_row_text_right_after_stories') || have_rows('inset_button_right_after_stories') != NULL ) { ?>column <?php } ?>col-lg-6 col-md-6 col-sm-6">

				<div class="columned-text">
					
					<p><?php the_sub_field('column_row_text_right_after_stories'); ?></p>

				</div>

				<?php

				// check if the repeater field has rows of data
				if( have_rows('inset_button_right_after_stories') ):

					// loop through the rows of data
					while ( have_rows('inset_button_right_after_stories') ) : the_row();

				?>		

					<div class="<?php the_sub_field('inset_button_right_background_color_after_stories'); ?> inset-box">

						<h2><?php the_sub_field('inset_button_right_title_after_stories'); ?></h2>

						<p><?php the_sub_field('inset_button_right_content_after_stories'); ?></p>

						<?php if ( get_sub_field('inset_button_right_link_after_stories') != NULL ) { ?>

							<a href="<?php the_sub_field('inset_button_right_link_after_stories'); ?>"><?php the_sub_field('inset_button_right_link_text_after_stories'); ?> <?php if ( get_sub_field('inset_button_right_background_color_after_stories_after_stories') == 'black' ) { ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gold-arrow.png" alt="<?php the_sub_field('inset_button_right_link_text_after_stories'); ?>"><?php  } else { ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_sub_field('inset_button_right_link_text_after_stories'); ?>"><?php } ?></a>

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

			<?php if ( get_sub_field('bottom_divider_after_stories') == "yes" ) { ?>

				<hr>

			<?php } ?>

		</div>

	<?php	

		endwhile;

	else :

		// no rows found

	endif;

	?>

</div>

</div>

</div>

