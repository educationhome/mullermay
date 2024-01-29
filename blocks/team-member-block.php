<?php
/**
 * Team Member Block template.
 *
 * @param array $block The block settings and attributes.
 */

$teamMemberBlock = get_field("mm_bl_team_member_card");
?>



<div class="section container--small padding__bottom-small" data-template="team-member">
    <div class="section__inner">
        <div class="fb-team-member">
            <?php foreach($teamMemberBlock as $block): ?>
                <div class="fb-team-member__block">
                    <div class="fb-team-member__photo">
                        <img class="lazy" data-src="<?php echo $block["mm_bl_tmc_photo"]["url"]; ?>" alt="<?php echo $block["mm_bl_tmc_photo"]["title"]; ?>">
                        <?php get_template_part("partials/common", "sprite-svg", [
                        "name" => "mullermay-logo-form__warm-white",
                        "classes" => "icon__background-team-member",
                        ]); ?>
                    </div>
                    

                    <div class="fb-team-member__content">
                        <h2 class="heading heading-h2"><?php echo $block["mm_bl_tmc_headline"] ?></h2>
                        
                        <div class="text-content --dsp-wbkt fb-team-member__text"><?php echo $block["mm_bl_tmc_text"]; ?></div>

                        <button class="fb-team-member__load-text-button">
                            <p class="paragraph paragraph__semi-bold paragraph__primary-family fb-team-member__text-open">
                                <?php _e("Weiterlesen"); ?>
                            </p>
                            <p class="paragraph paragraph__semi-bold paragraph__primary-family fb-team-member__text-close --hide">
                                <?php _e("Schließen"); ?>
                            </p>
                            <?php get_template_part("partials/common", "sprite-svg", [
                                "name" => "drop-down-button",
                                "classes" => "icon__drop-down-button",
                            ]); ?>
                        </button>
                    </div>

                    <div class="fb-team-member__background">
                        <?php get_template_part("partials/common", "sprite-svg", [
                        "name" => "mullermay-logo-form",
                        "classes" => "icon__background-logo",
                        ]); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>