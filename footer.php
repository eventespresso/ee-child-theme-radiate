<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */
?>

		</div><!-- .inner-wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'radiate_credits' ); ?>
			<?php printf( __( 'Registration & Ticketing Powered by %1$s by %2$s.', 'radiate' ), 'Event Espresso', '<a href="'.esc_url('https://eventespresso.com/?utm_source=espresso_theme_footer&utm_medium=link&utm_campaign=espresso_themes').'" rel="designer">Event Espresso</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>