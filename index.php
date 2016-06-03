<?php 

	$newsrollid = get_id_by_slug('news');

	$src = wp_get_attachment_image_src( get_post_thumbnail_id($newsrollid), array( 1248,834 ), false, ''  ); 

?>

<div id="page-hero" style="background: url('<?php echo $src[0]; ?>') no-repeat top center; -webkit-font-smoothing: antialiased; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale')';">
	
</div>

<?php wp_reset_query(); ?>

<div id="news-content-container">

	<div id="page-content-container">

		<div id="page-content" class="container">

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

			<?php if ( is_category() ) { ?>

				<?php $current_category = single_cat_title(); ?>

				<h1><?php echo $current_category; ?></h1>

			<?php } else { ?>

				<h1>News</h1>

			<?php } ?>

				<hr>

				<?php wp_reset_query(); ?>

				<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>

						<?php global $post; ?>

						<div class="newsroll-single-container">

							<div class="inner">

								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<span class="article-meta"><?php the_date( 'F j, Y' ); ?></span>

								<div class="news-excerpt"><?php the_field('news_excerpt', $post->id); ?></div>

								<a href="<?php the_permalink(); ?>" class="newsroll-red-more">Read more <img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_title(); ?>"></a>

							</div>

							<hr>

						</div>

					<?php endwhile; ?>
						
				<?php endif; ?>

				<div class="clear"></div>

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