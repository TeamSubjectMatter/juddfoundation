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

foreach ( $custom_fields as $field_key => $field_values ) {
	foreach ( $field_values as $key => $value )
		echo $field_key . ' - ' . $value . '<br />';
}
?>
	<div class="block-4">
        <a href="<?php the_permalink(); ?>" class="">
        <?php the_title(); ?>
        </a>
	</div>
<?php 
	endwhile; 
?>
</article>