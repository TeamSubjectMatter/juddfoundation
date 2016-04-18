<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package judd-foundation
 */


?>

<?php if (has_post_thumbnail( ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' ); ?>
<?php endif; ?>

<div style='background-image: url("<?php echo $image[0]; ?>"); width:100%; height:60px; text-align:center; margin-bottom:-1em;'>
</div>
