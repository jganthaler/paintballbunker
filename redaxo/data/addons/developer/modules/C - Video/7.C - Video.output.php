<?php
$values = rex_var::toArray('REX_VALUE[id=1]');

$image_src = rex::getServer() . 'index.php?rex_media_type=image_fullscreen&rex_media_file=REX_MEDIA[id=1]';
$background_image = 'background-image: url(' . $image_src . ')';

?>

<?php if (!rex::isBackend()) : ?>
    <div class="video-block" style="<?= $background_image ?>">
        <div class="video-caption">
            <a class="play-button" data-fancybox href="<?= trim($values['youtube']) ?>">
                <i class="icon-im-play-circle"></i>
            </a>
            <?php if ($values['title']) : ?>
                <div class="heading medium">
                    <?= $values['title'] ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    [Video]
<?php endif; ?>