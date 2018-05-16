<?php
$values = rex_var::toArray('REX_VALUE[id=1]');

$image_src_1 = rex::getServer() . 'index.php?rex_media_type=image_small_portrait&rex_media_file=REX_MEDIA[id=1]';
$background_image_1 = 'background-image: url(' . $image_src_1 . ')';

$image_src_2 = rex::getServer() . 'index.php?rex_media_type=image_small_portrait&rex_media_file=REX_MEDIA[id=2]';
$background_image_2 = 'background-image: url(' . $image_src_2 . ')';

$image_src_3 = rex::getServer() . 'index.php?rex_media_type=image_small&rex_media_file=REX_MEDIA[id=3]';
$background_image_3 = 'background-image: url(' . $image_src_3 . ')';

?>

<?php if (!rex::isBackend()) : ?>
    <div class="image-block section-wrapper margin-top margin-bottom">
        <div class="row">
            <div class="large-3 medium-4 small-6 columns grid-item">
                <a class="image-block-image image-portrait" href="<?= $image_src_1 ?>"
                   style="<?= $background_image_1 ?>" data-fancybox="image-block"></a>
            </div>
            <div class="large-3 medium-4 small-6 columns grid-item">
                <a class="image-block-image image-portrait" href="<?= $image_src_2 ?>"
                   style="<?= $background_image_2 ?>" data-fancybox="image-block"></a>
            </div>
            <div class="large-6 medium-4 small-12 columns grid-item">
                <a class="image-block-image image-landscape" href="<?= $image_src_3 ?>"
                   style="<?= $background_image_3 ?>" data-fancybox="image-block"></a>
            </div>
        </div>
    </div>
<?php else: ?>
    [Bilder]
<?php endif; ?>
