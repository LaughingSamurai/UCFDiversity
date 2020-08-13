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

	$i = 1;

	// check if the repeater field has rows of data
	if( have_rows('column_rows') ):

		// loop through the rows of data
		while ( have_rows('column_rows') ) : the_row();

	?>		

		<div class="column-rows">

			<?php if ( get_sub_field('column_full_row') != NULL ) { ?>

				<?php the_sub_field('column_full_row'); ?>

			<?php } ?>
						
			<div class="<?php if ( get_sub_field('column_row_text_left') != NULL || have_rows('inset_button_left') ) { ?>column <?php } ?>col-lg-6 col-md-6 col-sm-6">

				<div class="columned-text">
					
					<?php the_sub_field('column_row_text_left'); ?>

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
					
					<?php the_sub_field('column_row_text_right'); ?>

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

		<?php if ( $i === 1 ) { ?>

			<?php if ( get_field('display_timeline') === 'yes' ) { ?>

				<div class="timeline-container">

					<div class="history-line"></div>

					<div class="timeline-content">

						<?php if( have_rows('timeline_slide') ): ?>
						
							<?php while ( have_rows('timeline_slide') ) : the_row(); ?>

								<div class="slide <?php the_sub_field('timeline_display_width'); ?>">

									<div class="inner">
									
										<h3 class="year"><?php the_sub_field('timeline_year'); ?></h3>

										<div class="clear"></div>

										<?php if( have_rows('timeline_content_columns') ): ?>
						
											<?php while ( have_rows('timeline_content_columns') ) : the_row(); ?>

												<div class="year-content">
													<div class="inner">
														<?php the_sub_field('timeline_content'); ?>
													</div>
												</div>

											<?php endwhile; ?>
						
										<?php endif; ?>

									</div>

								</div>

							<?php endwhile; ?>
						
						<?php endif; ?>

					</div>

				</div>

			<?php } ?>

		<?php } ?>

	<?php	

		$i++;

		endwhile;

	endif;

	?>

	<?php if ( get_field('display_logos') === 'yes' ) { ?>

		<div class="logo-container">

			<?php if( have_rows('logos') ): ?>

				<ul>
				
					<?php while ( have_rows('logos') ) : the_row(); ?>

						<li>
							<a href="<?php the_sub_field('logo_link'); ?>" target="_blank">
								<img src="<?php the_sub_field('logo_image'); ?>" alt="<?php the_sub_field('logo_name'); ?>" />
							</a>
						</li>

					<?php endwhile; ?>

				</ul>
				
			<?php endif; ?>

		</div>

	<?php } ?>

	<?php if ( get_field('display_highlights_section') === 'yes' ) { ?>

		<div class="highlights-container">

			<div class="column-rows row">
						
				<div class="col-lg-8 col-md-8 col-sm-12">

					<?php if( have_rows('highlights') ): ?>

						<ul>
						
							<?php while ( have_rows('highlights') ) : the_row(); ?>

								<li>
									<?php if ( get_sub_field('highlight_image') ): ?>
										<div class="highlight-image">
											<img src="<?php the_sub_field('highlight_image'); ?>" alt="<?php the_sub_field('highlight_title'); ?>" />
										</div>
									<?php endif; ?>
									<div class="highlight-content">
										<span><?php the_sub_field('highlight_subtitle'); ?></span>
										<h3>
											<a href="<?php the_sub_field('highlight_link'); ?>" target="_blank"><?php the_sub_field('highlight_title'); ?></a>
										</h3>
										<p><?php the_sub_field('highlight_excerpt'); ?></p>
									</div>
								</li>

							<?php endwhile; ?>

						</ul>
						
					<?php endif; ?>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-12">

					<?php if ( get_field('highlights_sidebar') ): ?>

						<div class="highlights-sidebar">

							<div class="content">
								
								<?php the_field('highlights_sidebar'); ?>

							</div>

							<?php 
									$link = get_field('hightlights_sidebar_learn_more_link');
									if( $link ): 
									    $link_url = $link['url'];
									    $link_title = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a href="<?php echo esc_url( $link_url ); ?>" class="button" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; ?>

						</div>

					<?php endif; ?>

				</div>

			</div>

		</div>

	<?php } ?>

	<div class="clear"></div>

</div>

</div>

</div>

