<?php
/*
Template Name: Home
*/

	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1248,834 ), false, ''  );

?>

<div id="home-hero" style="background: url('<?php echo $src[0]; ?>') no-repeat top center; -webkit-font-smoothing: antialiased; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale')';">
	
	<div id="home-hero-content">

		<div class="container">

			<div class="col-lg-6 col-md-6 col-sm-6">
				
				<h1><?php the_field('home_hero_tagline'); ?></h1>

			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				
				<p><?php the_field('home_hero_content'); ?></p>
				
			</div>

		</div>

	</div>

</div>

<div id="home-events" class="home-section">

	<div class="container">

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

			<h2><?php the_field('home_features_title'); ?></h2>

			<hr>

			<?php global $post; ?>

			<?php wp_reset_query(); ?>
		
			<?php
			$args = array( 'post_type' => 'post', 'orderby'=> 'menu_order', 'order'=>'ASC', 'posts_per_page' => 3, 'category' => 4);
			$lastposts = get_posts( $args );
			foreach($lastposts as $post) : setup_postdata($post);

			?>

					<h3><?php the_title(); ?></h3>

					<a href="<?php the_permalink(); ?>">See Details <img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_title(); ?>"></a>

					<br/>
					<br/>

			<?php 

			endforeach; 

			?>

			<?php wp_reset_query(); ?>

		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

			<h2><?php the_field('home_news_titles'); ?></h2>

			<hr>

			<?php wp_reset_query(); ?>
		
			<?php
			$args = array( 'post_type' => 'post', 'orderby'=> 'menu_order', 'order'=>'ASC', 'posts_per_page' => 3, 'category' => -4);
			$lastposts = get_posts( $args );
			foreach($lastposts as $post) : setup_postdata($post);

			?>

					<h3><?php the_title(); ?></h3>

					<a href="<?php the_permalink(); ?>">See Details <img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_title(); ?>"></a>

					<br/>
					<br/>

			<?php 

			endforeach; 

			?>

			<?php wp_reset_query(); ?>

		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

			<h2><?php the_field('home_events_title'); ?></h2>

			<hr>

			<div id="upcoming-diversity-events"></div>

			<script>

				(function() {
					var flickerAPI = "https://events.ucf.edu/calendar/2829/office-of-diversity-and-inclusion/upcoming/feed.json";
					$.getJSON( flickerAPI, {
					    format: "json"
					})
					.done(function( data ) {
					    $.each( data.slice(0,3), function( key, val ) {
					        var single_event = 
					        	'<div class="event">' +
					        		'<h3>'+val.title+'</h3>' +
					        		'<span class="startdate">'+val.starts+'</span>' +
					        		'<a href="'+val.url+'" target="_blank">See Details <img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="See Details"></a>' +
					        		'<br/>' +
					        		'<br/>' +
					        	'</div>';
					        $( "#upcoming-diversity-events" ).append(single_event);
					        $( ".startdate" ).formatDateTime('MM d, yy g:ii a');
					    });
					});
				})();

			</script>

		</div>

	</div>

</div>	

<div id="home-programs" class="home-section">

	<div class="container">
	
		<h2><?php the_field('home_programs_title'); ?></h2>

		<hr>

		<?php

		// check if the repeater field has rows of data
		if( have_rows('home_programs_featured_programs') ):

			$procounter = 0;

			// loop through the rows of data
			while ( have_rows('home_programs_featured_programs') ) : the_row();

				$procounter++;

			endwhile;

		else :

			// no rows found

		endif;

		?>

		<?php if( $procounter == 1 || $procounter == 2 ): ?>

		<div class="col-lg-4 col-md-4 col-sm-4">
			
			<p class="intro-content"><?php the_field('home_programs_intro_content'); ?></p>

		</div>

		<?php endif; ?>

		<?php

		// check if the repeater field has rows of data
		if( have_rows('home_programs_featured_programs') ):

			// loop through the rows of data
			while ( have_rows('home_programs_featured_programs') ) : the_row();

		?>		

			<div class="col-lg-4 col-md-4 col-sm-4">
				
				<h3><?php the_sub_field('program_title'); ?></h3>

				<p><?php the_sub_field('program_content'); ?></p>

				<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_title'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-arrow.png" alt="<?php the_sub_field('link_title'); ?>"></a>
				
			</div>

		<?php	

			endwhile;

		else :

			// no rows found

		endif;

		?>

	</div>

</div>

<div id="home-workshops" class="home-section">

	<div class="container">

		<h2><?php the_field('home_workshops_title'); ?></h2>

		<hr>
		
		<?php

		// check if the repeater field has rows of data
		if( have_rows('home_workshops') ):

			// loop through the rows of data
			while ( have_rows('home_workshops') ) : the_row();

		?>		

			<div class="col-lg-4 col-md-4 col-sm-4">
				
				<h3><?php the_sub_field('home_workshops_title'); ?></h3>

				<p><?php the_sub_field('home_workshops_content'); ?></p>

				<a href="<?php the_sub_field('home_workshops_link'); ?>"><?php the_sub_field('home_workshops_link_title'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gold-arrow.png" alt="<?php the_sub_field('home_workshops_link_title'); ?>"></a>
				
			</div>

		<?php	

			endwhile;

		else :

			// no rows found

		endif;

		?>

	</div>

</div>



