<?php 

/**
 * Template Name: Home
*/

get_header();

?>

<?php

$pageId = get_the_ID();

?>

<article id="home-page" data-page-id="<?php echo $pageId; ?>">

    <!-- HEADER -->
    <?php get_template_part("partials/common", "header", [
        "overline" => get_field("page_overline", $pageId),
        "headline" => get_field("page_header", $pageId),
        "headerBackground" => get_field("page_header_background", $pageId),
    ]); ?>
    <!-- /HEADER -->

    <div class="o-container -medium">

    </div>
    

    <!-- FLEXIBLE CONTENT -->
    <div id="page-content" class="s-user-blocks">
        <?php get_template_part("partials/flexible-content", "loop", [
                "fieldId" => "home_0_flexible_content",
                "pageId" => $pageId,
        ]);
        ?>
    </div>
    <!-- /FLEXIBLE CONTENT -->

</article>


<?php get_footer(); ?>