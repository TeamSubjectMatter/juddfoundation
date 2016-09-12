<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */
?>

<article id="post-<?php the_ID(); ?>" class="nav-3">
    <div>
        <p class="label">Sort By</p>
        <ul class="dropdown">
            <p id="title">Art Type:</p>
            <li class="dropdown-list"><a href="#">All</a></li>
            <?php
            $terms = get_terms('art_type');
            foreach ($terms as $term) {
                echo '<li class="dropdown-list" data-filter=".' . $term->name . '"><a href="#">' . $term->name . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <?php
    $args = array(
        'post_parent' => get_the_ID(),
        'post_status' => 'publish'
    );
    $child_page = get_children($args);
    if ($child_page):
        echo '<div class="sub-nav">';
        foreach ($child_page as $child) {
            $childID = $child->ID;
            echo '<h2 class="breadcrum"><a class="nav" href="' . get_the_permalink($childID) . '"';
            if ($childID == $post->ID) {
                echo "current";
            }
            echo '>' . get_the_title($childID) . '</a></h2>';
        }
        echo '</div>';
    endif;
    ?>
</article>
<article class="grid">

    <?php
    // query custom post types based on page slug + iconic
    query_posts(array(
        'post_type' => array(get_post_field('post_name', get_post())),
        'meta_query' => array(
            array('key' => 'iconic',
                'value' => true,
                'compare' => '=')
        ),
        'posts_per_page' => -1,
        'orderby' => 'rand'
    ));
    $post_ids = array();
    while (have_posts()) : the_post();
        array_push($post_ids, $id = get_the_ID());
    endwhile;
    wp_reset_query();
    wp_reset_postdata();

    // query custom post types based on page slug + not iconic
    query_posts(array(
        'post_type' => array(get_post_field('post_name', get_post())),
        'meta_query' => array(
            array('key' => 'iconic',
                'value' => true,
                'compare' => '!=')
        ),
        'posts_per_page' => -1,
        'orderby' => 'rand'
    ));

    while (have_posts()) : the_post();
        array_push($post_ids, $id = get_the_ID());
    endwhile;
    wp_reset_query();
    wp_reset_postdata();

    foreach ($post_ids as $single_post_id):

        $post = get_post($single_post_id);

        //get thumbnail URL
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
        $thumb_url = $thumb_url_array[0];

        // get full size url
        $full_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
        $full_url = $full_url_array[0];

        $id = get_the_ID();
        $terms = get_the_terms($id, 'art_type');
        ?>
        <div class="block-4 grid-item <?php foreach ($terms as $term) {
        echo $term->name;
    } ?>">
            <a href="<?= $full_url; ?>"  rel="lightbox" title="<?php
    echo get_field('artist') . '<br>';
    echo the_title() . '<br>';
    echo get_field('date') . '<br>';
    echo get_field('dimensions') . '<br>';
    echo get_field('material') . '<br>';
    echo get_field('misc') . '<br>';
    echo get_field('copyright');
        ?>">
                <div class="img-thumb" style="background:url(' <?php echo $thumb_url; ?>'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
                </div>
                <div class="overlay-content">
                    <p><?php the_title(); ?><br/><?php echo get_field('date') ?></p>

                </div>
            </a>
        </div>
        <?php
        wp_reset_query();
        wp_reset_postdata();

    endforeach;
    ?>
</article>