<div id="news-content-container">

	<div id="page-tabs" class="container">

		<div class="sibling-nav">

			<p class="filter-dropdown-button">See More &#9662;</p>

			<ul>
				<?php wp_list_categories( array(
				    'title_li' => '',
				    'orderby' => 'name',
				    'exclude' => array( 1 )
				) ); ?> 
			</ul>

		</div>

	</div>

	<div id="page-content" class="container">

		<div id="news-roll" class="col-ld-10 col-md-10 col-sm-10 col-xs-12">

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