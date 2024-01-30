<?php
/**
 * Reviews Block template.
 *
 * @param array $block The block settings and attributes.
 */


$bookNowHeadline = get_field("mm_bl_bn_headline");

$whatsApp = get_field("whatsapp_link_mm_custom_link", "options");
?>

<div class="container--small padding__bottom-small" data-template="book-now">
    <div class="fl-book-now">
        <p class="paragraph paragraph__primary-family paragraph__semi-bold paragraph__medium text-wrapper__headline"><?php echo $bookNowHeadline; ?></p>

        <div class="book-buttons">
            <a href="/terminbuchung/" type="button" class="button --bg-orange" aria-label="Find Termin">
                <p class="paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold">
                    <?php _e("Termin finden"); ?>
                </p>
            </a>

            <?php if($whatsApp["mm_is_cl"]): ?>
                <a href="<?php echo $whatsApp["mm_cl_to_post"]; ?>" type="button" class="button --bg-white" aria-label="Whatsapp Logo">
                    <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "whatsapp",
                            "classes" => "icon__whatsapp-logo",
                    ]); ?>
                    <p class="paragraph paragraph__small paragraph__primary-family paragraph__bold paragraph__dark-green">
                        <?php echo $whatsApp["mm_cl_label"]; ?>
                    </p>
                </a>
            <?php else: ?>
                <a href="<?php echo $whatsApp["mm_cl_to_url"]; ?>" type="button" class="button --bg-white" aria-label="Whatsapp Logo">
                    <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "whatsapp",
                            "classes" => "icon__whatsapp-logo",
                    ]); ?>
                    <p class="paragraph paragraph__small paragraph__primary-family paragraph__bold paragraph__dark-green">
                        <?php echo $whatsApp["mm_cl_label"]; ?>
                    </p>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>



 