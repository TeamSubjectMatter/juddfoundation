<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package judd-foundation
 */

wp_head(); ?>
<?php global $random_link_color; ?>
	<div id="primary" class="content-area-404">
		<div class="bg-overlay" style="background:<?php echo $random_link_color;?>">
			<article>
				<h1>Page Not Found</h1>
				<p>We could not find the Web Page you requested. This is either because:</p>
				<p class="nomargin-bottom">There's an error in the address or link.</p>
				<p>Or you have entered the address or link incorrectly.</p>
				<p>Click <a href="<?php echo get_home_url()?>">here</a> to go back to our Home Page.</p>
			</article>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
wp_footer();
