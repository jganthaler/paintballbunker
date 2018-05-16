<?php
$downloads = rex_var::toArray('REX_VALUE[1]');
?>

<?php if (!rex::isBackend()) : ?>
    <div class="section-wrapper padding-small-top padding-small-bottom background-medium-gray">
        <div class="row large-up-3 medium-up-2">
            <?php foreach ($downloads as $download): ?>
                <div class="column grid-item">
                    <a class="button expanded" href="<?= rex_url::base('media/' . $download['REX_MEDIA_1']) ?>"
                       target="_blank">
                        <i class="icon-im-download"></i>
                        <?= $download['text_link'] ?: '###label.download###' ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    [Downloads]
<?php endif; ?>