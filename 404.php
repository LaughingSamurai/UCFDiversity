<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(12), array( 1248,834 ), false, ''  ); ?>

<div id="page-hero" style="background: url('<?php echo $src[0]; ?>') no-repeat top center; -webkit-font-smoothing: antialiased; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $src[0]; ?>',sizingMethod='scale')';">
	
</div>

<?php wp_reset_query(); ?>

<div id="page-content-container">

	<div id="page-content" class="container">

		<h1>Sorry</h1>

		<h2>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</h2>

		<h3>Please try the following:</h3>

		<ul>
			<li><?php _e('Check your spelling', 'roots'); ?></li>
			<li><?php printf(__('Return to the <a href="%s">home page</a>', 'roots'), home_url()); ?></li>
			<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'roots'); ?></li>
		</ul>

	</div>

</div>