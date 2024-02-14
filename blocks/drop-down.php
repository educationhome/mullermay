<?php
/**
 * Drop Down Block template.
 *
 * @param array $block The block settings and attributes.
 */

$dropDownHeadline = get_field("mm_bl_dd_headline");
$dropDown = get_field("mm_bl_dd");

$count = 0;
$tableDropDown1 = array();
$tableDropDown2 = array();

foreach($dropDown as $block):
    $count++;
    if ($count % 2 !== 0):
        $tableDropDown1[] = $block; 
    else: 
       $tableDropDown2[] = $block;
    endif;
endforeach;
?>


<div class="container--small padding__bottom-small padding__top-small" data-template="drop-down">
    <h2 class="heading heading-h2"><?php echo $dropDownHeadline; ?></h2>

    <div class="fb-drop-down__container--is-mobile">
        <?php foreach($dropDown as $block): ?>
            <div class="fb-drop-down">
                <div class="fb-drop-down__question">
                    <p class="paragraph paragraph__semi-bold ">
                        <?php echo $block["mm_bl_dd_headline"]; ?>
                    </p>
                    <?php get_template_part("partials/common", "sprite-svg", [
                        "name" => "drop-down-button",
                        "classes" => "icon__drop-down-button",
                    ]); ?>
                </div>

                <div class="fb-drop-down__text">
                    <p class="paragraph paragraph__body ">
                        <?php echo $block["mm_bl_dd_text"]; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="fb-drop-down__container--is-desktop">
        <div class="fb-drop-down-table">
            <?php foreach ($tableDropDown1 as $block): ?>
                <div class="fb-drop-down">
                    <div class="fb-drop-down__question">
                        <p class="paragraph paragraph__semi-bold">
                            <?php echo $block["mm_bl_dd_headline"]; ?>
                        </p>
                        <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "drop-down-button",
                            "classes" => "icon__drop-down-button",
                        ]); ?>
                    </div>

                    <div class="fb-drop-down__text">
                        <p class="paragraph paragraph__body ">
                            <?php echo $block["mm_bl_dd_text"]; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="fb-drop-down-table">
            <?php foreach ($tableDropDown2 as $block): ?>
                <div class="fb-drop-down">
                    <div class="fb-drop-down__question">
                        <p class="paragraph paragraph__semi-bold">
                            <?php echo $block["mm_bl_dd_headline"]; ?>
                        </p>
                        <?php get_template_part("partials/common", "sprite-svg", [
                            "name" => "drop-down-button",
                            "classes" => "icon__drop-down-button",
                        ]); ?>
                    </div>

                    <div class="fb-drop-down__text">
                        <p class="paragraph paragraph__body">
                            <?php echo $block["mm_bl_dd_text"]; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>