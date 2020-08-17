<footer id="content-info" role="contentinfo">
	<div class="border-bottom">
		<div class="container">
			<div id="footer-logo" class="col-lg-1 col-md-1 col-sm-1">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ucf-footer-logo.png" alt="University of Central Florida">
			</div>
			<div class="col-lg-3 col-md-4 col-sm-4">
				<?php dynamic_sidebar('footer-address'); ?>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3">
				<?php dynamic_sidebar('footer-mailing-address'); ?>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3">
				<?php dynamic_sidebar('footer-contact-numbers'); ?>
			</div>
		</div>
	</div>
</footer>

<?php if ( get_field('social_buttons') == 'share' ) { ?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/rrssb.css" />

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/rrssb.min.js"></script>

<?php } ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/jquery.formatDateTime.min.js"></script>

<?php if (GOOGLE_ANALYTICS_ID) : ?>
<script>
  var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

<?php wp_footer(); ?>