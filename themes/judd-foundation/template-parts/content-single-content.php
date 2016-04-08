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
		
		<?php the_content(); ?>
	</section>

	<section class="right-sidebar">
	<?php while( have_rows('sidebar_content_blocks') ): the_row(); ?>
		<div class="right-side-images">
        	<img src="<?php the_sub_field('image'); ?>" class="img-responsive" alt="">
        </div>
    <?php endwhile; ?>
	</section>

</article>
