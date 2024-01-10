<?php 

/**
 * Template Name: Home
*/

get_header();

$pageId = get_the_ID();

?>

<div id="home-page" data-template="home">

    <!-- Header -->
    <?php get_template_part("partials/common", "header"); ?>
    <!-- /Header -->

    <!-- Content -->
    <div id="home-page-content">
        <?php the_content(); ?>
    </div>
    <!-- /Content -->

    <!-- Footer -->
    <?php get_template_part("partials/common", "footer"); ?>
    <!-- /Footer -->

</div>


<?php get_footer(); ?>