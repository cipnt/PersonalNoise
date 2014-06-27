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
				<span><?php printf( __( 'Theme: %1$s', 'personalnoise' ), '<a href="http://ciprian.cucuruz.ro/personalnoise" rel="designer">Personal Noise</a>' ); ?></span>
</div>

<?php wp_footer(); ?>

</body>
</html>
