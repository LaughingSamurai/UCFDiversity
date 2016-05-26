<div id="news-content-container">

	<div id="page-content" class="container">

		<div id="news-roll" class="col-ld-9 col-md-9 col-sm-9 col-xs-12">

			<h1>News</h1>

			<hr>

			<?php wp_reset_query(); ?>

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

					<span><?php the_category( ); ?></span>

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<p><?php the_excerpt(); ?></p>

				<?php endwhile; ?>
					
			<?php endif; ?>

			<div class="clear"></div>

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