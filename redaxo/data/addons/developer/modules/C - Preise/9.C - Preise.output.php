<?php
$values = rex_var::toArray('REX_VALUE[1]');
$prices = rex_var::toArray('REX_VALUE[2]');
?>

<?php if (!rex::isBackend()) : ?>
    <div class="section-wrapper padding-large-top padding-large-bottom">
        <div class="row">
            <?php if ($values['title']) : ?>
                <div class="column">
                    <h2 class="heading medium"><?= $values['title'] ?></h2>
                </div>
            <?php endif; ?>
            <div class="large-6 columns">
                <div class="price-panel">
                    <div class="price">
                        <?= $values['price'] ?> <span>###label.per_person###</span>
                    </div>
                    <div class="text">
                        <?= $values['text'] ?>
                    </div>
                </div>
            </div>
            <div class="large-6 columns">
                <?php if ($prices) : ?>
                    <table class="price-table">
                        <tbody>
                        <?php foreach ($prices as $price) : ?>
                            <tr>
                                <td><?= $price['item'] ?></td>
                                <td><?= $price['price'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

                <?php if ($values['info']) : ?>
                    <div class="price-info">
                        <?= $values['info'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    [Preisliste]
<?php endif; ?>
