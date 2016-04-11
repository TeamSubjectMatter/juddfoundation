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
		
		<!-- For Spaces -->
		<?php if (the_field('location')): ?>
		<p><?php the_field('location'); ?></p>
		<?php endif; ?>

		<?php the_content(); ?>
	</section>

	<section class="right-sidebar">
	<?php if( have_rows('sidebar_content_blocks') ): ?>
		<ul>
		<?php while( have_rows('sidebar_content_blocks') ): the_row();  ?>

			<li class="thumbs">

		  		<?php $post_object = get_sub_field('sidebar_post'); ?> 
                <?php if( $post_object ): ?>
                    <?php $post = $post_object; setup_postdata( $post ); ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); ?>
                    <a class="right-side-images" href="<?php the_permalink(); ?>">
						<div class="overlay">
							<p><?php the_title(); ?></p>
						</div>
						<img src="<?php echo $image[0]; ?>">
					</a>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
			</li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
   </section>
</article>