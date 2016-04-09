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

<?php
// query custom post types based on page slug 
query_posts( array( 
				'post_type' => array(get_post_field( 'post_name', get_post() ) )
			 ) );
while(have_posts()) : the_post(); 

	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];
?>
<article>
	<div class="hero" style='background-image: url("<?php echo $thumb_url; ?>");'></div>

	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	<p><a href="<?php the_permalink(); ?>">Read More</a></p>
<?php endwhile; ?>
		
</article>