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


<div class="container--small padding__bottom-small padding__top-small" data-template="team_member_card">
    <div class="fb-team-members">
        <div class="fb-team-members__image">
            <?php renderImage($teamMemberFoto, "", true); ?>

            <?php get_template_part("partials/common", "sprite-svg", [
            "name" => "mullermay-logo-form__warm-white",
            "classes" => "icon__logo-white",
            ]); ?>
            
        </div>
        
        <div class="fb-team-members__content">
            <h2 class="heading heading-h2">
                <?php echo $teamMemberHeadline; ?>
            </h2>

            <p class="paragraph paragraph__body">
                <?php echo $teamMemberText; ?>
            </p>

            <div class="fb-team-members__background">
                <?php get_template_part("partials/common", "sprite-svg", [
                "name" => "mullermay-logo-form",
                "classes" => "icon__background-logo",
                ]); ?>
            </div>
        </div>
    </div>
</div>