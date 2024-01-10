<?php 

/**
 * Template Name: Faq
*/

get_header();
?>

<div id="faq-page" data-template="faq-page">

    <!-- Header -->
    <?php get_template_part("partials/common", "header"); ?>
    <!-- /Header -->

    <!-- Content -->
    <div id="faq-page-content">
        <?php the_content(); ?>
    </div>
    <!-- /Content -->

    <!-- Footer -->
    <?php get_template_part("partials/common", "footer"); ?>
    <!-- /Footer -->

<?php 
get_footer();
?>