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
	query_posts( array( 
					/* query custom post types based on page slug */
					'post_type' => array(get_post_field( 'post_name', get_post() ) ),
					'showposts' => 10
				 ) );
	while(have_posts()) : the_post(); 

?>

<?php
$custom_fields = get_post_custom();

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];
?>
	<div class="block-4">
        <a href="<?php the_permalink(); ?>" class="">
        <?php the_title(); ?>
        <img src ="<?php echo $thumb_url; ?>">
        </a>
	</div>
<?php 
	endwhile; 
?>
</article>