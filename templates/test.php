<?php 

/**
 * Template Name: Test
*/

get_header();

$pageId = get_the_ID();

?>

<div>

    <!-- Header -->
    <?php get_template_part("partials/common", "header"); ?>
    <!-- /Header -->

    <!-- Content -->
    <div class="content" data-template="test">
        <h1>Termin buchung -- Test Page </h1>
    </div>
    <!-- /Content -->

    <!-- Footer -->
    <?php get_template_part("partials/common", "footer"); ?>
    <!-- /Footer -->

</div>


<?php get_footer(); ?>