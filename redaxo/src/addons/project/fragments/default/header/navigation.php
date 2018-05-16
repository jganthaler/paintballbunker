<?php
$rootCategories = rex_category::getRootCategories(true);
?>
<ul class="main-menu menu">
    <li class="<?= rex_article::getSiteStartArticleId() == rex_article::getCurrentId() ? 'active' : ''; ?>">
        <a href="<?= rex_getUrl(rex_article::getSiteStartArticleId()); ?>">
            <?= rex_article::getSiteStartArticle()->getName() ?>
        </a>
    </li>
    <?php foreach ($rootCategories as $rootCategory) : ?>
        <?php
        $childCategories = $rootCategory->getChildren(true);
        $childArticles = $rootCategory->getArticles(true);
        ?>
        <!-- root categories -->
        <li class="<?= $rootCategory->getId() == rex_article::getCurrentId() ? 'active' : ''; ?>">
            <a href="<?= $rootCategory->getUrl(); ?>"><?= $rootCategory->getName(); ?></a>
        </li>
    <?php endforeach; ?>
</ul>
