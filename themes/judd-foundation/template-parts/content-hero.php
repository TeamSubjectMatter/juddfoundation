<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package judd-foundation
 */

$hero = the_field('hero_image');
?>

<div class="hero" style='background-image: url("http://<?php echo $hero ?>");'>
</div>
