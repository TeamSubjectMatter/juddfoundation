<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>
<?php 
	$query = new WP_Query();
	$pages = $query->query(array('post_type' => 'page'));

get_page_children( $page_id, $pages ) ?>



<article id="page-<?php the_ID(); ?>" class="twoColumn">
	<!--<h2><?php the_title(); ?></h2>-->
	<?php 
			$args = array(
				'post_parent' => get_the_ID(),
				'post_status' => 'publish'
				);
			$child_page = get_children( $args);
			if($child_page):
				echo '<div class="sub-nav">';
					foreach($child_page as $child){
						$childID = $child->ID;
						echo '<h2 class="breadcrum"><a class="nav" href="'.get_the_permalink($childID).'"';
						if($childID == $post->ID){
							echo "current";
						} 
						echo '>' .get_the_title($childID).'</a></h2>';
					}
				echo '</div>';
			endif;
		?>
	<div class="column-one">
		<?php the_field('column_1_text'); ?>
	</div>

	<div class="column-two">
		<?php the_field('column_2_text'); ?>
	</div>
</article>