<?php
/**
 * Google Maps Block template.
 *
 * @param array $block The block settings and attributes.
 */


$mapAdress = get_field("mm_bl_gm_infobox_address");
$mapAdressLabel = $mapAdress["gm_infobox_address_label"];
$mapAdressLink = $mapAdress["gm_infobox_address_link"];

$mapKontakt = get_field("mm_bl_gm_infobox_kontakt");

$mapOpeningHours = get_field("mm_bl_gm_infobox_ophr");
$mapOpeningHoursHeadline = $mapOpeningHours["gm_infobox_ophr_headline"];
$mapOpeningHoursText = $mapOpeningHours["gm_infobox_ophr_text"];
$mapOpeningHoursHint = $mapOpeningHours["gm_infobox_ophr_hint"];
?>


<div class="container--small padding__top-small fb-google-maps__block" data-template="google-maps-block">
    <div id="map"></div>
    <div class="fb-google-maps__info --is-desktop">
        <div class="fb-google-maps__logo">
            <?php get_template_part("partials/common", "sprite-svg", [
                "name" => "mullermay-logo-small",
                "classes" => "icon__logo-small",
            ]); ?>
            <?php get_template_part("partials/common", "sprite-svg", [
                "name" => "mullermay-logo-text-small",
                "classes" => "icon__logo-text-small",
            ]); ?>
        </div>

        <a href="<?php echo $mapAdressLink; ?>" class="paragraph paragraph__semi-bold paragraph__purple" target="_blank">
            <?php echo $mapAdressLabel; ?>
        </a>

        <div class="fb-google-maps__kontakt">
            <?php foreach ($mapKontakt as $kontakt):
                $customLink = $kontakt["mm_bl_gm_infobox_kontakt_link_mm_custom_link"]; ?>

                <?php if($customLink["mm_is_cl"]): ?>
                    <a href="<?php echo $customLink["mm_cl_to_post"]; ?>"><p class="paragraph paragraph__body"><?php echo $customLink["mm_cl_label"]; ?></p></a>
                <?php else: ?>
                    <a href="<?php echo $customLink["mm_cl_to_url"]; ?>"><p class="paragraph paragraph__body"><?php echo $customLink["mm_cl_label"]; ?></p></a>
                <?php endif; ?>
                
            <?php endforeach; ?>
        </div>

        <div class="fb-google-maps__opening-hours">
            <p class="paragraph paragraph__semi-bold paragraph__purple"><?php echo $mapOpeningHoursHeadline; ?></p>
            <p class="paragraph paragraph__body"><?php echo $mapOpeningHoursText; ?></p>
            <p class="paragraph paragraph__small"><?php echo $mapOpeningHoursHint; ?></p>
        </div>
    </div>

    <div class="fb-google-maps__info --is-mobile">

        <a href="<?php echo $mapAdressLink; ?>" class="paragraph paragraph__semi-bold paragraph__purple" target="_blank">
            <?php echo $mapAdressLabel; ?>
        </a>

        <div class="fb-google-maps__kontakt">
            <?php foreach ($mapKontakt as $kontakt):
                $customLink = $kontakt["mm_bl_gm_infobox_kontakt_link_mm_custom_link"]; ?>

                <?php if($customLink["mm_is_cl"]): ?>
                    <a href="<?php echo $customLink["mm_cl_to_post"]; ?>" class="paragraph paragraph__body"><?php echo $customLink["mm_cl_label"]; ?></a>
                <?php else: ?>
                    <a href="<?php echo $customLink["mm_cl_to_url"]; ?>" class="paragraph paragraph__body"><?php echo $customLink["mm_cl_label"]; ?></a>
                <?php endif; ?>
                
            <?php endforeach; ?>
        </div>

        <div class="fb-google-maps__opening-hours">
            <p class="paragraph paragraph__semi-bold paragraph__purple"><?php echo $mapOpeningHoursHeadline; ?></p>
            <p class="paragraph paragraph__body"><?php echo $mapOpeningHoursText; ?></p>
            <p class="paragraph paragraph__small"><?php echo $mapOpeningHoursHint; ?></p>
        </div>
    </div>
</div>

