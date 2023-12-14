<?php

/**
 * @var $args array
 */

$headline = $args["headline"];
$headerBackground = $args["headerBackground"];
$overline = $args["overline"];

// Menu!!!
// $menuItems = btc_getMenuItems();

$whatsappLink = "";
$terminLink = ""; 

?>


<header id="main-header" class="c-header">
    <div class="c-header_inner || o-padding -small-top -small-bottom">

        <div class="c-header_row -center || o-container -small ">

            <div class="c-header_column -center">
                
                <span class="c-overline || o-text-wrapper -small">
                    <?php echo $overline; ?>
                </span>
                <h1 class="c-heading -h1 || o-text-wrapper -small">
                    <?php echo $headline; ?>
                </h1>

                <div class="c-header_column -center || o-flex || c-header-contact">
                    <a href="#" type="button" class="c-header-button -bg-orange">
                        <span class="c-overline -text-tr-none -dark-grey">
                            <?php _e("Termin finden"); ?>
                        </span>
                    </a>

                    <a href="#" type="button" class="c-header-button -bg-white -gap8 || o-flex -ai-center -no-media">
                        <?php get_template_part("partials/common", "sprite-svg", [
                                "name" => "whatsapp",
                                "classes" => "c-icon -small",
                        ]); ?>
                        <span class="c-overline -text-tr-none -dark-green">
                            <?php _e("Auf Whatsapp chatten"); ?>
                        </span>
                    </a>
                </div>
            </div>

            <div class="c-header-background_container">
                <?php
                    if ($headerBackground["type"] === "video") {
                        renderVideo($headerBackground, "c-header-background", "playsinline loop muted autoplay");
                    } else if ($headerBackground["type"] === "image") {
                        renderImage($headerBackground, "c-header-background");
                    }
                ?>

                <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "mullermay-video-form",
                    "classes" => "c-icon -video-form",
                ]); ?>
            </div>
        </div>

    </div>
</header>
