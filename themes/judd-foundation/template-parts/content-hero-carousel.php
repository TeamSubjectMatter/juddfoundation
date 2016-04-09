<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package judd-foundation
 */


?>
<div class="hero" style='background-image: url("<?php echo the_field('hero_image'); ?>");'>
</div>



<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
        <div data-p="225.00">
            <img data-u="image" src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" />
        </div>
        <div data-p="225.00">
            <img data-u="image" src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" />
        </div>
        <div data-p="225.00">
            <img data-u="image" src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" />
        </div>        
    </div>
    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
</div>