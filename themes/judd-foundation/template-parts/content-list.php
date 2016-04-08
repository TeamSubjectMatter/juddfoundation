<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article>
	<h1><?php the_title(); ?></h1>
</article>

	<?php if( have_rows('content_blocks') ): ?>
		<article>
		<?php while( have_rows('content_blocks') ): the_row(); 
			// vars
			$heading = get_sub_field('heading');
			$image = get_sub_field('image');
			$text = get_sub_field('text');
			$more = get_sub_field('more_text');
			$link = get_sub_field('link');
		?>

			<img src="<?php echo $image; ?>" class="img-responsive" alt="" />

			<h2><?php echo $heading; ?></h2>

			<?php echo $text; ?>

			<p><a href="<?php echo $link; ?>">More<?php echo $more; ?></a></p>

		<?php endwhile; ?>
		
		</article>
		<div class="nav-previous alignleft"><?php next_posts_link( 'Previous Page' ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( 'Next Page' ); ?></div>
	<?php endif; ?>