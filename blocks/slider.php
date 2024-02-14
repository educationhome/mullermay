<?php
/**
 * Slider Block template.
 *
 * @param array $block The block settings and attributes.
 */

 
 
$sliderHeadline = get_field("mm_bl_slider_headline");
$sliders = get_field("mm_bl_sliders");
?>


<div class="slider" data-template="slider">
    <h2 class="container--small heading heading-h2 padding__bottom-small"><?php echo $sliderHeadline; ?></h2>
    <div class="swiper mullermaySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($sliders as $slider): ?>
                <div class="swiper-slide">
                    <?php renderImage($slider["mm_bl_slider_photo"], "mullermaySwiper__image", true); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="swiper-arrow-button--is-next" tabindex="0">
            <?php get_template_part("partials/common", "sprite-svg", [
            "name" => "slider-arrow-right",
            "classes" => "icon__arrow",
            ]); ?>
        </button>
        <button class="swiper-arrow-button--is-prev" tabindex="0">
            <?php get_template_part("partials/common", "sprite-svg", [
            "name" => "slider-arrow-left",
            "classes" => "icon__arrow",
            ]); ?>
        </button>
    </div>
</div>