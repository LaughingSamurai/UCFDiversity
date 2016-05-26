<div id="news-content-container">

	<div id="page-content" class="container">

		<div id="news-roll" class="col-ld-10 col-md-10 col-sm-10 col-xs-12">

			<h1>News</h1>

			<hr>

			<?php wp_reset_query(); ?>

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

					<div class="newsroll-single-container">
						
						<span><?php the_category( ); ?></span>

						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<p><?php the_excerpt(); ?></p>

						<hr>

					</div>

				<?php endwhile; ?>
					
			<?php endif; ?>

			<div class="clear"></div>

		</div>

		<div id="news-sidebar" class="col-ld-2 col-md-2 col-sm-2 col-xs-12">

			<ul>
				<li class="news-sidebar-header">Categories</li>
			    <?php wp_list_categories( array(
			    	'title_li' => '',
			        'orderby' => 'name',
			        'exclude' => array( 1 )
			    ) ); ?> 
			</ul>

		</div>

	</div>

</div>