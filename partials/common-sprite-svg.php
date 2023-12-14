<?php

/**
 * @var $args array
 */

$name = $args["name"];
$classes = $args["classes"] ?? "";
$classes = "c-svg-" . $name . " || o-media || " . $classes;
$url = gtdir("/assets/images/sprite.svg") . "#$name";

echo <<<HTML
<svg class="$classes" aria-hidden="true" focusable="false" role="img">
    <use xlink:href="$url"></use>
</svg>
HTML;

