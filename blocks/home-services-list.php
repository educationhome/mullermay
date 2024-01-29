<?php
/**
 * Home Services List Block template.
 *
 * @param array $block The block settings and attributes.
 */


$servicesListHeadline = get_field("mm_bl_hsl_headline");
$servicesListParagraph = get_field("mm_bl_hsl_paragraph");
$servicesListImage = get_field("mm_bl_hsl_image");
$servicesListBlogList = get_field("mm_bl_hsl_list");
?>


<div class="flexible-block container--small padding__bottom-medium padding__top-medium" data-template="services-list">
    <div class="flexible-block__inner">
        <h2 class="heading heading-h2"><?php echo $servicesListHeadline; ?></h2>

        <div class="fb-home-services-list">
            <div class="fb-home-services-list__info">
                <img class="lazy" data-src="<?php echo $servicesListImage["url"]; ?>" alt="<?php echo $servicesListImage["title"]; ?>">
                <p class="paragraph paragraph__body"><?php echo $servicesListParagraph; ?></p>
            </div>

            <?php foreach($servicesListBlogList as $serviceList): 
                $services = $serviceList["mm_bl_hsl_list_services"]; ?>
                <div class="padding__top-medium">
                    <h3 class="heading heading-h3"><?php echo $serviceList["mm_bl_hsl_list_headline"]; ?></h3>

                    <div class="fb-home-services-list__content">
                        <?php foreach($services as $service): ?>
                            <div class="fb-home-services-list__block">
                                <img class="lazy" data-src="<?php echo $service["mm_bl_hsl_list_services_icon"]["url"]; ?>" alt="<?php echo $service["mm_bl_hsl_list_services_icon"]["title"];  ?>">
                                <p class="paragraph paragraph__primary-family paragraph__semi-bold paragraph__medium"><?php echo $service["mm_bl_hsl_list_services_headline"]; ?></p>
                                <p class="paragraph paragraph__small shortened"><?php echo $service["mm_bl_hsl_list_services_text"]; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            <?php endforeach; ?>
            
            <div class="margin__top-small">
                <a href="/leistungen/" type="button" class="button --bg-orange">
                    <p class="paragraph paragraph__dark-grey paragraph__primary-family paragraph__bold">
                        <?php _e("Alle Leistungen"); ?>
                    </p>
                </a>
            </div>
        </div>

    </div>
</div>