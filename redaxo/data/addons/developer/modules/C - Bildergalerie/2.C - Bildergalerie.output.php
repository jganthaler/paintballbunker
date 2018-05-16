<?php
$values = rex_var::toArray('REX_VALUE[id=1]');
$images = explode(',', 'REX_MEDIALIST[id=1]');
?>

<?php if (!rex::isBackend()) : ?>
<div class="image-gallery section-wrapper padding-large-top padding-large-bottom">
    <?php if($values['title']): ?>
        <div class="row column">
            <h2 class="heading large"><?= $values['title'] ?></h2>
        </div>
    <?php endif; ?>

    <div class="row large-up-4 medium-up-3 small-up-2">
        <?php foreach ($images as $image) : ?>
            <div class="column grid-item">
                <?php
                $image_src = rex::getServer() . 'index.php?rex_media_type=image_tiny&rex_media_file=' . $image;
                $image_fancybox_src = rex::getServer() . 'index.php?rex_media_type=image_fancybox&rex_media_file=' . $image;
                ?>
                <a class="image-gallery-item" href="<?= $image_fancybox_src ?>" data-fancybox="gallery">
                    <img src="<?= $image_src ?> " alt="<?= rex_media::get($image)->getTitle() ?>">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php else: ?>
    [Bildergalerie]
<?php endif; ?>