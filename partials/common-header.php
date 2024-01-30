<?php 
$menuItems = getMenuItems();

$notificationContent = getNotificationContent();
$notificationHeadline = $notificationContent["headline"];
$notificationText = $notificationContent["text"];
$notificationOpenTimes = $notificationContent["openTimes"];
?>


<header class="header__desktop container--small">

    <div class="header__inner --is-desktop">
        <a class="header__inner__logo" href="<?php echo home_url(); ?>" title="Go to Main page">
            <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "mullermay-logo",
                    "classes" => "icon__header-logo",
            ]); ?>

            <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "mullermay-logo-text",
                    "classes" => "icon__header-logo-text",
            ]); ?>
        </a>

        <?php foreach ($menuItems as $menuItem): ?>
            <?php if($menuItem["customLink"]["mm_is_cl"]): ?>
                <a href="<?php echo $menuItem["customLink"]["mm_cl_to_post"]; ?>"><p class="paragraph paragraph__semi-bold"><?php echo $menuItem["customLink"]["mm_cl_label"]; ?></p></a>
            <?php else: ?>
                <a href="<?php echo $menuItem["customLink"]["mm_cl_to_url"]; ?>"><p class="paragraph paragraph__semi-bold"><?php echo $menuItem["customLink"]["mm_cl_label"]; ?></p></a>
            <?php endif; ?>
        <?php endforeach; ?>

        <button class="header__notification-button" data-button="information" title="Notification Button">
            <?php get_template_part("partials/common", "sprite-svg", [
                "name" => "notification-button",
                "classes" => "icon__header-notification",
            ]); ?>

            <p class="paragraph paragraph__primary-family paragraph__bold paragraph__warm-white">Informationen</p>
        </button>

    </div>

</header>

<header class="header__mobile padding__top-super-small" data-header-mobile>

    <div class="header__inner --is-mobile container--small"> 
        <a class="header__inner__logo" href="<?php echo home_url(); ?>" title="Go to Main page">
            <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "mullermay-logo",
                    "classes" => "icon__header-logo",
            ]); ?>

            <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "mullermay-logo-text",
                    "classes" => "icon__header-logo-text",
            ]); ?>
        </a>

        <button class="button__menu" title="Open Menu" data-open-menu>
            <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "menu",
                    "classes" => "icon__header-menu",
            ]); ?> 
        </button>

        <div class="header__notification-button" data-button="information">
            <?php get_template_part("partials/common", "sprite-svg", [
                "name" => "notification-button",
                "classes" => "icon__header-notification",
            ]); ?>
        </div>
    </div>

</header>

<div class="notification__content">
    <div class="notification__block">
        <div class="notification__block-headline">
            <p class="paragraph paragraph__warm-white paragraph__primary-family paragraph__semi-bold"><?php echo $notificationHeadline; ?></p>
            <button class="notification__close-button" title="Close Notification">
                <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "notification-close-button",
                    "classes" => "icon__notification-close-button",
                ]); ?>
            </button>
        </div>

        <div class="notification__block-content">
            <p class="paragraph paragraph__warm-white paragraph__small"><?php echo $notificationText; ?></p>
            <p class="paragraph paragraph__warm-white paragraph__small"><?php echo $notificationOpenTimes; ?></p>
        </div>
    </div>
</div>