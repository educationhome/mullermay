<?php
// Code for sprite SVG 

$name = $args["name"];
$classes = $args["classes"] ?? "";
$url = get_template_directory_uri() . "/assets/images/sprite.svg" . "#$name";

echo <<<HTML
<svg class="$classes" aria-hidden="true" focusable="false" role="img">
    <use xlink:href="$url"></use>
</svg>
HTML;

?>