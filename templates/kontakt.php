<?php 

/**
 * Template Name: Kontakt
*/

get_header();
?>

<div id="kontakt-page" data-template="kontakt">

    <!-- Header -->
    <?php get_template_part("partials/common", "header"); ?>
    <!-- /Header -->

    <!-- Content -->
    <div id="kontakt-page-content">
        <?php the_content(); ?>
    </div>
    <!-- /Content -->

    <!-- Footer -->
    <?php get_template_part("partials/common", "footer"); ?>
    <!-- /Footer -->

</div>


<?php 
get_footer();
?>