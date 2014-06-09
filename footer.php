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
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'personalnoise' ) ); ?>"><?php printf( __( 'Powered by %s', 'personalnoise' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'personalnoise' ), 'Personal Noise', '<a href="http://ciprian.cucuruz.ro/" rel="designer">Ciprin Cucuruz</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
</div><!-- #wrapper -->
<?php wp_footer(); ?>

</body>
</html>
