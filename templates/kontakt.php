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
    <div class="content" data-template="kontakt">
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