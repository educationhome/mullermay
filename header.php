<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#FFF7EC">
    <title id="title">
        <?php the_title(); ?>
    </title> 
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/dist/app.css" ?>">
</head>

<?php 
$menuItems = getMenuItems();
$socMediaItems = getSocMediaItems();
$menuFooterItems = getMenuFooterItems();

$cookieContent = getCookiesContent();
$cookieIcon = $cookieContent["icon"];
$cookieHeadline = $cookieContent["headline"];
$cookieText = $cookieContent["text"];
?>

<div id="overlay"></div>

<div id="js-cookies">
    <div class="cookie__block">
        <div class="cookie__icon">
            <?php renderImage($cookieIcon, "", true); ?>
        </div>

        <div class="cookie__content">
            <p class="paragraph paragraph__semi-bold"><?php echo $cookieHeadline; ?></p>
            <div class="cookie__text">
                <?php echo $cookieText; ?>
            </div>
        </div>

        <div class="cookie__buttons">
            <div class="cookie__buttons-radio">
                <input id="essential-cookies" type="radio" disabled>
                <label for="essential-cookies" class="cookie__buttons-radio-label paragraph paragraph__small paragraph__op-8">
                    <?php _e("Essentielle Cookies"); ?> 
                </label>

                <input id="optional-cookies" type="checkbox">
                <label for="optional-cookies" class="cookie__buttons-radio-label--is-orange paragraph paragraph__small paragraph__op-8">
                    <?php _e("Optionale Cookies"); ?> 
                </label>
            </div>

            <div class="cookie__buttons-button header-buttons">
                <button id="js-save-settings" class="button--bg-white-and-orange paragraph paragraph__orange paragraph__primary-family paragraph__bold">
                    <?php _e("Speichern"); ?>
                </button>
                <button id="js-save-all-settings" class="button--bg-orange paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold">
                    <?php _e("Alle akzeptieren"); ?>
                </button>
            </div>
        </div>
    </div>
</div>

<div id="js-menu" class="main-menu --is-closed" data-template="menu">
    <div>
        <header class="header__mobile container--small-padding">
            <div class="header__inner--is-mobile"> 
                <a class="header__inner-logo ajax-link" href="<?php echo home_url(); ?>"  title="Go to Main page">
                    <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "mullermay-logo",
                            "classes" => "icon__header-logo",
                    ]); ?>

                    <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "mullermay-logo-text",
                            "classes" => "icon__header-logo-text",
                    ]); ?>
                </a>

                <button class="button__menu" title="Close Menu" data-close-menu>
                    <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "close-button",
                            "classes" => "icon__header-menu",
                    ]); ?> 
                </button>
            </div>
        </header>

        <div class="container--small">
            <div class="menu__links">
                <?php foreach ($menuItems as $menuItem): ?>
                    <?php if($menuItem["customLink"]["mm_is_cl"]): ?>
                        <a class="paragraph paragraph__warm-white paragraph__primary-family paragraph__menu paragraph__ln_h_normal ajax-link where-am-i__mobile" href="<?php echo $menuItem["customLink"]["mm_cl_to_post"]; ?>">
                            <?php echo $menuItem["customLink"]["mm_cl_label"]; ?>
                        </a>
                    <?php else: ?>
                        <a class="paragraph paragraph__warm-white paragraph__primary-family paragraph__menu paragraph__ln_h_normal ajax-link where-am-i__mobile" href="<?php echo $menuItem["customLink"]["mm_cl_to_url"]; ?>">
                            <?php echo $menuItem["customLink"]["mm_cl_label"]; ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="menu__footer container--small">
        <div class="menu__footer-links">
            <?php foreach ($menuFooterItems as $menuFooterItem): ?>
                <?php if($menuFooterItem["customLink"]["mm_is_cl"]): ?>
                    <a class="paragraph paragraph__warm-white paragraph__small ajax-link where-am-i__mobile" href="<?php echo $menuFooterItem["customLink"]["mm_cl_to_post"]; ?>">
                        <?php echo $menuFooterItem["customLink"]["mm_cl_label"]; ?>
                    </a>
                <?php else: ?>
                    <a class="paragraph paragraph__warm-white paragraph__small ajax-link where-am-i__mobile" href="<?php echo $menuFooterItem["customLink"]["mm_cl_to_url"]; ?>">
                        <?php echo $menuFooterItem["customLink"]["mm_cl_label"]; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <div class="menu__footer-soc-media">
            <div class="footer-section__links">
                <p class="paragraph paragraph__warm-white paragraph__small"><?php _e("Folge uns!"); ?></p>

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
            </div>
        </div>
    </div>

    <div class="menu__background">
        <?php get_template_part("partials/common", "sprite-svg", [
            "name" => "mullermay-background-purple",
            "classes" => "icon__menu-logo-background",
        ]); ?>
    </div>
</div>

<div id="main">
