<?php 

	$newsrollid = get_id_by_slug('news');

	$src = wp_get_attachment_image_src( get_post_thumbnail_id($newsrollid), array( 1248,834 ), false, ''  ); 

?>

<div id="page-hero" style="background: url('<?php echo $src[0]; ?>') no-repeat top center; -webkit-font-smoothing: antialiased; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale')';">
	
</div>

<?php wp_reset_query(); ?>

<div id="news-content-container">

	<div id="page-content-container">

		<div id="page-tabs" class="container">

			<div class="sibling-nav">

				<p class="filter-dropdown-button">See More &#9662;</p>

				<ul>
					<li><a href="<?php echo home_url(); ?>/news">All News</a></li>
					<?php wp_list_categories( array(
					    'title_li' => '',
					    'orderby' => 'name',
					    'exclude' => array( 1 )
					) ); ?> 
				</ul>

			</div>

		</div>

		<div id="page-content" class="container">

			<div id="news-roll" class="col-ld-12 col-md-12 col-sm-12 col-xs-12">

				<h1>News</h1>

				<hr>

				<?php wp_reset_query(); ?>

				<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>

						<?php global $post; ?>

						<div class="newsroll-single-container">

							<div class="inner">
							
								<!-- <span><?php the_category( ); ?></span> -->

								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<div class="news-excerpt"><?php the_field('news_excerpt', $post->id); ?></div>

								<a href="<?php the_permalink(); ?>" class="newsroll-red-more">Read more <img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_title(); ?>"></a>

							</div>

							<hr>

						</div>

					<?php endwhile; ?>
						
				<?php endif; ?>

				<div class="clear"></div>

			</div>

			<!-- <div id="news-sidebar" class="col-ld-2 col-md-2 col-sm-2 col-xs-12 mobile">

				<ul>
					<li class="news-sidebar-header">Categories</li>
					<li><hr></li>
				    <?php wp_list_categories( array(
				    	'title_li' => '',
				        'orderby' => 'name',
				        'exclude' => array( 1 )
				    ) ); ?> 
				</ul>

			</div> -->

		</div>

	</div>

</div>