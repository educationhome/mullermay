<?php

add_filter("show_admin_bar", "__return_false");

// Setup Custom WYSIWYG Toolbar

add_filter( "acf/fields/wysiwyg/toolbars" , "my_toolbars"  );
function my_toolbars( $toolbars )
{

    $toolbars["MullerMay WYSIWYG"] = array();
    $toolbars["MullerMay WYSIWYG" ][1] = array("bold", "link", "unlink", "formatselect");

    $toolbars["MullerMay Impressum und Datenschutz"] = array();
    $toolbars["MullerMay Impressum und Datenschutz"][1] = array("bold", "link", "unlink", "bullist");

    $toolbars["MullerMay Google Maps"] = array();
    $toolbars["MullerMay Google Maps"][1] = array("bold", "link", "unlink", "formatselect");

    $toolbars["MullerMay Cookies WYSIWYG"] = array();
    $toolbars["MullerMay Cookies WYSIWYG"][1] = array("bold", "link", "unlink");

    return $toolbars;
}

// Setup Custom WYSIWYG Format Select

add_filter( "tiny_mce_before_init", function( $settings ){
    $settings["block_formats"] = "Paragraph=p;Subheading=h3";
    return $settings;
});

// Setup Custom General Settings Page 

if (function_exists("acf_add_options_page")) {
    acf_add_options_page([
        "page_title" => "General Settings",
        "menu_title" => "General Settings",
        "menu_slug" => "mm-general-settings",
    ]);
}

// Setup Custom 404 Settings Page 

if (function_exists("acf_add_options_page")) {
    acf_add_options_page([
        "page_title" => "404 Page Settings",
        "menu_title" => "404 Page Settings",
        "menu_slug" => "404-page-settings",
        "icon_url" => "dashicons-warning",
    ]);
}

// Setup Custom Cookie Settings 

if (function_exists("acf_add_options_page")) {
    acf_add_options_page([
        "page_title" => "Cookie Settings",
        "menu_title" => "Cookie Settings ",
        "menu_slug" => "cookie-settings",
        "icon_url" => "dashicons-art",
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

// Take Cookies Content

function getCookiesContent() {
    $cookieIcon = get_field("cookie_icon", "options");
    $cookieHeadline = get_field("cookie_headline", "options");
    $cookieText = get_field("cookie_text", "options");

    $cookieContent = [
        "icon" => $cookieIcon,
        "headline" => $cookieHeadline,
        "text" => $cookieText
    ];

    return $cookieContent;
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
        "icon" => "arrow-down-alt2",
    ));

    acf_register_block_type(array(
        "name"              => "googlemaps",
        "title"             => __("Google Maps"),
        "render_template"   =>  "blocks/googlemaps.php",
        "icon" => "location",
    ));

    acf_register_block_type(array(
        "name"              => "services-list",
        "title"             => __("Liste mit Dienstleistungen"),
        "render_template"   => "blocks/home-services-list.php",
        "icon" => "editor-alignleft",
        "category" => "services",
    ));

    acf_register_block_type(array(
        "name"              => "small-info",
        "title"             => __("Kurzer Informationsblock"),
        "render_template"   => "blocks/small-info.php",
        "icon" => "editor-alignleft",
        "category" => "information",
    ));

    acf_register_block_type(array(
        "name"              => "team-member-card",
        "title"             => __("Block für Teammitgliedern"),
        "render_template"   => "blocks/team-members.php",
        "icon" => "id (alt)",
        "category" =>  "team",
    ));

    acf_register_block_type(array(
        "name"              => "block-team-member",
        "title"             => __("Teammitglieder"),
        "render_template"   => "blocks/team-member-block.php",
        "icon" => "id (alt)",
        "category" =>  "team",
    ));

    acf_register_block_type(array(
        "name"              => "reviews",
        "title"             => __("Bewertungen"),
        "render_template"   => "blocks/reviews-slider.php",
        "icon" => "feedback",
        "category" =>  "",
    ));

    acf_register_block_type(array(
        "name"              => "book-now",
        "title"             => __("Jetzt buchen Block"),
        "render_template"   => "blocks/book-now.php",
        "icon" => "phone",
        "category" =>  "footer",
    )); 

    acf_register_block_type(array(
        "name"              => "common-header",
        "title"             => __("Header Block"),
        "render_template"   => "blocks/header.php",
        "icon" => "format-aside",
        "category" =>  "header",
    ));

    acf_register_block_type(array(
        "name"              => "services-block",
        "title"             => __("Leistungen Block"),
        "render_template"   => "blocks/services.php",
        "icon" => "editor-table",
        "category" =>  "services",
    ));
    
}

add_action("init", "register_acf_blocks");

function allow_custom_blocks_only() {
    
    $allowed_custom_blocks = array(
        'acf/slider',
        'acf/dropdown',
        'acf/googlemaps',
        'acf/services-list', 
        'acf/small-info',
        'acf/info-block',
        'acf/service', 
        'acf/home-services-list',
        'acf/team-member-card',
        'acf/reviews',
        'acf/book-now',
        'acf/common-header',
        'acf/services-block',
        'acf/block-team-member',
        
    );

    return $allowed_custom_blocks;
}

add_filter('allowed_block_types', 'allow_custom_blocks_only', 10, 2);

// Create Custom Categories 

function my_custom_block_categories($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'information',
                'title' => __('Information Blocks', 'mullermay'),
            ),
            array(
                'slug'  => 'team',
                'title' => __('Team', 'mullermay'),
            ),
            array(
                'slug'  => 'services',
                'title' => __('Services', 'mullermay'),
            ),
            array(
                'slug'  => 'footer',
                'title' => __('Footer', 'mullermay'),
            ),
            array(
                'slug'  => 'header',
                'title' => __('Header', 'mullermay'),
            ),
        )
    );
}
add_filter('block_categories', 'my_custom_block_categories', 10, 2);


function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
} 
add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);

// Render Image

function renderImage($imageData, $classes = "", $lazy = true, $showWidthandHeightAttr = true) {
    if ($lazy) {
        $classes .= " lazy ";
    }

    $imageAlt = $imageData["title"];
    $imageSrc = $imageData["url"];
    $imageWidth = $imageData["width"];
    $imageHeight = $imageData["height"];

    $isSVG = isset($imageData["mime_type"]) && strtolower($imageData["mime_type"]) === "image/svg+xml";

    $sizeAttributes = ($isSVG) ? '' : "width=\"$imageWidth\" height=\"$imageHeight\"";

    $html = <<<HTML
    <img
     data-src="$imageSrc"
     alt="$imageAlt"
     class="$classes"
     $sizeAttributes
    >
    HTML;

    echo $html;
}

// Render Video

function renderVideo($videoData, $classes = "", $controls = "", $lazy = true, $showWidthAndHeightAttr = true) {
    if ($lazy) {
        $classes .= " lazy ";
    }

    $videoSrc = $videoData["url"];
    $videoWidth = $videoData["width"];
    $videoHeight = $videoData["height"];

    $sizeAttributes = ($showWidthAndHeightAttr) ? "width=\"$videoWidth\" height=\"$videoHeight\"" : "";

    $html = <<<HTML
    <video
     data-src="$videoSrc"
     class="$classes"
     $sizeAttributes
     $controls
    >
    </video>
    HTML;

    echo $html;
}

// Prefetch Page Function 

add_action("wp_ajax_prefetch_page", "take_pages_to_load"); 
add_action("wp_ajax_nopriv_prefetch_page", "take_pages_to_load"); 

function take_pages_to_load() {
    $pageItems = [];

    if (have_rows("gs_prefetch_pages", "options")) {
        while (have_rows("gs_prefetch_pages", "options")) {
            the_row();
            $pageLink = get_sub_field("gs_pp_page_mm_cl_to_post");

            if (!empty($pageLink)) {
                $pageItems[] = [
                    "pageLink" => $pageLink
                ];
            }
        } 
    }
    
    header("Content-Type: application/json");
    echo json_encode($pageItems);

    wp_die();
}

// No Caching Page Function

add_action("wp_ajax_disable_page_cache", "take_pages_to_disable_cache"); 
add_action("wp_ajax_nopriv_disable_page_cache", "take_pages_to_disable_cache"); 

function take_pages_to_disable_cache() {
    $pageItems = [];

    if (have_rows("gs_disable_cache_pages", "options")) {
        while (have_rows("gs_disable_cache_pages", "options")) {
            the_row();
            $pageLink = get_sub_field("gs_dcp_page_mm_cl_to_post");

            if (!empty($pageLink)) {
                $pageItems[] = [
                    "pageLink" => $pageLink
                ];
            }
        } 
    }
    
    header("Content-Type: application/json");
    echo json_encode($pageItems);

    wp_die();
}

?>