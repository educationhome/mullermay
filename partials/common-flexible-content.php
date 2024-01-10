<?php

$fieldId = $args["fieldId"];
$pageId = $args["pageId"];


while (have_rows($fieldId, $pageId)) {
    the_row();

    $flexibleBlocks = [];

    // Take Global Variable from functions.php
    global $flexibleContent;
    
    // Dont show Block that are not in use 
    if (!isset($flexibleContent[get_row_layout()])) {
        return;
    }

    $template = $flexibleContent[get_row_layout()]->template;
    $name = $flexibleContent[get_row_layout()]->name;

    foreach ($flexibleContent[get_row_layout()]->fields as $field) {
        $flexibleBlocks[$field] = get_sub_field($field);
    }

    get_template_part($template, $name, $flexibleBlocks);
}

?>