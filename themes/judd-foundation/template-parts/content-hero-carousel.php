<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package judd-foundation
 */
?> 
<script type="text/javascript">
    var jssor_1_SlideoTransitions = [
        [{b: 5500, d: 3000, o: -1, r: 240, e: {r: 2}}],
        [{b: -1, d: 1, o: -1, c: {x: 51.0, t: -51.0}}, {b: 0, d: 1000, o: 1, c: {x: -51.0, t: 51.0}, e: {o: 7, c: {x: 7, t: 7}}}],
        [{b: -1, d: 1, o: -1, sX: 9, sY: 9}, {b: 1000, d: 1000, o: 1, sX: -9, sY: -9, e: {sX: 2, sY: 2}}],
        [{b: -1, d: 1, o: -1, r: -180, sX: 9, sY: 9}, {b: 2000, d: 1000, o: 1, r: 180, sX: -9, sY: -9, e: {r: 2, sX: 2, sY: 2}}],
        [{b: -1, d: 1, o: -1}, {b: 3000, d: 2000, y: 180, o: 1, e: {y: 16}}],
        [{b: -1, d: 1, o: -1, r: -150}, {b: 7500, d: 1600, o: 1, r: 150, e: {r: 3}}],
        [{b: 10000, d: 2000, x: -379, e: {x: 7}}],
        [{b: 10000, d: 2000, x: -379, e: {x: 7}}],
        [{b: -1, d: 1, o: -1, r: 288, sX: 9, sY: 9}, {b: 9100, d: 900, x: -1400, y: -660, o: 1, r: -288, sX: -9, sY: -9, e: {r: 6}}, {b: 10000, d: 1600, x: -200, o: -1, e: {x: 16}}]
    ];
</script>

<div id="slider1_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">

    <script>
        jQuery(document).ready(function ($)
        {
<?php if (have_rows('images')): ?>
                var options = {
                    $AutoPlay: false,
                    $SlideDuration: 1200,
                    $SlideEasing: $Jease$.$OutQuint,
                    $CaptionSliderOptions: {
                        $Class: $JssorCaptionSlideo$,
                        $Transitions: jssor_1_SlideoTransitions
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    }
                };
<?php else: ?>
                var options = {
                    $AutoPlay: false,
                    $DragOrientation: 0,
                    $SlideDuration: 1200,
                    $SlideEasing: $Jease$.$OutQuint,
                    $CaptionSliderOptions: {
                        $Class: $JssorCaptionSlideo$,
                        $Transitions: jssor_1_SlideoTransitions
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    }
                };
<?php endif; ?>
            var jssor_slider1 = new $JssorSlider$('slider1_container', options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_slider1.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('<?= get_template_directory_uri(); ?>/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
        <!-- get featured image -->
<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true, $attr);
$thumb_url = $thumb_url_array[0];
$thumb_caption = $thumb_id->post_excerpt;
?>
        <div data-p="225.00">
            <img data-u="image" src="<?php echo $thumb_url; ?>" style="height: 100%; width: auto;"/>
        <?php if (get_post(get_post_thumbnail_id())->post_excerpt) { ?><div data-u="caption" class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div> <?php } ?>
        </div>

        <!-- get other images -->
<?php if (have_rows('images')): ?>
    <?php while (have_rows('images')): the_row(); ?>
                <div data-p="225.00">
                    <img data-u="image" src="<?php the_sub_field('image'); ?>" style="height: 100%; width: auto;" />
                <?php
                $text = get_sub_field('copyright');
                $stripped_text = str_replace(array('<p>', '</p>'), '', $text);
                if ($text) {
                    ?>            
                        <div data-u="caption" class="caption"><?php echo $stripped_text; ?></div>
                    <?php }
                    ?>
                </div>        
                <?php endwhile; ?>
            <?php endif; ?>
    </div>
    <!-- Arrow Navigator-->
    <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
</div>