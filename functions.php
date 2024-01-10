<?php

// Setup Custom WYSIWYG Toolbar

add_filter( "acf/fields/wysiwyg/toolbars" , "my_toolbars"  );
function my_toolbars( $toolbars )
{

    $toolbars["MullerMay {paragraph, bolt}"] = array();
    $toolbars["MullerMay {paragraph, bolt}" ][1] = array("bold");

    $toolbars["MullerMay Impressum und Datenschutz"] = array();
    $toolbars["MullerMay Impressum und Datenschutz"][1] = array("bold", "link", "unlink", "bullist");

    return $toolbars;
}

// Setup Custom Settings Page 

if (function_exists("acf_add_options_page")) {
    acf_add_options_page([
        "page_title" => "General Settings",
        "menu_title" => "General Settings",
        "menu_slug" => "mm-general-settings",
    ]);
}

// Setup Custom 404 Page 

if (function_exists("acf_add_options_page")) {
    acf_add_options_page([
        "page_title" => "404 Page Settings",
        "menu_title" => "404 Page Settings",
        "menu_slug" => "404-page-settings",
    ]);
}

// WP allow to upload images type svg 

function allow_svg($mime_types) {
    $mime_types["svg"] = "image/svg+xml";
    return $mime_types;
}

add_filter("upload_mimes", "allow_svg");




// Take Menu Items 

function getMenuItems() {
    while (have_rows("general_menu_items", "options")) {
        the_row();

        $menuLink = get_sub_field("menu_item_link_mm_custom_link");

        $menuItem = [
            "customLink" => $menuLink
        ];

        $menuItems[] = $menuItem;
    } 

    return $menuItems;
}

// Take Footer Items 

function getFooterItems() {
    while (have_rows("general_footer_items", "options")) {
        the_row();

        $footerLink = get_sub_field("footer_item_link_mm_custom_link");

        $footerItem = [
            "customLink" => $footerLink
        ];

        $footerItems[] = $footerItem;
    } 

    return $footerItems;
}

// Take Menu Footer Items 

function getMenuFooterItems() {
    while (have_rows("general_menu_footer_items", "options")) {
        the_row();

        $menuFooterLink = get_sub_field("menu_footer_item_link_mm_custom_link");

        $menuFooterItem = [
            "customLink" => $menuFooterLink
        ];

        $menuFooterItems[] = $menuFooterItem;
    } 

    return $menuFooterItems;
}

// Take Social Media Items 

function getSocMediaItems() {
    while (have_rows("general_social_media_items", "options")) {
        the_row();

        $socMediaLink = get_sub_field("social_media_link_mm_custom_link");
        $socMediaIcon = get_sub_field("general_social_media_icon");

        $socMediaItem = [
            "customLink" => $socMediaLink,
            "icon" => $socMediaIcon
        ];

        $socMediaItems[] = $socMediaItem;
    } 

    return $socMediaItems;
}

// Take Notification Content

function getNotificationContent() {
    $notificationHeadline = get_field("general_notification_headline", "options");
    $notificationText = get_field("general_notification_text", "options");
    $notificationOpenTimes = get_field("general_notification_open_times", "options");

    $notificationContent = [
        "headline" => $notificationHeadline,
        "text" => $notificationText,
        "openTimes" => $notificationOpenTimes
    ];

    return $notificationContent;
}

// Set Flexible Content

function addFlexibleBlock($template, $name, $fields) {
    // Save Flexible Blocks as Global Variable
    global $flexibleContent;

    $flexibleContent[$name] = (object) [
        "template" => $template,
        "name" => $name,
        "fields" => $fields,
    ];
}

// Register ACF Blocks

function register_acf_blocks() {

    acf_register_block_type(array(
        "name"              => "slider",
        "title"             => __("Schieberegler"),
        "render_template"   => "blocks/slider.php",
        "icon" => "slides",
    ));

    acf_register_block_type(array(
        "name"              => "dropdown",
        "title"             => __("Runterfallen Block"),
        "render_template"   => "blocks/drop-down.php",
        "icon" => "arrow down",
    ));

    acf_register_block_type(array(
        "name"              => "googlemaps",
        "title"             => __("Google Maps"),
        "render_template"   =>  "blocks/googlemaps.php",
        "icon" => "location",
    ));

    acf_register_block_type(array(
        "name"              => "home_services_list",
        "title"             => __("Liste mit Dienstleistungen"),
        "render_template"   => "blocks/home_services_list.php",
        "icon" => "align left",
    ));

    acf_register_block_type(array(
        "name"              => "small-info",
        "title"             => __("Kurzer Informationsblock"),
        "render_template"   => "blocks/small-info.php",
        "icon" => "align left",
    ));

    acf_register_block_type(array(
        "name"              => "service",
        "title"             => __("Leistung Block"),
        "render_template"   => "blocks/service.php",
        "icon" => "table",
    ));
    
    acf_register_block_type(array(
        "name"              => "team_member_card",
        "title"             => __("Karte für Teammitglieder"),
        "render_template"   => "blocks/team_member_card.php",
        "icon" => "id (alt)",
        "category" =>  "formatting",
    ));

    acf_register_block_type(array(
        "name"              => "reviews",
        "title"             => __("Bewertungen"),
        "render_template"   => "blocks/reviews-slider.php",
        "icon" => "star filled",
        "category" =>  "formatting",
    ));

    acf_register_block_type(array(
        "name"              => "book-now",
        "title"             => __("Jetzt buchen Block"),
        "render_template"   => "blocks/book-now.php",
        "icon" => "star filled",
        "category" =>  "formatting",
    )); 

    acf_register_block_type(array(
        "name"              => "common-header",
        "title"             => __("Header Block"),
        "render_template"   => "blocks/header.php",
        "icon" => "star filled",
        "category" =>  "formatting",
    ));

}

add_action("init", "register_acf_blocks");
?>