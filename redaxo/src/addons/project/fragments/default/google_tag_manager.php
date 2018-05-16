<?php

$settings = $this->getVar('project_settings');

if (strlen($settings['google_tag_manager'])): ?>
    <?php if (rex_backend_login::hasSession()): ?><!-- Google Tag Manager (noscript) for not backend users: <?php endif; ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $settings['google_tag_manager'] ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php if (rex_backend_login::hasSession()): ?>--><?php endif; ?>
<?php endif; ?>