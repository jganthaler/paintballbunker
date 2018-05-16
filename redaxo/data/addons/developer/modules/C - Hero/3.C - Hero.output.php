<?php
$slides = rex_var::toArray('REX_VALUE[1]');
?>

<?php if (!rex::isBackend() && count($slides)) : ?>
    <div class="slider-wrapper">
        <div class="slider">
            <?php foreach ($slides as $slide) : ?>
                <?php
                $image = $slide['REX_MEDIA_1'];
                $image_src = rex::getServer() . 'index.php?rex_media_type=image_fullscreen&rex_media_file=' . $image;
                $background_image = 'background-image: url(' . $image_src . ')';
                $has_caption = $slide['title'] || $slide['text'];
                ?>
                <div class="slider-image <?= $has_caption ? 'slider-image-has-caption' : '' ?>" style="<?= $background_image ?>">
                    <?php if ($has_caption) : ?>
                        <div class="slider-caption">
                            <?php if ($slide['title']) : ?>
                                <div class="heading large">
                                    <?= nl2br($slide['title']) ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($slide['text']): ?>
                                <div class="text">
                                    <?= $slide['text'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($slide['REX_LINK_1']) : ?>
                                <a class="button primary" href="<?= rex_getUrl($slide['REX_LINK_1']) ?>">
                                    <?= $slide['text_link'] ?: Sprog\Wildcard::get('label.read_more') ?>
                                </a>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    [Slideshow grosse Bilder]
<?php endif; ?>