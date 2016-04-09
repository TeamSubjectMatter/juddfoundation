<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article id="post-<?php the_ID(); ?>" class="galleryViewB">
	<h1><?php the_title(); ?></h1>
	<h2><?php the_content(); ?></h2>
</article>

<article>

<?php 

	$args = array(
		'post_type' => 'spaces'
	);
	$query = new WP_Query($args);
	
	if(have_posts()) : 
		while(have_posts()) : the_post(); 
?>
 
	<div class="block-4">
        <a href="<?php the_permalink(); ?>" class="">
        <?php the_title(); ?>
        <?php the_post_thumbnail('', array('class' => 'img-responsive')); ?></a>
	</div>
	<?php endwhile; endif; ?>

</article>