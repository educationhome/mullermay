<?php 

/**
 * Template Name: Team
*/

get_header();

$pageId = get_the_ID();

?>

<div id="team-page" data-template="team">

    <!-- Header -->
    <?php get_template_part("partials/common", "header"); ?>
    <!-- /Header -->

    <!-- Content -->
    <div id="team-page-content">
        <?php the_content(); ?>
    </div>
    <!-- /Content -->

    <!-- Footer -->
    <?php get_template_part("partials/common", "footer"); ?>
    <!-- /Footer -->

</div>


<?php get_footer(); ?>