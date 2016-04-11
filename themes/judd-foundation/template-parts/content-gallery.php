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
	<nav>
		<ul>
			<li></li>
		</ul>
	</nav>
	<p class="label">Sort By</p>
	<ul class="dropdown">
		<p id="title">Decade:</p>
		<li class="dropdown-list"><a href="#">1950s</a></li>
		<li class="dropdown-list"><a href="#">11960s</a></li>
		<li class="dropdown-list"><a href="#">1970s</a></li>
	</ul>
</article>
<article>

<?php 
	// query custom post types based on page slug 
	query_posts( array( 
					'post_type' => array(get_post_field( 'post_name', get_post() ) )
				 ) );
	while(have_posts()) : the_post(); 

	//get thumbnail URL
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];
?>
	<div class="block-4">
			<a href="<?php the_permalink(); ?>" class="">
	        	<img src="<?= $thumb_url; ?>">
				<div class="overlay-content">
					<p><?php the_title(); ?></p>
				</div>
	        </a>
	</div>
<?php endwhile; ?>
</article>