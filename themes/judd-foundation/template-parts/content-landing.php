<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

</article>

<article>
	
	<?php if( have_rows('content_blocks') ): ?>
	<?php while( have_rows('content_blocks') ): the_row(); 
		// vars
		$heading = get_sub_field('heading');
		$image = get_sub_field('image');
		$text = get_sub_field('text');
		$more = get_sub_field('more_text');
		$link = get_sub_field('link');
	?>

	<div class="block-3">
		<img src="<?php echo $image; ?>" class="img-responsive" alt="" />

		<h2><?php echo $heading; ?></h2>

		<?php echo $text; ?>

		<p><a href="<?php echo $link; ?>"><?php echo $more; ?></a></p>

	</div>

	<?php endwhile; ?>
	<?php endif; ?>

</article>