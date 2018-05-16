<?php
$faqs = rex_var::toArray('REX_VALUE[1]');
?>

<?php if (!rex::isBackend() && count($faqs)) : ?>
    <div class="section-wrapper padding-large-top padding-large-bottom background-dark-gray">
        <div class="row column">
            <ul class="accordion" data-accordion>
                <?php foreach ($faqs as $key => $faq): ?>
                    <li class="accordion-item <?= $key == 0 ? 'is-active' : '' ?>" data-accordion-item>
                        <!-- Accordion tab title -->
                        <a href="#" class="accordion-title"><?= $faq['title'] ?></a>

                        <div class="accordion-content" data-tab-content>
                            <?= $faq['text'] ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php else: ?>
    [Fragen]
<?php endif; ?>