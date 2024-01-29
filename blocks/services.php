<?php
/**
 * Services Block template.
 *
 * @param array $block The block settings and attributes.
 */

$servicesHeadline = get_field("mm_bl_sb_header");
$servicesBlock = get_field("mm_bl_sb_service_block");
?>


<div class="section container--small" data-template="services">
    <div class="section__inner">
        <h2 class="heading heading-h2">
            <?php echo $servicesHeadline; ?>
        </h2>

        <div class="fb-service">
            <?php foreach($servicesBlock as $block): ?>
                <div class="fb-service__block">
                    <img class="fb-service__photo lazy" data-src="<?php echo $block["mm_bl_sb_bl_photo"]["url"]; ?>" alt="<?php echo $block["mm_bl_sb_bl_photo"]["title"]; ?>">

                    <div class="fb-service__content">
                        <h3 class="heading heading-h3"><?php echo $block["mm_bl_sb_bl_header"] ?></h3>

                        <div class="fb-service__time">
                            <?php get_template_part("partials/common", "sprite-svg", [
                                "name" => "time",
                                "classes" => "icon__time",
                            ]); ?>

                            <p class="paragraph paragraph__semi-bold paragraph__purple">Diese Therapieform umfasst ca. <?php echo $block["mm_bl_sb_bl_time"]; ?> Minuten.</p>
                        </div>
                        
                        <div class="text-content fb-service__text"><?php echo $block["mm_bl_sb_bl_text"]; ?></div>

                        <button class="fb-service__load-text-button">
                            <p class="paragraph paragraph__semi-bold paragraph__primary-family fb-service__text-open">
                                <?php _e("Weiterlesen"); ?>
                            </p>
                            <p class="paragraph paragraph__semi-bold paragraph__primary-family fb-service__text-close --hide">
                                <?php _e("Schließen"); ?>
                            </p>
                            <?php get_template_part("partials/common", "sprite-svg", [
                                "name" => "drop-down-button",
                                "classes" => "icon__drop-down-button --service",
                            ]); ?>
                        </button>
                        

                        <a href="#" type="button" class="button --bg-orange">
                            <p class="paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold">
                                <?php _e("Termin finden"); ?>
                            </p>
                        </a>
                    </div>

                    <div class="fb-service__background">
                        <?php get_template_part("partials/common", "sprite-svg", [
                        "name" => "mullermay-logo-form",
                        "classes" => "icon__background-logo",
                        ]); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>