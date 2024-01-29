<?php 

/**
 * Template Name: 404 Page
*/

get_header();

$pageId = get_the_ID();

$icon404 = get_field("404_icon", "options");
$mobileIcon404 = get_field("404_mobile_icon", "options");
$header404 = get_field("404_header", "options");
$text404 = get_field("404_text", "options");
?>

<div id="404-page" data-template="404-page">

    <!-- Header -->
    <?php get_template_part("partials/common", "header"); ?>
    <!-- /Header -->

    <!-- 404 Error -->
    <div class="container--small container__404">
        <img class="container__404-image lazy" data-src="<?php echo $icon404["url"]; ?>" alt="<?php echo $icon404["title"]; ?>">

        <div class="container__404-text">
            <h2 class="heading heading-h2"><?php echo $header404; ?></h2>
            <div class="container__404-textarea">
                <?php echo $text404; ?>
            </div>
        </div>

        <a href="<?php echo home_url(); ?>" type="button" class="button --bg-orange">
            <p class="paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold paragraph__small">
                <?php _e("Zur Startseite"); ?>
            </p>
        </a>
    </div>
    <!-- /404 Error -->

    <!-- Footer -->
    <?php get_template_part("partials/common", "footer"); ?>
    <!-- /Footer -->

</div>


<?php get_footer(); ?>