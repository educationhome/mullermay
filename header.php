<!doctype html>
<html lang="<?php //echo getLangCode(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php wp_title(); ?></title> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        <?php
            $name = "app";
            $handler = opendir(__DIR__ . "/dist/");
            while ($file = readdir($handler)) {
                if ($file !== "." && $file !== "..") {
                    preg_match("/$name.[a-zA-Z0-9-_]*.css/s" , $file, $matches);
                    if (isset($matches) && isset($matches[0]) && is_string($matches[0])) {
                        include __DIR__ . "/dist/" . $matches[0];
                    }
                }
            }
            closedir($handler);
        ?>
    </style>

    <main id="main">
