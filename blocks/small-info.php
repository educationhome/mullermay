<?php
/**
 * Small Info Block template.
 *
 * @param array $block The block settings and attributes.
 */

$smallInfoHeadline = get_field("mm_bl_ib_headline");
$smallInfoTextContent = get_field("mm_bl_ib_text_content");
?>


<div class="container--small padding__bottom-small padding__top-small" data-template="small-info-block">

    <div class="fb-home-small-info-block text-content">
        <?php if(!isset($smallInfoHeadline)): ?>
            <h2 class="heading heading-h2"><?php echo $smallInfoHeadline; ?></h2>
        <?php endif; ?>
        <?php echo $smallInfoTextContent; ?>
    </div>
        
</div>
