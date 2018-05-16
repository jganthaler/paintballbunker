<?php
$values = rex_var::toArray('REX_VALUE[id=1]');

$spacing = 'margin-large-top margin-large-bottom';
if ($values['background'] != 'none') {
    $spacing = 'padding-large-top padding-large-bottom';
}

if ($values['spacing'] == 'small') {
    $spacing = 'margin-top margin-bottom';
    if ($values['background'] != 'none') {
        $spacing = 'padding-top padding-bottom';
    }
}
if ($values['spacing'] == 'small-bottom') {
    $spacing = 'margin-large-top margin-bottom';
    if ($values['background'] != 'none') {
        $spacing = 'padding-large-top padding-bottom';
    }
}

?>

<?php if (!rex::isBackend()) : ?>
    <div class="section-wrapper text-block background-<?= $values['background'] ?> <?= $spacing ?>">
        <div class="row column">
            <?php if ($values['title_large']) : ?>
                <h1 class="heading large"><?= $values['title_large'] ?></h1>
            <?php endif; ?>

            <?php if ($values['title_small']) : ?>
                <h2 class="heading small"><?= $values['title_small'] ?></h2>
            <?php endif; ?>

            <?php if ($values['text']) : ?>
                <div class="text">
                    <?= $values['text'] ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    [Text<?= $values['title_large'] ? ': ' . $values['title_large'] : '' ?>]
<?php endif; ?>