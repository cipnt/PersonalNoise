<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package personalnoise
 */
?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
</div><!-- #wrapper -->

<div id="subfooter">
	<span><?php printf( __( 'Powered by %s', 'personalnoise' ), '<a href="' . esc_url( __( 'http://wordpress.org/', 'personalnoise' ) ) . '">WordPress</a>' ); ?></span>
				<span class="sep"> | </span><wbr>
				<span><?php printf( __( 'Theme: %1$s', 'personalnoise' ), '<a href="http://ciprian.cucuruz.uk/personalnoise" rel="designer">Personal Noise</a>' ); ?></span>
</div>

<?php
	$options = personalnoise_get_theme_options();
	if ( ''!= $options['ganalytics'] ) : ?>
<script><!-- Google Analytics -->
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo esc_attr( $options['ganalytics'] ); ?>', 'auto');
  ga('send', 'pageview');
</script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
