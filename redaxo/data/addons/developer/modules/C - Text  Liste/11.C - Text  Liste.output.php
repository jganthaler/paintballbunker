<?php
$values = rex_var::toArray('REX_VALUE[id=1]');
?>

<?php if (!rex::isBackend()) : ?>
    <div class="section-wrapper margin-top margin-bottom">
        <div class="row">
            <div class="large-3 columns">
                <?php if ($values['title']) : ?>
                    <h2 class="heading medium"><?= $values['title'] ?></h2>
                <?php endif; ?>
            </div>
            <div class="large-<?= $values['list'] ? '6' : '9' ?> columns">
                <?php if ($values['text']) : ?>
                    <div class="text">
                        <?= $values['text'] ?>
                    </div>
                <?php endif; ?>

                <?php if ('REX_LINK[id=1 isset=1]') : ?>
                    <a class="button primary margin-small-top" href="<?= rex_getUrl('REX_LINK[id=1]') ?>">
                        <?= $values['text_link'] ?: Sprog\Wildcard::get('label.read_more') ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php if ($values['list']) : ?>
                <div class="large-3 columns">
                    <div class="list">
                        <?= $values['list'] ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    [Text<?= $values['title'] ? ': ' . $values['title'] : '' ?>]
<?php endif; ?>
