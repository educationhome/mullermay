<?php



$footerItems = getFooterItems();
$socMediaItems = getSocMediaItems();
?>

<div id="footer" class="footer-section">
    <div class="footer-section__logo">
        <a class="header__inner-logo--no-margin" href="<?php echo home_url(); ?>" title="Go to Main page">
            <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "mullermay-logo-white",
                    "classes" => "icon__footer-logo-white",
            ]); ?>

            <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "mullermay-logo-text-white",
                    "classes" => "icon__footer-logo-text-white",
            ]); ?>
        </a>
    </div>

    <div class="footer-section__links">
        <?php foreach ($footerItems as $footerItem): ?>
            <?php if($footerItem["customLink"]["mm_is_cl"]): ?>
                <a href="<?php echo $footerItem["customLink"]["mm_cl_to_post"]; ?>">
                    <p class="paragraph paragraph__warm-white"><?php echo $footerItem["customLink"]["mm_cl_label"]; ?></p>
                </a>
            <?php else: ?>
                <a href="<?php echo $footerItem["customLink"]["mm_cl_to_url"]; ?>">
                    <p class="paragraph paragraph__warm-white"><?php echo $footerItem["customLink"]["mm_cl_label"]; ?></p>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="footer-section__links">
        <p class="paragraph paragraph__warm-white"><?php _e("Folge uns!"); ?></p>

        <div class="footer-section__soc-media">
            <?php foreach ($socMediaItems as $socMediaItem): ?>
                <?php if($socMediaItem["customLink"]["mm_is_cl"]): ?>
                    <a href="<?php echo $socMediaItem["customLink"]["mm_cl_to_post"]; ?>">
                        <?php renderImage($socMediaItem["icon"], "", true); ?>
                    </a>
                <?php else: ?>
                    <a href="<?php echo $socMediaItem["customLink"]["mm_cl_to_url"]; ?>">
                        <?php renderImage($socMediaItem["icon"], "", true); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <p class="paragraph paragraph__small paragraph__copyright">Copyright <?php echo date("Y"); ?> müllermay</p>
    </div>

    <?php get_template_part("partials/common", "sprite-svg", [
        "name" => "mullermay-background-purple",
        "classes" => "icon__footer-logo-background",
    ]); ?>
</div>