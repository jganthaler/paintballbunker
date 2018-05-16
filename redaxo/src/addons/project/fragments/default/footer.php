<?php

$article_content = $this->getVar('article_content');
$footer_article_ids = [3, 4, 5];

?>
<div class="section-wrapper footer-top padding-top padding-bottom">
    <div class="row">
        <div class="large-4 columns">
            <h3 class="footer-heading heading small">###label.opening_hours###</h3>
            <div class="footer-text">
                ###text.opening_hours###
            </div>
        </div>
        <div class="large-4 columns">
            <h3 class="footer-heading heading small">###label.contact###</h3>

            <ul class="footer-contact">
                <li>
                    ###company.name### <br>
                    ###company.street###, I-###company.postal###, ###company.location###
                </li>
                <li>
                    <a href="tel:<?= str_replace(' ', '', Sprog\Wildcard::get('company.phone')) ?>">
                        ###label.phone_short###: ###company.phone###
                    </a>
                </li>
                <li>
                    <a href="mailto:###company.email###">###company.email###</a>
                </li>
                <li>
                    ###label.vat_short###: ###company.vat###
                </li>
            </ul>
        </div>
        <div class="large-4 columns">
            <h3 class="footer-heading heading small">###label.follow_us###</h3>
            <div class="footer-social">
                <?php $this->subfragment('default/social.php'); ?>
            </div>
        </div>
    </div>

</div>

<div class="section-wrapper footer-bottom">
    <div class="row column">
        <ul class="footer-menu menu">
            <?php foreach ($footer_article_ids as $article_id) : ?>
                <?php
                $article = rex_article::get($article_id);
                ?>
                <?php if ($article->isOnline()) : ?>
                    <li class="<?= $article->getId() == rex_article::getCurrentId() ? 'active' : '' ?>">
                        <a href="<?= $article->getUrl(); ?>">
                            <?= $article->getName(); ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <div class="footer-copyright">
            Copyright ©2018 ###company.name###
        </div>
    </div>
</div>