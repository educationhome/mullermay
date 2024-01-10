<?php
/**
 * Team Member Block template.
 *
 * @param array $block The block settings and attributes.
 */


$teamMemberFoto = get_field("mm_bl_team_member_card_foto");
$teamMemberHeadline = get_field("mm_bl_team_member_card_headline");
$teamMemberText = get_field("mm_bl_team_member_card_text");
?>


<div class="flexible-block || container__small || padding__bottom-small padding__top-small" data-template="team_member_card">
    <div class="flexible-block__inner">
        <div class="fb-team-member">
            <div class="fb-team-member__image">
                <img src="<?php echo $teamMemberFoto["url"];?>" alt="<?php echo $teamMemberFoto["title"]; ?>">

                <?php get_template_part("partials/common", "sprite-svg", [
                "name" => "mullermay-logo-form__warm-white",
                "classes" => "icon__logo-white",
                ]); ?>
                
            </div>
            
            <div class="fb-team-member__content">
                <h2 class="heading heading__h2">
                    <?php echo $teamMemberHeadline; ?>
                </h2>

                <p class="paragraph">
                    <?php echo $teamMemberText; ?>
                </p>

                <div class="fb-team-member__background">
                    <?php get_template_part("partials/common", "sprite-svg", [
                    "name" => "mullermay-logo-form",
                    "classes" => "icon__background-logo",
                    ]); ?>
                </div>
            </div>
        </div>

    
    </div>
</div>