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

	<section class="page-content-area-full">
		<?php the_post_thumbnail(); ?>
	</section>
	
	<h1><?php the_title(); ?></h1>
	<h2><?php the_content(); ?></h2>

</article>

<article>

    <?php while ( have_rows('gallery_block_b') ) : the_row(); ?>  
	<div class="block-4">
        <?php if( get_sub_field('gallery_b_item') ): ?>
        <?php $post = $post_object; setup_postdata( $post ); ?>
        <a href="<?php the_permalink(); ?>" class="">
        <?php the_post_thumbnail('', array('class' => 'img-responsive')); ?></a>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
	</div>
	<?php endwhile; ?>

</article>