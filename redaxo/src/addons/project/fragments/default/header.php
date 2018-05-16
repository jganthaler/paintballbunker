<button class="hamburger" type="button">
    <span class="lines"></span>
</button>
<div class="header-top section-wrapper">
    <div class="row column position-relative">
        <?php $this->subfragment('default/header/lang_switch.php'); ?>
        <ul class="contact-menu menu">
            <li>
                <a href="mailto:###company.email###">
                    <i class="icon-im-email-circle"></i> <span>###company.email###</span>
                </a>
            </li>
            <li>
                <a href="tel:<?= str_replace(' ', '', Sprog\Wildcard::get('company.phone')) ?>">
                    <i class="icon-im-phone-circle"></i> <span>###company.phone###</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="header-bottom section-wrapper">
    <div class="row column position-relative">
        <a class="header-logo" href="<?= rex_getUrl(rex_article::getSiteStartArticleId()) ?>">
            <img src="<?= rex_url::base('resources/img/logo-paintballbunker.svg') ?>" alt="###company.name###">
        </a>
        <nav class="main-navigation">
            <?php $this->subfragment('default/header/navigation.php'); ?>
        </nav>
    </div>
</div>