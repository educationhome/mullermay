<?php
/**
 * Slider Block template.
 *
 * @param array $block The block settings and attributes.
 */

 
 
$sliderHeadline = get_field("mm_bl_slider_headline");
$sliders = get_field("mm_bl_sliders");
?>


<div class="flexible-block" data-template="slider">
    <h2 class="heading heading-h2 padding__bottom-small c-padding__slider"><?php echo $sliderHeadline; ?></h2>
    <div class="swiper mullermaySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($sliders as $slider): ?>
                <div class="swiper-slide">
                    <img class="mullermaySwiper__image lazy" data-src="<?php echo $slider["mm_bl_slider_photo"]["url"]; ?>" alt="<?php echo $slider["mm_bl_slider_photo"]["title"]; ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-arrow-button --is-next">
            <?php get_template_part("partials/common", "sprite-svg", [
            "name" => "slider-arrow-right",
            "classes" => "icon__arrow",
            ]); ?>
        </div>
        <div class="swiper-arrow-button --is-prev">
            <?php get_template_part("partials/common", "sprite-svg", [
            "name" => "slider-arrow-left",
            "classes" => "icon__arrow",
            ]); ?>
        </div>
    </div>
</div>