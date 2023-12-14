<?php


function getLangCode(): string
{
    return explode("_", get_locale())[0];
}

// Setup custom blocks. 
setupCustomBlocks();
setupFlexibleContent();


/**
 * Registers custom ACF blocks
 */

function setupCustomBlocks() {
    add_filter("block_categories", function ($categories, $post) {
        return array_merge(
            $categories,
            [
                [
                    "slug" => "btc",
                    "title" => "borntocreate",
                ],
            ]
        );
    }, 10, 2);

    if (!function_exists("acf_register_block_type")) {
        return;
    }

}

function setupFlexibleContent() {
    registerFlexibleContent([
        "name" => "fc_info_block",
        "render_template" => "blocks/info-text",
        "fields" => [
            "info_block_foto",
            "info_block_headline",
            "info_block_paragraph",
        ],
    ]);
    
}


function registerFlexibleContent(array $options): void
{
    global $registeredFlexibleContent;

    $entry = new stdClass();
    $entry->name = $options["name"];
    $entry->render_template = $options["render_template"];
    $entry->fields = $options["fields"];

    $registeredFlexibleContent[$entry->name] = $entry;
}


function redirect($url, $statusCode = 303): void
{
    header("Location: " . $url, true, $statusCode);
    die();
}

/**
 * @param null $path
 * @return string
 */
function gtdir($path = null): string
{
    static $tdir;

    if (!$tdir) {
        $tdir = get_template_directory_uri();
    }

    return $tdir . ($path ?? "");
}



// Render functions.

function renderImage($image, $classes = "", $srcset = null, $lazyClass = null): void
{
    if (!$lazyClass) {
        $lazyClass = "lazy";
    }

    $imageSrc = $image["url"];
    $imageSrcSet = isset($image["ID"]) ? wp_get_attachment_image_srcset($image["ID"], "full") : null;
    $imageAlt = isset($image["alt"]) ?? "";
    $width = $image["width"];
    $height = $image["height"];

    if ($srcset !== null) {
        $imageSrcSet = $srcset;
    }

    $placeholderSrc = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 $width $height'%3E%3C/svg%3E";

    $html = <<<HTML
<img
 src="$imageSrc"
 data-srcset="$imageSrcSet"
 alt="$imageAlt"
 class="$lazyClass || $classes"
 width="$width"
 height="$height"
>
HTML;

    echo $html;
    // class="o-media -image || $lazyClass || $classes"
    // src="$placeholderSrc"
//  data-src="$imageSrc"
}


function renderVideo($video, $classes = "", $attrs = "", $lazy = true, $inview = false, $inviewScrollerStart = null): void
{
    $videoSrc = $video["url"];
    $width = $video["width"];
    $height = $video["height"];

    if ($lazy && !$inview) {
        $classes .= " lazy";
    }

    if ($inview) {
        if (is_string($attrs)) {
            $attrs .= " data-block-video-inview";
        } else {
            $attrs = "data-block-video-inview";
        }

        if ($inviewScrollerStart) {
            $attrs .= " data-scroller-start='$inviewScrollerStart'";
        }
    }

    $html = <<<HTML
<video
 src="$videoSrc"
 class="$classes"
 width="$width"
 height="$height"
 $attrs
></video>
HTML;

    echo $html;
    // data-src="$videoSrc"
// class="o-media -video || $classes"
} 


?>