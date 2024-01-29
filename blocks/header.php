<!-- HEADER -->
<?php 
$headline = get_field("mm_bl_page_header_headline");
$headerBackground = get_field("mm_bl_page_header_background");
$overline = get_field("mm_bl_page_header_overline");
 
$menuItems = getMenuItems();

?>

<div class="container--small header__section margin__top-super-small">

    <div class="header__text-container">
        
        <span class="overline">
            <?php echo $overline; ?>
        </span>
        <h1 class="heading heading-h1 --header text-wrapper__headline">
            <?php echo $headline; ?>
        </h1>

        <div class="header-buttons">
            <a href="/terminbuchung/" type="button" class="button --bg-orange">
                <p class="paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold">
                    <?php _e("Termin finden"); ?>
                </p>
            </a>

            <a href="#" type="button" class="button --bg-white">
                <?php get_template_part("partials/common", "sprite-svg", [
                        "name" => "whatsapp",
                        "classes" => "icon__whatsapp-logo",
                ]); ?>
                <p class="paragraph paragraph__small paragraph__primary-family paragraph__bold paragraph__dark-green">
                    <?php _e("Auf Whatsapp chatten"); ?>
                </p>
            </a>
        </div>
    </div>

    <div class="header__background-container">
        <?php if ($headerBackground["type"] === "video"): ?>
            <video class="lazy" data-src="<?php echo $headerBackground["url"] ?>" playsinline loop muted autoplay></video>
        <?php elseif ($headerBackground["type"] === "image"): ?>
            <img class="lazy" data-src="<?php echo $headerBackground["url"] ?>" alt="<?php echo $headerBackground["title"] ?>"> 
        <?php endif; ?>

        <svg xmlns="http://www.w3.org/2000/svg" width="622" height="368" viewBox="0 0 622 368" fill="none" class="icon__header-video-form">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M621.5 0H0.5L0.5 368H621.5V0ZM322.743 41.457C437.484 -31.7911 587.68 41.3726 601.959 177.331V177.31C606.111 216.887 608.187 256.781 602.594 296.296C597.467 332.477 565.519 357.392 529.472 356.274C492.302 355.124 462.483 328.489 458.988 291.528C455.704 256.802 455.513 221.845 459.083 187.141C462.134 157.479 479.241 137.163 507.323 127.437C509.653 126.635 511.962 125.981 514.25 125.391L514.219 125.37C514.319 125.343 514.42 125.322 514.522 125.302C514.624 125.283 514.727 125.264 514.833 125.243C522.004 123.46 528.996 122.764 535.786 123.091C574.206 123.756 592.584 151.055 592.584 151.055C581.504 123.059 561.526 103.735 532.809 93.777C460.1 68.5769 390.103 115.802 385.336 193.67C384.205 212.246 384.175 230.891 384.144 249.534C384.131 257.962 384.117 266.389 384.001 274.809C383.535 309.618 371.173 337.287 336.842 351.2C296.939 367.371 247.079 345.177 240.723 303.11C231.327 240.959 230.692 177.943 255.193 117.87C265.722 92.0471 283.645 71.2246 306.981 51.7733C307.319 51.5359 307.658 51.2984 307.996 51.0609C307.285 51.0468 306.577 51.0349 305.869 51.0349C305.805 51.0349 305.742 51.056 305.678 51.056C295.975 50.824 288.391 51.7522 280.891 53.4611C215.184 68.4081 173.099 116.551 166.203 184.63C163.636 209.932 163.68 235.319 163.724 260.699V260.701C163.729 263.603 163.734 266.506 163.735 269.408C163.745 284.64 162.94 299.766 156.489 313.964C143.64 342.234 112.508 359.723 82.0432 355.799C47.9874 351.422 21.7808 328.394 18.3593 295.251C13.3383 246.613 12.8934 197.489 24.4078 149.684C52.0444 34.801 183.978 -21.1794 285.933 34.0731L285.817 33.9887C285.817 33.9887 288.56 35.3811 292.744 37.9444C294.45 38.9676 296.145 40.0119 297.829 41.0984C297.94 41.1828 298.052 41.2667 298.163 41.3502C298.274 41.4335 298.385 41.5164 298.496 41.5994C298.614 41.6876 298.732 41.7757 298.85 41.8642C298.955 41.9426 299.059 42.0212 299.164 42.1005C300.933 43.303 302.786 44.6321 304.704 46.0772C304.747 46.1085 304.79 46.1384 304.833 46.1678C304.905 46.2178 304.976 46.2667 305.043 46.3198C305.032 46.3093 305.361 46.5624 305.477 46.6468C305.528 46.6863 305.585 46.7319 305.63 46.769C305.67 46.8011 305.7 46.8269 305.71 46.8367C305.743 46.8604 305.777 46.8863 305.81 46.9133C305.85 46.9459 305.891 46.9802 305.931 47.0145L305.932 47.016V47.0055C307.144 47.9377 308.371 48.915 309.601 49.9357C310.272 49.4649 310.945 48.9934 311.617 48.5209C311.986 48.2622 312.354 48.0032 312.722 47.7438C315.095 46.0772 317.5 44.4422 320.053 43.0498C320.921 42.5857 321.811 42.0477 322.743 41.457Z" fill="#FFF7EC"/>
        </svg>
    </div>
    
</div>



<!-- /HEADER -->