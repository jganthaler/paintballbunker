<?php

$article_content = $this->getVar('article_content');

if (!$article_content) {
    $article_content = new rex_article_content(rex_article::getNotFoundArticleId());
    $this->setVar('article_content', $article_content);
}

$jsProperties = rex_view::getJsProperties();

$this->subfragment('default/head.php');
?>
<body class="loading">
<?php
$this->subfragment('default/google_tag_manager.php');
?>
<header id="header" class="site-header">
    <?php $this->subfragment('default/header.php'); ?>
</header>

<main id="main" class="site-main">
    <!-- Article -->
    <?= $article_content->getArticle(1); ?>
</main>

<footer id="footer" class="site-footer">
    <!-- Footer -->
    <?php $this->subfragment('default/footer.php'); ?>
</footer>
<script>var rex = <?= json_encode($jsProperties) ?>;</script>
<script async src="<?= \rex_url::base('resources/dist/app.min.js') . '?v=' . rand(0,9999) ?>"></script>
</body>
</html>