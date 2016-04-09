<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article id="post-<?php the_ID(); ?>" class="singleContent">

	<section class="page-content-area">
		<h1><?php the_title(); ?></h1>
		
		<?php the_field('location'); ?>
		<?php the_content(); ?>
	</section>

	<section class="right-sidebar">
	<?php if( have_rows('sidebar_content_blocks') ): ?>
		<ul>
	
		<?php while( have_rows('sidebar_content_blocks') ): the_row();  ?>
			<li>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); ?>
				<a class="right-side-images" href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>"></a>
			</li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
   </section>

</article>
