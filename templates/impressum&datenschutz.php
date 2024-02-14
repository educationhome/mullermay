<?php 

/**
 * Template Name: Impressum & Datenschutz
*/

get_header();

$page_id = get_the_ID();
$iapText = get_field("imprint_and_dataprotection_text");
?>


<div id="imprint-and-privacy-page" data-template="imprint-and-privacy">

    <!-- Header -->
    <?php get_template_part("partials/common", "header"); ?>
    <!-- /Header -->

    <!-- Content -->

    <div class="imprint-and-privacy__header container--small margin__top-super-small">
        <h1 class="heading heading-h1 --header text-wrapper__headline">
            <?php echo get_the_title(); ?>
        </h1>
        <div class="impress-and-privacy__text">
            <?php echo $iapText; ?>
        </div>

        <button id="open-cookie-window" class="button--bg-orange">
            <p class="paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold">
                <?php _e("Cookie Einstellungen anpassen"); ?>
            </p>
        </button>
    </div>


    <div id="imprint-and-privacy-page-content">
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