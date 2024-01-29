<?php 

/**
 * Template Name: Test
*/

get_header();
$pageId = get_the_ID();
?>


<!-- Header -->
<?php get_template_part("partials/common", "header"); ?>
<!-- /Header -->

<!-- Footer -->
<?php get_template_part("partials/common", "footer"); ?>
<!-- /Footer -->



<?php get_footer(); ?>