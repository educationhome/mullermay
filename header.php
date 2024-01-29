<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        <?php wp_title(); ?>
    </title> 
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
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
            <img class="lazy" data-src="<?php echo $cookieIcon["url"]; ?>" alt="<?php echo $cookieIcon["title"]; ?>">
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
                <label for="optional-cookies" class="cookie__buttons-radio-label --is-orange paragraph paragraph__small paragraph__op-8">
                    <?php _e("Optionale Cookies"); ?> 
                </label>
            </div>

            <div class="cookie__buttons-button header-buttons">
                <button class="button --bg-white-and-orange">
                    <p class="paragraph paragraph__orange paragraph__primary-family paragraph__bold">
                        <?php _e("Speichern"); ?>
                    </p>
                </button>
                <button class="button --bg-orange">
                    <p class="paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold">
                        <?php _e("Alle akzeptieren"); ?>
                    </p>
                </button>
            </div>
        </div>
    </div>
</div>

<div id="js-menu" class="main-menu --is-closed" data-template="menu">
    <div>
        <header class="header__mobile container--small-padding">
            <div class="header__inner --is-mobile"> 
                <a class="header__inner__logo" href="<?php echo home_url(); ?>">
                    <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "mullermay-logo",
                            "classes" => "icon__header-logo",
                    ]); ?>

                    <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "mullermay-logo-text",
                            "classes" => "icon__header-logo-text",
                    ]); ?>
                </a>

                <button class="button__menu" data-close-menu>
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
                        <a href="<?php echo $menuItem["customLink"]["mm_cl_to_post"]; ?>"><p class="paragraph paragraph__warm-white paragraph__primary-family paragraph__menu paragraph__ln_h_normal"><?php echo $menuItem["customLink"]["mm_cl_label"]; ?></p></a>
                    <?php else: ?>
                        <a href="<?php echo $menuItem["customLink"]["mm_cl_to_url"]; ?>"><p class="paragraph paragraph__warm-white paragraph__primary-family paragraph__menu paragraph__ln_h_normal"><?php echo $menuItem["customLink"]["mm_cl_label"]; ?></p></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="menu__footer container--small">
        <div class="menu__footer-links">
            <?php foreach ($menuFooterItems as $menuFooterItem): ?>
                <?php if($menuFooterItem["customLink"]["mm_is_cl"]): ?>
                    <a href="<?php echo $menuFooterItem["customLink"]["mm_cl_to_post"]; ?>"><p class="paragraph paragraph__warm-white paragraph__body paragraph__small"><?php echo $menuFooterItem["customLink"]["mm_cl_label"]; ?></p></a>
                <?php else: ?>
                    <a href="<?php echo $menuFooterItem["customLink"]["mm_cl_to_url"]; ?>"><p class="paragraph paragraph__warm-white paragraph__body paragraph__small"><?php echo $menuFooterItem["customLink"]["mm_cl_label"]; ?></p></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <div class="menu__footer-soc-media">
            <div class="footer-section__links">
                <p class="paragraph paragraph__warm-white paragraph__body paragraph__small"><?php _e("Folge uns!"); ?></p>

                <div class="footer-section__soc-media">
                    <?php foreach ($socMediaItems as $socMediaItem): ?>
                        <?php if($socMediaItem["customLink"]["mm_is_cl"]): ?>
                            <a href="<?php echo $socMediaItem["customLink"]["mm_cl_to_post"]; ?>">
                                <img class="lazy" data-src="<?php echo $socMediaItem["icon"]["url"]; ?>" alt="<?php echo $socMediaItem["icon"]["title"] ?>">
                            </a>
                        <?php else: ?>
                            <a href="<?php echo $socMediaItem["customLink"]["mm_cl_to_url"]; ?>">
                                <img class="lazy" data-src="<?php echo $socMediaItem["icon"]["url"]; ?>" alt="<?php echo $socMediaItem["icon"]["title"] ?>">
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
