<?php

// set charset to utf8
header('Content-Type: text/html; charset=utf-8');

$clang = rex_clang::getCurrent();
$settings = \Project\Settings::getAll();

?>
<!DOCTYPE html>
<html lang="<?= $clang->getCode(); ?>" data-lang-id="<?= $clang->getId() ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <?php
    $seo = new rex_yrewrite_seo();
    echo $seo->getTitleTag() . PHP_EOL;
    echo $seo->getDescriptionTag() . PHP_EOL;
    echo $seo->getRobotsTag() . PHP_EOL;
    echo $seo->getHreflangTags() . PHP_EOL;
    echo $seo->getCanonicalUrlTag() . PHP_EOL;
    ?>

    <link rel="apple-touch-icon" sizes="57x57"
          href="<?= rex_url::base("resources/favicon/apple-touch-icon-57x57.png"); ?>"/>
    <link rel="apple-touch-icon" sizes="60x60"
          href="<?= rex_url::base("resources/favicon/apple-touch-icon-60x60.png"); ?>"/>
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?= rex_url::base("resources/favicon/apple-touch-icon-72x72.png"); ?>"/>
    <link rel="apple-touch-icon" sizes="76x76"
          href="<?= rex_url::base("resources/favicon/apple-touch-icon-76x76.png"); ?>"/>
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?= rex_url::base("resources/favicon/apple-touch-icon-114x114.png"); ?>"/>
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?= rex_url::base("resources/favicon/apple-touch-icon-120x120.png"); ?>"/>
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?= rex_url::base("resources/favicon/apple-touch-icon-144x144.png"); ?>"/>
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?= rex_url::base("resources/favicon/apple-touch-icon-152x152.png"); ?>"/>
    <link rel="icon" type="image/png" href="<?= rex_url::base("resources/favicon/favicon-16x16.png"); ?>"
          sizes="16x16"/>
    <link rel="icon" type="image/png" href="<?= rex_url::base("resources/favicon/favicon-32x32.png"); ?>"
          sizes="32x32"/>
    <link rel="icon" type="image/png" href="<?= rex_url::base("resources/favicon/favicon-96x96.png"); ?>"
          sizes="96x96"/>
    <link rel="icon" type="image/png" href="<?= rex_url::base("resources/favicon/favicon-128.png"); ?>"
          sizes="128x128"/>
    <link rel="icon" type="image/png" href="<?= rex_url::base("resources/favicon/favicon-196x196.png"); ?>"
          sizes="196x196"/>
    <meta name="application-name" content="<?= rex::getServerName() ?>"/>
    <meta name="msapplication-TileColor" content="#FFFFFF"/>
    <meta name="msapplication-TileImage" content="<?= rex_url::base("resources/favicon/mstile-144x144.png"); ?>"/>
    <meta name="msapplication-square70x70logo" content="<?= rex_url::base("resources/favicon/mstile-70x70.png"); ?>"/>
    <meta name="msapplication-square150x150logo"
          content="<?= rex_url::base("resources/favicon/mstile-150x150.png"); ?>"/>
    <meta name="msapplication-wide310x150logo" content="<?= rex_url::base("resources/favicon/mstile-310x150.png"); ?>"/>
    <meta name="msapplication-square310x310logo"
          content="<?= rex_url::base("resources/favicon/mstile-310x310.png"); ?>"/>

    <meta name="geo.region" content="<?= $settings['seo_geo_region'] ?>"/>
    <meta name="geo.placename" content="###company.location###"/>
    <meta name="geo.position" content="<?= $settings['latitude'] ?>;<?= $settings['longitude'] ?>"/>
    <meta name="ICBM" content="<?= $settings['latitude'] ?>, <?= $settings['longitude'] ?>"/>

    <meta name="msvalidate.01" content="<?= $settings['bing_validate_id'] ?>"/>
    <meta name="google-site-verification" content="<?= $settings['google_webmaster_id'] ?>"/>

    <link rel="stylesheet" href="<?= rex_url::base('resources/dist/app.min.css') . '?v=' . rand(0, 9999) ?>"
          type="text/css"
          media="screen,print"/>

    <?php if (strlen($settings['google_tag_manager'])): ?>
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(), event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '<?= $settings['google_tag_manager'] ?>');
        </script>
    <?php endif; ?>

    <?php if (strlen($settings['google_analytics'])): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $settings['google_analytics'] ?>"></script>
        <script class="_cookie_accept" type="text/plain">
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?= $settings['google_analytics'] ?>', { 'anonymize_ip': true });
        </script>
    <?php endif; ?>
</head>

