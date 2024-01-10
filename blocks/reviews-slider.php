<?php
/**
 * Reviews Block template.
 *
 * @param array $block The block settings and attributes.
 */

$reviewsHeadline =  get_field("mm_bl_r_headline");
$reviewsList = get_field("mm_bl_r_list");
?>
<div class="flexible-block || container__small || padding__top-small padding__bottom-small" data-template="reviews-slider">
    <div class="flexible-block__inner">
        <h2 class="heading heading__h2"><?php echo $reviewsHeadline; ?></h2>

        <div class="swiper reviewsSlider">
            <div class="swiper-wrapper || fb-review">
                <?php foreach($reviewsList as $review): ?>
                    <div class="swiper-slide">
                       
                        <div class="fb-review__item || margin__top-small">
                            <?php if ($review["mm_bl_r_icon"] == 0): ?>
                                <?php get_template_part("partials/common", "sprite-svg", [
                                "name" => "review-logo",
                                "classes" => "icon__review-logo",
                                ]); ?>
                            <?php else: ?>
                               <img src="<?php echo $review["mm_bl_r_icon"]["url"]; ?>" alt="<?php echo $review["mm_bl_r_icon"]["title"]; ?>">
                            <?php endif; ?>

                            <div class="fb-review__item-content">
                                <p class="paragraph paragraph__semi-bold"><?php echo $review["mm_bl_r_text_content"]; ?></p>

                                <div>
                                    <p class="paragraph"><?php echo $review["mm_bl_r_name"]; ?></p>
                                    <p class="paragraph paragraph__small paragraph__body"><?php echo $review["mm_bl_r_info"]; ?></p>  
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="reviews-pagination || margin__top-small"></div>
        </div>
    </div>
</div>