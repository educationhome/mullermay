<?php 

/**
 * Template Name: Services
*/

get_header();

$pageId = get_the_ID();

?>

<div id="services-page" data-template="services">

    <!-- Header -->
    <?php get_template_part("partials/common", "header"); ?>
    <!-- /Header -->

    <!-- Content -->
    <div id="services-page-content">
        <?php the_content(); ?>
    </div>
    <!-- /Content -->

    <!-- Footer -->
    <?php get_template_part("partials/common", "footer"); ?>
    <!-- /Footer -->

</div>


<?php get_footer(); ?>