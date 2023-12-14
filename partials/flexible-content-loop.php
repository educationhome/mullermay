<?php

/**
 * @var $args array
 */

$fieldId = $args["fieldId"];
$pageId = $args["pageId"] ?? null;
$blockCount = 0;

?>


<?php

while (have_rows($fieldId, $pageId)) {
    the_row();

    $blockCount++;

    global $registeredFlexibleContent;
    if (!isset($registeredFlexibleContent[get_row_layout()])) {
        return;
    }
    
    $flexibleContent = $registeredFlexibleContent[get_row_layout()];

    $fields = [];
    foreach ($flexibleContent->fields as $key) {
        $fields[$key] = get_sub_field($key);
    }

    $fields["postId"] = $pageId;

    $fields["blockId"] = "block_" . $blockCount;

    get_template_part($flexibleContent->render_template, null, $fields);
}

?>


