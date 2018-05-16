<?php
$quicklinks = rex_var::toArray('REX_VALUE[1]');
?>

<?php if (!rex::isBackend()) : ?>
    <div class="section-wrapper padding-top padding-bottom background-medium-gray">
        <div class="row large-up-<?= count($quicklinks) ?> medium-up-2">
            <?php foreach ($quicklinks as $link): ?>
                <div class="column grid-item">
                    <?php
                    $image = $link['REX_MEDIA_1'];
                    $image_src = rex::getServer() . 'index.php?rex_media_type=image_small&rex_media_file=' . $image;
                    $background_image = 'background-image: url(' . $image_src . ')';
                    ?>
                    <a class="quicklink" href="<?= rex_getUrl($link['REX_LINK_1']) ?>">
                        <div class="image" style="<?= $background_image ?>"></div>
                        <?php if ($link['title']) : ?>
                            <div class="caption"><?= $link['title'] ?></div>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    [Quicklinks]
<?php endif; ?>