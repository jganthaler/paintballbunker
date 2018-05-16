<?php

$langs  = rex_clang::getAll(true);
$clang  = rex_clang::getCurrentId();
$Object = rex::getProperty('url_object');

?>
<ul class="languages-menu menu">
    <?php foreach ($langs as $lang): ?>

        <?php
        $getParams = $_GET;
        if (rex_article::getCurrent($lang->getId())->isOnline() || rex_backend_login::hasSession()) {
            $article_id = rex_article::getCurrentId();

            if ($Object) {
                if ($Object->isOnline($lang->getId()) || rex_backend_login::hasSession()) {
                    $getParams[$Object->getValue('url_data')->urlParamKey] = $Object->getId();
                }
            }
        }
        else {
            $getParams  = [];
            $article_id = rex_article::getSiteStartArticleId();
        }
        $url = rex_getUrl($article_id, $lang->getId(), $getParams);
        ?>

        <?php if ($lang->getId() == $clang): ?>
            <li class="active"><?= $lang->getCode() ?></li>
        <?php else: ?>
            <li>
                <a href="<?= $url ?>"><?= $lang->getCode() ?></a>
            </li>
        <?php endif; ?>

    <?php endforeach; ?>
</ul>