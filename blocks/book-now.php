<?php
/**
 * Reviews Block template.
 *
 * @param array $block The block settings and attributes.
 */


$bookNowHeadline = get_field("mm_bl_bn_headline");

?>

<div class="container--small padding__bottom-small" data-template="book-now">
    <div class="fl-book-now">
        <p class="paragraph paragraph__primary-family paragraph__semi-bold paragraph__medium text-wrapper__headline"><?php echo $bookNowHeadline; ?></p>

        <div class="book-buttons">
            <a href="/terminbuchung/" type="button" class="button --bg-orange">
                <p class="paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold">
                    <?php _e("Termin finden"); ?>
                </p>
            </a>

            <a href="#" type="button" class="button --bg-white">
                <?php get_template_part("partials/common", "sprite-svg", [
                        "name" => "whatsapp",
                        "classes" => "icon__whatsapp-logo",
                ]); ?>
                <p class="paragraph paragraph__small paragraph__primary-family paragraph__bold">
                    <?php _e("Auf Whatsapp chatten"); ?>
                </p>
            </a>
        </div>
    </div>
</div>



 